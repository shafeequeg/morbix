<script src="<?php echo base_url()?>template/assets/global/plugins/switchery/dist/switchery.js"></script>
<script>
    if (jQuery().pulsate) {
        jQuery('.pulsate-regular').pulsate({
            color: "#bf1c56"
        });
    }
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
        percent: <?php echo $jobcard->progress?>,
        textSize: 20,
        textStyle: 'font-size: 20px;',
        foregroundBorderWidth: 35,
        backgroundBorderWidth: 35,
    });

    $('.date-picker').datepicker({
        rtl: App.isRTL(),
        orientation: "left",
        autoclose: true
    });
    if (jQuery().pulsate) {
        jQuery('.pulsate-regular').pulsate({
            color: "#bf1c56"
        });
    }
    toastr.options = {
        closeButton: true,
        debug: false,
        positionClass: 'toast-top-center',
        onclick: null
    };
    //    default
    $(".all_menu_div").hide();
    $("#overview_div").show();

    $(".all_menu").removeClass('active');
    $("#overview_menu").addClass('active');

    $("#overview_btn").click(function(){

        $(".all_menu_div").hide();
        $("#overview_div").show();

        $(".all_menu").removeClass('active');
        $("#overview_menu").addClass('active');
    })
    $("#timeline_btn").click(function(){

        $(".all_menu_div").hide();
        $("#timeline_div").show();

        $(".all_menu").removeClass('active');
        $("#timeline_menu").addClass('active');
    })
    $("#purchase_btn").click(function(){

        $(".all_menu_div").hide();
        $("#purchase_div").show();

        $(".all_menu").removeClass('active');
        $("#purchase_menu").addClass('active');
    })
    $("#expense_btn").click(function(){


        $(".all_menu_div").hide();
        $("#expense_div").show();

        $(".all_menu").removeClass('active');
        $("#expense_menu").addClass('active');

    })
    $("#notes_btn").click(function(){

        $(".all_menu_div").hide();
        $("#notes_div").show();

        $(".all_menu").removeClass('active');
        $("#notes_menu").addClass('active');
    })
    $("#images_btn").click(function(){

        $(".all_menu_div").hide();
        $("#images_div").show();

        $(".all_menu").removeClass('active');
        $("#images_menu").addClass('active');

        $("#js-grid-juicy-projects").cubeportfolio('destroy');
        image_gallery();
    })
    $("#attendance_btn").click(function(){

        $(".all_menu_div").hide();
        $("#attendance_div").show();

        $(".all_menu").removeClass('active');
        $("#attendance_menu").addClass('active');
    })
</script>
<script src="<?php echo base_url()?>template/assets/global/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
<script>

    var FormDropzone = function () {


        return {
            //main function to initiate the module
            init: function () {

                Dropzone.options.myDropzone = {
                    dictDefaultMessage: "Drop Images here or click to upload",
//                    maxFiles: 8,
                    paramName: "file",
//                    maxFilesize: 1, //mb
                    acceptedFiles: "image/*",
                    init: function() {
                        this.on("addedfile", function(file) {
                            // Create the remove button
                            var removeButton = Dropzone.createElement("<a href='javascript:;'' class='btn red btn-sm btn-block'>Remove</a>");

                            // Capture the Dropzone instance as closure.
                            var _this = this;

                            // Listen to the click event
                            removeButton.addEventListener("click", function(e) {
                                // Make sure the button click doesn't submit the form:
                                e.preventDefault();
                                e.stopPropagation();

                                // Remove the file preview.
                                _this.removeFile(file);
                                // If you want to the delete the file on the server as well,
                                // you can do the AJAX request here.
                            });

                            // Add the button to the file preview element.
                            file.previewElement.appendChild(removeButton);
                        });
                        this.on("sending", function (file, xhr, formData) {
                            App.blockUI({
                                target: '#btn_submit',
                                boxed: true
                            });
                            $("#btn_submit").attr('disabled','disabled');
                        });

                        this.on("maxfilesexceeded", function(file){
                            notif({
                                type: "warning",
                                msg: "Sorry . Maximum 8 Images are Allowed",
                                position: "center",
                                width: 500,
                                height: 60,
                                top: 200,
                                autohide: false
                            });
                        });
                        this.on("error", function(file, message) {
                            notif({
                                type: "error",
                                msg: message,
                                position: "center",
                                width: 500,
                                height: 60,
                                top: 200,
                                autohide: false
                            });
                            this.removeFile(file);
                            $("#btn_submit").removeAttr('disabled','disabled');
                        });
                        this.on('success', function(file, response) {
                            var obj= $.parseJSON(response);
                            // Create a hidden input to submit to the server:
                            $("#form_sample_1").append($('<input type="hidden"' +
                                'name="images[]"' +
                                'value="' + obj.filename + '">'));
                            $("#btn_submit").removeAttr('disabled','disabled');
                        });
                    }

                }

            }
        };
    }();

    jQuery(document).ready(function() {
        FormDropzone.init();
    });
