
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?php echo base_url()?>template/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>template/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>template/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>template/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>template/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>template/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<?php $this->view("includes/Inc_pagehead".$page_head_file_suffix);?>


<h3 class="page-title">
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url()?>admin/job_brief">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span> Users</span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="btn-group pull-right">
            <a style="line-height: 1.84;" class=" btn purple " data-toggle="modal" href="#add"><i class="fa fa-plus"></i>Add New User</a>
        </div>
    </div>
</div>
<!-- END PAGE HEADER-->

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="fa fa-file-text font-dark"></i>
                    <span class="caption-subject bold uppercase">List of  Users</span>

                </div>

                <div class="tools"> </div>

            </div>
            <div class="portlet-body">
                <div class="portlet light bordered">
                    <div class="portlet-title">


                        <div class="tools"> </div>

                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                            <thead>
                            <tr class="">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th style="display: none">User Type</th>
                                <th>Role</th>
                                
                                <th>Status</th>
                                <th style="display: none">Status</th>
                                <th>Created Date</th>
                                <th style="display: none">Photo</th>
                                <th>Photo</th>
                                <th style="display: none">Login id</th>
                                <th>Edit</th>
                               
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            foreach ($result as $r) {
                                if($r->ac_status =='1')
                                {$activation="<span class='label label-success ' style='margin-bottom: 5px;margin-right: 5px' >Active</span>";}
                                else
                                {$activation="<span class='label label-danger ' style='margin-bottom: 5px;margin-right: 5px' >DeActive</span>";}

                                if($r->role =='sales')
                                {$role="<span class='label label-success ' style='margin-bottom: 5px;margin-right: 5px' >Sales Staff</span>";}
                                elseif($r->role =='driver'){
                                    $role="<span class='label label-success ' style='margin-bottom: 5px;margin-right: 5px' >Driver</span>";
                                }else{
                                    $role="<span class='label label-success ' style='margin-bottom: 5px;margin-right: 5px' >Admin</span>";
                                }
                                ?>
                                <tr>
                                    <td><?php echo $r->user_id; ?></td>
                                    <td><?php echo $r->name; ?></td>
                                    <td><?php echo $r->username; ?></td>
                                    <td><?php echo $r->password; ?></td>
                                    <td><?php echo $r->phone; ?></td>
                                    <td><?php echo $r->address; ?></td>
                                    <td style="display: none"><?php echo $r->role; ?></td>
                                    <td><?php echo $role; ?></td>
                                    <td><?php echo $activation; ?></td>
                                    <td style="display: none"><?php echo $r->ac_status; ?></td>
                                    <td><?php echo date('d-m-Y',strtotime($r->created_date)); ?></td>
                                    <td style="display: none"><?php echo $r->photo ?></td>
                                    <td><img style="width:50px;height: 50px;" src="<?php echo $r->photo; ?> "></td>
                                    <td style="display: none"><?php echo $r->login_id; ?></td>
                                    <td> <a id="btn_edit" class="btn-icon-only btn btn-primary "  href="#edit_modal" data-toggle="modal"><i class="fa fa-edit"></i></a></td>
                                   
                                </tr>
                            <?php  }   ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
        <div id="add" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add User</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url().$controller_directory ?>/user/create/" class="form-horizontal" id="form_subscriber" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                <div class="alert alert-success display-hide">
                                    <button class="close" data-close="alert"></button> Your form Will Submit successfully! </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label" for="form_control_1">Name
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user "></i>
                                                        </span>
                                            <input type="text" class="form-control" placeholder="" name="name">
                                            <div class="form-control-focus"> </div>
                                            <span class="help-block">Enter Name</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label" for="form_control_1">Username
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-envelope"></i>
                                                        </span>
                                            <input required type="text" class="form-control" placeholder="" name="username">
                                            <div class="form-control-focus"> </div>
                                            <span class="help-block">Enter User Name</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label" for="form_control_1">Phone
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-phone  "></i>
                                                        </span>
                                            <input type="text" class="form-control" placeholder="" name="phone">
                                            <div class="form-control-focus"> </div>
                                            <span class="help-block">Enter Phone</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label" for="form_control_1">Address
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-envelope"></i>
                                                        </span>
                                            <input required type="text" class="form-control" placeholder="" name="address">
                                            <div class="form-control-focus"> </div>
                                            <span class="help-block">Enter User Address</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="control-label col-md-3">Image</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="<?php echo base_url()?>uploads/user/noimage.jpg"/> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                            <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input required type="file" name="uploaded_file"> </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>
                                        <div class="clearfix margin-top-10">
                                            <span class="label label-danger">NOTE!</span> Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead. </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="form_control_1">Select User Role
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        
                                            <select required  class="form-control select2"  name="user_type">
                                                <option selected disabled>Select User Role</option>
                                                
                                                   <option value='manager'>Purchase Manager</option>
                                                   <option value='sales'>Sales Staff</option>
                                                   <option value='billing'>Billing Staff</option>
                                                   <option value='godown'>Godown</option>
                                                   <option value='driver'>Driver</option>
                                            </select>


                                        </div>
                                    </div>
                                </div>
                               

                                <br/><br/>

                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">Save</button>
                                        <button type="reset" class="btn default">Reset</button>
                                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>

        <div id="edit_modal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Edit Users</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url().$controller_directory ?>/user/update" class="form-horizontal" id="form_subscriber2" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                <div class="alert alert-success display-hide">
                                    <button class="close" data-close="alert"></button> Your form Will Submit successfully! </div>

                                <input type="hidden" name="user_id" id="user_id">
                                <input type="hidden" name="login_id" id="login_id">
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label" for="form_control_1">Name
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user "></i>
                                                        </span>
                                            <input type="text" class="form-control" placeholder="" id="name1" name="name">
                                            <div class="form-control-focus"> </div>
                                            <span class="help-block">Enter User Name</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label" for="form_control_1">Username
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-envelope "></i>
                                                        </span>
                                            <input required type="text" class="form-control" placeholder="" id="username1" name="username">
                                            <div class="form-control-focus"> </div>
                                            <span class="help-block">Enter User Name</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label" for="form_control_1">Phone
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-phone "></i>
                                                        </span>
                                            <input type="text" class="form-control" placeholder="" id="phone1" name="phone">
                                            <div class="form-control-focus"> </div>
                                            <span class="help-block">Enter User Phone</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label" for="form_control_1">Address
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-envelope"></i>
                                                        </span>
                                            <input required type="text" class="form-control" placeholder="" id="address1" name="address">
                                            <div class="form-control-focus"> </div>
                                            <span class="help-block">Enter User Address</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label" for="form_control_1">Status
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                            <input name="status" id="status1" type="checkbox" class="make-switch" checked data-on-text="Activated"  data-off-text="DeActivated">
                                            <div class="form-control-focus"> </div>
                                            <span class="help-block">Status</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="control-label col-md-3">Image</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="<?php echo base_url()?>uploads/user/noimage.jpg" id="edit_img"/> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                            <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input  type="file" name="uploaded_file"> </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>
                                        <div class="clearfix margin-top-10">
                                            <span class="label label-danger">NOTE!</span> Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead. </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="form_control_1">Select User Role
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        
                                            <select required  class="form-control select2"  name="user_type" id="user_type1">
                                                <option selected disabled>Select User Role</option>
                                                
                                                   <option value='manager'>Purchase Manager</option>
                                                   <option value='sales'>Sales Staff</option>
                                                   <option value='blilling_staff'>Billing Staff</option>
                                                   <option value='godown'>Godown</option>
                                                   <option value='driver'>Driver</option>
                                            </select>


                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="img" id="img">
                                <input type="hidden" value="" name="user_id" id="user_id1">

                                <br/><br/>

                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">Save</button>
                                        <button type="reset" class="btn default">Reset</button>
                                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>



        <div id="delete" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="alert alert-block alert-danger fade in">
                        <button type="button" class="close" data-dismiss="modal"></button>
                        <h4 class="alert-heading">Warning!</h4>
                        <p> Are You Sure to Delete this Data ?. All the Associated Data will Lost. </p>
                        <form id="deleteform" action="" method="post" class="form-horizontal">
                            <p>
                                <button class="btn btn-danger " type="submit" name="submit">Delete</button>
                                <button type="button" class="btn btn-primary modal-dismiss" data-dismiss="modal">Cancel</button>
                            </p>
                            <input type="hidden" id="deleteid" name="deleteid">
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
<script src="<?php echo base_url() ?>template/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo base_url()?>template/assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url()?>template/assets/pages/scripts/table-datatables-buttons.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/pages/scripts/ui-modals.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/pages/scripts/form-validation-md.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/pages/scripts/components-select2.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    $("#hr_menu").addClass('active');
    $("#hr_menu").addClass('active');
    $("#hr_menu").addClass('selected');
    $("#hr_menu4").addClass('open');




    $('body').on('click', '#deletebtn', function() {
        var no = $(this).closest('tr').children('td');
        $("#deleteid").val(no.eq(0).text());
        $("#deleteform").attr('action', '<?php echo base_url().$controller_directory ?>/exams/delete');
    });
    $('body').on('click', '#btn_edit', function() {
        var no = $(this).closest('tr').children('td');

        $('#user_id1').val(no.eq(0).text());
        $('#name1').val(no.eq(1).text());
        $('#username1').val(no.eq(2).text());
        //$('#password1').val(no.eq(3).text());
        $('#phone1').val(no.eq(4).text());
        $('#address1').val(no.eq(5).text());
        $('#user_type1').val(no.eq(6).text());
        $('#user_type1').trigger("change");
        var status=no.eq(9).text();
        if(status=="1")
        {
            $('#status1').bootstrapSwitch('state',true)

        }else
        {
            $('#status1').bootstrapSwitch('state',false)
        }
        $('#edit_img').attr('src',no.eq(11).text());
        $('#img').val(no.eq(11).text());


    })
</script>