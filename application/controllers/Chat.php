<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat extends CI_Controller {
//	protected $smiley_url = 'assets/images/smileys';
	function __construct()
	{
		parent::__construct();
		$this->load->model('Chat_model', 'chat');
        $this->load->model('User_model','User');
        ini_set('max_execution_time', 5000);
        ini_set("memory_limit", "-1");
        date_default_timezone_set('Asia/Kolkata');
//		$this->load->helper('smiley');
	}

	public function index()
	{
		$this->load->view('chat');
	}
    public function users()
    {
        $id = $this->session->userdata('login_id');
        $data['total_unread']=$this->chat->total_unread($id);
        $data['cur_user'] = $this->chat->get_user($id);
        $contacts 	  = $this->chat->get_all_users();
        foreach ($contacts as $key=>$contact) {
            //get unread messages from this user
            $unread = $this->chat->unread_per_user($id, $contact->user_id);
            $contacts[$key]->unread =  $unread > 0 ? $unread : null ;
        }
        $data['users'] = $contacts;
        $this->load->view('includes/Chat_form', $data);
    }

    public function load_users($param1=''){

	    $user_list='';
        $id = $this->session->userdata('login_id');
        $cur_user = $this->chat->get_user($id);
        if($param1=='search'){
            $keyword=$_POST['keyword'];
            $contacts 	  = $this->chat->search_all_users($keyword);
        }else{
            $contacts 	  = $this->chat->get_all_users();
        }
        foreach ($contacts as $key=>$contact) {
            //get unread messages from this user
            $unread = $this->chat->unread_per_user($id, $contact->user_id);
            $contacts[$key]->unread =  $unread > 0 ? $unread : null ;
        }
        $users=$contacts;
        foreach ($users as $user) {
            if($user->user_id != $cur_user->user_id ) {
                $role = $user->role;
                if ($role == 'admin') {$user_role = 'Admin';}
                elseif ($role == 'godown') {$user_role = 'Godown';}
                elseif ($role == 'sales') {$user_role = 'Sales';}
               
                $status = $user->online_status == 1 ? 'is-online' : 'is-offline';
                $user_list.='<li class="media chat-user">'.
                                '<input type="hidden" value="'.$user->user_id.'" name="user_id" />'.
                                '<div class="media-status">'.
                                    '<span class="user-status '.$status.'"></span>'.
                                '</div>'.
                                '<img class="media-object" src="'.$user->photo.'" alt="">'.
                                '<div class="media-body">'.
                                    '<h4 class="media-heading">'.ucwords($user->name).''.
                                        '&nbsp;<span class="badge progress-bar-danger" rel="'.$user->user_id.'">'. $user->unread.'</span>'.
                                    '</h4>'.
                                    '<div class="media-heading-sub"> '.$user_role.'</div>'.
                                '</div>'.
                            '</li>';
            }
        }
        echo json_encode( array("user_list"=>$user_list) );
    }

    public function toggle_status(){
        $id 	= $this->session->userdata('login_id');
        $user 	= $this->chat->get_user($id);
        $status = $user->online_status == '0' ? '1' : '0';
        $data['user_id']=$id;
        $data['online_status']=$status;
        $this->User->update_user($data);

        $response = array('success' => true, 'status'=> $status);
        //add the header here
        header('Content-Type: application/json');
        echo json_encode( $response );
    }

    public function messages(){
		//get paginated messages 
		$per_page = 5;
		$user 		= $this->session->userdata('login_id');
		$buddy 		= $this->input->post('user');
		$limit 		= isset($_POST['limit']) ? $this->input->post('limit') : $per_page ;

		$messages 	= array_reverse($this->chat->message_conversation($user, $buddy, $limit));
		$total 		= $this->chat->message_thread_len($user, $buddy);

		$thread = array();
		foreach ($messages as $message) {
			$owner = $this->chat->get_user($message->from);
			$chat = array(
				'msg' 		=> $message->id,
				'sender' 	=> $message->from, 
				'recipient' => $message->to,
				'avatar' 	=> $owner->photo,
				'body' 		=> $message->message,
				'time' 		=> date("M j, Y, g:i a", strtotime($message->time)),
				'type'		=> $message->from == $user ? 'out' : 'in',
				'name'		=> $message->from == $user ? 'You' : ucwords($owner->name)
				);
			array_push($thread, $chat);
		}

		$chatbuddy = $this->chat->get_user($buddy);

		$contact = array(
			'name'=>ucwords($chatbuddy->name),
			'status'=>$chatbuddy->online_status,
			'id'=>$chatbuddy->user_id,
			'limit'=>$limit + $per_page,
			'more' => $total  <= $limit ? false : true, 
			'scroll'=> $limit > $per_page  ?  false : true,
			'remaining'=> $total - $limit
			);


		$response = array(
					'success' => true,
					'errors'  => '',
					'message' => '',
					'buddy'	  => $contact,
					'thread'  => $thread
					);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode( $response );
	}
	public function save_message(){
		$logged_user = $this->session->userdata('login_id');
		$buddy 		= $this->input->post('user');
		$message 	= $this->input->post('message');
		if($message != '' && $buddy != '')
		{
			$msg_id = $this->chat->insert_message(array(
						'from' 		=> $logged_user,
						'to' 		=> $buddy,
						'message' 	=> $message,
						'message' 	=> $message,
					));
			$msg = $this->chat->get_message($msg_id);
			$owner = $this->chat->get_user($msg->from);
			$chat = array(
				'msg' 		=> $msg->id,
				'sender' 	=> $msg->from, 
				'recipient' => $msg->to,
				'avatar' 	=> $owner->photo,
				'body' 		=> $msg->message,
				'time' 		=> date("M j, Y, g:i a", strtotime($msg->time)),
				'type'		=> $msg->from == $logged_user ? 'out' : 'in',
				'name'		=> $msg->from == $logged_user ? 'You' : ucwords($owner->name)
				);

			$response = array(
				'success' => true,
				'message' => $chat 	  
				);
		}
		else{
			  $response = array(
				'success' => false,
				'message' => 'Empty fields exists'
				);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode( $response );
	}

	public function updates(){
	    $new_exists = false;
		$user_id 	= $this->session->userdata('login_id');
		$last_seen  = $this->chat->get_last_seen($user_id);
		$last_seen  = empty($last_seen) ? 0 : $last_seen->message_id;
		$exists = $this->chat->latest_message($user_id, $last_seen);
        $latest_message_count = $this->chat->latest_message_count($user_id, $last_seen);
		//echo $exists;
		if($exists){
			$new_exists = true;
		}
		// THIS WHOLE SECTION NEED A GOOD OVERHAUL TO CHANGE THE FUNCTIONALITY
	    if ($new_exists) {
	        $new_messages = $this->chat->message_unread($user_id);
			$thread = array();
			$senders = array();
			foreach ($new_messages as $message) {
				if(!isset($senders[$message->from])){
					$senders[$message->from]['count'] = 1; 
				}
				else{
					$senders[$message->from]['count'] += 1; 
				}
				$owner = $this->chat->get_user($message->from);
				$chat = array(
					'msg' 		=> $message->id,
					'sender' 	=> $message->from, 
					'recipient' => $message->to,
					'avatar' 	=> $owner->photo,
					'body' 		=> $message->message,
					'time' 		=> date("M j, Y, g:i a", strtotime($message->time)),
					'type'		=> $message->from == $user_id ? 'out' : 'in',
					'name'		=> $message->from == $user_id ? 'You' : ucwords($owner->name)
					);
				array_push($thread, $chat);
			}

			$groups = array();
			foreach ($senders as $key=>$sender) {
				$sender = array('user'=> $key, 'count'=>$sender['count']);
				array_push($groups, $sender);
			}
			// END OF THE SECTION THAT NEEDS OVERHAUL DESIGN
			$this->chat->update_lastSeen($user_id);

			$response = array(
				'success' => true,
                'new_msg_count' => $latest_message_count,
				'messages' => $thread,
				'senders' =>$groups
			);

			//add the header here
			header('Content-Type: application/json');
			echo json_encode( $response );
	    } 
	}
	public function mark_read(){
		$this->chat->message_mark_read();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */