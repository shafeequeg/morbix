/*
|-------------------------------------------------------------------------
| Copyright (c) 2013 
| This script may be used for non-commercial purposes only. For any
| commercial purposes, please contact the author at sammkaranja@gmail.com
|-------------------------------------------------------------------------
*/

/*
|-------------------------------------------------------------------------
| Funtion to trigger the refresh event
|-------------------------------------------------------------------------
*/
bootChat();
//Chat with user in classified Profile Page
$(document).on('click', '#chat-with-user', function(){
    $('#chat-container').toggle('slide', {
        direction: 'right'
    }, 500);
    // $("#chat-container").load(base + "chat/users");
    $(this).popover('hide');
    $('ul.chat-box-body').empty();
    user = $(this).find('input[name="user_id"]').val();
    $(this).find('span[rel="'+user+'"]').text('');

    load_thread(user);

    var offset = $(this).offset();
    var h_main = $('#chat-container').height();
    var h_title = $("#chat-box > .chat-box-header").height();
    var top = ($('#chat-box').is(':visible') ? (offset.top - h_title - 40) : (offset.top + h_title - 20));
    if((top + $('#chat-box').height()) > h_main){ top = h_main -  $('#chat-box').height();}
    $('#chat-box').css({'top': top});
    if(!$('#chat-box').is(':visible')){
        $('#chat-box').toggle('slide',{
            direction: 'right'
        }, 500);
    }
    if($(window).width() <= 640){
        $('.chat-body').slimScroll({ height: '180px' });
    }else{
        $('.chat-body').slimScroll({ height: '300px' });
    }

    // FOCUS INPUT TExT WHEN CLICK
    $("#chat-box .chat-textarea input").focus();
})

/*----------------------------------------------------------------------
| Function to display individual chatbox
------------------------------------------------------------------------*/
$(document).on('click', '.chat-user', function(){

        $('ul.chat-box-body').empty();
        user = $(this).find('input[name="user_id"]').val();
        $(this).find('span[rel="'+user+'"]').text('');

        load_thread(user);

        // var offset = $(this).offset();
        // var h_main = $('#chat-container').height();
        // var h_title = $("#chat-box > .chat-box-header").height();
        // var top = ($('#chat-box').is(':visible') ? (offset.top - h_title - 40) : (offset.top + h_title - 20));
        // if((top + $('#chat-box').height()) > h_main){ top = h_main -  $('#chat-box').height();}
        // $('#chat-box').css({'top': top});
        // if(!$('#chat-box').is(':visible')){
        //     $('#chat-box').toggle('slide',{
        //         direction: 'right'
        //     }, 500);
        // }
        // if($(window).width() <= 640){
        //     $('.chat-box-body').slimScroll({ height: '180px' });
        // }else{
        //     $('.chat-box-body').slimScroll({ height: '300px' });
        // }

        // FOCUS INPUT TExT WHEN CLICK
        $("#chat-box .page-quick-sidebar-chat-user-form input").focus();
});
/*----------------------------------------------------------------------
| Function to send message
------------------------------------------------------------------------*/
$(document).on('keypress', '.page-quick-sidebar-chat-user-form input', function(e){
        var txtarea = $(this);
        var message = txtarea.val();
        if(message !== "" && e.which == 13){
            txtarea.val('');
            // save the message 
            $.ajax({ type: "POST", url: base  + "chat/save_message", data: {message: message, user : user},cache: false,
                success: function(response){
                    msg = response.message;
                    li='<div class="bubble post '+ msg.type +'">\
                            <img class="avatar" alt="" src="'+msg.avatar+'" />\
                            <div class="message">\
                                <span class="arrow"></span>\
                                <a href="javascript:;" class="name">'+msg.name+'</a>\
                                <span class="datetime">at '+msg.time+'</span>\
                                <span class="body">'+msg.body+'</span>\
                            </div>\
                        </div>';

                    $('.chat-body').append(li);

                    $('.chat-body').animate({scrollTop: $('.chat-body').prop("scrollHeight")}, 500);
                }
            });
        }
});

