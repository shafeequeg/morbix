
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?php echo base_url()?>template/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>template/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>template/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>template/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>template/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>template/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<?php $this->view("includes/Inc_pagehead".$page_head_file_suffix);?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo base_url()?>admin/dashboard">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Accounts</span>
        </li>
    </ul>
    <div class="page-toolbar">

    </div>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> Accounts
    <small>Manage Account</small>
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->

<div class="row">


    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet box blue portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-edit font-black"></i>
                    <span class="caption-subject font-black sbold uppercase"> Change Password</span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form class="form-horizontal">

                </form>
                <form action="<?php echo base_url().$controller_directory?>/user/update_password" method="post" id="form_sample_2" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Enter Current Password</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon ">
                                        <i class="fa fa-lock fa-spin font-purple"></i>
                                    </span>
                                    <input type="text"required class="form-control" placeholder="" name="current_pass">
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">New Password</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon ">
                                        <i class="fa fa-lock fa-spin font-purple"></i>
                                    </span>
                                    <input type="text"required class="form-control" placeholder="" name="new_pass">
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Confirm Password</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon ">
                                        <i class="fa fa-lock fa-spin font-purple"></i>
                                    </span>
                                    <input type="text" required class="form-control" placeholder="" name="new_pass_confirm">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" id="submit" class="btn green">Save</button>
                                <button type="button" class="btn grey-salsa btn-outline">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
    </div>

</div>
</div>
<!-- END CONTENT BODY -->
</div>

<!-- END CONTENT -->
<!-- BEGIN QUICK SIDEBAR -->
<?php $this->view("includes/Inc_sidebar")?>
<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<?php $this->view("includes/Inc_scripts"); ?>

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url()?>template/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script><!-- END PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo base_url()?>template/assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url()?>template/assets/pages/scripts/form-validation.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/pages/scripts/components-select2.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    $("#account_menu").addClass('active');
    $("#account_menu1").addClass('active');
    $("#account_span").addClass('selected');
    $("#account_arrow").addClass('open');
</script>