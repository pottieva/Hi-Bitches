<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 3.7.0
Author: KeenThemes
Update By: Perry.Zhang
Update Time: 10.23.2015
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->bash
<head>
<!-- 添加view层展示页面路径-->
<base href="<?php echo base_url().'application/views/'?>" />
<meta charset="utf-8"/>
<title>Hi Bitches</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="./static/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="./static/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="./static/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="./static/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="./static/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="./static/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="./static/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="./static/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="./static/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="./static/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>

<!-- 页面变动部分CSS-->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="./static/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="./static/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
<!-- <link href="./static/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/> -->
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="./static/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- END HEAD-->
</head>

<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid">
<!-- BEGIN HEADER -->
<div class="page-header -i navbar navbar-fixed-top">
  <!-- BEGIN HEADER INNER -->
  <div class="page-header-inner">
    <!-- BEGIN LOGO -->
    <div class="page-logo">
      <a href="<?php echo base_url();?>">
      <img src="./static/assets/admin/layout/img/logo.png" alt="logo" class="logo-default"/>
      </a>
      <div class="menu-toggler sidebar-toggler hide">
      </div>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
    </a>
    <!-- END RESPONSIVE MENU TOGGLER -->
    <!-- BEGIN TOP NAVIGATION MENU -->
    <div class="top-menu">
      <ul class="nav navbar-nav pull-right">
        <!-- BEGIN NOTIFICATION DROPDOWN -->
        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
          <i class="icon-bell"></i>
          <span class="badge badge-default">
          7 </span>
          </a>
          <ul class="dropdown-menu">
            <li class="external">
              <h3><span class="bold">12 pending</span> notifications</h3>
              <a href="extra_profile.html">view all</a>
            </li>
            <li>
              <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                <li>
                  <a href="javascript:;">
                  <span class="time">just now</span>
                  <span class="details">
                  <span class="label label-sm label-icon label-success">
                  <i class="fa fa-plus"></i>
                  </span>
                  New user registered. </span>
                  </a>
                </li>
                <li>
                  <a href="javascript:;">
                  <span class="time">3 mins</span>
                  <span class="details">
                  <span class="label label-sm label-icon label-danger">
                  <i class="fa fa-bolt"></i>
                  </span>
                  Server #12 overloaded. </span>
                  </a>
                </li>
                <li>
                  <a href="javascript:;">
                  <span class="time">10 mins</span>
                  <span class="details">
                  <span class="label label-sm label-icon label-warning">
                  <i class="fa fa-bell-o"></i>
                  </span>
                  Server #2 not responding. </span>
                  </a>
                </li>
                <li>
                  <a href="javascript:;">
                  <span class="time">14 hrs</span>
                  <span class="details">
                  <span class="label label-sm label-icon label-info">
                  <i class="fa fa-bullhorn"></i>
                  </span>
                  Application error. </span>
                  </a>
                </li>
                <li>
                  <a href="javascript:;">
                  <span class="time">2 days</span>
                  <span class="details">
                  <span class="label label-sm label-icon label-danger">
                  <i class="fa fa-bolt"></i>
                  </span>
                  Database overloaded 68%. </span>
                  </a>
                </li>
                <li>
                  <a href="javascript:;">
                  <span class="time">3 days</span>
                  <span class="details">
                  <span class="label label-sm label-icon label-danger">
                  <i class="fa fa-bolt"></i>
                  </span>
                  A user IP blocked. </span>
                  </a>
                </li>
                <li>
                  <a href="javascript:;">
                  <span class="time">4 days</span>
                  <span class="details">
                  <span class="label label-sm label-icon label-warning">
                  <i class="fa fa-bell-o"></i>
                  </span>
                  Storage Server #4 not responding dfdfdfd. </span>
                  </a>
                </li>
                <li>
                  <a href="javascript:;">
                  <span class="time">5 days</span>
                  <span class="details">
                  <span class="label label-sm label-icon label-info">
                  <i class="fa fa-bullhorn"></i>
                  </span>
                  System Error. </span>
                  </a>
                </li>
                <li>
                  <a href="javascript:;">
                  <span class="time">9 days</span>
                  <span class="details">
                  <span class="label label-sm label-icon label-danger">
                  <i class="fa fa-bolt"></i>
                  </span>
                  Storage server failed. </span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <!-- END NOTIFICATION DROPDOWN -->
        <!-- BEGIN INBOX DROPDOWN -->
        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
        <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
          <i class="icon-envelope-open"></i>
          <span class="badge badge-default">
          4 </span>
          </a>
          <ul class="dropdown-menu">
            <li class="external">
              <h3>You have <span class="bold">7 New</span> Messages</h3>
              <a href="page_inbox.html">view all</a>
            </li>
            <li>
              <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                <li>
                  <a href="inbox.html?a=view">
                  <span class="photo">
                  <img src="././static/assets/admin/layout3/img/avatar2.jpg" class="img-circle" alt="">
                  </span>
                  <span class="subject">
                  <span class="from">
                  Lisa Wong </span>
                  <span class="time">Just Now </span>
                  </span>
                  <span class="message">
                  Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                  </a>
                </li>
                <li>
                  <a href="inbox.html?a=view">
                  <span class="photo">
                  <img src="././static/assets/admin/layout3/img/avatar3.jpg" class="img-circle" alt="">
                  </span>
                  <span class="subject">
                  <span class="from">
                  Richard Doe </span>
                  <span class="time">16 mins </span>
                  </span>
                  <span class="message">
                  Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                  </a>
                </li>
                <li>
                  <a href="inbox.html?a=view">
                  <span class="photo">
                  <img src="././static/assets/admin/layout3/img/avatar1.jpg" class="img-circle" alt="">
                  </span>
                  <span class="subject">
                  <span class="from">
                  Bob Nilson </span>
                  <span class="time">2 hrs </span>
                  </span>
                  <span class="message">
                  Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                  </a>
                </li>
                <li>
                  <a href="inbox.html?a=view">
                  <span class="photo">
                  <img src="././static/assets/admin/layout3/img/avatar2.jpg" class="img-circle" alt="">
                  </span>
                  <span class="subject">
                  <span class="from">
                  Lisa Wong </span>
                  <span class="time">40 mins </span>
                  </span>
                  <span class="message">
                  Vivamus sed auctor 40% nibh congue nibh... </span>
                  </a>
                </li>
                <li>
                  <a href="inbox.html?a=view">
                  <span class="photo">
                  <img src="././static/assets/admin/layout3/img/avatar3.jpg" class="img-circle" alt="">
                  </span>
                  <span class="subject">
                  <span class="from">
                  Richard Doe </span>
                  <span class="time">46 mins </span>
                  </span>
                  <span class="message">
                  Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <!-- END INBOX DROPDOWN -->
        <!-- BEGIN TODO DROPDOWN -->
        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
        <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
          <i class="icon-calendar"></i>
          <span class="badge badge-default">
          3 </span>
          </a>
          <ul class="dropdown-menu extended tasks">
            <li class="external">
              <h3>You have <span class="bold">12 pending</span> tasks</h3>
              <a href="page_todo.html">view all</a>
            </li>
            <li>
              <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                <li>
                  <a href="javascript:;">
                  <span class="task">
                  <span class="desc">New release v1.2 </span>
                  <span class="percent">30%</span>
                  </span>
                  <span class="progress">
                  <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">40% Complete</span></span>
                  </span>
                  </a>
                </li>
                <li>
                  <a href="javascript:;">
                  <span class="task">
                  <span class="desc">Application deployment</span>
                  <span class="percent">65%</span>
                  </span>
                  <span class="progress">
                  <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">65% Complete</span></span>
                  </span>
                  </a>
                </li>
                <li>
                  <a href="javascript:;">
                  <span class="task">
                  <span class="desc">Mobile app release</span>
                  <span class="percent">98%</span>
                  </span>
                  <span class="progress">
                  <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">98% Complete</span></span>
                  </span>
                  </a>
                </li>
                <li>
                  <a href="javascript:;">
                  <span class="task">
                  <span class="desc">Database migration</span>
                  <span class="percent">10%</span>
                  </span>
                  <span class="progress">
                  <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">10% Complete</span></span>
                  </span>
                  </a>
                </li>
                <li>
                  <a href="javascript:;">
                  <span class="task">
                  <span class="desc">Web server upgrade</span>
                  <span class="percent">58%</span>
                  </span>
                  <span class="progress">
                  <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">58% Complete</span></span>
                  </span>
                  </a>
                </li>
                <li>
                  <a href="javascript:;">
                  <span class="task">
                  <span class="desc">Mobile development</span>
                  <span class="percent">85%</span>
                  </span>
                  <span class="progress">
                  <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">85% Complete</span></span>
                  </span>
                  </a>
                </li>
                <li>
                  <a href="javascript:;">
                  <span class="task">
                  <span class="desc">New UI release</span>
                  <span class="percent">38%</span>
                  </span>
                  <span class="progress progress-striped">
                  <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">38% Complete</span></span>
                  </span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <!-- END TODO DROPDOWN -->
        <!-- BEGIN USER LOGIN DROPDOWN -->
        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
        <li class="dropdown dropdown-user">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
          <img alt="" class="img-circle" src="././static/assets/admin/layout/img/avatar3_small.jpg"/>
          <span class="username username-hide-on-mobile">
          Nick </span>
          <i class="fa fa-angle-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-default">
            <li>
              <a href="extra_profile.html">
              <i class="icon-user"></i> My Profile </a>
            </li>
            <li>
              <a href="page_calendar.html">
              <i class="icon-calendar"></i> My Calendar </a>
            </li>
            <li>
              <a href="inbox.html">
              <i class="icon-envelope-open"></i> My Inbox <span class="badge badge-danger">
              3 </span>
              </a>
            </li>
            <li>
              <a href="page_todo.html">
              <i class="icon-rocket"></i> My Tasks <span class="badge badge-success">
              7 </span>
              </a>
            </li>
            <li class="divider">
            </li>
            <li>
              <a href="extra_lock.html">
              <i class="icon-lock"></i> Lock Screen </a>
            </li>
            <li>
              <a href="login.html">
              <i class="icon-key"></i> Log Out </a>
            </li>
          </ul>
        </li>
        <!-- END USER LOGIN DROPDOWN -->
        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
        <li class="dropdown dropdown-quick-sidebar-toggler">
          <a href="javascript:;" class="dropdown-toggle">
          <i class="icon-logout"></i>
          </a>
        </li>
        <!-- END QUICK SIDEBAR TOGGLER -->
      </ul>
    </div>
    <!-- END TOP NAVIGATION MENU -->
  </div>
  <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
  <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
      <!-- BEGIN SIDEBAR MENU -->
      <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
      <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
      <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
      <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
      <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
      <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
      <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <li class="sidebar-toggler-wrapper">
          <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
          <div class="sidebar-toggler">
          </div>
          <!-- END SIDEBAR TOGGLER BUTTON -->
        </li>
        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
        <li class="sidebar-search-wrapper">
          <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
          <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
          <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
          <form class="sidebar-search " action="extra_search.html" method="POST">
            <a href="javascript:;" class="remove">
            <i class="icon-close"></i>
            </a>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
              <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
              </span>
            </div>
          </form>
          <!-- END RESPONSIVE QUICK SEARCH FORM -->
        </li>
		<!--
		  modfiyed by Perry.Zhang ,增加动态高亮标签
		  -date 20151119 
		-->        
        <li 
          <?php if($active_nav=='Dashboard_index') echo "class= active ";?>
        >
          <a href="<?php echo site_url('dashboard');?>">
          <i class="icon-home"></i>
          <span class="title">Dashboard</span>
          <span class="selected"></span>
          <span class="arrow open"></span>
          </a>
        </li>

		<!-- add by Perry.Zhang 增加info的边框 20151109
		  -- modfiyed by Perry.Zhang ,增加动态高亮标签
		  -- date 20151119 
		  -- modifyed by lianshifeng 增加了些许样式
		  -- date 20151119
		-->
    	<li 
      		<?php if($active_nav=='infomation_index') echo "class= active";?>
   		>
          <a href="javascript:;">
          <i class="icon-briefcase"></i>
          <span class="title">Infomation</span>
          <span class="selected"></span>
          <span class="arrow open"></span>
          </a>
          <ul class="sub-menu">
            <li 
            	<?php if($active_sub_nav=='user_info_index') echo "class=active";?>
            >
             <a href="<?php echo site_url('user_info');?>">
             <i class="icon-users"></i>
              用户信息</a>
            </li>

            <li 
              <?php if($active_sub_nav=='duty_info_index') echo "class=active";?>
            >
             <a href="<?php echo site_url('duty_info');?>">
             <i class="icon-users"></i>
              值班信息</a>
            </li>
            <li
            	<?php if($active_sub_nav=='norm_info_index') echo "class=active";?>
            >           
              <a href="<?php echo site_url('normative_info');?>">
              <i class="icon-folder"></i>
              规范信息</a>
            </li>
            <li 
            	<?php if($active_sub_nav=='host_info_index') echo "class=active";?>
            >
              <a href="<?php echo site_url('host_info');?>">
              <i class="icon-paper-clip"></i>
              主机信息</a>
            </li>

            <li 
            	<?php if($active_sub_nav=='database_info_index') echo "class=active";?>
            > 
              <a href="<?php echo site_url('error404');?>">
              <i class="icon-badge"></i>
              数据库信息</a>
            </li>
         
          </ul>
        </li>


      </ul>
      <!-- END SIDEBAR MENU -->
    </div>
  </div>
  <!-- END SIDEBAR -->
  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <div class="page-content">
      <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
      <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
              <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
               Widget settings form goes here
            </div>
            <div class="modal-footer">
              <button type="button" class="btn blue">Save changes</button>
              <button type="button" class="btn default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
      <!-- BEGIN STYLE CUSTOMIZER -->
      <div class="theme-panel hidden-xs hidden-sm">
        <div class="toggler">
        </div>
        <div class="toggler-close">
        </div>
        <div class="theme-options">
          <div class="theme-option theme-colors clearfix">
            <span>
            THEME COLOR </span>
            <ul>
              <li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default">
              </li>
              <li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue">
              </li>
              <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue">
              </li>
              <li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey">
              </li>
              <li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light">
              </li>
              <li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2">
              </li>
            </ul>
          </div>
          <div class="theme-option">
            <span>
            Layout </span>
            <select class="layout-option form-control input-sm">
              <option value="fluid" selected="selected">Fluid</option>
              <option value="boxed">Boxed</option>
            </select>
          </div>
          <div class="theme-option">
            <span>
            Header </span>
            <select class="page-header-option form-control input-sm">
              <option value="fixed" selected="selected">Fixed</option>
              <option value="default">Default</option>
            </select>
          </div>
          <div class="theme-option">
            <span>
            Top Menu Dropdown</span>
            <select class="page-header-top-dropdown-style-option form-control input-sm">
              <option value="light" selected="selected">Light</option>
              <option value="dark">Dark</option>
            </select>
          </div>
          <div class="theme-option">
            <span>
            Sidebar Mode</span>
            <select class="sidebar-option form-control input-sm">
              <option value="fixed">Fixed</option>
              <option value="default" selected="selected">Default</option>
            </select>
          </div>
          <div class="theme-option">
            <span>
            Sidebar Menu </span>
            <select class="sidebar-menu-option form-control input-sm">
              <option value="accordion" selected="selected">Accordion</option>
              <option value="hover">Hover</option>
            </select>
          </div>
          <div class="theme-option">
            <span>
            Sidebar Style </span>
            <select class="sidebar-style-option form-control input-sm">
              <option value="default" selected="selected">Default</option>
              <option value="light">Light</option>
            </select>
          </div>
          <div class="theme-option">
            <span>
            Sidebar Position </span>
            <select class="sidebar-pos-option form-control input-sm">
              <option value="left" selected="selected">Left</option>
              <option value="right">Right</option>
            </select>
          </div>
          <div class="theme-option">
            <span>
            Footer </span>
            <select class="page-footer-option form-control input-sm">
              <option value="fixed">Fixed</option>
              <option value="default" selected="selected">Default</option>
            </select>
          </div>
        </div>
      </div>
      <!-- END STYLE CUSTOMIZER -->
      
      
      <!-- 自定义页面部分-->
      <div id="ajaxloading">
      <?php echo $content_for_layout; ?>
      </div>

    </div>
  </div>
  <!-- END CONTENT -->      
