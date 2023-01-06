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
        $this->load->model('Data_manage_model','Data');
        $this->load->model('Stock_model','Stock');
//        Check User Logged in or Not
        if($this->User->is_logged_in('sales')==false){
            redirect(base_url(), 'refresh');
        }
//        File Directory
        $this->page_data['directory'] = "modules/stock";
        $this->page_data['controller_directory'] = $this->session->userdata('user_type');
    }
    public function index()
    {

        $this->view();
    }

    public function view()
    {
        $data1['delete_status']=0;
      
        $data2['delete_status']=0;
        $this->page_data['result']= $this->Stock->select_stock('')->result();
        $this->page_data['batch']= $this->Data->select_batch('',$data1)->result();
        $this->page_data['items']= $this->Data->select_items('',$data2)->result();
        $this->page_data['customers']= $this->User->select_customer('')->result();
        $this->page_data['page_name'] = 'Sales_stock_view';
        $this->load->view('Index',$this->page_data);
    }


}
