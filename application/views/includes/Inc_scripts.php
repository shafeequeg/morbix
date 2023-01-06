<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> 2021 &copy;  Warehouse Management App
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->
<!--[if lt IE 9]>
<script src="<?php echo base_url()?>template/assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="<?php echo base_url()?>template/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/bootstrap-sweetalert/dist/sweetalert.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/jquery-notif-it/js/notifit.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script>
    function push_notif(type,msg,hide) {
        notif({
            type: type,
            msg: msg,
            position: "center",
            width: 500,
            height: 60,
            top: 200,
            autohide: hide
        });
    }
    var base="<?php echo base_url()?>";
</script>
<script src="<?php echo base_url()?>template/assets/pages/scripts/chat/chat-main.js"></script>
<script src="<?php echo base_url()?>template/assets/pages/scripts/chat/chatigniter.js"></script>