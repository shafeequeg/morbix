<?php 
foreach($result as $r):
if($r->order_status == 1)
    {$status="<span class='label label-danger ' style='margin-bottom: 5px;margin-right: 5px' >Order Pending</span>";}
    else if($r->order_status == 2)
    {$status="<span class='label label-warning ' style='margin-bottom: 5px;margin-right: 5px' >Order Confirm</span>";}
    else if($r->order_status == 3)
    {$status="<span class='label label-primary ' style='margin-bottom: 5px;margin-right: 5px' >Loaded </span>";}
    else {
        $status="<span class='label label-success ' style='margin-bottom: 5px;margin-right: 5px' >Deliverd</span>";
    }
endforeach; 
    $created = $result1->order_created_by;
    $res = $this->db->select('name')->from('users')->where('user_id',$created)->get();
    $result22 = $res->row(); 


    $driver = $result1->driver;
    $res = $this->db->select('name')->from('users')->where('user_id',$driver)->get();
    $result222 = $res->row(); 
    
    
    
        
        
?>
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
                        <h1 class="uppercase">Order Details</h1>
                    </div>
                </div>
                <div class="col-md-5 col-xs-6">
                    <div class="company-address">
                        <span class="bold uppercase">Order Status.</span>
                        <br>
                        <?php 
                        echo $status;
                         ?>
                        </div>
                </div>
            </div>
            <div class="row invoice-cust-add">
                <div class="col-xs-3">
                    <h2 class="invoice-title uppercase">Customer</h2>
                    <p class="invoice-desc"><?php echo $result1->cname ?>.</p>
                </div>
                <div class="col-xs-3">
                    <h2 class="invoice-title uppercase">Date</h2>
                    <p class="invoice-desc"><?= $result1->order_created_date ?></p>
                </div>
                <div class="col-xs-6">
                    <h2 class="invoice-title uppercase">Address</h2>
                    <p class="invoice-desc inv-address"><?= $result1->caddress ?></p>
                </div>
            </div>
            <div class="row invoice-body">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="invoice-title uppercase">No</th>
                                <th class="invoice-title uppercase text-center">Batch</th>
                                <th class="invoice-title uppercase text-center">Item</th>
                                <th class="invoice-title uppercase text-center">Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($result as $row): ?>
                            <tr>
                                <td>
                                <?php echo $i; ?>
                                </td>
                                <td class="text-center sbold"><?= $row->batch_name ?></td>
                                <td class="text-center sbold"><?= $row->item_name ?></td>
                                <td class="text-center sbold"><?= $row->qty ?></td>
                            </tr>
                           <?php $i++; endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row invoice-subtotal">
                <div class="col-xs-3">
                    <h2 class="invoice-title uppercase">Created By</h2>
                    
                    <p class="invoice-desc"><?php
                    echo  $result22->name;
                    ?></p>
                </div>
                <div class="col-xs-3">
                    <h2 class="invoice-title uppercase">Driver</h2>
                    <p class="invoice-desc"><?php
                    echo  $result222->name;
                    ?></p>
                </div>
                <div class="col-xs-6">
                    <h2 class="invoice-title uppercase">Delivery Date </h2>
                    <p class="invoice-desc grand-total"><?php echo $result1->delivery_date_time ?></p>
                </div>
            </div>
            <form action="<?php echo base_url() .$controller_directory ?>/orders/deliverd" method="post">
            <input type="hidden" name="order_id" value="<?= $result1->order_id ?>" >
            <div class="row">
                <div class="form-group ">
                    <label class="col-md-3 control-label" for="form_control_1">Remarks
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-file-text "></i>
                                        </span>
                            <input required id="input-qty" type="text" class="form-control" placeholder="" name="remarks">
                        </div>
                    </div>
                </div>
                <br><br><br>
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-lg green-haze hidden-print uppercase print-btn">Make as Delivery</button>
                </div>
            </div>
            </form>
        </div>  


<!-- item creation start  -->
                    
       

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

   
 

</script>