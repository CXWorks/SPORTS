<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html style="width:100%;">

<head>
    <meta charset="UTF-8">
    <title>SPORTS - 运动社交平台</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CUSTOM STYLES -->
    <link rel="stylesheet" href="{{ asset('/') }}css/button.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/animate.min.css">
    <link href="{{ asset('/') }}css/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('/') }}css/style.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/login.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,400italic|Montserrat:700,400|Homemade+Apple' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('/')}}css/share.css" type="text/css">

</head>
<body >

    <!-- =========================
    HOME SECTION
    ============================== -->
    <div class="pop" id="pop"></div>
    <header  id="home" class="header">

        <div id="wrap">
            <!-- =========================
            HEADER
            ============================== -->
            <div id="header">
                    <!-- TOP BAR -->
                <!--<a id="log_reg_btn" class="btn"> <button   style="marginRight:10px" class="button  button-block button-inverse button-rounded button-jumbo"  onclick=javascript:enterLog_Reg()   >登录/注册</button></a>-->

                <div align="right" id="log" >
                    {{--<a href="apiPage/api.html"><button id="api_button"  class="button  button-block button-inverse button-rounded button-medium"  style="background-color:transparent ;  margin-top: -5px; ">API文档</button></a>--}}
                    <a href="login"><button id="sign_button"  class="button  button-block button-inverse button-rounded button-medium"  style="background-color:transparent ;  margin-top: -5px;"  >登录/注册</button></a>
                </div>
            </div>

            <!-- =========================
                MAINBODY
            ============================== -->
            <div id="mainBody">
                <div id="basic" class="basic">
                    <div class="container">
                        <h1 class="intro">
                             <p>运 动 社 交 平 台</p>
                                   <p style="color:#ACD6F5">SPORTS</p>
                             <p>Your own sport manager</p>
                         </h1>
                        <div class="buttons inpage-scroll">
                            <a class="btn" id="main_header_btn"  href="commentPage"> <button class="button  button-block button-inverse button-rounded button-large" style="padding-top:1px;"  >进入应用</button></a>
                            </div>
                        <div class="row bottom-message-section">
                            <div class="col-lg-4 col-sm-4">
                                <div class="short-text">
                                    <i class="fa fa-bookmark-o"></i><a href="self/sports" style="color:rgba(255,255,255,0.7);">所有运动数据</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                                <div class="short-text">
                                    <i class="fa fa-bookmark-o"></i><a href="contest/showContest" style="color:rgba(255,255,255,0.7);"> 所有竞赛信息</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                                <div class="short-text">
                                    <i class="fa fa-bookmark-o"></i><a href="analyze/dataAnalyze" style="color:rgba(255,255,255,0.7);"> 身体健康分析</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- =========================
                 FOCUS
              ============================== -->
                  <section class="focus" id="focus">
                    <div class="container">
                        <!-- SECTION HEADER -->
                        <div class="section-header">
                            <!-- SECTION TITLE -->
                            <h2 class="dark-text">OUR FORCE</h2>
                            <!-- SHORT DESCRIPTION ABOUT THE SECTION-->
                            <h6>
                                We help you to keep healthy & find more friends while running !
                            </h6>
                        </div>
                        <!-- / END SECTION HEADER -->

                        <!-- 4 FOCUS BOXES -->
                        <div class="row">
                            <!-- FIRST FOCUS BOXES -->
                            <div class="col-lg-4 col-sm-4 focus-box red wow fadeInLeft animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s">
                                <a href="self/sports" style="color:#555">
                                    <div class="service-icon">
                                     <i class="fa fa-5x fa-bar-chart-o " style="margin-top:28px; color:#e96656"></i> <!-- FOCUS ICON-->
                                    </div>
                                    <h5 class="red-border-bottom">所有运动数据</h5> <!-- FOCUS HEADING -->
                                </a>
                                <p> <!-- FOCUS DESCRIPTION -->
                                  Contains all your body data while you are doing sports
                                </p>
                            </div>
                            <!-- / END FIRST FOCUS BOX. Other boxes has same format -->
                            <div class="col-lg-4 col-sm-4 focus-box green wow fadeInRight animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s">
                                <a href="contest/showContest" style="color:#555">
                                    <div class="service-icon">
                                        <span class="fa fa-5x fa-th-large"  style="margin-top:28px; color:#34d293"></span>
                                    </div>
                                    <h5 class="green-border-bottom">所有竞赛信息</h5>
                                </a>
                                <p>
                                  Publish contest everyday and choose to join it !  </p>
                            </div>

                           <div class="col-lg-4 col-sm-4 focus-box blue wow fadeInRight animated" href="dataAnalysePage/dataAnalysePage.html"; data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s">
                               <a href="analyze/dataAnalyze" style="color:#555">
                                   <div class="service-icon">
                                        <i class="fa fa-5x fa-file-text-o"  style="margin-top:28px; color:#3ab0e2"></i>
                                    </div>
                                    <h5 class="blue-border-bottom" >身体健康分析</h5>
                               </a>
                               <p>
                                  Provide sufficent ways to analyze and demonstrate through graphs.
                                    </p>
                            </div>
                        </div>
                        <!-- / END 4 FOCUS BOXES -->

                        <!-- OTHER FOCUSES -->
                        <div class="other-focuses">
                            <h5><span class="section-footer-title">ALSO WE FOCUS ON</span></h5>
                        </div>

                        <!-- OTHER FOCUS LIST -->
                        <div class="other-focus-list wow fadeInUp animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s">
                            <ul>
                                <li><i class="fa  fa-bar-chart-o"></i>运动方式与频率</li>
                                <li><i class="fa  fa-industry"></i>运动社交与分享</li>
                                <li><i class="fa  fa-bar-chart-o"></i>专业分析与建议</li>
                                <li><i class="fa  fa-wpforms"></i>用户成长系统</li>
                            </ul>
                        </div> <!-- / END OTHER FOCUS LIST -->
                    </div> <!-- / END CONTAINER -->
                  </section>  <!-- / END FOCUS SECTION -->

                <!-- =========================
                   STATS
                ============================== -->
                <section class="stats">
                    <div class="container">
                        <!-- STATS -->
                        <div class="row">
                            <!-- START COLUMN -->
                            <div class="col-lg-4 col-sm-4">
                                <div class="stat wow fadeInUp animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s">
                                    <div class="icon-top red-text">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </div>
                                    <div class="stat-text">
                                        <h3 class="white-text red-border-bottom" >2,377+</h3>
                                        <h6>Sport showing</h6>
                                    </div>
                                </div>
                            </div> <!-- / END COLUMN -->

                            <!-- START COLUMN -->
                            <div class="col-lg-4 col-sm-4">
                                <div class="stat wow fadeInUp animated" data-wow-offset="30" data-wow-duration="1.75s" data-wow-delay="0.30s">
                                    <div class="icon-top green-text">
                                        <i class="fa fa-th-large"></i>
                                    </div>
                                    <div class="stat-text">
                                        <h3 class="white-text green-border-bottom">28+</h3>
                                        <h6>Health showing</h6>
                                    </div>
                                </div>
                            </div> <!-- / END COLUMN -->

                            <!-- START COLUMN -->
                            <div class="col-lg-4 col-sm-4">
                                <div class="stat wow fadeInUp animated" data-wow-offset="30" data-wow-duration="2s" data-wow-delay="0.45s">
                                    <div class="icon-top yellow-text">
                                        <i class="fa fa-file-text-o"></i>
                                    </div>
                                    <div class="stat-text">
                                        <h3 class="white-text yellow-border-bottom" >100+</h3>
                                        <h6>Friends' share</h6>
                                    </div>
                                </div>
                            </div> <!-- / END COLUMN -->
                        </div>
                    </div>
                </section>  <!-- / END STATS -->

                <!-- =========================
                      DataShow
                 ============================== -->
                <section class="DataShow_1">
                    <!-- STATS -->
                    <div class="container">
                        <div class="row">
                            <!-- START COLUMN -->
                            <div class="col-lg-7 col-md-7 col-sm-7" >
                                <div class="stat wow fadeInUp animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.30s">
                                    <div class="illustrate_icon_1">
                                        <img src="img/pic14.png">
                                    </div>
                                </div>
                            </div> <!-- / END COLUMN -->
                            <div class="col-lg-5 col-md-5 col-sm-5" >
                                <div class="stat wow fadeInUp animated" data-wow-offset="30" data-wow-duration="1.75s" data-wow-delay="0.30s">
                                    <div class ="illustrate_text_1">
                                        <p>
                                        <h2>详尽的个人分析</h2>
                                        <h3>丰富的统计曲线</br>diversified stastical curve</br>实时的等级排行</br>attention degree list</h3>
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- / END COLUMN -->
                        </div>
                    </div>
                </section>  <!-- / END STATS -->

                <section class="DataShow_2">
                    <div class="container">
                        <!-- STATS -->
                        <div class="row">
                            <!-- START COLUMN -->
                            <div class="col-lg-5 col-md-5 col-sm-5">
                                <div class="stat wow fadeInUp animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.45s">
                                    <div class ="illustrate_text_2" >
                                        <h2>成长曲线</br></h2>
                                        <p>
                                        <h3>大量的成长项目</br>
                                            a number of growing items</br>
                                            等级荣耀</br>
                                            grade strength</br>
                                            好友互动</br>
                                            compete with your best friends
                                        </h3>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-7" >
                                <div class="stat wow fadeInUp animated" data-wow-offset="30" data-wow-duration="1.75s" data-wow-delay="0.45s">
                                    <div class="illustrate_icon_2" >
                                        <img src="img/pic42.png">
                                    </div>
                                </div>
                            </div> <!-- / END COLUMN -->
                        </div>
                    </div>
                </section>  <!-- / END STATS -->

                <section class="DataShow_3">
                    <div class="container">
                        <!-- STATS -->
                        <div class="row">
                            <!-- START COLUMN -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="stat wow fadeInUp animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="1.00s">
                                    <div class="illustrate_icon_3">
                                        <img src="img/pic03.png">
                                    </div>
                                </div>
                            </div> <!-- / END COLUMN -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="stat wow fadeInUp animated" data-wow-offset="30" data-wow-duration="1.75s" data-wow-delay="1.00s">
                                    <div class ="illustrate_text_3">
                                        <h2>高效的竞赛信息平台</h2>
                                        <h3>多种竞赛信息</br>
                                          mutiplied competion information</br>
                                          组织认证有保证</br>
                                          varify the organization to protect you</h3>
                                    </div>
                                </div>
                            </div> <!-- / END COLUMN -->
                        </div>
                    </div>
                </section>  <!-- / END STATS -->

                <section class="DataShow_4">
                    <div class="container">
                        <!-- STATS -->
                        <div class="row">
                            <!-- START COLUMN -->
                            <div class="col-lg-7 col-md-7 col-sm-7">
                                <div class="stat wow fadeInUp animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="1.15s">
                                    <div class ="illustrate_text_4">
                                        <h2>SPORTS运动树洞</h2>
                                        <h3>运动社交化</br>
                                          sports network</br>
                                          运动心得与体会</br>
                                          your thinking and doing/h3>
                                    </div>
                                </div>
                            </div> <!-- / END COLUMN -->
                            <div class="col-lg-5  col-md-5 col-sm-5" >
                                <div class="stat wow fadeInUp animated" data-wow-offset="30" data-wow-duration="1.75s" data-wow-delay="1.15s">
                                    <div class="illustrate_icon_4">
                                        <img src="img/pic31.png">
                                    </div>
                                </div>
                            </div> <!-- / END COLUMN -->
                        </div>
                    </div>
                </section>  <!-- / END STATS -->
            </div>

    <!-- / END HOME SECTION  -->
            <!-- =========================
             FOOTER
            ============================== -->
            <section class="info fadeInUp animated"  id="info" style="color: #cecece">
                <button  id="infoDown" style="background-color: transparent; border-color: transparent"><i class="fa fa-angle-down  fa-2x"style="color:#cecece;"></i></button>
                <p></p>
                <div class="container">
                    <div class="row wow" data-wow-offset="40" data-wow-duration="5s" data-wow-delay="0.30s">
                        <!-- MEMBER -->
                        <div class="col-lg-3 col-sm-3 fadeInLeft animated">
                            <div class="team-member">
                                <figure class="profile-pic">
                                    <img src="img/ourHeader/cx.gif" alt="" style="height:40px; width:40px;"> <!-- MEMBER PROFILE PIC -->
                                </figure>
                                <p></p>
                                <div class="member-details red-text">
                                    <h5 class="white-text red-border-bottom">XiangChen</h5>
                                    <div class="position">
                                        Founder
                                    </div>
                                </div>
                                <div class="details">
                                    <p>
                                        负责文件服务器与策略</br>
                                        热爱技术，热爱生活
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <footer>
                <div id="footer" class="footer row" >
                    <div class="g-ft" style="text-align: center ; padding-top: 10px;">
                        <span class="m-ft2 col-md-6" >
                            <a target="_blank"  rel="nofollow" href="javascript:void(0);" style="color: #EBEBEB" id="aboutUS"><i  class="fa fa-user" style="margin-right: 2px;margin-top: -5px;"></i>关于我们</a>
                             <span style="margin-left:20px;"><i  class="fa fa-envelope" style="margin-right: 1px;margin-top: -5px;"></i> 联系我们：<a href="mailto:141250018@smail.nju.edu.cn" style="color: #fff;">141250018@smail.nju.edu.cn</a></span>
                            <span>&nbsp;|</span>
                    <!--     <a target="_blank" rel="nofollow" href="javascript:void(0);"  style="color: #EBEBEB">官方博客</a>-->
                        </span>

                        <span class="m-ft1 col-md-6" style="color:#cecece">
                            cxworks版权所有　&copy;2016-2017　
                            <i class="share share-github col-md-1"></i>
                            <i class="share share-gmail col-md-1"></i>
                            <i class="share share-linkedin col-md-1"></i>
                            <i class="share share-stackoverflow col-md-1"></i>
                            <i class="share share-tumblr col-md-1"></i>
                            <i class="share share-twitter col-md-1"></i>

                        </span>


                    </div>
                </div>
            </footer>
        </div>
    </header>

</body>

</html>
