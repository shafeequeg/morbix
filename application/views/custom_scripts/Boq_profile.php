<script>
    $('body').on('click', '#btn_edit', function() {
        var no = $(this).closest('tr').children('td');

        $("#workcat_id").val(no.eq(1).text());
        $("#workcat_id").trigger("change");
        $("#old_work_id").val(no.eq(1).text());
        $('#qtask_id').val(no.eq(0).text());
        $('#desc').val(no.eq(3).text());
        $('#quantity1').val(no.eq(4).text());
        $('#unit1').val(no.eq(5).text());
        $('#unit_price1').val(no.eq(6).text());
        $('#total_price1').val(no.eq(7).text());


    });

    $('body').on('click', '#btn_delete', function() {
        var no = $(this).closest('tr').children('td');
        $("#delete_id").val(no.eq(0).text());
        $("#deleteform1").attr('action', '<?php echo base_url() .$controller_directory ?>/boq/task_delete');
    })


</script>
<script>
    function init_table() {
        var table = $('#table');

        var fixedHeaderOffset = 0;
//        if (App.getViewPort().width < App.getResponsiveBreakpoint('md')) {
//            if ($('.page-header').hasClass('page-header-fixed-mobile')) {
//                fixedHeaderOffset = $('.page-header').outerHeight(true);
//            }
//        } else if ($('.page-header').hasClass('navbar-fixed-top')) {
//            fixedHeaderOffset = $('.page-header').outerHeight(true);
//        }

        var oTable = table.dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "_MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},
            fixedHeader: {
                header: true,
                headerOffset: fixedHeaderOffset
            },

            "columnDefs": [
                {
                    "targets": [9],
                    "visible": false
                }
            ],
            "bAutoWidth": false,
            "aoColumns": [
                { "sWidth": "5%" },
                { "sWidth": "5%" },
                { "sWidth": "5%" },
                { "sWidth": "60%" },
                { "sWidth": "5%" },
                { "sWidth": "5%" },
                { "sWidth": "5%" },
                { "sWidth": "5%" },
                { "sWidth": "5%" },
                { "sWidth": "5%" }
            ],
            buttons: [
                { extend: 'print', className: 'btn dark btn-outline' ,exportOptions: {columns: [ 2, 3, 4, 5, 6, 7 ]} },
                { extend: 'pdf', className: 'btn green btn-outline' ,exportOptions: {columns: [ 2, 3, 4, 5, 6, 7 ]} },
                { extend: 'excel', className: 'btn yellow btn-outline ',exportOptions: {columns: [ 2, 3, 4, 5, 6, 7 ]}  },
                { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
            ],

            // setup responsive extension: http://datatables.net/extensions/responsive/
            //responsive: true,

            //"ordering": false, disable column ordering
            //"paging": false, disable pagination

            "ordering": false,
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,

            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js).
            // So when dropdowns used the scrollable div should be removed.
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
        });

    }
