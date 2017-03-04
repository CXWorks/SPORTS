<!DOCTYPE html>
<html>
<body>

<?php



/*
function uriencode($CharSequence, $encodeSlash)
{
    $result = "";
    for ($i = 0; $i < strlen($CharSequence); $i++) {
        $ch = $CharSequence[$i];

        if (($ch >= 'A' && $ch <= 'Z') || ($ch >= 'a' && $ch <= 'z') || ($ch >= '0' && $ch <= '9') || $ch == '_' || $ch == '-' || $ch == '~' || $ch == '.') {
            $result .= $ch;
        } else if ($ch == '/') {
            $result .= ($encodeSlash ? "%2F" : $ch);
        } else {
            $result .= (urlencode($ch));
        }


    }
    return $result;
}

$h[] = "content-type:";
$h[] = "host:bj.bcebos.com";

$CanonicalHeaders = $h[0].uriencode("application/json; charset=utf-8", 1)."\n".$h[1];
echo $CanonicalHeaders;

$s = hash_hmac('sha256', 'Message', 'secret', false);
echo base64_encode($s);
*/


class SignOption
{
    const EXPIRATION_IN_SECONDS = 'expirationInSeconds';

    const HEADERS_TO_SIGN = 'headersToSign';

    const TIMESTAMP = 'timestamp';

    const DEFAULT_EXPIRATION_IN_SECONDS = 1800;

    const MIN_EXPIRATION_IN_SECONDS = 300;

    const MAX_EXPIRATION_IN_SECONDS = 129600;
}

class HttpUtil
{
    // 根据RFC 3986，除了：
    //   1.大小写英文字符
    //   2.阿拉伯数字
    //   3.点'.'、波浪线'~'、减号'-'以及下划线'_'
    // 以外都要编码
    public static $PERCENT_ENCODED_STRINGS;

    //填充编码数组
    public static function __init()
    {
        HttpUtil::$PERCENT_ENCODED_STRINGS = array();
        for ($i = 0; $i < 256; ++$i) {
            HttpUtil::$PERCENT_ENCODED_STRINGS[$i] = sprintf("%%%02X", $i);
        }

        //a-z不编码
        foreach (range('a', 'z') as $ch) {
            HttpUtil::$PERCENT_ENCODED_STRINGS[ord($ch)] = $ch;
        }

        //A-Z不编码
        foreach (range('A', 'Z') as $ch) {
            HttpUtil::$PERCENT_ENCODED_STRINGS[ord($ch)] = $ch;
        }

        //0-9不编码
        foreach (range('0', '9') as $ch) {
            HttpUtil::$PERCENT_ENCODED_STRINGS[ord($ch)] = $ch;
        }

        //以下4个字符不编码
        HttpUtil::$PERCENT_ENCODED_STRINGS[ord('-')] = '-';
        HttpUtil::$PERCENT_ENCODED_STRINGS[ord('.')] = '.';
        HttpUtil::$PERCENT_ENCODED_STRINGS[ord('_')] = '_';
        HttpUtil::$PERCENT_ENCODED_STRINGS[ord('~')] = '~';
    }

    //在uri编码中不能对'/'编码
    public static function urlEncodeExceptSlash($path)
    {
        return str_replace("%2F", "/", HttpUtil::urlEncode($path));
    }

    //使用编码数组编码
    public static function urlEncode($value)
    {
        $result = '';
        for ($i = 0; $i < strlen($value); ++$i) {
            $result .= HttpUtil::$PERCENT_ENCODED_STRINGS[ord($value[$i])];
        }
        return $result;
    }

    //生成标准化QueryString
    public static function getCanonicalQueryString(array $parameters)
    {
        //没有参数，直接返回空串
        if (count($parameters) == 0) {
            return '';
        }

        $parameterStrings = array();
        foreach ($parameters as $k => $v) {
            //跳过Authorization字段
            if (strcasecmp('Authorization', $k) == 0) {
                continue;
            }
            if (!isset($k)) {
                throw new \InvalidArgumentException(
                    "parameter key should not be null"
                );
            }
            if (isset($v)) {
                //对于有值的，编码后放在=号两边
                $parameterStrings[] = HttpUtil::urlEncode($k)
                    . '=' . HttpUtil::urlEncode((string) $v);
            } else {
                //对于没有值的，只将key编码后放在=号的左边，右边留空
                $parameterStrings[] = HttpUtil::urlEncode($k) . '=';
            }
        }
        //按照字典序排序
        sort($parameterStrings);

        //使用'&'符号连接它们
        return implode('&', $parameterStrings);
    }

