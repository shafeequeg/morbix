<script src="//code.jquery.com/jquery-1.12.0.min.js">  
        </script>  
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js">  
            </script>  
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- <link href="<?php echo base_url()?>template/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" /> -->
<!-- <link href="<?php echo base_url() ?>template/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" /> -->
<link href="<?php echo base_url()?>template/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>template/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- <link href="<?php echo base_url()?>template/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" /> -->
<!-- <link href="<?php echo base_url()?>template/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" /> -->
<link href="<?php echo base_url()?>template/assets/pages/css/invoice-2.min.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<?php $this->view("includes/Inc_pagehead".$page_head_file_suffix);?>


<h3 class="page-title">
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url()?>sales/dashboard">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Create New Order</span>
        </li>
    </ul>
    
</div>
<!-- END PAGE HEADER-->

<div class="row">
    <div class="col-md-12">
        <div class="invoice-content-2 ">
            <div class="row invoice-head">
                <div class="col-md-7 col-xs-6">
                    <div class="invoice-logo">
                        <img src="../assets/pages/img/logos/logo5.jpg" class="img-responsive" alt="" />
                        <h1 class="uppercase">Orders</h1>
                    </div>
                </div>
                <div class="col-md-5 col-xs-6">
                    
                        <div class="btn-group pull-right">
                            <a style="line-height: 1.84;" class=" btn purple " data-toggle="modal" href="#add"><i class="fa fa-user"></i>Add Customer</a>
                        </div>
                        <div class="btn-group pull-right">
                            <a style="line-height: 1.84;" class=" btn green " data-toggle="modal" href="#add_item"><i class="fa fa-plus"></i>Add item</a>
                        </div>
                    
                </div>
                
                
            </div>
            <div class="row invoice-cust-add">
                <div class="col-xs-3">
                    <h2 class="invoice-title uppercase">Customer</h2>
                    
                    <div class="col-md-9">
                        <div class="input-group">
                                        
                            <select required id="input-customer" class="form-control select2"  name="customer">
                                <option selected disabled>Select Customer</option>
                                <?php
                            
                                foreach($customer as $c) {
                                    echo "<option value='$c->cid'>$c->cname</option>";
                                }
                                ?>
                            </select>


                        </div>
                    </div>
                    
                </div>
                
                <div class="col-xs-3">

                    <h2 class="invoice-title uppercase">Date</h2>
                    <p class="invoice-desc"  id="date"></p>
                </div>
                <div class="col-xs-6">
                    <h2 class="invoice-title uppercase">Address</h2>
                    <span id="input-address"></span>
                    <input type="text" readonly class="form-control" id="address1" >
                </div>
            </div>
            <div class="row invoice-body">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="invoice-title uppercase" style="display: none;">id</th>
                                <th>No</th>
                                <th class="invoice-title uppercase text-center">Item</th>
                                <th class="invoice-title uppercase text-center">Batch</th>
                                <th class="invoice-title uppercase text-center">Qty</th>
                                <th class="invoice-title uppercase text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                            $i= 0;
                            foreach($result as $order):$i++;  
                            
                            
                            ?>
                            <tr>
                                <td style="display: none;"><?= $order->id ?></td>
                                <td>
                                <?= $i; ?>
                                </td>
                                <td class="text-center sbold"><input readonly required type="text" class="form-control" placeholder="" value="<?= $order->batch_name; ?>" name="item" id="item1"></td>
                                <td class="text-center sbold"><input readonly required type="text" class="form-control" placeholder="" name="item" value="<?= $order->item_name; ?>" id="item1"></td>
                                <td class="text-center sbold"><input readonly required type="text" class="form-control" placeholder="" name="item" value="<?= $order->qty ?>" id="item1"></td>
                                <td> </a>
                            <a id="deletebtn" class="btn-icon-only btn btn-danger "  href="#delete" data-toggle="modal"><i class="fa fa-trash"></i></a>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="form_control_1">Assign Drivers
                    <span class="required">*</span>
                </label>
                <div class="col-md-9">
                    <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user "></i>
                                    </span>
                                    <select required  class="form-control select2" id="input-driver"  name="driver">
                            <option selected disabled>Select Driver</option>
                            <?php
                        
                            foreach($drivers as $d) {
                                echo "<option value='$d->user_id'>$d->name</option>";
                            }
                            ?>
                        </select>

                    </div>
                </div>
            </div>
            <input type="hidden" id="input-id" name="order_id" value="<?php echo $oid; ?>" >
            
            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-success btn-save-order-warehouse">
                        Save
                    </button>
                    <!-- <a class="btn btn-lg green-haze hidden-print uppercase print-btn" onclick="javascript:window.print();">Print</a> -->
                </div>
            </div>
        </div>


