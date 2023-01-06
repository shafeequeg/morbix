
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?php echo base_url()?>template/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>template/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>template/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>template/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>template/assets/global/plugins/datatables/mydatatables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>template/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<style>
    #myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
    display: inline-block;
    margin-top: 0;
    margin-right: 0;
    width: 74px;
height: 50px;
    background-repeat: no-repeat !important;
    text-indent: -10000px;
    outline: 0;
    background-image: url(../img/close-button-png-22.png) !important;
    z-index: 99999999;
    background-size: 44px;
    opacity: 1;
}

.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #fff;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
  z-index: 99999;
  background-image: url(img/close-button-png-22.png) !important;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}




</style>
<?php $this->view("includes/Inc_pagehead".$page_head_file_suffix);?>



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
    
</div>
<!-- END PAGE HEADER-->

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue">
            
            <div class="portlet-body">
                <div class="portlet light bordered">
                   
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                            <thead>
                            <tr class="">
                                <th style="display: none">ID</th>
                                <th>Batch</th>
                                <th style="display: none;">batch</th>
                                <th>Item</th>
                                <th style="display: none;">item</th>
                                <th>Qty</th>
                               <th>Photo</th>
                               
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            foreach ($result as $r) {
                                if($r->stock_qty !='' && $r->stock_qty !=0)
                                {$status="<span class='label label-success ' style='margin-bottom: 5px;margin-right: 5px' >$r->stock_qty Qty Avilable</span>";}
                                else
                                {$status="<span class='label label-danger ' style='margin-bottom: 5px;margin-right: 5px' >Outofstock</span>";}

                                if($r->return_status !='0' && $r->damage !=0)
                                {$damageitem="<span class='label label-primary ' style='margin-bottom: 5px;margin-right: 5px' >$r->damage Qty Damage </span>";}
                                
                                else{
                                    $damageitem="";
                                }
                                
                                ?>
                                <tr>
                                    <td style="display: none"><?php echo $r->stock_id; ?></td>
                                    <td><?php echo $r->batch_name; ?></td>
                                    <td style="display: none"><?php echo $r->stock_batch; ?></td>
                                    <td><?php echo $r->item_name; ?></td>
                                    <td style="display: none"><?php echo $r->stock_item; ?></td>
                                    <td><?php echo  $status; ?><br><?php echo $damageitem ?></td>
                                    <td><img id="myImg" style="width:100%;max-width:50px" src="<?php echo $r->photo ?>"></td>
                                    
                                </tr>
                            <?php  }   ?>

                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>

        <div id="myModal" class="modal">
                        <span class="close">&times;</span>
                        <img class="modal-content" id="img01">
                        <div id="caption"></div>
                        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
        
        


      

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
<script src="<?php echo base_url()?>template/assets/global/plugins/datatables/mydatatable.min.js" type="text/javascript"></script>
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
    $("#stock_menu").addClass('active');
    $("#stock_menu").addClass('active');
    $("#stock_menu").addClass('selected');
    // $("#hr_menu4").addClass('open');




   
</script>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