/*----------------------------------------------------------------------------------------------------
| Function to load messages
-------------------------------------------------------------------------------------------------------*/
function bootChat()
{
    refresh = setInterval(function () {

            $.ajax(
                {
                    type: 'GET',
                    url: base + "chat/updates/",
                    async: true,
                    cache: false,
                    success: function (data) {
                        if (data.success) {
                            new_msg_count=data.new_msg_count;
                            thread = data.messages;
                            senders = data.senders;
                            $("#total_new_message").text(new_msg_count);
                            $("#new_message_count").text(new_msg_count);
                            $.each(thread, function () {
                                if ($("#quick_sidebar_tab_1").hasClass("page-quick-sidebar-content-item-shown")) {
                                    chatbuddy = $("#chat_buddy_id").val();
                                    if (this.sender == chatbuddy) {
                                        li='<div class="post '+ this.type +'">\
                                                <img class="avatar" alt="" src="'+this.avatar+'" />\
                                                <div class="message">\
                                                    <span class="arrow"></span>\
                                                    <a href="javascript:;" class="name">'+this.name+'</a>\
                                                    <span class="datetime">at '+this.time+'</span>\
                                                    <span class="body">'+this.body+'</span>\
                                                </div>\
                                            </div>';
                                        $('.chat-body').append(li);
                                        $('.chat-body').animate({scrollTop: $('.chat-body').prop("scrollHeight")}, 500);
                                        //Mark this message as read
                                        $.ajax({type: "POST", url: base + "chat/mark_read", data: {id: this.msg}});
                                    }
                                    else {
                                        from = this.sender;
                                        $.each(senders, function () {
                                            if (this.user == from) {
                                                $(".chat-user").find('span[rel="' + from + '"]').text(this.count);
                                            }
                                        });
                                    }
                                }
                                else {
                                    from = this.sender;
                                    $.each(senders, function () {
                                        if (this.user == from) {
                                            $(".chat-user").find('span[rel="' + from + '"]').text(this.count);
                                        }
                                    });

                                }
                            });

                            // var audio = new Audio(base + 'template/assets/pages/scripts/chat/notify.mp3').play();
                        }
                    },
                    error: function (XMLHttpRequest, textstatus, error) {
                        console.log(error);
                    }
                }
            );



        }, 4000);
}

/*----------------------------------------------------------------------
| Function to load threaded messages or user conversation
------------------------------------------------------------------------*/
var limit = 1;
function load_thread(user, limit){
        //send an ajax request to get the user conversation 
       $.ajax({ type: "POST", url: base  + "chat/messages", data: {user : user, limit:limit },cache: false,
        success: function(response){
        if(response.success){
            buddy = response.buddy;
            status = buddy.status == 1 ? 'Online' : 'Offline';
            statusClass = buddy.status == 1 ? 'user-status is-online' : 'user-status is-offline';

            $('#chat_buddy_id').val(buddy.id);
            $('.display-name', '#chat-box').html(buddy.name);
            $('#chat-box > .chat-box-header > small').html(status);
            $('#chat-box > .chat-box-header > span.user-status').removeClass().addClass(statusClass);

            $('.chat-body').html('');
            if(buddy.more){
             $('.chat-body').append('<li id="load-more-wrap" style="text-align:center"><a onclick="javascript: load_thread(\''+buddy.id+'\', \''+buddy.limit+'\')" class="btn btn-xs btn-info" style="width:100%">View older messages('+buddy.remaining+')</a></li>');
            }
 

                thread = response.thread;
                $.each(thread, function() {
                    li='<div class="post '+ this.type +'">\
                            <img class="avatar" alt="" src="'+this.avatar+'" />\
                            <div class="message">\
                                <span class="arrow"></span>\
                                <a href="javascript:;" class="name">'+this.name+'</a>\
                                <span class="datetime">at '+this.time+'</span>\
                                <span class="body">'+this.body+'</span>\
                            </div>\
                        </div>';

                    $('.chat-body').append(li);
                });
                if(buddy.scroll){
                    $('.chat-body').animate({scrollTop: $('.chat-body').prop("scrollHeight")}, 500);
                }
                
            }
        }});
}


/*
|----------------------------------------------------------------------------
| End of file
|----------------------------------------------------------------------------
*/