<!-- customer creation start  -->
                    
        <div id="add" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add New </h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url().$controller_directory ?>/orders/create_customer" class="form-horizontal" id="form_sample_1" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                <div class="alert alert-success display-hide">
                                    <button class="close" data-close="alert"></button> Your form Will Submit successfully! </div>


                                
                                <input type="hidden" name="oid" value="<?php echo $oid ?>">
                                <div class="form-group ">
                                    <label class="col-md-3 control-label" for="form_control_1">Name
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-file-text "></i>
                                                        </span>
                                            <input required id="input-name" type="text" class="form-control" placeholder="" name="name">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-md-3 control-label" for="form_control_1">Contact
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-file-text "></i>
                                                        </span>
                                            <input required id="input-contact" type="text" class="form-control" placeholder="" name="contact">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-md-3 control-label" for="form_control_1">Address
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-file-text "></i>
                                                        </span>
                                            <input required id="input-address" type="text" class="form-control" placeholder="" name="address">
                                        </div>
                                    </div>
                                </div>

                                

                                <br/><br/>

                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" name="submit" class="btn green">Save</button>
                                        <button type="reset" class="btn default">Reset</button>
                                        <button type="button" data-dismiss="modal" class="btn dark btn-outline close-btn">Close</button>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>


        <!--  add item -->
        <div id="add_item" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add New </h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url() .$controller_directory ?>/orders/additem" class="form-horizontal" id="form_sample_1" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                <div class="alert alert-success display-hide">
                                    <button class="close" data-close="alert"></button> Your form Will Submit successfully! </div>


                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="form_control_1">Batch
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        
                                            <select required id="input-batch" class="form-control select2"  name="batch">
                                                <option selected disabled>SelectBatch</option>
                                                <?php
                                            
                                                foreach($batch as $rec) {
                                                    echo "<option value='$rec->batch_id'>$rec->batch_name</option>";
                                                }
                                                ?>
                                            </select>


                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="form_control_1">Item
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        
                                            <select required id="input-item" class="form-control select2"  name="item">
                                                <option selected disabled>Select Item</option>
                                                <?php
                                            
                                                foreach($items as $i) {
                                                    echo "<option value='$i->item_id'>$i->item_name</option>";
                                                }
                                                ?>
                                            </select>


                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group ">
                                    <label class="col-md-3 control-label" for="form_control_1">Qty
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-file-text "></i>
                                                        </span>
                                            <input required id="input-qty" type="text" class="form-control" placeholder="" name="qty">
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="oid" value="<?php echo $oid; ?>" >

                                <br/><br/>

                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" name="submit" id="save-order-item" class="btn green">Save</button>
                                        <button type="reset" class="btn default">Reset</button>
                                        <button type="button" data-dismiss="modal" class="btn dark btn-outline close-btn">Close</button>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>

        <!-- end add item -->
                                            
        <!-- delete item  -->

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
                            <input type="hidden" name="oid" value="<?php echo $oid; ?>" >
                            <input type="hidden" id="deleteid" name="deleteid">
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- end delete item  -->


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
    let orders = [];
    $("#order_menu").addClass('active');
    $("#order_menu").addClass('active');
    $("#order_menu").addClass('selected');
    $("#order_menu1").addClass('open');

    $('#input-customer').change(function(){
        var cid = $('#input-customer').val();
        $.post("<?= base_url().$controller_directory; ?>/orders/select_customer", {
            cid: cid}, function(data){
            var obj = $.parseJSON(data); 
            if(obj.count == 1){
               // console.log(data);
               var add = obj.address;
              
                $('#address1').val(add);
            }
        });
    })
    $('body').on('click', '#deletebtn', function() {
        var no = $(this).closest('tr').children('td');
        $("#deleteid").val(no.eq(0).text());
        $("#deleteform").attr('action', '<?php echo base_url() .$controller_directory ?>/orders/delete');
    });

    $('body').on('click', '#btn_edit', function() {
        var no = $(this).closest('tr').children('td');

        $('#item_id').val(no.eq(0).text());
        $('#batch1').val(no.eq(1).text());
        $('#batch1').trigger("change");
        $('#item1').val(no.eq(3).text());
       

    })


    $('.btn-save-order-warehouse').click(function() {
            
            const customer = $('#input-customer').val();
            const driver = $('#input-driver').val();
            const order_id = $('#input-id').val();
            const _xhr = $.post('<?= base_url() . $controller_directory; ?>/orders/godown', {customer: customer, driver: driver, order_id:order_id});
            _xhr.done(function() {
                window.location = "<?php echo base_url().$controller_directory.'/orders'?>";
                toastr["success"]("Success . Order Confirmd and waiting for delivery", "Success")
            })
        

    })
 

</script>
<script type="text/javascript">

 n =  new Date();
  y = n.getFullYear();
  m = n.getMonth() + 1;
  d = n.getDate();
  document.getElementById("date").innerHTML = d + "-" + m + "-" + y;
</script>