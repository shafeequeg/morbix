

<!-- BEGIN PAGE LEVEL PLUGINS -->

<link href="<?php echo base_url()?>template/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>template/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>template/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>template/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<style>
    .form-group.form-md-line-input {
        position: relative;
        margin: 0 0 0px !important;
    }
</style>


<?php $this->view("includes/Inc_pagehead".$page_head_file_suffix);?>


<h3 class="page-title">User Profile
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url()?>admin/dashboard">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>User Details</span>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->
<?php

if($result->role=='sales'){
    $user_type_label="Sales";
}elseif($result->role=='billing'){
    $user_type_label="Billing";
}elseif($result->role=='godown'){
    $user_type_label="Godown";
}elseif($result->role=='driver'){
    $user_type_label="Driver";
}elseif($result->role=='admin') {
    $user_type_label = "Administrator";
}


?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
        <div class="profile-sidebar">
            <!-- PORTLET MAIN -->
            <div class="portlet light profile-sidebar-portlet ">
                <!-- SIDEBAR USERPIC -->

                <?php
                $display="style='display: none'";
                ?>
                <?php
                if($result->user_id == $this->session->userdata('login_id'))
                {
                    $display = '';
                }else{
                    $display;
                }
                ?>

                <div class="profile-userpic" style="text-align: center">
                    <img src="<?php echo $result->photo ?>"  class="img-responsive center-block" alt=""><br/>
                    <a class="btn dark" <?php echo $display?> id="btn_profile_img_change" href="#change-pic" data-toggle="modal" data-target="#change-pic">Change Avatar</a>
                </div>


                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?php echo $result->name ?>
                    </div>
                    <div class="profile-usertitle-job">
                        <?php echo $user_type_label ?>
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->

                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li id="overview_menu">
                            <a id="overview_btn">
                                <i class="icon-home"></i> Overview </a>
                        </li>
                        <li id="personal_menu">
                            <a id="personal_btn">
                                <i class="fa fa-file-text"></i> Personal Info</a>
                        </li>
                    </ul>
                    <br>

                </div>
                <!-- END MENU -->
            </div>
            <!-- END PORTLET MAIN -->
            <!-- PORTLET MAIN -->

            <!-- END PORTLET MAIN -->
        </div>
        <!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12" id="overview_div" style="display: none">
                    <div class="col-md-12" id="">
                    </div>
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">User Details</span>
                                </div>
                            </div>
                            <div class="portlet-body">


                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-12" id="personal_div" style="display: none">

                    <div class="col-md-12" id="">


                    </div>
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">User Details</span>
                                </div>
                            </div>
                            <div class="portlet-body">

                                <form role="form" action="<?php echo base_url().$controller_directory ?>/user/update_profile/" id="form_sample_1" method="post">
                                    <div class="form-group">
                                        <label class="control-label">Name</label>
                                        <strong><input type="text" value="<?php echo $result->name ?>"  readonly  class="form-control edt_txt" required  name="name" /> </strong>
                                    </div>
                                    <!-- <div class="form-group ">
                                        <label class="control-label">Email</label>
                                        <strong><input type="text" value="<?php echo $result->email ?>"  readonly class="form-control" /></strong>
                                    </div> -->

                                    <div class="form-group ">
                                        <label class="control-label">Phone</label>
                                        <strong><input type="text" value="<?php echo $result->phone ?>" readonly class="form-control edt_txt" required  name="phone"/> </strong>
                                    </div>


                                    <?php
                                    if($result->ac_status==0){
                                    $status="DeActive";

                                    }else {
                                        $status = "Active";
                                    } ?>


                                    <div class="form-group ">
                                        <label class="control-label">Status</label>
                                        <strong><input type="text" value="<?php echo $status?>" readonly class="form-control" /></strong>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label">Created Date</label>
                                        <strong><input type="text" value="<?php echo date("d-m-Y",strtotime($result->created_date)) ?>"  readonly class="form-control" /></strong>
                                    </div>
                                    <input type="hidden" name="user_id" value="<?php echo $result->user_id ?>">
                                    <div class="form-group ">
                                        <button type="button" <?php echo $display ?> id="btn_edt"   class="btn green">Edit</button>
                                        <button type="submit" class="btn btn-primary btnupdate" style="display: none">Update</button>
                                        <button type="button" data-dismiss="modal" class="btn dark btn-outline closebtn" style="display: none">Close</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->

        <div id="change-pic" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" id="btn_change_img" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Change Profile Photo</h4>
                    </div>

                    <div class="modal-body">
                        <form method="post" action="<?php echo base_url().$controller_directory ?>/user/profile_photo/" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="form-group">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="<?php echo $result->photo ?>" alt="" /> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                            <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new"> Select image </span>
                                        <span class="fileinput-exists"> Change </span>
                                        <input required type="file" name="uploaded_file"> </span>
                                                <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-12"  style="margin-bottom: 20px">
                                        <div class="clearfix margin-top-10">
                                            <span class="label label-danger">NOTE!</span> Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead. </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="<?php echo $result->user_id ?>">
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Save & Update</button>
                                        <button type="button" data-dismiss="modal" class="btn btn-danger dark btn-outline">Close</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
<script src="<?php echo base_url()?>template/assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo base_url()?>template/assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url()?>template/assets/pages/scripts/profile.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/pages/scripts/table-datatables-buttons.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/pages/scripts/ui-modals.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/pages/scripts/form-validation.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/pages/scripts/components-select2.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script>
    $("#account_menu").addClass('active');
    $("#account_menu2").addClass('active');
    $("#account_span").addClass('selected');
    $("#account_arrow").addClass('open');
</script>
<script>
    //    default
    $("#overview_div").show();
    $("#overview_menu").addClass('active');
    $("#personal_div").hide();


    $("#overview_btn").click(function(){
        $("#overview_div").show();
        $("#personal_div").hide();

        $("#overview_menu").addClass('active');
        $("#personal_menu").removeClass('active');
    })
    $("#personal_btn").click(function(){
        $("#overview_div").hide();
        $("#personal_div").show();

        $("#personal_menu").addClass('active');
        $("#overview_menu").removeClass('active');

    })



    $("#btn_edt").click(function(){
        $("#btn_edt").hide();
        $('.btnupdate').show();
        $('.closebtn').show();
       $('.btnchange').show();
//        $('.btnprof').show();
        $('.edt_txt').removeAttr("readonly", "readonly")
    });




</script>


