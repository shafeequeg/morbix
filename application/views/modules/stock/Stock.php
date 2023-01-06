
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
            <a href="<?php echo base_url()?>admin/dashboard">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span> Stock</span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="btn-group pull-right">
            <a style="line-height: 1.84;" class=" btn purple " data-toggle="modal" href="#add"><i class="fa fa-plus"></i>Add Stock</a>
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
                    <span class="caption-subject bold uppercase">List of Stocks</span>

                </div>

                <div class="tools"> </div>

            </div>
            <div class="portlet-body">
                <div class="portlet light bordered">
                    <div class="portlet-title">


                        <div class="tools"> </div>

                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-header-fixed" id="datatable">
                            <thead>
                            <tr class="">
                                <th>ID</th>
                                <th>Batch</th>
                                <th style="display: none;">batch</th>
                                <th>Item</th>
                                <th style="display: none;">item</th>
                                <th>Qty</th>
                                <th style="display: none;">Photo</th>
                                <th>Photo</th>
                                <th>Status</th>
                                <th>Actions</th>
                               
                            </tr>
                            </thead>
                            <tbody>

                            

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
                        <h4 class="modal-title">Add Stock</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url().$controller_directory ?>/stock/create/" class="form-horizontal" id="form_subscriber" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                <div class="alert alert-success display-hide">
                                    <button class="close" data-close="alert"></button> Your form Will Submit successfully! </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="form_control_1">Select Item
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        
                                            <select required  class="form-control select2" id="item1"  name="item">
                                                <option selected disabled>Select Item</option>
                                                <?php
                                                foreach($items as $i): 
                                                ?>
                                                   <option value='<?php echo $i->item_id ?>'><?php echo $i->item_name ?></option>
                                                   <?php endforeach ?>
                                               
                                            </select>


                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="form_control_1">Select Batch
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        
                                            <select required  class="form-control select2" id="batch1"  name="batch">
                                                <option selected disabled>Select Batch</option>
                                                <?php
                                                foreach($batch as $b): 
                                                ?>
                                                   <option value='<?php echo $b->batch_id ?>'><?php echo $b->batch_name ?></option>
                                                   <?php endforeach ?>
                                            </select>


                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label" for="form_control_1">Qty
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-cube "></i>
                                                        </span>
                                            <input type="text" class="form-control" placeholder="" name="qty">
                                            <div class="form-control-focus"> </div>
                                            <span class="help-block">Enter Qty</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group form-md-line-input">
                                    <label class="control-label col-md-3">Image</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="<?php echo base_url()?>uploads/products/noimage.jpg"/> </div>
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
                        <h4 class="modal-title">Edit Stock</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url().$controller_directory ?>/stock/update" class="form-horizontal" id="form_subscriber2" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                <div class="alert alert-success display-hide">
                                    <button class="close" data-close="alert"></button> Your form Will Submit successfully! </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="form_control_1">Select Item
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        
                                            <select required  class="form-control select2" id="item1"  name="item">
                                                <option selected disabled>Select Item</option>
                                                
                                                <?php
                                                foreach($items as $i): 
                                                ?>
                                                   <option value='<?php echo $i->item_id ?>'><?php echo $i->item_name ?></option>
                                                   <?php endforeach ?>
                                            </select>


                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="form_control_1">Select Batch
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        
                                            <select required  class="form-control select2" id="batch1"  name="batch">
                                                <option selected disabled>Select Batch</option>
                                                <?php
                                                foreach($batch as $b): 
                                                ?>
                                                   <option value='<?php echo $b->batch_id ?>'><?php echo $b->batch_name ?></option>
                                                   <?php endforeach ?>
                                            </select>


                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label" for="form_control_1">Qty
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-cube "></i>
                                                        </span>
                                            <input type="text" class="form-control" placeholder="" id="qty1" name="qty">
                                            <div class="form-control-focus"> </div>
                                            <span class="help-block">Enter Qty</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group form-md-line-input">
                                    <label class="control-label col-md-3">Image</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="<?php echo base_url()?>uploads/products/noimage.jpg" id="edit_img"/> </div>
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
                                <input type="hidden" name="img" id="img">
                                
                                <input type="hidden" value="" name="stock_id" id="stock_id">

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



        <!-- //return products -->

        <div id="return_modal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add Return</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url().$controller_directory ?>/stock/return" class="form-horizontal" id="form_subscriber2" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                <div class="alert alert-success display-hide">
                                    <button class="close" data-close="alert"></button> Your form Will Submit successfully! </div>

                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="form_control_1">Select Customer
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        
                                            <select required  class="form-control select2" id="batch1"  name="customer">
                                                <option selected disabled>Select Customer</option>
                                                <option value="G1">Godown</option>
                                                <?php 
                                                foreach($customers as $rec) {
                                                    echo "<option value='$rec->cid'>$rec->cname</option>";
                                                }
                                                ?>
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label" for="form_control_1">Batch
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-cube "></i>
                                                        </span>
                                            <input type="text" class="form-control" readonly placeholder="" id="batch2" name="batch">
                                            <div class="form-control-focus"> </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label" for="form_control_1">Item
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-cube "></i>
                                                        </span>
                                            <input type="text" class="form-control" readonly placeholder="" id="item2" name="item">
                                            <div class="form-control-focus"> </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label" for="form_control_1">Qty
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-cube "></i>
                                                        </span>
                                            <input type="text" class="form-control" placeholder="" id="qty2" name="qty">
                                            <div class="form-control-focus"> </div>
                                            <span class="help-block">Enter Qty</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="form_control_1">Return
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        
                                            <select required  class="form-control select2" id="return_item"  name="return">
                                                <option selected disabled>Select</option>
                                                <option value="1">Return</option>
                                                <option value="2">Damage</option>
                                                
                                                
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label" for="form_control_1">Remarks
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-cube "></i>
                                                        </span>
                                            <input type="text" class="form-control" placeholder="" id="rem" name="remarks">
                                            <div class="form-control-focus"> </div>
                                            <span class="help-block">Enter Remarks</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <input type="hidden" value="" name="stock_id" id="stock_id1">
                                <input type="hidden" value="" name="batch1" id="batch22">
                                <input type="hidden" value="" name="item1" id="item22">

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
                        <p> Are You Sure to Delete Damage Item Qty ?. All the Associated Data will Lost. </p>
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
<?php $this->view("custom_scripts/stock_view_scripts");?>
<script>
    $("#stock_menu").addClass('active');
    $("#stock_menu").addClass('active');
    $("#stock_menu").addClass('selected');
    // $("#hr_menu4").addClass('open');




    $('body').on('click', '#deletebtn', function() {
        var no = $(this).closest('tr').children('td');
        $("#deleteid").val(no.eq(0).text());
        $("#deleteform").attr('action', '<?php echo base_url().$controller_directory ?>/stock/delete');
    });
    $('body').on('click', '#btn_edit', function() {
        var no = $(this).closest('tr').children('td');

        $('#stock_id').val(no.eq(0).text());
        $('#batch1').val(no.eq(2).text());
        $('#batch1').trigger("change");
        $('#item1').val(no.eq(4).text());
        $('#item1').trigger("change");
        $('#qty1').val(no.eq(5).text());
        
        // ('#edit_img').attr('src',no.eq(6).text());
        // $('#img').val(no.eq(6).text());

    })

    $('body').on('click', '#btn_return', function() {
        var no = $(this).closest('tr').children('td');

        $('#stock_id1').val(no.eq(0).text());
        $('#batch2').val(no.eq(1).text());
        $('#batch22').val(no.eq(2).text());
        $('#item2').val(no.eq(3).text());
        $('#item22').val(no.eq(4).text());
        // $('#qty2').val(no.eq(5).text());
        


    })

    $('body').on('click', '#deletebtn', function() {
        var no = $(this).closest('tr').children('td');
        $("#deleteid").val(no.eq(0).text());
        $("#deleteform").attr('action', '<?php echo base_url() .$controller_directory ?>/stock/remove_damage');
    });


    // $("#batch1").change(function(){
    // var batch = $("#batch1").val();
    // $("#item1").html('');
    // $("#item1").append("<option></option>");
    // $.post("<?php echo base_url().$controller_directory.'/stock/select_item_from_batch'?>",{
    //     batch: batch},function(data){
    //         //  console.log(data);
    //     var obj = $.parseJSON(data);
    //     var i = 0;
    //     while (i < obj.id.length) {
            
    //         $("#item1").append("<option value="+obj.id[i]+">"+obj.name[i]+"</option>");
    //         i++;
    //     }
    //     })

    // })

</script>