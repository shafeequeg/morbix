<?php
    $user_type=$this->session->userdata('user_type');
?>
<!--Scripts for Active Enquiry Datatable-->
<script>
    // Array holding selected row IDs
    var rows_selected = [];

    function GetSearchstatus(){
        return $('#status').val();
    }

    $(document).ready(function (){


        // Array holding selected row IDs
        var rows_selected = [];
        var table = $('#datatable').DataTable({
            "ajax":{
                url :"<?php echo base_url().$user_type?>/projects/projects_list", // json datasource
                type: "post", // type of method  , by default would be get
                data: function(d){
                    d.status = GetSearchstatus();
                }
            },


            "bProcessing": true,
            "deferRender": true,
            "bDeferRender": true,

            buttons: [
                { extend: 'print', className: 'btn dark btn-outline' },
                { extend: 'copy', className: 'btn red btn-outline' },
                { extend: 'pdf', className: 'btn green btn-outline' },
                { extend: 'excel', className: 'btn yellow btn-outline ' },
                { extend: 'csv', className: 'btn purple btn-outline ' },
                { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
            ],
            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "pagingType": "bootstrap_full_number",

            'order': [[0, 'desc']]

        });

        $(".search_field").change(function (){
            table.ajax.reload();
        })

    });



</script>