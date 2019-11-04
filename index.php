<!DOCTYPE html>
<?php
//require_once('includes/load.php');
//$user = current_user();
?>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>نظام الاجـــــور والمرتبات</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
	

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="assets/js/ace-extra.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="no-skin">
<div id="navbar" class="navbar navbar-default          ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="index.php" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
             نظام شئون العاملين بالنادى العام
                </small>
            </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <li class="grey dropdown-modal">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
					   
                      <i class="ace-icon fa fa-tasks"></i>
                        <span class="badge badge-grey">4</span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close ">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-check"></i>
                            4 Tasks to complete
                        </li>

                        <li class="dropdown-content">
                            <ul class="dropdown-menu dropdown-navbar">
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Software Update</span>
                                            <span class="pull-right">65%</span>
                                        </div>

                                        <div class="progress progress-mini">
                                            <div style="width:65%" class="progress-bar"></div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Hardware Upgrade</span>
                                            <span class="pull-right">35%</span>
                                        </div>

                                        <div class="progress progress-mini">
                                            <div style="width:35%" class="progress-bar progress-bar-danger"></div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Unit Testing</span>
                                            <span class="pull-right">15%</span>
                                        </div>

                                        <div class="progress progress-mini">
                                            <div style="width:15%" class="progress-bar progress-bar-warning"></div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Bug Fixes</span>
                                            <span class="pull-right">90%</span>
                                        </div>

                                        <div class="progress progress-mini progress-striped active">
                                            <div style="width:90%" class="progress-bar progress-bar-success"></div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">
                                See tasks with details
                                <i class="ace-icon fa fa-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="purple dropdown-modal">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                        <span class="badge badge-important">8</span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-exclamation-triangle"></i>
                            8 Notifications
                        </li>

                        <li class="dropdown-content">
                            <ul class="dropdown-menu dropdown-navbar navbar-pink">
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
														New Comments
													</span>
                                            <span class="pull-right badge badge-info">+12</span>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="btn btn-xs btn-primary fa fa-user"></i>
                                        Bob just signed up as an editor ...
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
														New Orders
													</span>
                                            <span class="pull-right badge badge-success">+8</span>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
														Followers
													</span>
                                            <span class="pull-right badge badge-info">+11</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">
                                See all notifications
                                <i class="ace-icon fa fa-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="green dropdown-modal">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
                        <span class="badge badge-success">5</span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-envelope-o"></i>
                            5 Messages
                        </li>

                        <li class="dropdown-content">
                            <ul class="dropdown-menu dropdown-navbar">
                                <li>
                                    <a href="#" class="clearfix">
                                        <img src="assets/images/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
                                        <span class="msg-body">
													<span class="msg-title">
														<span class="blue">Alex:</span>
														Ciao sociis natoque penatibus et auctor ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>a moment ago</span>
													</span>
												</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="clearfix">
                                        <img src="assets/images/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
                                        <span class="msg-body">
													<span class="msg-title">
														<span class="blue">Susan:</span>
														Vestibulum id ligula porta felis euismod ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>20 minutes ago</span>
													</span>
												</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="clearfix">
                                        <img src="assets/images/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
                                        <span class="msg-body">
													<span class="msg-title">
														<span class="blue">Bob:</span>
														Nullam quis risus eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>3:15 pm</span>
													</span>
												</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="clearfix">
                                        <img src="assets/images/avatars/avatar2.png" class="msg-photo" alt="Kate's Avatar" />
                                        <span class="msg-body">
													<span class="msg-title">
														<span class="blue">Kate:</span>
														Ciao sociis natoque eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>1:33 pm</span>
													</span>
												</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="clearfix">
                                        <img src="assets/images/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
                                        <span class="msg-body">
													<span class="msg-title">
														<span class="blue">Fred:</span>
														Vestibulum id penatibus et auctor  ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>10:09 am</span>
													</span>
												</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown-footer">
                            <a href="inbox.html">
                                See all messages
                                <i class="ace-icon fa fa-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="assets/images/avatars/user.jpg" alt="Jason's Photo" />
                        <span class="user-info">
									<small>مرحبا بك</small>
									أحمد
								</span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="#">
                                <i class="ace-icon fa fa-cog"></i>
                                Settings
                            </a>
                        </li>

                        <li>
                            <a href="profile.html">
                                <i class="ace-icon fa fa-user"></i>
                                Profile
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="#">
                                <i class="ace-icon fa fa-power-off"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.navbar-container -->
