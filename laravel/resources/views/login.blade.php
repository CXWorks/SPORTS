<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sports</title> 
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    
</head>
<body>
    <div>
    <input id="login" type="radio" name="tab"  checked>
    <input id="sign-up" type="radio" name="tab">

        <div class="container" ng-app="myApp" ng-controller="loginCtrl">
            <div  class="tab log-in">
            <label  for="login" ng-click="cleanText()">
                <h3>登录</h3>
            </label>
        </div>
        <div class="tab sign-up">
                <label for="sign-up" ng-click="cleanText()">
                    <h3>注册</h3>
                </label>
            </div>
            <p class="login-replace"><font SIZE="5px">欢迎加入我们!</font></p>
            <p class="login-replace"><font SIZE="5px">选择最好的运动信息平台</font></p>
            <p class="sign-up-replace"><font SIZE="5px">欢迎回来!</font></p>
            <p class="sign-up-replace"><font SIZE="5px">在我们的平台里找到新发现</font></p>

            <fieldset>
            	<form method='post' action="/auth/login">
                <p><input id="username" type="text" name="username" placeholder="用户名:" class="form-login" style="margin-top: 20px;color:#000000;"></p>
                <p><input id="password" type="password" name="password" placeholder="密码: " class="form-login" style="margin-top: 10px;color:#000000;"></p>
				</form>
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3">
                        <button id="login_button" type="button" style="margin-top: 20px;" ng-click="verify()">继续</button>
                    </div>
                    <div class="col-lg-3">
                        <button id="back_button" type="button" style="margin-top: 20px;" ng-click="back()">返回</button>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </fieldset>
        </div>
    </div>
</body>
</html>