</script>
<script>
    $('input[type="range"]').rangeslider({
        polyfill: false,
        slide: updaterange,
        change: updaterange
    });
    $(".rangeslider__fill").css( "background-color", '#FF0' );
    $("#range_button").css( "background-color", '#FF0' );

    function updaterange(val) {
        var coloredSlider = val,
            myColor = getTheColor( coloredSlider );

        $( ".rangeslider__fill" ).css( "background-color", myColor );
        $( "#range_button" ).css( "background-color", myColor );
        $( "#range_button" ).text(val+" %");
        $( "#progress" ).val(val);

    }
    function getTheColor( colorVal ) {
        var theColor = "";
        if ( colorVal < 50 ) {
            myRed = 255;
            myGreen = parseInt( ( ( colorVal * 2 ) * 255 ) / 100 );
        }
        else 	{
            myRed = parseInt( ( ( 100 - colorVal ) * 2 ) * 255 / 100 );
            myGreen = 255;
        }
        theColor = "rgb(" + myRed + "," + myGreen + ",0)";
        return( theColor );
    }
    updaterange(<?php echo $jobcard->progress?>);
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

<!--/****************************************** Edit Functions ******************************************/-->
<script>
    $('body').on('click', '#expense_edit', function() {
        var no = $(this).closest('tr').children('td');
        $('#edexdate').val(no.eq(1).text());
        var v=no.eq(3).text().trim();
        $('#edexppass_type').val(v);
        $('#edexppass_type').trigger("change");
        $('#edexnet_profit').val(no.eq(6).text());
        $('#edexremarks').val(no.eq(5).text());
        $('#prime').val(no.eq(7).text());

    })


    $('body').on('click', '#btn_editpur', function() {
        var no = $(this).closest('tr').children('td');
        $('#editpurchase').val(no.eq(2).text());
        var v=no.eq(1).text().trim();
        $('#editmaterial').val(v);
        $('#editmaterial').trigger("change");
        $('#editquantity').val(no.eq(4).text());
        $('#editpramt').val(no.eq(5).text());
        $('#editprnote').val(no.eq(6).text());
        $('#primepurch').val(no.eq(7).text());

    })

    $('body').on('click', '#btn_editnote', function() {
        var no = $(this).closest('tr').children('td');

        $('#editrdate').val(no.eq(2).text());
        $('#editremarks').val(no.eq(1).text());
        $('#primenote').val(no.eq(3).text());


    })
