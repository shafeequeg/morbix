<?php
$user_type=$this->session->userdata('user_type');
?>
<script>
    $(document).ready(function () {

        getclients();
        getprojecttypes();
        getsalesperson();
        getworkcategories();


        $("#uploaded_file").change(function (){
            if($(this).get(0).files.length === 1){
                $("#document_category").attr('required','required');
            }else{
                $("#document_category").removeAttr('required','required');
            }
        });
        $("#btn_file_remove").click(function (){
            $("#document_category").removeAttr('required','required');
        });

    })
//  Get Data to Client Select Box
    function getclients() {
        $('#client option:lt(-1)').remove(); //Remove all Options Except 1st
        $.post("<?php echo base_url().$user_type?>/clients/select", {}, function (data) {
            var obj = $.parseJSON(data);
            var i = 0;
            while (i < obj.id.length) {
                $("#client").append("<option value=" + obj.id[i] + ">" + obj.name[i] + "</option>");
                i++;
            }
        })
    }
// CONTACT PERSON

    $("#client").change(function(){

        var client=$('#client :selected').val();
        alert(client);
        $.post("<?php echo base_url().$user_type?>/clients/select_contact", {id:client}, function (data){
            var obj = $.parseJSON(data);
            var i = 0;
            while (i < obj.id.length) {
                $("#contactp").append("<option value=" + obj.id[i] + ">" + obj.name[i] + "</option>");
                i++;
            }

        })

    });


    //  Get Data to Sales Person Select Box
    function getsalesperson() {
        $('#sales_person option:lt(-1)').remove(); //Remove all Options Except 1st
        $.post("<?php echo base_url().$user_type ?>/sale_person/select", {}, function (data) {
            var obj = $.parseJSON(data);
            var i = 0;
            while (i < obj.id.length) {
                $("#sales_person").append("<option value=" + obj.id[i] + ">" + obj.name[i] + "</option>");
                i++;
            }
        })
    }
    //  Get Data to Project Type Select Box
    function getprojecttypes() {
        $('#project_type option:lt(-1)').remove(); //Remove all Options Except 1st
        $.post("<?php echo base_url().$user_type ?>/project_type/select", {}, function (data) {
            var obj = $.parseJSON(data);
            var i = 0;
            while (i < obj.id.length) {
                $("#project_type").append("<option value=" + obj.id[i] + ">" + obj.name[i] + "</option>");
                i++;
            }
        })
    }
    //  Get Data to Work Categories Select Box
    function getworkcategories() {
        $('#works').html('');
        $.post("<?php echo base_url().$user_type ?>/work_category/select", {}, function (data) {
            var obj = $.parseJSON(data);
            var i = 0;
            while (i < obj.id.length) {
                $("#works").append("<option value=" + obj.id[i] + ">" + obj.name[i] + "</option>");
                i++;
            }
        })
    }


//  Function To Insert Data to Sale Person and Work Categories
    function insert_data() {
        toastr.options = {
            closeButton: true,
            debug: false,
            positionClass: 'toast-top-center',
            onclick: null
        };

        var type=$("#data-type").val();
        var first_name= $("#data_name").val();
        //assign our rest of variables
        var url='';
        if(type=='btn-add-person'){
            url="<?php echo base_url() .$controller_directory ?>/sale_person/create/";

        }
        else if(type=='btn-add-work'){
            url="<?php echo base_url() .$controller_directory ?>/work_category/create/";
        }
        if(url!=''){
            $.ajax({
                type:"post",
                url: url,//URL changed
                data:{ name:first_name},
                success:function(data)
                {
                    getsalesperson();
                    getworkcategories();
//                        Toggle Modal and Show success Message
                    $("#data_add").modal('toggle');
                    $("#add_modal_form").trigger("reset");
                    toastr['success']("Data Added Successfully !", "Success");
                    success1.hide();
                    error1.hide();
                },
                error: function(jqXHR, textStatus, errorThrown)
                {
                    toastr["error"]("There has been Some Error Occurred. Please Try Again", "Error !");
                    success1.hide();
                    error1.hide();
                }

            });
        }
    }
//  Form Validation for Sales Person and Work Category Insertion
    toastr.options = {
        closeButton: true,
        debug: false,
        positionClass: 'toast-top-center',
        onclick: null
    };
    $(".data_add_button" ).click(function(){
        var btn_type=$(this).attr('id');
        $("#data-type").val(btn_type);
    });
    $("#btnadd_contact_person" ).click(function(){
        var client=$('#client :selected').val();
        $("#clnt_id").val(client);
        if(client=="Select Client"){
            toastr['error']("Please Select a Client !", "Select Client");
        }else{
            $("#data_add_contactp").modal('toggle');
            $("#data_add_contactp").val(client);
        }

    });


    /************************************************************************ CLIENT INSERT ******************************************************************************************************************/
//  Function to Insert Client Via Ajax
    function insert_client() {

        toastr.options = {
            closeButton: true,
            debug: false,
            positionClass: 'toast-top-center',
            onclick: null
        };


        var name= $("#name").val();
        var email= $("#email").val();
        var phone= $("#phone").val();
        var address= $("#address").val();
        var land= $("#land").val();
        var fax= $("#fax").val();
        //assign our rest of variables
        $.ajax({
            type:"post",
            url: "<?php echo base_url() .$controller_directory ?>/clients/create/",
            data:{name : name ,email : email,phone : phone ,address : address, land:land, fax : fax},
            success:function(data)
            {
                getclients();
//                  Toggle Modal and Show success Message
                $("#data_add_client").modal('toggle');
                $("#form_subscriber").trigger("reset");
                toastr['success']("Data Added Successfully !", "Success");
                success1.hide();
                error1.hide();
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                toastr["error"]("There has been Some Error Occurred. Please Try Again", "Error !");
                success1.hide();
                error1.hide();
            }

        });
    }


