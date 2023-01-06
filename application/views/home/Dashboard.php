
    <!-- END PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url()?>template/assets/global/plugins/css3clock/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>template/assets/global/plugins/css3clock/css/clock.css" rel="stylesheet">
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url()?>template/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <?php $this->view("includes/Inc_pagehead".$page_head_file_suffix);?>


            <h3 class="page-title"> Dashboard
                <small>project erp & statistics</small>
            </h3>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="<?php echo base_url()?>admin/dashboard">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span>Dashboard</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN DASHBOARD STATS 1-->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat blue">
                        <div class="visual">
                            <i class="fa fa-suitcase"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="0">0</span>
                            </div>
                            <div class="desc"> Stock </div>
                        </div>
                        <a class="more" href="javascript:;"> View more
                            <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat red">
                        <div class="visual">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="0">0</span>KD </div>
                            <div class="desc"> Total Orders</div>
                        </div>
                        <a class="more" href="javascript:;"> View more
                            <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat green">
                        <div class="visual">
                            <i class="fa fa-edit"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="0">0</span>
                            </div>
                            <div class="desc"> Total Customers </div>
                        </div>
                        <a class="more" href="javascript:;"> View more
                            <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat purple">
                        <div class="visual">
                            <i class="fa fa-globe "></i>
                        </div>
                        <div class="details">
                            <div class="number"> +
                                <span data-counter="counterup" data-value="0"></span></div>
                            <div class="desc"> Total Usrrs </div>
                        </div>
                        <a class="more" href="javascript:;"> View more
                            <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <!-- END DASHBOARD STATS 1-->
           
            <div class="row">
                
                <div class="col-md-6 col-sm-6">
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-share font-blue"></i>
                                <span class="caption-subject font-blue bold uppercase">Recent Activities</span>
                            </div>
                            <div class="actions">

                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
                                <ul class="feeds">
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Site Supervisor Updated Job Status.
                                                                <span class="label label-sm label-warning "> View
                                                                    <i class="fa fa-share"></i>
                                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> Just now </div>
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
                                                        <div class="desc"> Factory Supervisor Updated Production Status. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Site Supervisor Updated Job Status.
                                                                <span class="label label-sm label-warning "> View
                                                                    <i class="fa fa-share"></i>
                                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> Just now </div>
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
                                                        <div class="desc"> Factory Supervisor Updated Production Status. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Site Supervisor Updated Job Status.
                                                                <span class="label label-sm label-warning "> View
                                                                    <i class="fa fa-share"></i>
                                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> Just now </div>
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
                                                        <div class="desc"> Factory Supervisor Updated Production Status. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Site Supervisor Updated Job Status.
                                                                <span class="label label-sm label-warning "> View
                                                                    <i class="fa fa-share"></i>
                                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> Just now </div>
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
                                                        <div class="desc"> Factory Supervisor Updated Production Status. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="scroller-footer">
                                <div class="btn-arrow-link pull-right">
                                    <a href="javascript:;">See All Records</a>
                                    <i class="icon-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6" >
                    <div class="portlet light " >
                        <div class="portlet-body">
                            <div class="profile-nav alt" >
                                <section class="panel" >
                                    <div class="user-heading alt clock-row terques-bg">
                                        <h1><?php echo date('l')?>, <?php echo date('d')?> <?php echo date('F')?> <?php echo date('Y')?></h1>
                                    </div>
                                    <ul id="clock">
                                        <li id="sec"></li>
                                        <li id="hour"></li>
                                        <li id="min"></li>
                                    </ul>


                                </section>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12" >
                    <div class="portlet light ">
                        <div class="portlet-body">
                            <div class="tiles">
                                <a href="#"> <div class="tile  bg-purple-seance double">
                                        <div class="tile-body">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> Dashboard </div>
                                            <div class="number"></div>
                                        </div>
                                    </div></a>
                                <a href="#"> <div class="tile bg-red-thunderbird">
                                        <div class="tile-body">
                                            <i class="fa fa-suitcase"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> Customer </div>
                                            <div class="number">  </div>
                                        </div>
                                    </div></a>
                                <a href="#"> <div class="tile bg-green " >
                                        <div class="tile-body">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">  Stock </div>
                                            <div class="number">  </div>
                                        </div>
                                    </div></a>
                                <a href="#"> <div class="tile bg-blue">
                                        <div class="tile-body">
                                            <i class="fa fa-file-text"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> HR </div>
                                            <div class="number">  </div>
                                        </div>
                                    </div></a>
                                <a href="#"> <div class="tile bg-red-flamingo">
                                        <div class="tile-body">
                                            <i class="fa fa-industry"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> Datamanagement </div>
                                            <div class="number">  </div>
                                        </div>
                                    </div></a>
                               
                                <a href="#"> <div class="tile bg-blue-steel double">
                                        <div class="tile-body">
                                            <i class="fa fa-bar-chart"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> Reports </div>
                                            <div class="number">  </div>
                                        </div>
                                    </div></a>
                                <a href="#"> <div class="tile bg-blue-ebonyclay">
                                        <div class="tile-body">
                                            <i class="fa fa-cogs"></i>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> Configurations </div>
                                            <div class="number">  </div>
                                        </div>
                                    </div></a>

                            </div>

                        </div>
                    </div>

                </div>
                
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="portlet light portlet-fit ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class=" icon-layers font-green"></i>
                                <span class="caption-subject font-green bold uppercase">To Do List</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="mt-element-list">
                                <div class="mt-list-head list-todo opt-2 font-white bg-dark">
                                    <div class="list-head-title-container">
                                        <h3 class="list-title">Project Works to do</h3>
                                        <div class="list-head-count">
                                            <div class="list-head-count-item">
                                                <i class="fa fa-check"></i> 15</div>
                                            <div class="list-head-count-item">
                                                <i class="fa fa-cog"></i> 34</div>
                                        </div>
                                    </div>
                                    <a href="javascript:;">
                                        <div class="list-count pull-right bg-red-mint">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="mt-list-container list-todo opt-2">
                                    <div class="list-todo-line bg-red"></div>
                                    <ul>
                                        <li class="mt-list-item">
                                            <div class="list-todo-icon bg-white font-blue-steel">
                                                <i class="fa fa-database"></i>
                                            </div>
                                            <div class="list-todo-item item-1">
                                                <a class="list-toggle-container font-white" data-toggle="collapse" href="#task-1-2" aria-expanded="false">
                                                    <div class="list-toggle done uppercase bg-blue-steel">
                                                        <div class="list-toggle-title bold">KOC :: KOGS </div>
                                                        <div class="badge badge-default pull-right bg-white font-dark bold">3</div>
                                                    </div>
                                                </a>
                                                <div class="task-list panel-collapse collapse " id="task-1-2">
                                                    <ul>
                                                        <li class="task-list-item done">
                                                            <div class="task-icon">
                                                                <a href="javascript:;">
                                                                    <i class="fa fa-database"></i>
                                                                </a>
                                                            </div>
                                                            <div class="task-status">
                                                                <a class="done" href="javascript:;">
                                                                    <i class="fa fa-check"></i>
                                                                </a>
                                                                <a class="pending" href="javascript:;">
                                                                    <i class="fa fa-close"></i>
                                                                </a>
                                                            </div>
                                                            <div class="task-content">
                                                                <h4 class="uppercase bold">
                                                                    <a href="javascript:;">Exhibition Stand</a>
                                                                </h4>
                                                                <p>Demo  Test dolor sit amet, consectetur adipiscing elit. Donec elementum gravida mauris, a tincidunt dolor porttitor eu. </p>
                                                            </div>
                                                        </li>
                                                        <li class="task-list-item">
                                                            <div class="task-icon">
                                                                <a href="javascript:;">
                                                                    <i class="fa fa-table"></i>
                                                                </a>
                                                            </div>
                                                            <div class="task-status">
                                                                <a class="done" href="javascript:;">
                                                                    <i class="fa fa-check"></i>
                                                                </a>
                                                                <a class="pending" href="javascript:;">
                                                                    <i class="fa fa-close"></i>
                                                                </a>
                                                            </div>
                                                            <div class="task-content">
                                                                <h4 class="uppercase bold">
                                                                    <a href="javascript:;">Flooring</a>
                                                                </h4>
                                                                <p>Deno contents dolor sit amet, consectetur adipiscing elit. Donec elementum gravida mauris, a tincidunt dolor porttitor eu. </p>
                                                            </div>
                                                        </li>
                                                        <li class="task-list-item">
                                                            <div class="task-icon">
                                                                <a href="javascript:;">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                            </div>
                                                            <div class="task-status">
                                                                <a class="done" href="javascript:;">
                                                                    <i class="fa fa-check"></i>
                                                                </a>
                                                                <a class="pending" href="javascript:;">
                                                                    <i class="fa fa-close"></i>
                                                                </a>
                                                            </div>
                                                            <div class="task-content">
                                                                <h4 class="uppercase bold">
                                                                    <a href="javascript:;">Glass Paddding</a>
                                                                </h4>
                                                                <p>Deno contents dolor sit amet, consectetur adipiscing elit. Donec elementum gravida mauris, a tincidunt dolor porttitor eu. </p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="task-footer bg-grey">
                                                        <div class="row">
                                                            <div class="col-xs-6">
                                                                <a class="task-trash" href="javascript:;">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <a class="task-add" href="javascript:;">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mt-list-item">
                                            <div class="list-todo-icon bg-white font-green-meadow">
                                                <i class="fa fa-paint-brush"></i>
                                            </div>
                                            <div class="list-todo-item item-2">
                                                <a class="list-toggle-container font-white" data-toggle="collapse" href="#task-2-2" aria-expanded="false">
                                                    <div class="list-toggle done uppercase bg-green-meadow">
                                                        <div class="list-toggle-title bold">Mega Project in Salmiya</div>
                                                        <div class="badge badge-default pull-right bg-white font-dark bold">3</div>
                                                    </div>
                                                </a>
                                                <div class="task-list panel-collapse collapse" id="task-2-2">
                                                    <ul>
                                                        <li class="task-list-item done">
                                                            <div class="task-icon">
                                                                <a href="javascript:;">
                                                                    <i class="fa fa-file-image-o"></i>
                                                                </a>
                                                            </div>
                                                            <div class="task-status">
                                                                <a class="done" href="javascript:;">
                                                                    <i class="fa fa-check"></i>
                                                                </a>
                                                                <a class="pending" href="javascript:;">
                                                                    <i class="fa fa-close"></i>
                                                                </a>
                                                            </div>
                                                            <div class="task-content">
                                                                <h4 class="uppercase bold">
                                                                    <a href="javascript:;">Interior Design</a>
                                                                </h4>
                                                                <p>Deno contents dolor sit amet, consectetur adipiscing elit. Donec elementum gravida mauris, a tincidunt dolor porttitor eu. </p>
                                                            </div>
                                                        </li>
                                                        <li class="task-list-item done">
                                                            <div class="task-icon">
                                                                <a href="javascript:;">
                                                                    <i class="fa fa-star-half-o"></i>
                                                                </a>
                                                            </div>
                                                            <div class="task-status">
                                                                <a class="done" href="javascript:;">
                                                                    <i class="fa fa-check"></i>
                                                                </a>
                                                                <a class="pending" href="javascript:;">
                                                                    <i class="fa fa-close"></i>
                                                                </a>
                                                            </div>
                                                            <div class="task-content">
                                                                <h4 class="uppercase bold">
                                                                    <a href="javascript:;">Advertisements</a>
                                                                </h4>
                                                                <p>Deno contents dolor sit amet, consectetur adipiscing elit. Donec elementum gravida mauris, a tincidunt dolor porttitor eu. </p>
                                                            </div>
                                                        </li>
                                                        <li class="task-list-item">
                                                            <div class="task-icon">
                                                                <a href="javascript:;">
                                                                    <i class="fa fa-thumbs-o-up"></i>
                                                                </a>
                                                            </div>
                                                            <div class="task-status">
                                                                <a class="done" href="javascript:;">
                                                                    <i class="fa fa-check"></i>
                                                                </a>
                                                                <a class="pending" href="javascript:;">
                                                                    <i class="fa fa-close"></i>
                                                                </a>
                                                            </div>
                                                            <div class="task-content">
                                                                <h4 class="uppercase bold">
                                                                    <a href="javascript:;">Roof Plastering</a>
                                                                </h4>
                                                                <p>Deno contents dolor sit amet, consectetur adipiscing elit. Donec elementum gravida mauris, a tincidunt dolor porttitor eu. </p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="task-footer bg-grey">
                                                        <div class="row">
                                                            <div class="col-xs-6">
                                                                <a class="task-trash" href="javascript:;">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <a class="task-add" href="javascript:;">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mt-list-item">
                                            <div class="list-todo-icon bg-white font-yellow-crusta">
                                                <i class="fa fa-sticky-note-o"></i>
                                            </div>
                                            <div class="list-todo-item item-3">
                                                <a class="list-toggle-container font-white" data-toggle="collapse" href="#task-3-2" aria-expanded="false">
                                                    <div class="list-toggle done uppercase bg-yellow-crusta">
                                                        <div class="list-toggle-title bold">Big5 2016 1st Stand name</div>
                                                        <div class="badge badge-default pull-right bg-white font-dark bold">2</div>
                                                    </div>
                                                </a>
                                                <div class="task-list panel-collapse collapse" id="task-3-2">
                                                    <ul>
                                                        <li class="task-list-item done">
                                                            <div class="task-icon">
                                                                <a href="javascript:;">
                                                                    <i class="fa fa-navicon"></i>
                                                                </a>
                                                            </div>
                                                            <div class="task-status">
                                                                <a class="done" href="javascript:;">
                                                                    <i class="fa fa-check"></i>
                                                                </a>
                                                                <a class="pending" href="javascript:;">
                                                                    <i class="fa fa-close"></i>
                                                                </a>
                                                            </div>
                                                            <div class="task-content">
                                                                <h4 class="uppercase bold">
                                                                    <a href="javascript:;">Room Partitioning</a>
                                                                </h4>
                                                                <p>Deno contents dolor sit amet, consectetur adipiscing elit. Donec elementum gravida mauris, a tincidunt dolor porttitor eu. </p>
                                                            </div>
                                                        </li>
                                                        <li class="task-list-item">
                                                            <div class="task-icon">
                                                                <a href="javascript:;">
                                                                    <i class="fa fa-cube"></i>
                                                                </a>
                                                            </div>
                                                            <div class="task-status">
                                                                <a class="done" href="javascript:;">
                                                                    <i class="fa fa-check"></i>
                                                                </a>
                                                                <a class="pending" href="javascript:;">
                                                                    <i class="fa fa-close"></i>
                                                                </a>
                                                            </div>
                                                            <div class="task-content">
                                                                <h4 class="uppercase bold">
                                                                    <a href="javascript:;">Wall Plastering</a>
                                                                </h4>
                                                                <p>Deno contents dolor sit amet, consectetur adipiscing elit. Donec elementum gravida mauris, a tincidunt dolor porttitor eu. </p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="task-footer bg-grey">
                                                        <div class="row">
                                                            <div class="col-xs-6">
                                                                <a class="task-trash" href="javascript:;">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <a class="task-add" href="javascript:;">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
    <?php $this->view("includes/Inc_sidebar");?>
    <!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<?php $this->view("includes/Inc_scripts");?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url()?>template/assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/css3clock/js/css3clock.js"></script>

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo base_url()?>template/assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url()?>template/assets/pages/scripts/dashboard.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    $("#dashboard_menu").addClass('active');
    $("#dashboard_menu").addClass('active');
    $("#dashboard_span").addClass('selected');
    $("#dashboard_arrow").addClass('open');
