<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public $page_data=array();

    function __construct()
    {
        parent::__construct();
        //Calling Initial Functions
        $this->initial();
    }

    public function initial()
    {
        ini_set('max_execution_time', 5000);
        ini_set("memory_limit", "-1");
        date_default_timezone_set('Asia/Kolkata');
        $this->load->model('User_model','User');
//        Check User Logged in or Not
        if($this->User->is_logged_in('manager')==false){
            redirect(base_url(), 'refresh');
        }
//        File Directory
        $this->page_data['directory'] = "home";
        $this->page_data['controller_directory'] = $this->session->userdata('user_type');

    }
    public function index()
    {
        $this->view();
    }
    public function view()
    {
        $this->page_data['page_name'] = 'Dashboard';
        $this->load->view('Index',$this->page_data);
    }


}
