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
            <a href="<?php echo base_url()?>sales/dashboard">
                <img style="margin-top: 12px!important;" src="<?php echo base_url()?>template/assets/pages/img/logo1.png" width="50" alt="logo" class="logo-default" /> </a>
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
                <!-- <li class="nav-item start " id="dashboard_menu">
                    <a href="<?php echo base_url()?>sales/dashboard" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">Dashboard</span>
                        <span class="" id="dashboard_span"></span>
                    </a>
                </li> -->
                
               
                <li class="nav-item  " id="order_menu">
                    <a href="<?php echo base_url()?>sales/stock" class="nav-link">
                        <i class="fa fa-edit"></i>
                        <span class="title">Stock</span>
                        <span id="account_arrow" class="arrow"></span>
                        <span id="account_span" ></span>
                    </a>
                    <!-- <ul class="sub-menu">
                        <li class="nav-item  " id="order_menu1">
                            <a href="<?php echo base_url()?>sales/orders/add" class="nav-link ">
                                <span class="title">Create</span>
                            </a>
                        </li>
                        <li class="nav-item  " id="order_menu2">
                            <a href="<?php echo base_url()?>sales/orders" class="nav-link ">
                                <span class="title">View All</span>
                            </a>
                        </li>

                    </ul> -->
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
                            <a href="<?php echo base_url()?>sales/user/change_password" class="nav-link ">
                                <span class="title">Change Password</span>
                            </a>
                        </li>
                        <li class="nav-item  " id="account_menu2">
                            <a href="<?php echo base_url()?>sales/user/profile/<?php echo $this->session->userdata('login_id')?>" class="nav-link ">
                                <span class="title">My Profile</span>
                            </a>
                        </li>
                        <li class="nav-item  " id="account_menu2">
                            <a href="<?php echo base_url()?>logout" class="nav-link ">
                                <span class="title">Logout</span>
                            </a>
                        </li>

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

            <style>
                /* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
  .page-bar{
   display: none;
 }
 .page-header.navbar {
    padding: 0;
    height: 0px;
}
 .dataTables_length{
   display: none;
 }
 #body .portlet.box > .portlet-body{
   padding: 0;
 }
 #body .page-content {
   padding: 0 !important;
 }
 #body .dataTables_filter label {
   width: 100%;
 }
 #body .dataTables_filter label input{
   width: 100% !important;
   padding: 18px 16px;
   display: block;
   margin: 0;
 }
}
            </style>
