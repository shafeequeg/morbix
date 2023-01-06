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
                                    <h1 class="uppercase">New Order</h1>
                                </div>
                            </div>
                            <div class="col-md-5 col-xs-6">
                                <div class="btn-group pull-right">
                                    <a style="line-height: 1.84;" class=" btn green " data-toggle="modal" href="#add_customer"><i class="fa fa-user"></i>Add Customer</a>
                                </div>
                                <div class="btn-group pull-right">
                                    <a style="line-height: 1.84;" class=" btn purple " data-toggle="modal" href="#add"><i class="fa fa-plus"></i>Add Item</a>
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
                                            <th class="invoice-title uppercase text-center">No</th>
                                            <th class="invoice-title uppercase text-center">Batch</th>
                                            <th class="invoice-title uppercase text-center">Item</th>
                                            <th class="invoice-title uppercase text-center">Qty</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body">
                                    </tbody>
                                </table>
                            </div>
                        </div>

                       
                        
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-success btn-save-order">
                                    Save
                                </button>
                                <!-- <a class="btn btn-lg green-haze hidden-print uppercase print-btn" onclick="javascript:window.print();">Print</a> -->
                            </div>
                        </div>
                    </div>


<!-- item creation start  -->
                    <div id="add" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add New </h4>
                    </div>
                    <div class="modal-body">
                        <form action="" class="form-horizontal" id="form_sample_1" method="post" enctype="multipart/form-data">
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

                                

                                <br/><br/>

                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="button" id="save-order-item" class="btn green">Save</button>
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


        <div id="add_customer" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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


                                
                                <!-- <input type="hidden" name="oid" value="<?php echo $oid ?>"> -->
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

    $('#save-order-item').click(function() {
        const input_batch = $('#input-batch');
        const input_item = $('#input-item');
        const input_qty = $('#input-qty');
        orders.push({
            'batchId': input_batch.val(),
            'batch_name': $("#input-batch option:selected").text(),
            'itemId' : input_item.val(),
            'item_name' : $("#input-item option:selected").text(),
            'qty' : input_qty.val()
        });
        populate_table();
        hideModal();
    })

    function populate_table(){
            const table_body = $('#table-body');
        if(orders.length) {
            let _html = '';
            $.each( orders, function( key, order ) {
                _child = '<tr>';
                _child += '<td class="text-center sbold">' + (key+1) + '</td>';
                _child += '<td class="text-center sbold">' + order.batch_name + '</td>';
                _child += '<td class="text-center sbold">' + order.item_name + '</td>';
                _child += '<td class="text-center sbold">' + order.qty + '</td>';
                _child += '<td><button class="btn btn-remove-item" data-id="'+key+'"><i class="fa fa-trash"></i></button></td>';
                _child += '</tr>';
                _html += _child;
            });
            table_body.html(_html);
        } else {
            table_body.html('');
        }
    }
    function hideModal(){
      $(".modal-backdrop").remove();
      $('body').removeClass('modal-open');
      $(".modal").hide();
    }
    $('table').on('click', '.btn-remove-item', function() {
        const _index = $(this).data('id');
        orders.splice(_index,1);
        populate_table();
    })

    $('.btn-save-order').click(function() {
        if(orders.length) {
            const customer = $('#input-customer').val();
            const driver = $('#input-driver').val();
            const _xhr = $.post('<?= base_url() . $controller_directory; ?>/orders/create_hold', {orders: orders, customer: customer, driver: driver});
            _xhr.done(function() {
                location.reload();
                toastr["success"]("Success . New Order Created", "Success")
            })
        }
        else{
            alert('Please add order items first');
        }

    })
 

    

</script>

<script type="text/javascript">

 n =  new Date();
  y = n.getFullYear();
  m = n.getMonth() + 1;
  d = n.getDate();
  document.getElementById("date").innerHTML = d + "-" + m + "-" + y;
</script>