</script>
<!-- Responsive Tables-->
<script>
    var table = $('.table');
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
<!-- Image Gallery-->
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
<!-- Labour Attendance-->
<script>
    $("#updateattendance").click(function () {
        var limit=$("#attendance_add_table_body1 tr").length;
        if(limit==0){
            toastr["error"]("Labour List Not Submitted. Please Click Go Button to Get Labour List", "Error!");
        }else{
            var i;
            for(i=0;i<limit;i++){
                attendance=$("#checkbox"+i+"").prop("checked") ? 1 : 0;
                attid=$("#atten"+i+"").text();
                $.post("<?php echo base_url().$controller_directory; ?>/job_cards/project_labour_attendance_updatedata",{attid:attid,attendance:attendance},function (data) {

                })
            }
            toastr["success"]("Attendance Register Added Successfully", "Register Updated!");
            $('#edit_attendance').modal('toggle');
            $("#attendance_add_table_body1").html('');
        }

    })

    $("#submitattendance").click(function () {
        var jobid="<?php echo $jobid;?>";
        var addedby="<?php echo $this->session->userdata('login_id');?>";
        var date=$("#attendance_date").val();
        var limit=$("#attendance_add_table_body tr").length;
        if(limit==0){
            toastr["error"]("Labour List Not Submitted. Please Click Go Button to Get Labour List", "Error!");
        }else{
            var labourid;
            var attendance;

            var i;
            for(i=0;i<limit;i++){
                labourid=$("#labour"+i+"").text();
                attendance=$("#checkbox"+i+"").prop("checked") ? 1 : 0;
                $.post("<?php echo base_url().$controller_directory ?>/job_cards/project_labour_attendance",{date:date,jobid:jobid,labourid:labourid,addedby:addedby,attendance:attendance},function (data) {

                })
            }
            toastr["success"]("Attendance Register Updated Successfully", "Register Updated!");
            $('#add_attendance').modal('toggle');
            $("#attendance_add_table_body").html('');
        }

    })

    $("#btn_attendance_go").click(function () {
        var flag12;
        var date=$("#attendance_date").val();
        var workcategory="<?php echo $jobcard->wcat_id?>";
        $("#attendance_add_table_body").html('');
        $("#attendance_table").dataTable().fnDestroy();
        if(date!=''){
//          Check Attendance Already Entered or Not
            $.post("<?php echo base_url().$controller_directory ?>/job_cards/validate_date",{date:date},function (data) {
                if(data==0){
//                  Select All Labours in this Work Category
                    $.post("<?php echo base_url().$controller_directory ?>/labours/select",{work_cat_id:workcategory},function (data) {
                        var obj=$.parseJSON(data);
                        if(obj.count>0){
                            var content="";
                            for (var i=0;i<obj.count;i++){

                                content+='<tr><td style="display: none" id="labour'+i+'">'+obj.id[i]+'</td><td><input id="checkbox'+i+'" name="checkbox'+i+'" checked class="js-switch" type="checkbox" /></td><td>'+obj.name[i]+'</td><td>'+obj.civil_id[i]+'</td></tr>';
                            }


                            $("#attendance_add_table_body").append(content);
                            $("#attendance_add_div").show();
                            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

                            elems.forEach(function(html) {
                                var switchery = new Switchery(html, {  secondaryColor: '#fc0030'});
                            });
                        }else{
                            $("#attendance_add_div").hide();
                            toastr["error"]("No Labours Found on Your Department! Please Add Labours to Proceed", "No Labours Found");
                        }
                    })
                }else{
                    toastr["error"]("Selected Date's Attendance already Taken", "Data Exists!!");
                }
            })
        }else{
            toastr["error"]("Please Select a Date !", "Select Date");
        }
    })

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
                        $('body').on('click', '#editattendance', function() {
                            switchery.enable();
                            $("#editattendance").hide();
                            $("#updateattendance").show();

                        })
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
    $('#task').change(function(){
        var task=$('#task :selected').val();
        $.post("<?php echo base_url().$controller_directory; ?>/job_cards/task_description",{task:task},function (data) {
            var obj=$.parseJSON(data);

            $('#task_desc_add').text(obj.desc);
            $("#task_desc_add").show();
            $('#task_unit_add').text(obj.unit1);
        })
    });
    $('#task_edit').change(function(){
        var task=$('#task_edit :selected').val();
        $.post("<?php echo base_url().$controller_directory; ?>/job_cards/task_description",{task:task},function (data) {
            var obj=$.parseJSON(data);

            $('#task_desc_edit').text(obj.desc);
            $("#task_desc_edit").show();
            $('#task_unit_edit').text(obj.unit1);
        })
    });
</script>