</script>
<script>
    function get_tasks() {
        var project_id="<?php echo $result->project_id ?>";
        var quot_id="<?php echo $result->quot_id ?>";
//          Select Work Categories
        $.post("<?php echo base_url().$controller_directory ?>/boq/select_boq_task_list",{project_id:project_id},function (data) {
            var obj=$.parseJSON(data);
            $("#table-body").html('');
            if(obj.work_count>0){
                var content=obj.content;
                $("#table-body").append(content);
                init_table();

            }

        })
    }

    //    Ajax Form Submission
    function submit_form() {
        var form1 = $('#form_task_add');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);
        var url = "<?php echo base_url().$controller_directory?>/boq/add_task"; // the script where you handle the form input.
        var work_cat=$("#work_id").val();
        $.ajax({
            type: "POST",
            url: url,
            data: $("#form_task_add").serialize(), // serializes the form's elements.
            success:function(data, textStatus, jqXHR)
            {
                if(data==1){
                    toastr["success"]("Task Added Successfully", "Success !");
                }else{
                    toastr["error"]("There has been Some Error Occurred. Please Try Again", "Error !");
                }
//                $("#task_add_modal").modal('toggle');
                $("#task_add_submit_btn").removeAttr('disabled','disabled');
                $("#form_task_add").trigger("reset");
                $("#work_id").val(work_cat);
                $("#work_id").trigger("change");
                success1.hide();
                error1.hide();
//              Destroy Existing Table And Initialize Table with New Data
                $("#table").dataTable().fnDestroy();
                get_tasks();
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                toastr["error"]("There has been Some Error Occurred. Please Try Again", "Error !");
                $("#task_add_modal").modal('toggle');
                $("#task_add_submit_btn").removeAttr('disabled','disabled');
                success1.hide();
                error1.hide();
            }
        });
    }
    $(document).ready(function () {
        get_tasks();
    })
    //    Ajax Form Edit
    function submit_form_edit() {
        var form1 = $('#form_task_edit');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);
        var url = "<?php echo base_url().$controller_directory?>/boq/edit_task"; // the script where you handle the form input.
        var work_cat=$("#work_id").val();
        $.ajax({
            type: "POST",
            url: url,
            data: $("#form_task_edit").serialize(), // serializes the form's elements.
            success:function(data, textStatus, jqXHR)
            {

                if(data==1){
                    toastr["success"]("Task Updated Successfully", "Success !");
                }else{
                    toastr["error"]("There has been Some Error Occurred. Please Try Again", "Error !");
                }
                $("#task_edit_modal").modal('toggle');
                $("#task_edit_submit_btn").removeAttr('disabled','disabled');
                $("#form_task_edit").trigger("reset");
                success1.hide();
                error1.hide();
//              Destroy Existing Table And Initialize Table with New Data
                $("#table").dataTable().fnDestroy();
                get_tasks();
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                toastr["error"]("There has been Some Error Occurred. Please Try Again", "Error !");
                $("#task_edit_modal").modal('toggle');
                $("#task_edit_submit_btn").removeAttr('disabled','disabled');
                success1.hide();
                error1.hide();
            }
        });
    }


</script>
<script>
    $("#unit_price,#quantity").keyup(function(){
        var unit_price=parseFloat($("#unit_price").val());
        var quantity=parseFloat($("#quantity").val());
        $("#total_price").val(unit_price*quantity)
    });


    function queryParams() {
        return {
            type: 'owner',
            sort: 'updated',
            direction: 'desc',
            per_page: 100,
            page: 1
        };
    }
</script>
<script>
    $("#unit_price1,#quantity1").keyup(function(){
        var unit_price=parseFloat($("#unit_price1").val());
        var quantity=parseFloat($("#quantity1").val());
        $("#total_price1").val(unit_price*quantity)
    });


    function queryParams() {
        return {
            type: 'owner',
            sort: 'updated',
            direction: 'desc',
            per_page: 100,
            page: 1
        };
    }
</script>
<script type="text/javascript">
    function resetActive(event, percent, step) {
        $(".progress-bar").css("width", percent + "%").attr("aria-valuenow", percent);
        $(".progress-completed").text(percent + "%");

        $("div").each(function () {
            if ($(this).hasClass("activestep")) {
                $(this).removeClass("activestep");
            }
        });

        if (event.target.className == "col-md-2") {
            $(event.target).addClass("activestep");
        }
        else {
            $(event.target.parentNode).addClass("activestep");
        }

        hideSteps();
        showCurrentStepInfo(step);
    }

    function hideSteps() {
        $("div").each(function () {
            if ($(this).hasClass("activeStepInfo")) {
                $(this).removeClass("activeStepInfo");
                $(this).addClass("hiddenStepInfo");
            }
        });
    }

    function showCurrentStepInfo(step) {
        var id = "#" + step;
        $(id).addClass("activeStepInfo");
    }