    //生成标准化uri
    public static function getCanonicalURIPath($path)
    {
        //空路径设置为'/'
        if (empty($path)) {
            return '/';
        } else {
            //所有的uri必须以'/'开头
            if ($path[0] == '/') {
                return HttpUtil::urlEncodeExceptSlash($path);
            } else {
                return '/' . HttpUtil::urlEncodeExceptSlash($path);
            }
        }
    }

    //生成标准化http请求头串
    public static function getCanonicalHeaders($headers)
    {
        //如果没有headers，则返回空串
        if (count($headers) == 0) {
            return '';
        }

        $headerStrings = array();
        foreach ($headers as $k => $v) {
            //跳过key为null的
            if ($k === null) {
                continue;
            }
            //如果value为null，则赋值为空串
            if ($v === null) {
                $v = '';
            }
            //trim后再encode，之后使用':'号连接起来
            $headerStrings[] = HttpUtil::urlEncode(strtolower(trim($k))) . ':' . HttpUtil::urlEncode(trim($v));
        }
        //字典序排序
        sort($headerStrings);

        //用'\n'把它们连接起来
        return implode("\n", $headerStrings);
    }
}
HttpUtil::__init();


class SampleSigner
{

    const BCE_AUTH_VERSION = "bce-auth-v1";
    const BCE_PREFIX = 'x-bce-';

    //不指定headersToSign情况下，默认签名http头，包括：
    //    1.host
    //    2.content-length
    //    3.content-type
    //    4.content-md5
    public static $defaultHeadersToSign;

    public static function  __init()
    {
        SampleSigner::$defaultHeadersToSign = array(
            "host",
            "content-length",
            "content-type",
            "content-md5",
        );
    }

    //签名函数
    public function sign(
        array $credentials,
        $httpMethod,
        $path,
        $headers,
        $params,
        $options = array()
    ) {
        //设定签名有效时间
        if (!isset($options[SignOption::EXPIRATION_IN_SECONDS])) {
            //默认值1800秒
            $expirationInSeconds = SignOption::DEFAULT_EXPIRATION_IN_SECONDS;
        } else {
            $expirationInSeconds = $options[SignOption::EXPIRATION_IN_SECONDS];
        }

        //解析ak sk
        $accessKeyId = $credentials['ak'];
        $secretAccessKey = $credentials['sk'];

        //设定时间戳，注意：如果自行指定时间戳需要为UTC时间
        if (!isset($options[SignOption::TIMESTAMP])) {
            //默认值当前时间
            $timestamp = new \DateTime();
        } else {
            $timestamp = $options[SignOption::TIMESTAMP];
        }
        $timestamp->setTimezone(new \DateTimeZone("UTC"));

        //生成authString
        $authString = SampleSigner::BCE_AUTH_VERSION . '/' . $accessKeyId . '/'
            . $timestamp->format("Y-m-d\TH:i:s\Z") . '/' . $expirationInSeconds;

        //使用sk和authString生成signKey
        $signingKey = hash_hmac('sha256', $authString, $secretAccessKey);

        //生成标准化URI
        $canonicalURI = HttpUtil::getCanonicalURIPath($path);

        //生成标准化QueryString
        $canonicalQueryString = HttpUtil::getCanonicalQueryString($params);

        //填充headersToSign，也就是指明哪些header参与签名
        $headersToSign = null;
        if (isset($options[SignOption::HEADERS_TO_SIGN])) {
            $headersToSign = $options[SignOption::HEADERS_TO_SIGN];
        }

        //生成标准化header
        $canonicalHeader = HttpUtil::getCanonicalHeaders(
            SampleSigner::getHeadersToSign($headers, $headersToSign)
        );

        //整理headersToSign，以';'号连接
        $signedHeaders = '';
        if ($headersToSign !== null) {
            $signedHeaders = strtolower(
                trim(implode(";", array_keys($headersToSign)))
            );
        }

        //组成标准请求串
        $canonicalRequest = "$httpMethod\n$canonicalURI\n"
            . "$canonicalQueryString\n$canonicalHeader";

        //使用signKey和标准请求串完成签名
        $signature = hash_hmac('sha256', $canonicalRequest, $signingKey);

        //组成最终签名串
        $authorizationHeader = "$authString/$signedHeaders/$signature";

        return $authorizationHeader;
    }