</div>
<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner">
         2015 &copy; All Rights by Perry.Zhang.
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->

<!-- 固定CORE JS-->
<!-- BEGIN CORE JS -->
<script src="./static/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="./static/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="./static/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="./static/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<!-- END CORE JS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="./static/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="./static/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="./static/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="./static/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="./static/assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="./static/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script src="./static/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="./static/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="./static/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="./static/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="./static/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<!-- BEGIN EXPORT HTML TABLE TO EXCEL AND CSV  SCRIPTS -->
<!--<script src="./static/assets/global/table-export-plugin/jquery.min.js" type="text/javascript"></script> -->
<script src="./static/assets/global/table-export-plugin/jquery.base64.js" type="text/javascript"></script>
<script src="./static/assets/global/table-export-plugin/tableExport.js" type="text/javascript"></script>
<script src="./static/assets/global/table-export-plugin/jspdf/libs/sprintf.js" type="text/javascript"></script>
<script src="./static/assets/global/table-export-plugin/jspdf/jspdf.js" type="text/javascript"></script>
<script src="./static/assets/global/table-export-plugin/jspdf/libs/base64.js" type="text/javascript"></script>
<!-- END EXPORT HTML TABLE TO EXCEL AND CSV SCRIPTS -->




<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
   Demo.init(); // init demo features
   Index.init();   
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Tasks.initDashboardWidget();
   Metronic.setAssetsPath('./static/assets/'); // Set the assets folder path
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>