</script>
<script>
    work_categories_list();
    function work_categories_list() {
        $("#work_categories_list").html("");
        $("#work_count").text("<?php echo $work_categories->num_rows()?>");
        <!--    Work Categories List-->
        var project_id="<?php echo $result->project_id?>";
        $.post("<?php echo base_url().$controller_directory?>/boq/select_work_category_list",{project:project_id},function (data) {
            var obj=$.parseJSON(data);
            $("#work_categories_list").append(obj.content);
        })

    }
</script>
<script>
    var form1 = $('#form_task_add');
    var error1 = $('.alert-danger', form1);
    var success1 = $('.alert-success', form1);

    form1.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "", // validate all fields including form hidden input
        messages: {
            mobile: {
                maxlength: jQuery.validator.format("Max 10 Digits Allowed"),
                minlength: jQuery.validator.format("At least 10 Digits Required")
            }
        },
        rules: {
            quantity: {
                number: true
            },
            unit_price: {
                number: true
            },
            category: {
                required: true
            },

        },

        invalidHandler: function(event, validator) { //display error alert on form submit
            success1.hide();
            error1.show();
            App.scrollTo(error1, -200);
        },

        errorPlacement: function(error, element) {
            if (element.is(':checkbox')) {
                error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
            } else if (element.is(':radio')) {
                error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
            } else {
                error.insertAfter(element); // for other inputs, just perform default behavior
            }
        },

        highlight: function(element) { // hightlight error inputs
            $(element)
                .closest('.form-group').addClass('has-error'); // set error class to the control group
        },

        unhighlight: function(element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        },

        success: function(label) {
            label
                .closest('.form-group').removeClass('has-error'); // set success class to the control group
        },

        submitHandler: function(form) {
            success1.show();
            error1.hide();
//            form.submit();
//            Submit Form using Ajax
            $("#task_add_submit_btn").attr('disabled','disabled');
            submit_form();

        }
    });
    $('.select2,.select2-multiple', form1).change(function () {
        form1.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
    });

    toastr.options = {
        closeButton: true,
        debug: false,
        positionClass: 'toast-top-full-width',
        onclick: null
    };


</script>
<script>
    var form1 = $('#form_task_edit');
    var error1 = $('.alert-danger', form1);
    var success1 = $('.alert-success', form1);

    form1.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "", // validate all fields including form hidden input
        messages: {
            mobile: {
                maxlength: jQuery.validator.format("Max 10 Digits Allowed"),
                minlength: jQuery.validator.format("At least 10 Digits Required")
            }
        },
        rules: {
            quantity1: {
                number: true
            },
            unit_price1: {
                number: true
            },
            category: {
                required: true
            }

        },

        invalidHandler: function(event, validator) { //display error alert on form submit
            success1.hide();
            error1.show();
            App.scrollTo(error1, -200);
        },

        errorPlacement: function(error, element) {
            if (element.is(':checkbox')) {
                error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
            } else if (element.is(':radio')) {
                error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
            } else {
                error.insertAfter(element); // for other inputs, just perform default behavior
            }
        },

        highlight: function(element) { // hightlight error inputs
            $(element)
                .closest('.form-group').addClass('has-error'); // set error class to the control group
        },

        unhighlight: function(element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        },

        success: function(label) {
            label
                .closest('.form-group').removeClass('has-error'); // set success class to the control group
        },

        submitHandler: function(form) {
            success1.show();
            error1.hide();
//            form.submit();
//            Submit Form using Ajax
            $("#task_edit_submit_btn").attr('disabled','disabled');
            submit_form_edit();

        }

    });
    $('.select2,.select2-multiple', form1).change(function () {
        form1.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
    });

    toastr.options = {
        closeButton: true,
        debug: false,
        positionClass: 'toast-top-full-width',
        onclick: null
    };


</script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>

