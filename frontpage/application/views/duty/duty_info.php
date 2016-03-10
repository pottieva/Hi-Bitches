<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- 
/**
 * @Author: Perry.Zhang
 * @Date:   2015-11-17 10:21:13
 * @Last Modified by:   Perry.Zhang
 * @Last Modified time: 2015-11-17 11:16:57
 */ -->

<!-- BEGIN PAGE LEVEL STYLES -->
<link href="static/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css"/>
<link href="static/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet"/>
<!-- BEGIN:File Upload Plugin CSS files-->
<link href="static/assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet"/>
<link href="static/assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet"/>
<link href="static/assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet"/>
<!-- END:File Upload Plugin CSS files-->
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="static/assets/admin/pages/css/inbox.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>

<!-- BEGIN PAGE HEADER-->
<div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="index.html">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Info</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">值班信息</a>
                    </li>
                </ul>
                <div class="page-toolbar">
                    <div class="btn-group pull-right">
                    </div>
                </div>
            </div>
            <h3 class="page-title">
            Infomation Center <small></small>
            </h3>
            
            <!-- END PAGE HEADER-->
            <div class="row inbox">
                <div class="col-md-2">
                    <ul class="inbox-nav margin-bottom-10">

                        <li class="compose-btn ">
                            <a href="javascript:;" data-title="Compose" class="btn green">
                            <i class="fa fa-edit"></i>值班信息生成 </a>
                        </li>


                        <li class="inbox active">
                            <a href="javascript:;" class="btn" data-title="Inbox" id='Inbox1'>
                             值班查询 </a>
                            <b></b>
                        </li>

                        <li class="draft">
                            <a class="btn" href="javascript:;" data-title="Draft" id='Draft1'>
                            值班设置</a>
                            <b></b>
                        </li>

                         <li class="draft_init">
                            <a class="btn" href="javascript:;" data-title="draft2" id='Draft1'>
                            值班初始化</a>
                            <b></b>
                        </li>
               
                    </ul>
                </div>
                <div class="col-md-10">
                    <div class="inbox-header">
                        <h1 class="pull-left">值班查询</h1>
                 
                    </div>
                    <div class="inbox-loading">
                         Loading...
                    </div>
                    <div class="inbox-content" id="inbox-content">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
    <a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>
    <div class="page-quick-sidebar-wrapper">
        <div class="page-quick-sidebar">
            <div class="nav-justified">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active">
                        <a href="#quick_sidebar_tab_1" data-toggle="tab">
                        Users <span class="badge badge-danger">2</span>
                        </a>
                    </li>
                    <li>
                        <a href="#quick_sidebar_tab_2" data-toggle="tab">
                        Alerts <span class="badge badge-success">7</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        More<i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li>
                                <a href="#quick_sidebar_tab_3" data-toggle="tab">
                                <i class="icon-bell"></i> Alerts </a>
                            </li>
                            <li>
                                <a href="#quick_sidebar_tab_3" data-toggle="tab">
                                <i class="icon-info"></i> Notifications </a>
                            </li>
                            <li>
                                <a href="#quick_sidebar_tab_3" data-toggle="tab">
                                <i class="icon-speech"></i> Activities </a>
                            </li>
                            <li class="divider">
                            </li>
                            <li>
                                <a href="#quick_sidebar_tab_3" data-toggle="tab">
                                <i class="icon-settings"></i> Settings </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                        <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                            <h3 class="list-heading">Staff</h3>
                            <ul class="media-list list-items">
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-success">8</span>
                                    </div>
                                    <img class="media-object" src="static/assets/admin/layout/img/avatar3.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Bob Nilson</h4>
                                        <div class="media-heading-sub">
                                             Project Manager
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="media-object" src="static/assets/admin/layout/img/avatar1.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Nick Larson</h4>
                                        <div class="media-heading-sub">
                                             Art Director
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-danger">3</span>
                                    </div>
                                    <img class="media-object" src="static/assets/admin/layout/img/avatar4.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Deon Hubert</h4>
                                        <div class="media-heading-sub">
                                             CTO
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="media-object" src="static/assets/admin/layout/img/avatar2.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Ella Wong</h4>
                                        <div class="media-heading-sub">
                                             CEO
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <h3 class="list-heading">Customers</h3>
                            <ul class="media-list list-items">
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-warning">2</span>
                                    </div>
                                    <img class="media-object" src="static/assets/admin/layout/img/avatar6.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Lara Kunis</h4>
                                        <div class="media-heading-sub">
                                             CEO, Loop Inc
                                        </div>
                                        <div class="media-heading-small">
                                             Last seen 03:10 AM
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-status">
                                        <span class="label label-sm label-success">new</span>
                                    </div>
                                    <img class="media-object" src="static/assets/admin/layout/img/avatar7.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Ernie Kyllonen</h4>
                                        <div class="media-heading-sub">
                                             Project Manager,<br>
                                             SmartBizz PTL
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="media-object" src="static/assets/admin/layout/img/avatar8.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Lisa Stone</h4>
                                        <div class="media-heading-sub">
                                             CTO, Keort Inc
                                        </div>
                                        <div class="media-heading-small">
                                             Last seen 13:10 PM
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-success">7</span>
                                    </div>
                                    <img class="media-object" src="static/assets/admin/layout/img/avatar9.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Deon Portalatin</h4>
                                        <div class="media-heading-sub">
                                             CFO, H&D LTD
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="media-object" src="static/assets/admin/layout/img/avatar10.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Irina Savikova</h4>
                                        <div class="media-heading-sub">
                                             CEO, Tizda Motors Inc
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-danger">4</span>
                                    </div>
                                    <img class="media-object" src="static/assets/admin/layout/img/avatar11.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Maria Gomez</h4>
                                        <div class="media-heading-sub">
                                             Manager, Infomatic Inc
                                        </div>
                                        <div class="media-heading-small">
                                             Last seen 03:10 AM
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="page-quick-sidebar-item">
                            <div class="page-quick-sidebar-chat-user">
                                <div class="page-quick-sidebar-nav">
                                    <a href="javascript:;" class="page-quick-sidebar-back-to-list"><i class="icon-arrow-left"></i>Back</a>
                                </div>
                                <div class="page-quick-sidebar-chat-user-messages">
                                    <div class="post out">
                                        <img class="avatar" alt="" src="static/assets/admin/layout/img/avatar3.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:15</span>
                                            <span class="body">
                                            When could you send me the report ? </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt="" src="static/assets/admin/layout/img/avatar2.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Ella Wong</a>
                                            <span class="datetime">20:15</span>
                                            <span class="body">
                                            Its almost done. I will be sending it shortly </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt="" src="static/assets/admin/layout/img/avatar3.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:15</span>
                                            <span class="body">
                                            Alright. Thanks! :) </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt="" src="static/assets/admin/layout/img/avatar2.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Ella Wong</a>
                                            <span class="datetime">20:16</span>
                                            <span class="body">
                                            You are most welcome. Sorry for the delay. </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt="" src="static/assets/admin/layout/img/avatar3.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:17</span>
                                            <span class="body">
                                            No probs. Just take your time :) </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt="" src="static/assets/admin/layout/img/avatar2.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Ella Wong</a>
                                            <span class="datetime">20:40</span>
                                            <span class="body">
                                            Alright. I just emailed it to you. </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt="" src="static/assets/admin/layout/img/avatar3.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:17</span>
                                            <span class="body">
                                            Great! Thanks. Will check it right away. </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt="" src="static/assets/admin/layout/img/avatar2.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Ella Wong</a>
                                            <span class="datetime">20:40</span>
                                            <span class="body">
                                            Please let me know if you have any comment. </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt="" src="static/assets/admin/layout/img/avatar3.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:17</span>
                                            <span class="body">
                                            Sure. I will check and buzz you if anything needs to be corrected. </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="page-quick-sidebar-chat-user-form">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Type a message here...">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn blue"><i class="icon-paper-clip"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                        <div class="page-quick-sidebar-alerts-list">
                            <h3 class="list-heading">General</h3>
                            <ul class="feeds list-items">
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">
                                                     You have 4 pending tasks. <span class="label label-sm label-warning ">
                                                    Take action <i class="fa fa-share"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">
                                             Just now
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                    <i class="fa fa-bar-chart-o"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">
                                                     Finance Report for year 2013 has been released.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">
                                             20 mins
                                        </div>
                                    </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-danger">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">
                                                     You have 5 pending membership that requires a quick review.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">
                                             24 mins
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">
                                                     New order received with <span class="label label-sm label-success">
                                                    Reference Number: DR23923 </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">
                                             30 mins
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">
                                                     You have 5 pending membership that requires a quick review.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">
                                             24 mins
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-bell-o"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">
                                                     Web server hardware needs to be upgraded. <span class="label label-sm label-warning">
                                                    Overdue </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">
                                             2 hours
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-default">
                                                    <i class="fa fa-briefcase"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">
                                                     IPO Report for year 2013 has been released.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">
                                             20 mins
                                        </div>
                                    </div>
                                    </a>
                                </li>
                            </ul>
                            <h3 class="list-heading">System</h3>
                            <ul class="feeds list-items">
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">
                                                     You have 4 pending tasks. <span class="label label-sm label-warning ">
                                                    Take action <i class="fa fa-share"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">
                                             Just now
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-danger">
                                                    <i class="fa fa-bar-chart-o"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">
                                                     Finance Report for year 2013 has been released.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">
                                             20 mins
                                        </div>
                                    </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-default">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">
                                                     You have 5 pending membership that requires a quick review.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">
                                             24 mins
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">
                                                     New order received with <span class="label label-sm label-success">
                                                    Reference Number: DR23923 </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">
                                             30 mins
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">
                                                     You have 5 pending membership that requires a quick review.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">
                                             24 mins
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-warning">
                                                    <i class="fa fa-bell-o"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">
                                                     Web server hardware needs to be upgraded. <span class="label label-sm label-default ">
                                                    Overdue </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">
                                             2 hours
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-briefcase"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">
                                                     IPO Report for year 2013 has been released.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">
                                             20 mins
                                        </div>
                                    </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                        <div class="page-quick-sidebar-settings-list">
                            <h3 class="list-heading">General Settings</h3>
                            <ul class="list-items borderless">
                                <li>
                                     Enable Notifications <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                </li>
                                <li>
                                     Allow Tracking <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                </li>
                                <li>
                                     Log Errors <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                </li>
                                <li>
                                     Auto Sumbit Issues <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                </li>
                                <li>
                                     Enable SMS Alerts <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                </li>
                            </ul>
                            <h3 class="list-heading">System Settings</h3>
                            <ul class="list-items borderless">
                                <li>
                                     Security Level
                                    <select class="form-control input-inline input-sm input-small">
                                        <option value="1">Normal</option>
                                        <option value="2" selected>Medium</option>
                                        <option value="e">High</option>
                                    </select>
                                </li>
                                <li>
                                     Failed Email Attempts <input class="form-control input-inline input-sm input-small" value="5"/>
                                </li>
                                <li>
                                     Secondary SMTP Port <input class="form-control input-inline input-sm input-small" value="3560"/>
                                </li>
                                <li>
                                     Notify On System Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                </li>
                                <li>
                                     Notify On SMTP Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                                </li>
                            </ul>
                            <div class="inner-content">
                                <button class="btn btn-success"><i class="icon-settings"></i> Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END QUICK SIDEBAR -->