</div>

<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
    </script>

    <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
        <script type="text/javascript">
            try{ace.settings.loadState('sidebar')}catch(e){}
        </script>

        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                <button class="btn btn-success">
                    <i class="ace-icon fa fa-signal"></i>
                </button>

                <button class="btn btn-info">
                    <i class="ace-icon fa fa-pencil"></i>
                </button>

                <button class="btn btn-warning">
                    <i class="ace-icon fa fa-users"></i>
                </button>

                <button class="btn btn-danger">
                    <i class="ace-icon fa fa-cogs"></i>
                </button>
            </div>

            <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                <span class="btn btn-success"></span>

                <span class="btn btn-info"></span>

                <span class="btn btn-warning"></span>

                <span class="btn btn-danger"></span>
            </div>
        </div><!-- /.sidebar-shortcuts -->
        <ul class="nav nav-list">
            <li class="active">
                <a href="index.php">
                 <i class="menu-icon fa fa-tachometer"></i>
					 
                    <span class="menu-text"> الصفحة الرئيسية </span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-download"></i
					
                    <span class="menu-text">
								البيانات الاساسية
							</span>
                    

                    <b class="arrow fa fa-angle-down"></b>
					
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="/payroll/club.php">
                            <i class="fas fa-chalkboard-teacher""></i>
                            الانديــــــــة
                        </a>

                        <b class="arrow"></b>
                    </li>
					 <li class="">
                        <a href="/payroll/section.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                            الاقسام الداخلية
                        </a>

                        <b class="arrow"></b>
                    </li>


                    <li class="">
                        <a href="/payroll/drga.php">
                            <i class="menu-icon fa fa-hand-o-right"></i>
                            الدرجات الوظيفية

                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="/payroll/jobs.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                           الوظائف

                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="/payroll/employee_type.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                          أنواع العمالة
                        </a>

                        <b class="arrow"></b>
                    </li>
                     <li class="">
                        <a href="/payroll/holiday_type.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                         أنواع الاجازات
                        </a>

                        <b class="arrow"></b>
                    </li>
                     <li class="">
                        <a href="/payroll/holiday_type.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                         أكواد المدفوعات والاستقطاعات
                        </a>

                        <b class="arrow"></b>
                    </li>
					<li class="">
                        <a href="/payroll/holiday_type.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                         أنواع الصرفيات
                        </a>

                        <b class="arrow"></b>
                    </li>
					<li class="">
                        <a href="/payroll/holiday_type.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                         أنواع الساعات الإضافية
                        </a>

                        <b class="arrow"></b>
                    </li>
					<li class="">
                        <a href="/payroll/holiday_type.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                         شرائح الضريبة
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>

            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-upload"></i>
                    <span class="menu-text">  بيانات الحركة</span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">

                    <li class="">
                        <a href="#" id="segel_main">
                            <i class="menu-icon fa fa-caret-right"></i>
                           بيانات أساسية للعاملين
                        </a>
                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="typography.html">
                            <i class="menu-icon fa fa-caret-right"></i>
                            بيانات مالية للعاملين

                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="elements.html">
                            <i class="menu-icon fa fa-caret-right"></i>
                           الساعات الإضافية

                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="buttons.html">
                            <i class="menu-icon fa fa-caret-right"></i>
                            الأجازات والجزاءات
                        </a>

                        <b class="arrow"></b>
                    </li>
					 <li class="">
                        <a href="buttons.html">
                            <i class="menu-icon fa fa-caret-right"></i>
                           الســــلــفـــيــات
                        </a>

                        <b class="arrow"></b>
                    </li>
					<li class="">
                        <a href="buttons.html">
                            <i class="menu-icon fa fa-caret-right"></i>
                           تحسين الخدمة
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>

 <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-download"></i>
                    <span class="menu-text">
								تقارير وإحصائيات
							</span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="#">
                            <i class="menu-icon fa fa-caret-right"></i>
                           سجل العاملين بالنادى
                        </a>

                        <b class="arrow"></b>
                    </li>


                    <li class="">
                        <a href="img/123.jpg">
                            <i class="menu-icon fa fa-caret-right"></i>
                           يومية الحضور والغياب الشهرى

                        </a>

                        <b class="arrow"></b>
                    </li>
					<li class="">
                        <a href="img/123.jpg">
                            <i class="menu-icon fa fa-caret-right"></i>
                           الساعات الاضافية الشهرية لكل عامل

                        </a>

                        <b class="arrow"></b>
                    </li>
					<li class="">
                        <a href="img/123.jpg">
                            <i class="menu-icon fa fa-caret-right"></i>
                           الاستقصاعات الشهرية

                        </a>

                        <b class="arrow"></b>
                    </li>
					<li class="">
                        <a href="img/123.jpg">
                            <i class="menu-icon fa fa-caret-right"></i>
                           تقرير الضرائب المستقطعة شهريا

                        </a>

                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="img/123.jpg">
                            <i class="menu-icon fa fa-caret-right"></i>
                           حافظة المرتبات

                        </a>

                        <b class="arrow"></b>
                    </li>
                   
                </ul>
            </li>
 <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-download"></i>
                    <span class="menu-text">
								مستخدمين وصلاحيات
							</span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="IMG/SERVER.JPG">
                            <i class="menu-icon fa fa-caret-right"></i>
                          إضافة مستخدم جديد
                        </a>

                        <b class="arrow"></b>
                    </li>


                    <li class="">
                        <a href="img/net-in.jpg">
                            <i class="menu-icon fa fa-caret-right"></i>
                            منح صلاحيات للمستخدم

                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="img/net-out.jpg">
                            <i class="menu-icon fa fa-caret-right"></i>
                           فتح صرفية جديدة

                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="img/ip.jpg">
                            <i class="menu-icon fa fa-caret-right"></i>
                            دليل العناوين الشبكية للاندية
                        </a>

                        <b class="arrow"></b>
                    </li>

                </ul>
            </li>			

        </ul>
	<li class="">	
                <a href="img/net-out.jpg" class="dropdown-toggle">
                    <i class="menu-icon fa fa-download"></i>
                    <span class="menu-text">
								البوم الصور
							</span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>
	
     <!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
    </div>

    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">الرئيسيه</a>
                    </li>
                    <li class="active">شاشه التحكم</li>
                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
                    </form>
                </div><!-- /.nav-search -->
            </div>

            <div class="page-content" id="dinamic_content">
                <!-- /.ace-settings-container -->
                <div class="ace-settings-container" id="ace-settings-container">
                    <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                        <i class="ace-icon fa fa-cog bigger-130"></i>
                    </div>

                    <div class="ace-settings-box clearfix" id="ace-settings-box">
                        <div class="pull-left width-50">
                            <div class="ace-settings-item">
                                <div class="pull-left">
                                    <select id="skin-colorpicker" class="hide">
                                        <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                                        <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                        <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                        <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                    </select>
                                </div>
                                <span>&nbsp; Choose Skin</span>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
                                <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
                                <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
                                <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
                                <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
                                <label class="lbl" for="ace-settings-add-container">
                                    Inside
                                    <b>.container</b>
                                </label>
                            </div>
                        </div><!-- /.pull-left -->

                        <div class="pull-left width-50">
                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
                                <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
                                <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
                                <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                            </div>
                        </div><!-- /.pull-left -->
                    </div><!-- /.ace-settings-box -->
                </div>
                <!-- /.ace-settings-container -->

                <div class="page-header">
                    <h1>
                        شاشه التحكم
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                           عرض البيانات
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="alert alert-block alert-success">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="ace-icon fa fa-times"></i>
                            </button>

                            <i class="ace-icon fa fa-check green"></i>

                           مرحبا
                            <strong class="green">

                                <small></small>
                            </strong>,
                            هنا يتم عرض رسائل النظام
                        </div>


                        <div class="row">
                            <div class="space-6">  </div>


                                <div class="col-sm-12 infobox-container">
                                    <div class="infobox infobox-green">
                                        <div class="infobox-icon">
                                            <i class="ace-icon fa fa-comments"></i>
                                        </div>

                                        <div class="infobox-data">
                                            <span class="infobox-data-number">11</span>
                                            <div class="infobox-content">المراكز التابعة للنادى العام</div>
                                        </div>

                                        <div class="stat stat-success">8%</div>
                                    </div>

                                    <div class="infobox infobox-blue">
                                        <div class="infobox-icon">
                                            <i class="ace-icon fa fa-twitter"></i>
                                        </div>

                                        <div class="infobox-data">
                                            <span class="infobox-data-number">198</span>
                                            <div class="infobox-content">إجمالى عدد العاملين بالنادى العام</div>
                                        </div>

                                        <div class="badge badge-success">
                                            +32%
                                            <i class="ace-icon fa fa-arrow-up"></i>
                                        </div>
                                    </div>

                                    <div class="infobox infobox-pink">
                                        <div class="infobox-icon">
                                            <i class="ace-icon fa fa-shopping-cart"></i>
                                        </div>

                                        <div class="infobox-data">
                                            <span class="infobox-data-number">5</span>
                                            <div class="infobox-content">مراكز مرتبطة شبكيا</div>
                                        </div>
                                        <div class="stat stat-important">25%</div>
                                    </div>

                                    <div class="infobox infobox-red">
                                        <div class="infobox-icon">
                                            <i class="ace-icon fa fa-flask"></i>
                                        </div>

                                        <div class="infobox-data">
                                            <span class="infobox-data-number">220 ساعة</span>
                                            <div class="infobox-content">الحد الاقصى للساعات شهريا</div>
                                        </div>
                                    </div>

                                    <div class="infobox infobox-orange2">
                                        <div class="infobox-chart">
                                            <span class="sparkline" data-values="196,128,202,177,154,94,100,170,224"></span>
                                        </div>

                                        <div class="infobox-data">
                                            <span class="infobox-data-number">7100</span>
                                            <div class="infobox-content">إجمالى المرتبات شهريا</div>
                                        </div>

                                        <div class="badge badge-success">
                                            7.2%
                                            <i class="ace-icon fa fa-arrow-up"></i>
                                        </div>
                                    </div>

                                    <div class="infobox infobox-blue2">
                                        <div class="infobox-progress">
                                            <div class="easy-pie-chart percentage" data-percent="60" data-size="46">
                                                <span class="percent">60</span>%
                                            </div>
                                        </div>

                                        <div class="infobox-data">
                                            <span class="infobox-text">الاندية المرتبطة شبكيا</span>

                                            <div class="infobox-content">
                                                <span class="bigger-110">~</span>
                                                عدد 5 أندية من اصل 9 أندية
                                            </div>
                                        </div>
                                    </div>

                                    <div class="space-6"></div>

                                    <div class="infobox infobox-green infobox-small infobox-dark">
                                        <div class="infobox-progress">
                                            <div class="easy-pie-chart percentage" data-percent="61" data-size="39">
                                                <span class="percent">74</span>%
                                            </div>
                                        </div>

                                        <div class="infobox-data">
                                            <div class="infobox-content">كفاءة الاداء</div>
                                            <div class="infobox-content">الشبكى</div>
                                        </div>
                                    </div>

                                    <div class="infobox infobox-blue infobox-small infobox-dark">
                                        <div class="infobox-chart">
                                            <span class="sparkline" data-values="3,4,2,3,4,4,2,2"></span>
                                        </div>

                                        <div class="infobox-data">
                                            <div class="infobox-content">إيرادات سنوية</div>
                                            <div class="infobox-content">16,000,000 جم</div>
                                        </div>
                                    </div>

                                    <div class="infobox infobox-grey infobox-small infobox-dark">
                                        <div class="infobox-icon">
                                            <i class="ace-icon fa fa-download"></i>
                                        </div>

                                        <div class="infobox-data">
                                            <div class="infobox-content">الربط الشبكى</div>
                                            <div class="infobox-content">عدد(25) موقع</div>
                                        </div>
                                    </div>
                                </div>


                            <div class="vspace-12-sm"></div>

                          <!-- /.col -->
                        </div><!-- /.row -->

                        <div class="hr hr32 hr-dotted"></div>






                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

    <div class="footer">
        <div class="footer-inner">
            <div class="footer-content">
						<span class="bigger-120">

							 كافه الحقوق محفوظه ل  &copy; 	<span class="blue bolder">لجنه الحاسبات والبرمجه</span>2016-2030
						</span>

                &nbsp; &nbsp;
                <span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

						</span>
            </div>
        </div>
    </div>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="assets/js/excanvas.min.js"></script>
