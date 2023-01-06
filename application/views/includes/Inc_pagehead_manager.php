<!-- BEGIN THEME GLOBAL STYLES -->
<link href="<?php echo base_url()?>template/assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="<?php echo base_url()?>template/assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->
<!-- BEGIN THEME LAYOUT STYLES -->
<link href="<?php echo base_url()?>template/assets/layouts/layout2/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>template/assets/layouts/layout2/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="<?php echo base_url()?>template/assets/layouts/layout2/css/custom.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME LAYOUT STYLES -->
<link rel="shortcut icon" href="favicon.ico" />

</head>

<!-- END HEAD -->

<body id="body" class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-md">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="<?php echo base_url()?>manager/dashboard">
                <img style="margin-top: 12px!important;" src="<?php echo base_url()?>template/assets/pages/img/logo1.png" alt="logo" class="logo-default" /> </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE ACTIONS -->
        <!-- DOC: Remove "hide" class to enable the page header actions -->
        <div class="page-actions">

        </div>
        <!-- END PAGE ACTIONS -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <!-- BEGIN HEADER SEARCH BOX -->
            <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->

            <!-- END HEADER SEARCH BOX -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                        <a href="javascript:;" class="dropdown-toggle quick-sidebar-toggler" >
                            <i class="icon-envelope-open"></i>
                            <span class="badge badge-default" id="new_message_count">0</span>
                        </a>
                        <ul class="dropdown-menu">
                        </ul>
                    </li>
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
<!--                    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">-->
<!--                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">-->
<!--                            <i class="icon-bell"></i>-->
<!--                            <span class="badge badge-default"> 7 </span>-->
<!--                        </a>-->
<!--                        <ul class="dropdown-menu">-->
<!--                            <li class="external">-->
<!--                                <h3>-->
<!--                                    <span class="bold">12 pending</span> notifications</h3>-->
<!--                                <a href="#">view all</a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">-->
<!--                                    <li>-->
<!--                                        <a href="javascript:;">-->
<!--                                            <span class="time">just now</span>-->
<!--                                            <span class="details">-->
<!--                                                        <span class="label label-sm label-icon label-success">-->
<!--                                                            <i class="fa fa-plus"></i>-->
<!--                                                        </span> New BOQ Created. </span>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </li>-->
                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN INBOX DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <!-- END INBOX DROPDOWN -->
                    <!-- BEGIN TODO DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
<!--                    <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">-->
<!--                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">-->
<!--                            <i class="icon-calendar"></i>-->
<!--                            <span class="badge badge-default"> 3 </span>-->
<!--                        </a>-->
<!--                        <ul class="dropdown-menu extended tasks">-->
<!--                            <li class="external">-->
<!--                                <h3>You have-->
<!--                                    <span class="bold">12 pending</span> tasks</h3>-->
<!--                                <a href="#">view all</a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">-->
<!--                                    <li>-->
<!--                                        <a href="javascript:;">-->
<!--                                                    <span class="task">-->
<!--                                                        <span class="desc">Job Stage Updated </span>-->
<!--                                                        <span class="percent">30%</span>-->
<!--                                                    </span>-->
<!--                                            <span class="progress">-->
<!--                                                        <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">-->
<!--                                                            <span class="sr-only">40% Complete</span>-->
<!--                                                        </span>-->
<!--                                                    </span>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!---->
<!--                                </ul>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </li>-->
                    <!-- END TODO DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="<?php echo $this->session->userdata('avatar')?>" />
                            <span class="username username-hide-on-mobile"> <?php echo $this->session->userdata('user_alias')?> </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="<?php echo base_url()?>manager/user/profile/<?php echo $this->session->userdata('login_id')?>">
                                    <i class="icon-user"></i> My Profile </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>manager/user/change_password">
                                    <i class="icon-lock"></i> Account Settings </a>
                            </li>
                            <li class="divider"> </li>

                            <li>
                                <a href="<?php echo base_url()?>logout">
                                    <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended quick-sidebar-toggler">
                        <span class="sr-only">Toggle Quick Sidebar</span>
                        <i class="icon-logout" title="Chat"></i>
                    </li>
                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- END SIDEBAR -->
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
            <ul id="side_bar" class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="nav-item start " id="dashboard_menu">
                    <a href="<?php echo base_url()?>manager/dashboard" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">Dashboard</span>
                        <span class="" id="dashboard_span"></span>
                    </a>
                </li>
                

                <li class="nav-item  " id="stock_menu">
                    <a href="<?php echo base_url()?>manager/stock" class="nav-link nav-toggle">
                        <i class="fa fa-cube"></i>
                        <span class="title">Stock</span>
                        <span class="" id="stock_span"></span>
                    </a>
                </li>


                
                <li class="nav-item  " id="hr_menu">
                    <a href="<?php echo base_url()?>manager/user" class="nav-link">
                        <i class="fa fa-sitemap"></i>
                        <span class="title">HR</span>
                        <span class="" id="hr_span"></span>
                        <span class="arrow" id="hr_arrow"></span>
                    </a>
                    
                </li>
                <li class="nav-item  " id="data_menu">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-database"></i>
                        <span class="title">Data Management</span>
                        <span class="" id="data_span"></span>
                        <span class="arrow" id="data_arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  " id="data_menu1">
                            <a href="<?php echo base_url()?>manager/batch" class="nav-link ">
                                <span class="title">Manage Batch</span>
                            </a>
                        </li>
                        <li class="nav-item  " id="data_menu2">
                            <a href="<?php echo base_url()?>manager/item" class="nav-link ">
                                <span class="title">Manage Items</span>
                            </a>
                        </li>
                       
                    </ul>
                </li>
                <li class="nav-item  " id="account_menu">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-cogs"></i>
                        <span class="title">Configurations</span>
                        <span id="account_arrow" class="arrow"></span>
                        <span id="account_span" ></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  " id="account_menu1">
                            <a href="<?php echo base_url()?>manager/user/change_password" class="nav-link ">
                                <span class="title">Change Password</span>
                            </a>
                        </li>
                        <!-- <li class="nav-item  " id="account_menu2">
                            <a href="<?php echo base_url()?>manager/user/profile/<?php echo $this->session->userdata('login_id')?>" class="nav-link ">
                                <span class="title">My Profile</span>
                            </a>
                        </li> -->

                    </ul>
                </li>
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
