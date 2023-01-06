
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?php echo base_url() ?>template/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>template/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>template/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<?php $this->view("includes/Inc_pagehead".$page_head_file_suffix);?>


<h3 class="page-title"> Items
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url()?>admin/dashboard">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Manage Items</span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="btn-group pull-right">
            <a style="line-height: 1.84;" class=" btn purple " data-toggle="modal" href="#add"><i class="fa fa-plus"></i>Create Items</a>
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
                    <span class="caption-subject bold uppercase">List of Items</span>

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
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
						
				<?php 		 foreach($result as $r) {
				?>
                        <tr>
                            <td><?php echo $r->item_id; ?></td>
                            <td><?php echo $r->item_name; ?></td>
                            <td><a id="btn_edit" class="btn-icon-only btn btn-primary "  href="#edit_modal" data-toggle="modal"><i class="fa fa-edit"></i></a>
                            <a id="deletebtn" class="btn-icon-only btn btn-danger "  href="#delete" data-toggle="modal"><i class="fa fa-trash"></i></a>
                        </td>
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
                        <h4 class="modal-title">Create</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url() .$controller_directory ?>/item/create/" class="form-horizontal" id="form_subscriber" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                <div class="alert alert-success display-hide">
                                    <button class="close" data-close="alert"></button> Your form Will Submit successfully! </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label" for="form_control_1">Item Name
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user "></i>
                                                        </span>
                                            <input type="text" class="form-control" placeholder="" name="item">
                                            <div class="form-control-focus"> </div>
                                            <span class="help-block">Enter Items Name</span>
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
                        <h4 class="modal-title">Edit</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url() .$controller_directory?>/item/update/" class="form-horizontal" id="form_subscriber2" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                <div class="alert alert-success display-hide">
                                    <button class="close" data-close="alert"></button> Your form Will Submit successfully! </div>

                                <input type="hidden" name="client_id" id="client_id">
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label" for="form_control_1">Item Name
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user "></i>
                                                        </span>
                                            <input type="text" class="form-control" placeholder="" id="name" name="item">
                                            <div class="form-control-focus"> </div>
                                            <span class="help-block">Enter Item Name</span>
                                        </div>
                                    </div>
                                </div>

                                
                                <input type="hidden" name="item_id" id="item_id">
                                
                                <br/><br/>

                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">Update</button>
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
    $("#data_menu").addClass('active');
    $("#data_menu").addClass('active');
    $("#data_menu").addClass('selected');
    $("#data_menu1").addClass('open');

    $('body').on('click', '#deletebtn', function() {
        var no = $(this).closest('tr').children('td');
        $("#deleteid").val(no.eq(0).text());
        $("#deleteform").attr('action', '<?php echo base_url() .$controller_directory ?>/item/delete');
    });
    $('body').on('click', '#btn_edit', function() {
        var no = $(this).closest('tr').children('td');

        $('#name').val(no.eq(1).text());
        $('#item_id').val(no.eq(0).text());
        
    })
</script>