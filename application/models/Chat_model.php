<?php

class Chat_model extends CI_Model{


    public $_table = 'last_seen';

    public $belongs_to = array( 'user' => array('model'=>'user_model'));

    public function update_lastSeen($user=0)
    {
        $last_msg = $this->db->where('to', $user)->order_by('time', 'desc')->get('messages', 1)->row();
        $msg = !empty($last_msg) ? $last_msg->id : 0;

        $record = $this->get_last_seen($user);
        $data['user_id']=$user;
        $data['message_id']=$msg;
        if(empty($record))
        {
            $this->insert_last_seen($data);
        }else{
            $data['id']=$record->id;
            $this->update_last_seen($data);
        }
    }
    public function get_last_seen($user){
        $this->db->where('user_id', $user);
        $messages = $this->db->get('message_last_seen');
        return $messages->row();
    }
    public function insert_last_seen($data){
        $query=$this->db->insert('message_last_seen', $data);
        $result['status']= $query;
        $result['insert_id']=$this->db->insert_id();
        return $result['insert_id'];
    }
    public function update_last_seen($data){
        $this->db->where('id',$data['id']);
        $query=$this->db->update('message_last_seen',$data);
        return $query;
    }

    public function get_user($user){
        $this->db->where('user_id', $user);
        $users = $this->db->get('users');
        return $users->row();
    }
    public function get_all_users(){
        $users = $this->db->get('users');
        return $users->result();
    }
    public function search_all_users($keyword){
        $this->db->select('*')->from('users');
        $this->db->like('name',$keyword);
        $users = $this->db->get();
        return $users->result();
    }


    public $message_rules = array(
        'message' => array (
            'field' => 'message',
            'label' => 'message',
            'rules' => 'trim|required|xss_clean'
        )
    );
    public function get_message($message){
        $this->db->where('id', $message);
        $messages = $this->db->get('messages');
        return $messages->row();
    }
    public function insert_message($data){
        $query=$this->db->insert('messages', $data);
        $result['status']= $query;
        $result['insert_id']=$this->db->insert_id();
        return $result['insert_id'];
    }
	public function message_conversation($user, $chatbuddy, $limit = 5){
        $this->db->where('from', $user);
        $this->db->where('to', $chatbuddy);
        $this->db->or_where('from', $chatbuddy);
        $this->db->where('to', $user);
        $this->db->order_by('id', 'desc');
        $messages = $this->db->get('messages', $limit);

        $this->db->where('to', $user)->where('from',$chatbuddy)->update('messages', array('is_read'=>'1'));
        return $messages->result();
	}
	public function message_thread_len($user, $chatbuddy){
        $this->db->where('from', $user);
        $this->db->where('to', $chatbuddy);
        $this->db->or_where('from', $chatbuddy);
        $this->db->where('to', $user);
        $this->db->order_by('id', 'desc');
        $messages = $this->db->count_all_results('messages');
        return $messages;
	}

	public function latest_message($user, $last_seen){
		$message  =  $this->db->where('to', $user)
							  ->where('id  > ', $last_seen)
							  ->order_by('time', 'desc')
							  ->get('messages', 1);

		if($message->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}

    public function latest_message_count($user, $last_seen){
        $message  =  $this->db->where('to', $user)
            ->where('id  > ', $last_seen)
            ->order_by('time', 'desc')
            ->get('messages');

        return $message->num_rows();
    }

	public function new_messages($user, $last_seen){
		$messages  =  $this->db->where('to', $user)
							  ->where('id  > ', $last_seen)
							  ->order_by('time', 'asc')
							  ->get('messages');

		return $messages->result();
	}

	public function message_unread($user){
		$messages  =  $this->db->where('to', $user)
							  ->where('is_read', '0')
							  ->order_by('time', 'asc')
							  ->get('messages');

		return $messages->result();
	}
	public function message_mark_read(){
		$id = $this->input->post('id');
		$this->db->where('id', $id)->update('messages', array('is_read'=>'1'));
	}

	public function unread_per_user($id, $from){
		$count  =  $this->db->where('to', $id)
							->where('from', $from)
							->where('is_read', '0')
							->count_all_results('messages');
		return $count;
	}
    public function total_unread($id){
        $count  =  $this->db->where('to', $id)
            ->where('is_read', '0')
            ->count_all_results('messages');
        return $count;
    }
}