$(document).ready(function(){
/*----------------------------------------------------------------------
| Initiating the chat window with the appropriate HTML
------------------------------------------------------------------------*/

var chat_init = function(){
    $("#chat-container").load(base + "chat/users");
}
var user_list = function(){
    $("#chat-user-container").html("");
    $.post(base+"chat/load_users",{},function (data) {
        var obj=$.parseJSON(data);
        $("#chat-user-container").append(obj.user_list);
    })
}

chat_init();
user_list();

///***************** Search User  ***************////////////////
$(document).on('keyup', '#chat-search', function() {
    var keyword=$(this).val();
    $("#chat-user-container").html("");
    $.post(base+"chat/load_users/search",{keyword:keyword},function (data) {
        var obj=$.parseJSON(data);
        $("#chat-user-container").append(obj.user_list);
    })
});

/*----------------------------------------------------------------------
| change status Function
------------------------------------------------------------------------*/
$(document).on('click', '.status-btn-group', function() {
    $(this).find('.btn').toggleClass('active');
    if ($(this).find('.btn-success').size()>0) {
        $(this).find('.btn').toggleClass('btn-success');
        $.ajax({ url: base  + "chat/toggle_status" ,
            success: function(response){
                if(response.status == 1){
                    $('#current_status').html('Online');
                    $('#current_status').removeClass('btn-danger').addClass('btn-success');
                }
                else{
                    $('#current_status').html('Offline');
                    $('#current_status').removeClass('btn-success').addClass('btn-danger');
                }
        }});
    }
    $(this).find('.btn').toggleClass('btn-default');
});


 $(document).on('click', '.dropdown-menu', function(e) {
    e.stopPropagation();
});

/*----------------------------------------------------------------------
| Show Pop overs
------------------------------------------------------------------------*/
   var popOverSettings = {
        container: 'body',
        trigger:'hover',
        selector: '[data-toggle="popover"]',
        placement: 'left',
        html: true,
        content: function () {
            return $('#popover-content').html();
        }
    }

   $(document).on("mouseenter",'[data-toggle="popover"]',function(){
       $('.popover').popover('hide');
      image  = $(this).find('.profile-img').html();
      name   = $(this).find('.user-name').html();
      status = $(this).find('.user_status').html();
      $('#contact-image').empty().html(image);
      $('#contact-user-name').empty().html(name);
      $('#contact-user-status').empty().html(status);

      $(this).popover({
        placement:'left',
        trigger: 'hover',
        container: 'body',
        selector: '[data-toggle="popover"]',
        html: true,
        content: function () {
            return $('#popover-content').html();
        }
      }).popover('show');

    }).on('mouseleave', '[data-toggle="popover"]', function() {
        $(this).popover('hide');
    });
});


/*----------------------------------------------------------------------
| Function to display error messages
------------------------------------------------------------------------*/
function error(message){
    var alert = '<div style="font-size:12px; margin-top:10px;" class="alert alert-danger alert-dismissable">\
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>\
                <strong>Error ! </strong> ' + message + ' </div>';
    return alert;
}

/*----------------------------------------------------------------------
| Function to display success messages
------------------------------------------------------------------------*/

function success(message){
    var alert = '<div style="font-size:12px; margin-top:10px;" class="alert alert-success alert-dismissable">\
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>\
                <strong>Success ! </strong> ' + message + ' </div>';
    return alert;
}
/*----------------------------------------------------------------------
| Function to highlight incorrect fields
------------------------------------------------------------------------*/
function highlightFields(message){
    $('.form-group').removeClass('has-error');
    $('.error').remove();
    for (var key in message) {
        $('input[name="'+ key+'"]' ).parent().addClass('has-error');
        $('input[name="'+ key+'"]').after('<span class="error">' +message[key]+ '</span>');
    }
}


