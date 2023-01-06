<style>
    #chat-container .user-status {
        display: inline-block;
        background: #575d67;
        margin-right: 5px;
        width: 8px;
        height: 8px;
        -webkit-background-clip: padding-box;
        background-clip: padding-box;
        -webkit-border-radius: 8 !important;
        -moz-border-radius: 8px !important;
        border-radius: 8px !important;
    }
    #chat-container .user-status.is-online {
        background-color: #06b53c;
    }
    #chat-container .user-status.is-busy {
        background-color: #ee4749;
    }
    #chat-container .user-status.is-idle {
        background-color: #f7d227;
    }
    #chat-container .user-status.is-offline {
        background-color: #666666;
    }
    #load-more-wrap{
        list-style: none;
    }
    .page-quick-sidebar-wrapper .page-quick-sidebar .nav-tabs > li > a > .badge {
        position: absolute;
        top: 52px;
        right: 35%;
    }
</style>
<div class="page-quick-sidebar-wrapper"  data-close-on-body-click="false">
    <div class="page-quick-sidebar" >
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Chats
                    <span class="badge badge-success" id="total_new_message"><?php echo $total_unread?></span>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                    <h3 class="list-heading">Concept Crews</h3>
                    <div style="padding-right: 10px;padding-left: 10px"><input id="chat-search" style="background-color: #364150;" type="text" class="form-control dark" placeholder="Search..."></div>
                    <ul class="media-list list-items" id="chat-user-container">

                    </ul>
                </div>
                <div class="page-quick-sidebar-item" id="chat-box">
                    <div class="page-quick-sidebar-chat-user">
                        <div class="page-quick-sidebar-nav">
                            <a href="javascript:;" class="page-quick-sidebar-back-to-list">
                                <i class="icon-arrow-left"></i>Back</a>
                        </div>
                        <input type="hidden" name="chat_buddy_id" id="chat_buddy_id"/>
                        <div class="chat-body page-quick-sidebar-chat-user-messages" style="margin-top: 20px">

                        </div>
                        <div class="page-quick-sidebar-chat-user-form">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Type Your message here...">
                                <div class="input-group-btn">
                                    <button type="button" class="btn green">
                                        <i class="icon-paper-clip"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="<?php echo base_url()?>template/assets/layouts/global/scripts/quick-sidebar.js" type="text/javascript"></script>
            </div>
        </div>
    </div>
</div>