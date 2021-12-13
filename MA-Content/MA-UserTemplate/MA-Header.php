<?php
@session_start();
$URL_DIRECTLY ='https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
get_browser();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <!-- App Favicon icon -->
    <link rel="shortcut icon" href="<?php echo $MA_Img ?>favicon.ico">
    <!-- App Title -->
    <title>معجم الضاد</title>

    <link href="<?php echo $MA_Css ?>bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $MA_Css ?>core.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $MA_Css ?>components.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $MA_Css ?>icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $MA_Css ?>pages.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $MA_Css ?>menu.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $MA_Css ?>responsive.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $MA_Css ?>style.css" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert -->
    <link href="<?php echo $MA_Css ?>sweet-alert.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="<?php echo $MA_Js ?>modernizr.min.js"></script>

</head>
<body>
<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container">

            <!-- Logo container-->
            <div class="logo">
                <a href="index.php" class="logo"><span>معجم <i style="color:#5fbeaa"> الضاد </i> ع </span></a>
            </div>
            <!-- /.logo Logo container-->
            <div class="navbar-custom">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">
                        <li class="has-submenu waves-effect waves-light"><a href="index">الرئيسية</a></li>
                        <li class="has-submenu waves-effect waves-light"><a href="MA-Means">القاموس اللغوى</a></li>
                        <li class="has-submenu waves-effect waves-light"><a href="MA-GlossaryOf">المعجم اللغوى</a></li>
                    </ul>
                    <!-- /.navigation menu  -->
                </div>
            </div> <!-- /.navbar-custom -->

            <div class="menu-extras">

                <ul class="nav navbar-nav navbar-right pull-right">
                    <!--
                    <li class="navbar-c-items">
                        <form role="search" class="navbar-left app-search pull-left hidden-xs">
                            <input type="text" placeholder="بحث .." class="form-control">
                            <a href="" class=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                    -->
                    <?php
                    if (!isset($_SESSION['MA_USER_ARABIC_SESSION'])){
                        ?>
                        <li class="waves-effect waves-light"><a href="MA-Sign-In?Url_Redirect=<?php echo $MA_url_R ?>">تسجيل الدخول</a></li>
                        <li class="waves-effect waves-light"><a href="MA-Sign-Up?Url_Redirect=<?php echo $MA_url_R ?>">تسجيل جديد</a></li>
                        <?php
                    } else{
                        ?>
                        <li class="dropdown navbar-c-items">
                            <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                <i class="icon-bell"></i> <span class="badge badge-xs badge-danger">3</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg">
                                <li class="notifi-title"><span class="label label-default pull-right">New 3</span>Notification</li>
                                <li class="list-group slimscroll-noti notification-list">
                                    <!-- list item-->
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="pull-left p-r-10">
                                                <em class="fa fa-diamond noti-primary"></em>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                                                <p class="m-0">
                                                    <small>There are new settings available</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- list item-->
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="pull-left p-r-10">
                                                <em class="fa fa-cog noti-warning"></em>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading">New settings</h5>
                                                <p class="m-0">
                                                    <small>There are new settings available</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- list item-->
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="pull-left p-r-10">
                                                <em class="fa fa-bell-o noti-custom"></em>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading">Updates</h5>
                                                <p class="m-0">
                                                    <small>There are <span class="text-primary font-600">2</span> new updates available</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- list item-->
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="pull-left p-r-10">
                                                <em class="fa fa-user-plus noti-pink"></em>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading">New user registered</h5>
                                                <p class="m-0">
                                                    <small>You have 10 unread messages</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- list item-->
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="pull-left p-r-10">
                                                <em class="fa fa-diamond noti-primary"></em>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                                                <p class="m-0">
                                                    <small>There are new settings available</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- list item-->
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="pull-left p-r-10">
                                                <em class="fa fa-cog noti-warning"></em>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading">New settings</h5>
                                                <p class="m-0">
                                                    <small>There are new settings available</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="list-group-item text-right">
                                        <small class="font-600">See all notifications</small>
                                    </a>
                                </li>
                            </ul>
                        </li><!-- /.dorpdown Notifications   -->
                        <li class="hidden-xs chat-box">
                            <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="icon-settings"></i></a>
                        </li> <!-- /.chat-box  -->
                        <li class="dropdown navbar-c-items">
                            <a href="" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo $MA_Img  ?>users/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo $_SESSION['MA_USER_ARABIC_SESSION'] ?>"><i class="ti-user text-custom m-r-10"></i> الصفحة الشخصية</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-settings text-custom m-r-10"></i> الاعدادت</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-lock text-custom m-r-10"></i> قفل الشاشة</a></li>
                                <li class="divider"></li>
                                <li><a href="MA-logo-ut?Url_Redirect=<?php echo $MA_url_R ?>"><i class="ti-power-off text-danger m-r-10"></i> تسجيل الخروج</a></li>
                            </ul>
                        </li> <!-- /.dropdown person  -->
                        <?php
                    }
                    ?>
                </ul><!-- /.nav  -->
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div><!-- /.lines  -->
                    </a><!-- /.navbar-toggle  -->
                    <!-- End mobile menu toggle-->
                </div><!-- /.menu-item  -->
            </div><!-- /.menu-extras  -->
        </div><!-- /.container  -->
    </div><!-- /.topbar-main  -->
</header><!-- /.topnav  -->
<!-- End Navigation Bar-->
<div class="wrapper">
    <div class="container">