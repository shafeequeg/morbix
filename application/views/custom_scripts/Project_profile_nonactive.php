<script>
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
        var project_id="<?php echo $boq->row()->project_id ?>";
        var quot_id="<?php echo $boq->row()->quot_id ?>";
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
<?php if($boq->num_rows()==1){?>
    get_tasks();
<?php } ?>
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