<![endif]-->
<script src="assets/js/jquery-ui.custom.min.js"></script>
<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="assets/js/jquery.easypiechart.min.js"></script>
<script src="assets/js/jquery.sparkline.index.min.js"></script>
<script src="assets/js/jquery.flot.min.js"></script>
<script src="assets/js/jquery.flot.pie.min.js"></script>
<script src="assets/js/jquery.flot.resize.min.js"></script>

<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {

        /*  my edit in template */

        $(document).ready(function() {
            $('#segel_main').on('click', function (e) {
                var current_branch = $(e.target).closest('li') ;
                current_branch.addClass("active");
                current_branch.closest('ul').closest('li').addClass("active");;
                e.preventDefault();
                load_main_segel(e,easyPieChart);
            });
        });


        function load_main_segel(e,callback){
            var fd = new FormData(this.form);
            $.ajax({
                type: "post",
                url: "main_segel.php",
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                //dataType: "JSON",
                success: function (response) {
                    $('#dinamic_content').html(response);
                    callback();
                },
                error: function (data) {
                    console.log('An error occurred.');
                    console.log(data);
                }
            });

        }


        /* end my edit */


           $('#ace-settings-rtl').click();
             easyPieChart();


        function easyPieChart(){
        $('.easy-pie-chart.percentage').each(function(){
            var $box = $(this).closest('.infobox');
            var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
            var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
            var size = parseInt($(this).data('size')) || 50;
            $(this).easyPieChart({
                barColor: barColor,
                trackColor: trackColor,
                scaleColor: false,
                lineCap: 'butt',
                lineWidth: parseInt(size/10),
                animate: ace.vars['old_ie'] ? false : 1000,
                size: size
            });
        });
        }

        $('.sparkline').each(function(){
            var $box = $(this).closest('.infobox');
            var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
            $(this).sparkline('html',
                {
                    tagValuesAttribute:'data-values',
                    type: 'bar',
                    barColor: barColor ,
                    chartRangeMin:$(this).data('min') || 0
                });
        });


        //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
        //but sometimes it brings up errors with normal resize event handlers
        $.resize.throttleWindow = false;

        var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
        var data = [
            { label: "social networks",  data: 38.7, color: "#68BC31"},
            { label: "search engines",  data: 24.5, color: "#2091CF"},
            { label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
            { label: "direct traffic",  data: 18.6, color: "#DA5430"},
            { label: "other",  data: 10, color: "#FEE074"}
        ]



        /**
         we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
         so that's not needed actually.
         */


        //pie chart tooltip example
        var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
        var previousPoint = null;

        placeholder.on('plothover', function (event, pos, item) {
            if(item) {
                if (previousPoint != item.seriesIndex) {
                    previousPoint = item.seriesIndex;
                    var tip = item.series['label'] + " : " + item.series['percent']+'%';
                    $tooltip.show().children(0).text(tip);
                }
                $tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
            } else {
                $tooltip.hide();
                previousPoint = null;
            }

        });

        /////////////////////////////////////
        $(document).one('ajaxloadstart.page', function(e) {
            $tooltip.remove();
        });




        $('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
        function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('.tab-content')
            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $source.offset();
            //var w2 = $source.width();

            if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
            return 'left';
        }


        $('.dialogs,.comments').ace_scroll({
            size: 300
        });


        //Android's default browser somehow is confused when tapping on label which will lead to dragging the task
        //so disable dragging when clicking on label
        var agent = navigator.userAgent.toLowerCase();
        if(ace.vars['touch'] && ace.vars['android']) {
            $('#tasks').on('touchstart', function(e){
                var li = $(e.target).closest('#tasks li');
                if(li.length == 0)return;
                var label = li.find('label.inline').get(0);
                if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
            });
        }

        $('#tasks').sortable({
                opacity:0.8,
                revert:true,
                forceHelperSize:true,
                placeholder: 'draggable-placeholder',
                forcePlaceholderSize:true,
                tolerance:'pointer',
                stop: function( event, ui ) {
                    //just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
                    $(ui.item).css('z-index', 'auto');
                }
            }
        );
        $('#tasks').disableSelection();
        $('#tasks input:checkbox').removeAttr('checked').on('click', function(){
            if(this.checked) $(this).closest('li').addClass('selected');
            else $(this).closest('li').removeClass('selected');
        });


        //show the dropdowns on top or bottom depending on window height and menu position
        $('#task-tab .dropdown-hover').on('mouseenter', function(e) {
            var offset = $(this).offset();

            var $w = $(window)
            if (offset.top > $w.scrollTop() + $w.innerHeight() - 100)
                $(this).addClass('dropup');
            else $(this).removeClass('dropup');
        });




    })

</script>
</body>
</html>
