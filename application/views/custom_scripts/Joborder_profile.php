<script>
    $("#overview_div").show();
    $("#overview_menu").addClass('active');
    $("#tasks_div").hide();
    $("#work_div").hide();
    $("#job_div").hide();

    $("#overview_btn").click(function(){
        $("#overview_div").show();
        $("#tasks_div").hide();
        $("#job_div").hide();
        $("#work_div").hide();
        $("#overview_menu").addClass('active');
        $("#task_menu").removeClass('active');
        $("#work_menu").removeClass('active');
        $("#job_menu").removeClass('active');
    });

    $("#task_btn").click(function(){
        $("#overview_div").hide();
        $("#tasks_div").show();
        $("#job_div").hide();
        $("#work_div").hide();
        $("#task_menu").addClass('active');
        $("#overview_menu").removeClass('active');
        $("#work_menu").removeClass('active');
        $("#job_menu").removeClass('active');
    });
    $("#job_btn").click(function(){
        $("#overview_div").hide();
        $("#job_div").show();
        $("#tasks_div").hide();
        $("#work_div").hide();
        $("#job_menu").addClass('active');
        $("#overview_menu").removeClass('active');
        $("#task_menu").removeClass('active');
        $("#work_menu").removeClass('active');
    });
    $("#work_btn").click(function(){
        $("#overview_div").hide();
        $("#job_div").hide();
        $("#work_div").show();
        $("#tasks_div").hide();
        $("#work_menu").addClass('active');
        $("#job_menu").removeClass('active');
        $("#overview_menu").removeClass('active');
        $("#task_menu").removeClass('active');
    });


    $('body').on('click', '#btn_edit', function() {
        var no = $(this).closest('tr').children('td');
        $('#editroleid').val(no.eq(1).text());
        $('#edituser').val(no.eq(2).text());
        $('#edituser').trigger("change");
        $('#editrole').val(no.eq(4).text());
    });

    $('body').on('click', '#edit_budget_btn', function() {
        var no = $(this).closest('tr').children('td');
        $('#budget').val(no.eq(3).text());
        $('#work_id').val(no.eq(0).text());
    });
    $('body').on('click', '#deletebtn', function() {
        var no = $(this).closest('tr').children('td');
        $("#deleteid").val(no.eq(1).text());


    });

</script>
<script>
    function init_table() {
        var table = $('#table');

        var fixedHeaderOffset = 0;
        if (App.getViewPort().width < App.getResponsiveBreakpoint('md')) {
            if ($('.page-header').hasClass('page-header-fixed-mobile')) {
                fixedHeaderOffset = $('.page-header').outerHeight(true);
            }
        } else if ($('.page-header').hasClass('navbar-fixed-top')) {
            fixedHeaderOffset = $('.page-header').outerHeight(true);
        }

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

            "bAutoWidth": false,
            "aoColumns": [
                { "sWidth": "3%" },
                { "sWidth": "75%" },
                { "sWidth": "3%" },
                { "sWidth": "1%" },
                { "sWidth": "1%" },
                { "sWidth": "1%" }
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

            "dom": "<'row' <'col-md-12'>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

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
        $.post("<?php echo base_url().$controller_directory ?>/boq/select_boq_task_list_joborder",{project_id:project_id},function (data) {
            var obj=$.parseJSON(data);
            $("#table-body").html('');
            if(obj.work_count>0){
                var content=obj.content;
                $("#table-body").append(content);
                init_table();

            }

        })
    }
    get_tasks();
</script>
<script>
    // Form Validation for All Forms in this Page
    $('form').each(function () {
        var form1 = $('#'+$(this).attr('id'));
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);
        $(this).validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            messages: {},
            rules: {
                budget: {
                    number: true
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit
                success1.hide();
                error1.show();
                App.scrollTo(error1, -200);
            },
            errorPlacement: function (error, element) { // render error placement for each input type
                if (element.parent(".input-group").size() > 0) {
                    error.insertAfter(element.parent(".input-group"));
                } else if (element.attr("data-error-container")) {
                    error.appendTo(element.attr("data-error-container"));
                } else {
                    error.insertAfter(element); // for other inputs, just perform default behavior
                }
            },
            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function (form) {
                success1.show();
                error1.hide();
                form.submit();
            }
        });
        $('.select2,.select2-multiple', form1).change(function () {
            form1.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });
    });
</script>