    //根据headsToSign过滤应该参与签名的header
    public static function getHeadersToSign($headers, $headersToSign)
    {
        //value被trim后为空串的header不参与签名
        $filter_empty = function($v) {
            return trim((string) $v) !== '';
        };
        $headers = array_filter($headers, $filter_empty);

        //处理headers的key：去掉前后的空白并转化成小写
        $trim_and_lower = function($str){
            return strtolower(trim($str));
        };
        $temp = array();
        $process_keys = function($k, $v) use(&$temp, $trim_and_lower) {
            $temp[$trim_and_lower($k)] = $v;
        };
        array_map($process_keys, array_keys($headers), $headers);
        $headers = $temp;

        //取出headers的key以备用
        $header_keys = array_keys($headers);

        $filtered_keys = null;
        if ($headersToSign !== null) {
            //如果有headersToSign，则根据headersToSign过滤

            //预处理headersToSign：去掉前后的空白并转化成小写
            $headersToSign = array_map($trim_and_lower, $headersToSign);

            //只选取在headersToSign里面的header
            $filtered_keys = array_intersect_key($header_keys, $headersToSign);

        } else {
            //如果没有headersToSign，则根据默认规则来选取headers
            $filter_by_default = function($k) {
                return SampleSigner::isDefaultHeaderToSign($k);
            };
            $filtered_keys = array_filter($header_keys, $filter_by_default);
        }

        //返回需要参与签名的header
        return array_intersect_key($headers, array_flip($filtered_keys));
    }

    //检查header是不是默认参加签名的：
    //1.是host、content-type、content-md5、content-length之一
    //2.以x-bce开头
    public static function isDefaultHeaderToSign($header)
    {
        $header = strtolower(trim($header));
        if (in_array($header, SampleSigner::$defaultHeadersToSign)) {
            return true;
        }
        return substr_compare($header, SampleSigner::BCE_PREFIX, 0, strlen(SampleSigner::BCE_PREFIX)) == 0;
    }
}
SampleSigner::__init();

$data = '{
    "corsConfiguration": [
        {
            "allowedOrigins": [
                "*"
            ],
            "allowedMethods": [
                "GET",
                "HEAD",
                "DELETE"
            ],
            "allowedHeaders": [
                "*"
            ],
            "allowedExposeHeaders": [
                "user-custom-expose-header"
            ],
            "maxAgeSeconds": 3600
        }
    ]
}';

//签名示范代码
$signer = new SampleSigner();
$credentials = array("ak" => "6bb013b74f43441aa2961130a550837","sk" => "114576782dd448b89c8e4b2b2db551be");
$httpMethod = "PUT";
$path = "";
//$params = array("partNumber" => 9, "uploadId" => "VXBsb2FkIElpZS5tMnRzIHVwbG9hZA");
$params = array();
date_default_timezone_set("PRC");
$timestamp = new \DateTime();
$timestamp->setTimezone(new \DateTimeZone("UTC"));
//$timestamp->setTimestamp(1430123029);
$options = array(SignOption::TIMESTAMP => $timestamp);
$headers = array(
    "Host" => "mireco-test.gz.bcebos.com",
    "x-bce-date:" => $timestamp->format("Y-m-d\TH:i:s\Z"),
    "Content-Length:" => 1024,
    "Content-Type" => "application/json; charset=utf-8",
);
$ret = $signer->sign($credentials, $httpMethod, $path, $headers, $params, $options);
/*print $ret;
echo "<br>";
echo "<br>";*/


$ch = curl_init();
$header[] = "Host: mireco-test.gz.bcebos.com";
$header[] = "x-bce-date: ".$headers["x-bce-date:"];
$header[] = "Content-Length: 1024";
$header[] = "Content-Type: application/json; charset=utf-8";//定义header，可以加多个
$header[] = "Authorization: ".$ret;
curl_setopt($ch, CURLOPT_URL, "http://mireco-test.gz.bcebos.com"); //定义请求地址
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "put"); //定义请求类型，当然那个提交类型那一句就不需要了
curl_setopt($ch, CURLOPT_HEADER,0); //定义是否显示状态头 1：显示 ； 0：不显示
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);//定义header
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);//定义是否直接输出返回流
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); //定义提交的数据
$res = curl_exec($ch);
curl_close($ch);//关闭

echo $res;




?>
</body>
</html>