<script src="<?php echo base_url()?>template/assets/global/plugins/switchery/dist/switchery.js"></script>
<script>
    if (jQuery().pulsate) {
        jQuery('.pulsate-regular').pulsate({
            color: "#bf1c56"
        });
    }
    $('.date-picker').datepicker({
        rtl: App.isRTL(),
        orientation: "left",
        autoclose: true
    });
    $("#progress-chart").circliful({
        animation: 1,
        animationStep: 1,
        start: 2,
        showPercent: 1,
        backgroundColor: '#000000',
        foregroundColor: '#703688',
        fontColor: '#000',
        multiPercentage: 1,
        text: '',
        percent: <?php echo $projects->progress?>,
        textSize: 20,
        textStyle: 'font-size: 20px;',
        foregroundBorderWidth: 35,
        backgroundBorderWidth: 35,
    });
    if (jQuery().pulsate) {
        jQuery('.pulsate-regular').pulsate({
            color: "#bf1c56"
        });
    }
    //    default
    $(".all_div").hide();
    $("#overview_div").show();

    $("#overview_btn").click(function(){
        $(".all_menu").removeClass('active');
        $("#overview_menu").addClass('active');

        $(".all_div").hide();
        $("#overview_div").show();
    })
    $("#job_brief_btn").click(function(){
        $(".all_menu").removeClass('active');
        $("#job_brief_menu").addClass('active');

        $(".all_div").hide();
        $("#job_brief_div").show();
    })
    $("#boq_btn").click(function(){
        $(".all_menu").removeClass('active');
        $("#boq_menu").addClass('active');

        $(".all_div").hide();
        $("#boq_div").show();
    })
    $("#job_order_btn").click(function(){
        $(".all_menu").removeClass('active');
        $("#job_order_menu").addClass('active');

        $(".all_div").hide();
        $("#job_order_div").show();
    })
    $("#work_category_btn").click(function(){
        $(".all_menu").removeClass('active');
        $("#work_category_menu").addClass('active');

        $(".all_div").hide();
        $("#work_category_div").show();
    })
    $("#project_team_btn").click(function(){
        $(".all_menu").removeClass('active');
        $("#project_team_menu").addClass('active');

        $(".all_div").hide();
        $("#project_team_div").show();
    })
    $("#tasks_btn").click(function(){
        $(".all_menu").removeClass('active');
        $("#tasks_menu").addClass('active');

        $(".all_div").hide();
        $("#tasks_div").show();
    })
    $("#jobcard_btn").click(function(){
        $(".all_menu").removeClass('active');
        $("#jobcard_menu").addClass('active');

        $(".all_div").hide();
        $("#jobcard_div").show();
    })
    $("#jobcard_btn2").click(function(){
        $(".all_menu").removeClass('active');
        $("#jobcard_menu").addClass('active');

        $(".all_div").hide();
        $("#jobcard_div").show();
    })
    $("#jobcard_btn3").click(function(){
        $(".all_menu").removeClass('active');
        $("#jobcard_menu").addClass('active');

        $(".all_div").hide();
        $("#jobcard_div").show();
    })
    $("#jobcard_add_btn").click(function(){
        $(".all_menu").removeClass('active');
        $("#jobcard_menu").addClass('active');

        $(".all_div").hide();
        $("#jobcard_add_div").show();
    })
    $(".jobcard_edit_btn").click(function(){

        $(".all_menu").removeClass('active');
        $("#jobcard_menu").addClass('active');

        $(".all_div").hide();
        $("#jobcard_edit_div").show();

        var no = $(this).closest('tr').children('td');
        $('#sdate').val(no.eq(3).text());
        $('#edate').val(no.eq(4).text());
        $('#user1').val(no.eq(5).text());
        $('#user1').trigger("change");
        $('#jocard1').val(no.eq(6).text());
        $('#proid').val(no.eq(7).text());

    })
    $("#jobcard_add_btn2").click(function(){
        $(".all_menu").removeClass('active');
        $("#jobcard_menu").addClass('active');

        $(".all_div").hide();
        $("#jobcard_add_div").show();
    })
    $("#timeline_btn").click(function(){
        $(".all_menu").removeClass('active');
        $("#timeline_menu").addClass('active');

        $(".all_div").hide();
        $("#timeline_div").show();
    })
    $("#purchase_btn").click(function(){
        $(".all_menu").removeClass('active');
        $("#purchase_menu").addClass('active');

        $(".all_div").hide();
        $("#purchase_div").show();
    })
    $("#expense_btn").click(function(){
        $(".all_menu").removeClass('active');
        $("#expense_menu").addClass('active');

        $(".all_div").hide();
        $("#expense_div").show();
    })
    $("#notes_btn").click(function(){
        $(".all_menu").removeClass('active');
        $("#notes_menu").addClass('active');

        $(".all_div").hide();
        $("#notes_div").show();
    })
    $("#images_btn").click(function(){

        $(".all_div").hide();
        $("#images_div").show();

        $(".all_menu").removeClass('active');
        $("#images_menu").addClass('active');

        $("#js-grid-juicy-projects").cubeportfolio('destroy');
        image_gallery();
    })
    $("#attendance_btn").click(function(){

        $(".all_div").hide();
        $("#attendance_div").show();

        $(".all_menu").removeClass('active');
        $("#attendance_menu").addClass('active');
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
            "columnDefs": [
                { "width": "20%", "targets": 0 }
            ],
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
                { "sWidth": "5%" },
                { "sWidth": "60%" },
                { "sWidth": "5%" },
                { "sWidth": "5%" }
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
        var project_id="<?php echo $boq->project_id ?>";
        var quot_id="<?php echo $boq->quot_id ?>";
//          Select Work Categories
        $.post("<?php echo base_url().$controller_directory ?>/boq/select_boq_task_list_project",{project_id:project_id},function (data) {
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
    toastr.options = {
        closeButton: true,
        debug: false,
        positionClass: 'toast-top-center',
        onclick: null
    };
    $('body').on('change', '#work_cat', function() {
        var workcategory=$('#work_cat :selected').val();
        $("#work_info_div").html('');
        $.post("<?php echo base_url().$controller_directory ?>/job_cards/select_wcat", {id:workcategory}, function (data) {
            var obj = $.parseJSON(data);
            var content = '<table class="table table-striped table-bordered table-advance table-hover">' +
                '<thead></thead><tbody><tr>' +
                '<td class="highlight" style="text-align: center" colspan="2" ><div class="success"></div><strong>Work Info</strong></td>' +
                '<td style="display: none"></td>' +
                '</tr><tr>' +
                '<td class="highlight" ><div class="success"></div><strong>&nbsp;&nbsp;No Of Tasks</strong></td>' +
                '<td>' + obj.task_count + '</td>' +
                '</tr><tr>' +
                '<td class="highlight" ><div class="success"></div><strong>&nbsp;&nbsp;Estimated Budget</strong></td>' +
                '<td>' + obj.budget + '</td>' +
                '</tr>';
            if(obj.job_count>0){
                content+='<tr><td class="highlight" ><div class="success"></div><strong>&nbsp;&nbsp;Assigned Status</strong></td>' +
                    '<td>Assigned To ' + obj.assigned_to + '</td></tr>';
                content+='<tr><td class="highlight" ><div class="success"></div><strong>&nbsp;&nbsp;Assigned Status</strong></td>' +
                    '<td>Assigned By ' + obj.assigned_by + '</td></tr>';
//                        Hide Submit Div
                $('#jobcard_submit_btn').hide();
                toastr["warning"]("This Work Category Already Assigned", "Warning !");
            }else{
                content+='<tr><td class="highlight" ><div class="success"></div><strong>&nbsp;&nbsp;Assigned Status</strong></td>' +
                    '<td>Not Assigned</td></tr>';
//                        Show Submit Div
                $('#jobcard_submit_btn').show();
            }
            content+='</tbody></table>';
            $("#work_info_div").append(content);
            $("#work_info_div").show();
        });
    });
</script>
<script>
    var table = $('.datatable');
    var oTable = table.dataTable({
//            "searching": false,
//            "bLengthChange": false,
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

        // setup buttons extentension: http://datatables.net/extensions/buttons/

        // setup responsive extension: http://datatables.net/extensions/responsive/
        responsive: {
            details: {

            }
        },
        "order": [
            [0, 'asc']
        ],

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
</script>
<script>
    var table = $('.jobcard_datatable');
    var oTable = table.dataTable({
//            "searching": false,
//            "bLengthChange": false,
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

        // setup buttons extentension: http://datatables.net/extensions/buttons/
        buttons: [
            { extend: 'print', className: 'btn dark btn-outline' },
            { extend: 'csv', className: 'btn purple btn-outline ' }
        ],
        // setup responsive extension: http://datatables.net/extensions/responsive/
        responsive: {
            details: {

            }
        },
        "order": [
            [0, 'asc']
        ],

        "lengthMenu": [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"] // change per page values here
        ],
        // set the initial value
        "pageLength": 10,

        "dom": "<'row' <'col-md-12'>B><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

        // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
        // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js).
        // So when dropdowns used the scrollable div should be removed.
        //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
    });
</script>
<script>
    function image_gallery() {
        $('#js-grid-juicy-projects').cubeportfolio({
            filters: '#js-filters-juicy-projects',
            loadMore: '#js-loadMore-juicy-projects',
            loadMoreAction: 'click',
            layoutMode: 'grid',
            defaultFilter: '*',
            animationType: 'quicksand',
            gapHorizontal: 15,
            gapVertical: 10,
            gridAdjustment: 'responsive',
            mediaQueries: [{
                width: 1500,
                cols: 8
            }, {
                width: 1100,
                cols: 7
            }, {
                width: 800,
                cols: 6
            }, {
                width: 480,
                cols: 5
            }, {
                width: 320,
                cols: 1
            }],
            caption: 'overlayBottomReveal',
            displayType: 'sequentially',
            displayTypeSpeed: 80,

            // lightbox
            lightboxDelegate: '.cbp-lightbox',
            lightboxGallery: true,
            lightboxTitleSrc: 'data-title',
            lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',

            // singlePage popup
            singlePageDelegate: '.cbp-singlePage',
            singlePageDeeplinking: true,
            singlePageStickyNavigation: true,
            singlePageCounter: '<div class="cbp-popup-singlePage-counter">{{current}} of {{total}}</div>',
            singlePageCallback: function(url, element) {
                // to update singlePage content use the following method: this.updateSinglePage(yourContent)
                var t = this;

                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'html',
                    timeout: 10000
                })
                    .done(function(result) {
                        t.updateSinglePage(result);
                    })
                    .fail(function() {
                        t.updateSinglePage('AJAX Error! Please refresh the page!');
                    });
            },
        });
    }
    image_gallery();
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
                name: {
                    minlength: 2,
                    required: true
                },
                area: {
                    number: true
                },
                labour_count: {
                    number: true
                },
                gross_amount: {
                    number: true
                },
                qty: {
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
<script>
    $('body').on('click', '#btn_editattend', function() {
        var no = $(this).closest('tr').children('td');
        $('#attendance_date1').val(no.eq(1).text());

        $("#editattendance").show();
        $("#updateattendance").hide();
        var date=no.eq(1).text();
        var checkbox;
        $("#attendance_add_table_body1").html("");
        $("#attendance_table1").dataTable().fnDestroy();
        if(date!=''){

            $.post("<?php echo base_url().$controller_directory ?>/job_cards/select_attendance",{date:date},function (data) {
                var obj=$.parseJSON(data);
                if(obj.count>0){
                    var content="";
                    for (var i=0;i<obj.count;i++){
                        if(obj.attend[i]==1){ checkbox='checked'; }else{ checkbox='';}
                        content+='<tr><td style="display: none" id="labour'+i+'">'+obj.id[i]+'</td><td ><input id="checkbox'+i+'" class="js-switch edit_checkbox" name="checkbox'+i+'" type="checkbox"   '+checkbox+' /></td><td>'+obj.name[i]+'</td><td>'+obj.civil_id[i]+'</td><td id="atten'+i+'" style="display:none"> '+obj.attendance_id[i]+'</td></tr>';
                    }


                    $("#attendance_add_table_body1").append(content);
                    $("#attendance_add_div1").show();
                    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

                    elems.forEach(function(html) {
                        var switchery = new Switchery(html, {  secondaryColor: '#fc0030',disabledOpacity: 0.75});
                        switchery.disable();
                    });

                }else{
                    $("#attendance_add_div1").hide();
                    toastr["error"]("No Attendance Data Found on Register on Selected Date", "No Attendance Data Found");
                }
            })
        }else{
            toastr["error"]("Please Select A Date", "Select a Date");
        }

    })

</script>
<script>
    toastr.options = {
        closeButton: true,
        debug: false,
        positionClass: 'toast-top-center',
        onclick: null
    };

    $("#jobcard_end_date").on("change", function () {
        var start_date = $("#jobcard_start_date").val();
        if(start_date==''){
            $("#jobcard_submit_btn").attr('disabled','disabled');
            toastr["warning"]("Please Select Start Date !!!", "Select Start Date !");
        }else{
            var date1 = $("#jobcard_start_date").datepicker('getDate');
            var date2 = $("#jobcard_end_date").datepicker('getDate');
            var dayDiff = Math.ceil((date2 - date1) / (1000 * 60 * 60 * 24));
            if(dayDiff<1){
                $("#jobcard_submit_btn").attr('disabled','disabled');
                toastr["warning"]("Start Date is Greater than or Equal to Due Date !!!", "Error !");
            }else{
                $("#jobcard_submit_btn").removeAttr('disabled','disabled');
            }
        }

    })
    $("#jobcard_start_date").on("change", function () {
        var start_date = $("#jobcard_start_date").val();
        var end_date = $("#jobcard_end_date").val();
        if(end_date!=''){
            var date1 = $("#jobcard_start_date").datepicker('getDate');
            var date2 = $("#jobcard_end_date").datepicker('getDate');
            var dayDiff = Math.ceil((date2 - date1) / (1000 * 60 * 60 * 24));
            if(dayDiff<1){
                $("#jobcard_submit_btn").attr('disabled','disabled');
                toastr["warning"]("Start Date is Greater than or Equal to Due Date !!!", "Error !");
            }else{
                $("#jobcard_submit_btn").removeAttr('disabled','disabled');
            }
        }

    })
</script>