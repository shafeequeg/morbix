<script>
    $('input[type=radio][name=boq_type]').change(function() {
        if (this.value == 'job_brief') {
            $("#job_brief_div").show();
            $("#scratch_div").hide();
            $("#form-actions").hide();
            $(".scratch_div_elements").removeAttr('required','required');
            $("#job_brief").attr('required','required');
            $("#creation_type").val('job_brief');
        }
        else if (this.value == 'scratch') {
            $("#job_brief_div").hide();
            $("#scratch_div").show();
            $("#form-actions").show();
            $(".scratch_div_elements").attr('required','required');
            $("#job_brief").removeAttr('required','required');
            $("#creation_type").val('scratch');
        }
    });

    $("#job_brief").change(function () {
        toastr.options = {
            closeButton: true,
            debug: false,
            positionClass: 'toast-top-center',
            onclick: null
        };
        var project_id = $('#job_brief :selected').val();
        $('#project_info').html('');
        $.post("<?php echo base_url().$controller_directory ?>/job_brief/job_brief_info", {project_id: project_id}, function (data) {
            var obj = $.parseJSON(data);
            if (obj.data_count[0] == 1 ) {
                var approval_status="";
                var action_by="";
//              Checking Master Admin's Approval
                if(obj.approval_status[0]==1){
                    approval_status='<span class="label label-sm label-success"> Approved </span>';
                    action_by='<td class="highlight" ><div class="warning"></div><strong>&nbsp;&nbsp;Approved By</strong></td><td>'+obj.approved_by[0]+'</td></tr><tr>'
                }
                else if(obj.approval_status[0]==0){
                    approval_status='<span class="label label-sm label-warning"> Pending </span>';
                    toastr["warning"]("Sorry . Approval From Management is on Pending", "Not Approved")
                }
                else if(obj.approval_status[0]==2){
                    approval_status='<span class="label label-sm label-success"> Rejected </span>';
                    action_by='<td class="highlight" ><div class="warning"></div><strong>&nbsp;&nbsp;Rejected By</strong></td><td>'+obj.approved_by[0]+'</td></tr><tr>'
                    toastr["error"]("Sorry . Job Brief is Rejected by Management ", "Not Approved");
                }

//              Checking Boq already Created or not
                var boq_status="";
                if(obj.boq_status[0]>0){
                    boq_status='<tr class="pulsate-regular"><td class="highlight" ><div class="info"></div><strong>&nbsp;&nbsp;BOQ Status</strong></td>'+
                        '<td><span class="label label-sm label-primary"> BOQ Generated </span></td></tr>';
                    toastr["error"]("Sorry . BOQ Associated with this Project Already Generated", "BOQ Exists");
                }else{
                    boq_status='<tr class="pulsate-regular"><td class="highlight" ><div class="info"></div><strong>&nbsp;&nbsp;BOQ Status</strong></td>'+
                        '<td><span class="label label-sm label-danger"> BOQ Not Generated </span></td></tr>';
                }

                var content='<div class=""><table class="table table-striped table-bordered table-advance table-hover">'+
                    '<thead></thead><tbody><tr>'+
                    '<td class="highlight" style="text-align: center" colspan="2" ><div class="success"></div><strong>Job Brief Info</strong></td>'+
                    '<td style="display: none"></td>'+
                    '</tr><tr>'+
                    '<td class="highlight" width="30%" ><div class="success"></div><strong>&nbsp;&nbsp;Project Name</strong></td>'+
                    '<td>'+obj.project_name[0]+'</td>'+
                    '</tr><tr>'+
                    '<td class="highlight" ><div class="success"></div><strong>&nbsp;&nbsp;Project Sl No</strong></td>'+
                    '<td>'+obj.sl_no[0]+'</td>'+
                    '</tr><tr>'+
                    '<td class="highlight" ><div class="danger"></div><strong>&nbsp;&nbsp;Client</strong></td>'+
                    '<td>'+obj.client_name[0]+'</td>'+
                    '</tr><tr>'+
                    '<td class="highlight" ><div class="info"></div><strong>&nbsp;&nbsp;Created On</strong></td>'+
                    '<td>'+obj.created_date[0]+'</td>'+
                    '</tr><tr>'+
                    '<td class="highlight" ><div class="warning"></div><strong>&nbsp;&nbsp;Created By</strong></td>'+
                    '<td>'+obj.created_by[0]+'</td>'+
                    '</tr><tr>'+
                    '<td class="highlight" ><div class="info"></div><strong>&nbsp;&nbsp;Approval Status</strong></td>'+
                    '<td>'+approval_status+'</td>'+
                    '</tr><tr>'+action_by+
                    '<td class="highlight" ><div class="danger"></div><strong>&nbsp;&nbsp;Job Description</strong></td>'+
                    '<td>'+obj.job_desc[0]+'</td>'+
                    '</tr><tr>'+
                    '<td class="highlight" ><div class="success"></div><strong>&nbsp;&nbsp;Works</strong></td>'+
                    '<td>'+obj.works[0]+'</td>'+
                    '</tr>'+boq_status+
                    '</tbody></table></div>';

                $("#project_info").append(content);
                if (jQuery().pulsate) {
                    jQuery('.pulsate-regular').pulsate({
                        color: "#bf1c56"
                    });
                }
                if(obj.approval_status[0]==1 && obj.boq_status[0]==0 ){
                    $("#form-actions").show();
                }
            }
            else{
                push_notif("error","Sorry . There Has been Some Error. Please Select another Option",false);
            }
        })
    })
</script>