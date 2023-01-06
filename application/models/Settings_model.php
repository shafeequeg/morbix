<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings_model extends CI_Model {
	
    function __construct() {
        parent::__construct();
    }

    public function select($data='',$limit='') {
        $this->db->select('*')->from('settings');
        if(!empty($data)){
            $this->db->where($data);
        }
        $this->db->order_by('settings_id','desc');
        if(!empty($limit)){
            $this->db->limit($limit);
        }
        $query = $this->db->get();
        return $query;
    }

}	  
	  
?>