</div>

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="static/assets/global/plugins/respond.min.js"></script>
<script src="static/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="static/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="static/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN: Page level plugins -->
<script src="static/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
<!-- BEGIN:File Upload Plugin JS files-->
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="static/assets/global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="static/assets/global/plugins/jquery-file-upload/js/vendor/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="static/assets/global/plugins/jquery-file-upload/js/vendor/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="static/assets/global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js"></script>
<!-- blueimp Gallery script -->
<script src="static/assets/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="static/assets/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="static/assets/global/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="static/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="static/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="static/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="static/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="static/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="static/assets/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
    <script src="static/assets/global/plugins/jquery-file-upload/js/cors/jquery.xdr-transport.js"></script>
    <![endif]-->
<!-- END:File Upload Plugin JS files-->
<!-- END: Page level plugins -->
<script src="static/assets/admin/pages/scripts/inbox_duty.js" type="text/javascript"></script>
<script>
 function ajax() {
                      
        var url =  window.location.href+'/get_duty_by_month_member';

        var member=$("#zhibanren").val();
        var importance=$("#month").val();  
        $.ajax({
            type: "GET",
            cache: false,
            url: url,
            data: {'monthflag':importance ,'member':member},
            dataType: "json",
            success: function(res) 
            {
                 document.getElementById("duty_select").innerHTML=res[0];
            }
        })
                   
    }

 function create(){

        var url =  window.location.href+'/create_duty';
        var importance=$("#month").val();  
        $.ajax({
            type: "GET",
            cache: false,
            url: url,
            data: {'monthflag':importance },
            dataType: "json",
            success: function(res) 
            {
                 document.getElementById("create_content").innerHTML=res[0];
            }
        })


 }



  function save(cate,date){
 

        var url =  window.location.href+'/save_duty_init';
        var mem;
        if(cate==1){
              mem=$("#oracle").val(); 
        }else if(cate==2){
              mem=$("#mysql").val();
        }
        
        if(mem==''){
           alert('请选择'+ (cate==1 ? 'oracle':'mysql')+'值班人！！！');
           return;
        }
        //alert("importance="+importance);
        $.ajax({
            type: "GET",
            cache: false,
            url: url,
            data: {'category':cate,'member':mem,'date':date},
            dataType: "json",
            success: function(res) 
            {
                 //document.getElementById("create_content").innerHTML=res[0];
                 alert((cate==1 ? 'oracle':'mysql')+'值班人信息保存成功');
            }
        })


 }







jQuery(document).ready(function() {       
   Inbox.init();
});



</script>
<!-- END JAVASCRIPTS -->


<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="static/assets/global/plugins/respond.min.js"></script>
<script src="static/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="static/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="static/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="static/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="static/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="static/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="static/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script src="static/assets/admin/pages/scripts/table-editable_duty.js"></script>

<!-- Reload  trigger  JS -->
<script>
function GetInfoFromTable() {
     $.ajax({
         url:  window.location.href+'/reload',  
         type: "POST",
         dataType: "json",
         error: function(){  
             alert('Error loading XML document');  
         },  
         success: function(data){//如果调用php成功  

          document.getElementById("inbox-content").innerHTML=data[0];   
          TableEditable.init();



    }
});    
}

 

</script>