</script>
<script>
    var chart = AmCharts.makeChart("dashboard_amchart_5", {
        "theme": "light",
        "type": "serial",
        "startDuration": 2,
        "dataProvider": [{
            "day": "21-06-16",
            "cost": 4025,
            "color": "#FF0F00"
        }, {
            "day": "20-06-16",
            "cost": 1882,
            "color": "#FF6600"
        }, {
            "day": "19-06-16",
            "cost": 1122,
            "color": "#F8FF01"
        },  {
            "day": "18-06-16",
            "cost": 984,
            "color": "#04D215"
        },  {
            "day": "17-06-16",
            "cost": 580,
            "color": "#2A0CD0"
        }, {
            "day": "16-06-16",
            "cost": 443,
            "color": "#8A0CCF"
        }, {
            "day": "15-06-16",
            "cost": 441,
            "color": "#CD0D74"
        }],
        "valueAxes": [{
            "position": "left",
            "title": "Project Cost"
        }],
        "graphs": [{
            "balloonText": "[[category]]: <b>[[value]]</b>",
            "fillColorsField": "color",
            "fillAlphas": 1,
            "lineAlpha": 0.1,
            "type": "column",
            "valueField": "cost"
        }],
        "depth3D": 20,
        "angle": 30,
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "day",
        "categoryAxis": {
            "gridPosition": "start",
            "labelRotation": 90
        },
        "export": {
            "enabled": true
        }

    });
    jQuery('.chart-input').off().on('input change',function() {
        var property	= jQuery(this).data('property');
        var target		= chart;
        chart.startDuration = 0;

        if ( property == 'topRadius') {
            target = chart.graphs[0];
            if ( this.value == 0 ) {
                this.value = undefined;
            }
        }

        target[property] = this.value;
        chart.validateNow();
    });