<script>
    var Items = $("#work_categories_list li");

    $('#work_categories_list').sortable({
        disabled: false,
        axis: 'y',
        forceHelperSize: true,
        update: function (event, ui) {
            var Newpos = parseInt(ui.item.index())+1;
//          Update Work Priority
            var work_id=ui.item.attr('data-id');
            var old_priority=ui.item.attr('data-priority');
            var priority=Newpos;
            var project_id="<?php echo $result->project_id?>";
            $.post("<?php echo base_url().$controller_directory?>/boq/update_task_priority",{project_id:project_id,work_id:work_id,priority:priority,old_priority: old_priority},function(data) {
                work_categories_list();
                $("#table").dataTable().fnDestroy();
                get_tasks();
            })
        }
    }).disableSelection();
</script>
<script>

    $('input[type=radio][name=client_approval]').change(function() {
        if (this.value == '1') {
            $("#remarks1").show();
        }
        else if (this.value == '2') {

            $("#remarks1").show();

        }
    });


    $('input[type=radio][name=appstatus]').change(function() {
        if (this.value == '1') {
            $("#approval_remarks").show();
        }
        else if (this.value == '2') {
            $("#approval_remarks").show();

        }
    });

    $('body').on('click', '#btn_delete_work_cat', function() {

        $("#work_id_delete").val($(this).attr("data-id"));

    });

</script>
<script>
    var form1 = $('#form_discount');
    var error1 = $('.alert-danger', form1);
    var success1 = $('.alert-success', form1);

    form1.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "", // validate all fields including form hidden input
        messages: {
            mobile: {
                maxlength: jQuery.validator.format("Max 10 Digits Allowed"),
                minlength: jQuery.validator.format("At least 10 Digits Required")
            }
        },
        rules: {
            discount: {
                number: true
            }
        },

        invalidHandler: function(event, validator) { //display error alert on form submit
            success1.hide();
            error1.show();
            App.scrollTo(error1, -200);
        },

        errorPlacement: function(error, element) {
            if (element.parent(".input-group").size() > 0) {
                error.insertAfter(element.parent(".input-group"));
            } else if (element.attr("data-error-container")) {
                error.appendTo(element.attr("data-error-container"));
            } else {
                error.insertAfter(element); // for other inputs, just perform default behavior
            }
        },

        highlight: function(element) { // hightlight error inputs
            $(element)
                .closest('.form-group').addClass('has-error'); // set error class to the control group
        },

        unhighlight: function(element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        },

        success: function(label) {
            label
                .closest('.form-group').removeClass('has-error'); // set success class to the control group
        },

        submitHandler: function(form) {
            success1.show();
            error1.hide();
            form.submit();
        }

    });
    $('.select2,.select2-multiple', form1).change(function () {
        form1.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
    });
</script>
<script>
    var form1 = $('#form_document_add');
    var error1 = $('.alert-danger', form1);
    var success1 = $('.alert-success', form1);

    form1.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "", // validate all fields including form hidden input
        messages: {
            mobile: {
                maxlength: jQuery.validator.format("Max 10 Digits Allowed"),
                minlength: jQuery.validator.format("At least 10 Digits Required")
            }
        },
        rules: {

        },

        invalidHandler: function(event, validator) { //display error alert on form submit
            success1.hide();
            error1.show();
            App.scrollTo(error1, -200);
        },

        errorPlacement: function(error, element) {
            if (element.is(':checkbox')) {
                error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
            } else if (element.is(':radio')) {
                error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
            } else {
                error.insertAfter(element); // for other inputs, just perform default behavior
            }
        },

        highlight: function(element) { // hightlight error inputs
            $(element)
                .closest('.form-group').addClass('has-error'); // set error class to the control group
        },

        unhighlight: function(element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        },

        success: function(label) {
            label
                .closest('.form-group').removeClass('has-error'); // set success class to the control group
        },

        submitHandler: function(form) {
            success1.show();
            error1.hide();
            form.submit();
        }

    });
    $('.select2,.select2-multiple', form1).change(function () {
        form1.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
    });
</script>