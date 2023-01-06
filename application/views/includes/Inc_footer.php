<?php if ($this->session->flashdata('flashdata_msg') != "")
{?>
<!--Notification-->
<script>
    var i = -1,
        toastCount = 0,
        $toastlast,
        getMessage = function () {
            var msgs = ['Hello, some notification sample goes here',
                '<div><input class="form-control input-small" value="textbox"/>&nbsp;<a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" target="_blank">Check this out</a></div><div><button type="button" id="okBtn" class="btn blue">Close me</button><button type="button" id="surpriseBtn" class="btn default" style="margin: 0 8px 0 8px">Surprise me</button></div>',
                'Did you like this one ? :)',
                'Totally Awesome!!!',
                'Yeah, this is the Metronic!',
                'Explore the power of App. Purchase it now!'
            ];
            i++;
            if (i === msgs.length) {
                i = 0;
            }

            return msgs[i];
        };
        var shortCutFunction = '<?php echo $this->session->flashdata('flashdata_type')?>';
        var msg = '<?php echo $this->session->flashdata('flashdata_msg')?>';
        var title = '<?php echo $this->session->flashdata('flashdata_title')?>';
        var $showDuration = '7000';
        var $hideDuration = '1000';
        var $timeOut = '5000';
        var $extendedTimeOut = '1000';
        var $showEasing = 'swing';
        var $hideEasing = 'linear';
        var $showMethod = 'fadeIn';
        var $hideMethod = 'fadeOut';
        var toastIndex = toastCount++;

        toastr.options = {
            closeButton: true,
            debug: false,
            positionClass: 'toast-top-full-width',
            onclick: null
        };


        $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

        var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
        $toastlast = $toast;
        if ($toast.find('#okBtn').length) {
            $toast.delegate('#okBtn', 'click', function () {
                alert('you clicked me. i was toast #' + toastIndex + '. goodbye!');
                $toast.remove();
            });
        }
        if ($toast.find('#surpriseBtn').length) {
            $toast.delegate('#surpriseBtn', 'click', function () {
                alert('Surprise! you clicked me. i was toast #' + toastIndex + '. You could perform an action here.');
            });
        }

        $('#clearlasttoast').click(function () {
            toastr.clear($toastlast);
        });

</script>
<?php } ?>
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?php echo base_url()?>template/assets/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>

<!-- END THEME LAYOUT SCRIPTS -->

</body>

</html>