//    Function to Insert Contact Person Via Ajax
    function insert_contact_person() {

        toastr.options = {
            closeButton: true,
            debug: false,
            positionClass: 'toast-top-center',
            onclick: null
        };

        var client_id=$("#clnt_id").val();
        var name1= $("#name1").val();
        var phone1= $("#phone1").val();
        var email1= $("#email1").val();
        var land= $("#land1").val();
        var fax= $("#fax1").val();
        //assign our rest of variables
        $.ajax({
            type:"post",
            url: "<?php echo base_url() .$controller_directory ?>/clients/create_person/",
            data:{name : name1 ,phone : phone1 ,email : email1,land : land, fax : fax,cid : client_id},
            success:function(data)
            {
                getclients();
//                  Toggle Modal and Show success Message
                $("#data_add_contactp").modal('toggle');
                $("#form_subscriber").trigger("reset");
                toastr['success']("Data Added Successfully !", "Success");
                success1.hide();
                error1.hide();
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                toastr["error"]("There has been Some Error Occurred. Please Try Again", "Error !");
                success1.hide();
                error1.hide();
            }

        });
    }
</script>
<script>
//    Data Add Form
    var form1 = $('#add_modal_form');
    var error1 = $('.alert-danger', form1);
    var success1 = $('.alert-success', form1);
    form1.submit(function(e) {
        e.preventDefault();
    }).validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",  // validate all fields including form hidden input
        messages: {

        },

        rules: {
            name: {
                required: true
            }
        },

        invalidHandler: function (event, validator) { //display error alert on form submit
            success1.hide();
            error1.show();
            App.scrollTo(error1, -200);
        },
        errorPlacement: function (error, element) { // render error placement for each input type
            if (element.is(':radio')) {
                error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
            } else if (element.parent(".input-group").size() > 0) {
                error.insertAfter(element.parent(".input-group"));
            } else if (element.attr("data-error-container")) {
                error.appendTo(element.attr("data-error-container"));
            } else if (element.parents('.radio-list').size() > 0) {
                error.appendTo(element.parents('.radio-list').attr("data-error-container"));
            } else if (element.parents('.radio-inline').size() > 0) {
                error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
            } else if (element.parents('.checkbox-list').size() > 0) {
                error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
            } else if (element.parents('.checkbox-inline').size() > 0) {
                error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
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
            insert_data();

        }
    });
    $('.select2', form1).change(function () {
        form1.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
    });
</script>
<script>
    //    Client Add Form
    var form1 = $('#form_client');
    var error1 = $('.alert-danger', form1);
    var success1 = $('.alert-success', form1);
    form1.submit(function(e) {
        e.preventDefault();
    }).validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",  // validate all fields including form hidden input
        messages: {

        },

        rules: {
            name: {
                required: true
            }
        },

        invalidHandler: function (event, validator) { //display error alert on form submit
            success1.hide();
            error1.show();
            App.scrollTo(error1, -200);
        },
        errorPlacement: function (error, element) { // render error placement for each input type
            if (element.is(':radio')) {
                error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
            } else if (element.parent(".input-group").size() > 0) {
                error.insertAfter(element.parent(".input-group"));
            } else if (element.attr("data-error-container")) {
                error.appendTo(element.attr("data-error-container"));
            } else if (element.parents('.radio-list').size() > 0) {
                error.appendTo(element.parents('.radio-list').attr("data-error-container"));
            } else if (element.parents('.radio-inline').size() > 0) {
                error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
            } else if (element.parents('.checkbox-list').size() > 0) {
                error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
            } else if (element.parents('.checkbox-inline').size() > 0) {
                error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
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
            insert_client();

        }
    });
    $('.select2', form1).change(function () {
        form1.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
    });





</script>

<script>
    //    Contact Person Add Form
    var form1 = $('#form_contact');
    var error1 = $('.alert-danger', form1);
    var success1 = $('.alert-success', form1);
    form1.submit(function(e) {
        e.preventDefault();
    }).validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",  // validate all fields including form hidden input
        messages: {

        },

        rules: {
            name: {
                required: true
            }
        },

        invalidHandler: function (event, validator) { //display error alert on form submit
            success1.hide();
            error1.show();
            App.scrollTo(error1, -200);
        },
        errorPlacement: function (error, element) { // render error placement for each input type
            if (element.is(':radio')) {
                error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
            } else if (element.parent(".input-group").size() > 0) {
                error.insertAfter(element.parent(".input-group"));
            } else if (element.attr("data-error-container")) {
                error.appendTo(element.attr("data-error-container"));
            } else if (element.parents('.radio-list').size() > 0) {
                error.appendTo(element.parents('.radio-list').attr("data-error-container"));
            } else if (element.parents('.radio-inline').size() > 0) {
                error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
            } else if (element.parents('.checkbox-list').size() > 0) {
                error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
            } else if (element.parents('.checkbox-inline').size() > 0) {
                error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
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
            insert_contact_person();

        }
    });
    $('.select2', form1).change(function () {
        form1.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
    });





</script>