</script>
<script>
    var chart = AmCharts.makeChart( "dashboard_amchart_6", {
        "type": "pie",
        "theme": "light",
        "dataProvider": [ {
            "product": "Exhibition Stand",
            "cost": 7252
        }, {
            "product": "Steel Fabrication",
            "cost": 3882
        }, {
            "product": "Aluminium",
            "cost": 1809
        }, {
            "product": "Carpentry",
            "cost": 1322
        }, {
            "product": "Paint",
            "cost": 1122
        }],
        "titleField": "product",
        "valueField": "cost",
        "labelRadius": 5,
        "startEffect": "elastic",
        "startDuration": 2,
        "radius": "42%",
        "innerRadius": "30%",
        "labelText": "[[title]]",
        "export": {
            "enabled": true
        }
    } );

</script>
<script>
    var chart = AmCharts.makeChart( "dashboard_amchart_7", {
        "type": "pie",
        "theme": "light",
        "titles": [ {
            "text": "Material Consumption",
            "size": 16
        } ],
        "dataProvider": [{
            "material": "Iron",
            "quantity": 100
        }, {
            "material": "Steel",
            "quantity": 80
        }, {
            "material": "Cement",
            "quantity": 52
        }, {
            "material": "Paint",
            "quantity": 200
        } ],
        "valueField": "quantity",
        "titleField": "material",
        "startEffect": "elastic",
        "startDuration": 2,
        "labelRadius": 5,
        "innerRadius": "20%",
        "depth3D": 10,
        "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
        "angle": 15,
        "export": {
            "enabled": true
        }
    } );
    jQuery( '.chart-input' ).off().on( 'input change', function() {
        var property = jQuery( this ).data( 'property' );
        var target = chart;
        var value = Number( this.value );
        chart.startDuration = 0;

        if ( property == 'innerRadius' ) {
            value += "%";
        }

        target[ property ] = value;
        chart.validateNow();
    } );

</script>

