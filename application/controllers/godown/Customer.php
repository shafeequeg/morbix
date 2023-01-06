<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller
{
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
        if($this->User->is_logged_in('godown')==false){
            redirect(base_url(), 'refresh');
        }
//        File Directory
        $this->page_data['directory'] = "modules/user";
        $this->page_data['controller_directory'] = $this->session->userdata('user_type');
    }
    public function index()
    {
       $this->view();
    }

    public function view()
    {
        $this->page_data['result']=$this->User->select_customer()->result();
        $this->page_data['page_name'] = 'Customer';
        $this->load->view('Index',$this->page_data);

    }
    

    public function create()
    {
        
        $data['cmobile'] = $this->security->xss_clean($this->input->post('contact'));
//        Check Email Already Exists
        $q1 = $this->User->select_customer($data);
        if ($q1->num_rows() == 0) {
            
            $data['cname'] = $this->security->xss_clean($this->input->post('name'));
            $data['cmobile'] = $this->security->xss_clean($this->input->post('contact'));
            $data['caddress'] = $this->security->xss_clean($this->input->post('address'));
            $data['created_by'] = $this->session->userdata('login_id');
            $data['created_date'] = date('Y-m-d');
            

            $result = $this->User->insert_customer($data);
            if ($result['status'] == 1) {

                

                $data1['flashdata_msg'] = 'User Created Successfully.';
                
            } else {
                $data1['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
                $data1['flashdata_type'] = 'error';
                $data1['flashdata_title'] = 'Error !!';

            }

            $this->session->set_flashdata($data1);
            
            redirect(base_url() . 'godown/customer', 'refresh');
            
        }
        else {
            $data1['flashdata_msg'] = 'Sorry.. Mobile already Exist. Please Try Again!';
            $data1['flashdata_type'] = 'error';
            $data1['flashdata_title'] = 'Error !!';
            $this->session->set_flashdata($data1);
            redirect(base_url() . 'godown/user', 'refresh');
        }
    }
    
    
    public function update()
    {
        $data['cid'] = $this->security->xss_clean($this->input->post('cid'));
        $data['cname'] = $this->security->xss_clean($this->input->post('name'));
        $data['cmobile'] = $this->security->xss_clean($this->input->post('contact'));
        $data['caddress'] = $this->security->xss_clean($this->input->post('address'));

        $result1 = $this->User->update_customer($data);
        if ($result1 == 1) {

            $data1['flashdata_msg'] = 'User PUpdated Successfully!';
            $data1['flashdata_type'] = 'info';
            $data1['flashdata_title'] = 'Success !';
            $this->session->set_flashdata($data1);
            redirect(base_url() . 'godown/customer','refresh');

        } else {
            $data1['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
            $data1['flashdata_type'] = 'error';
            $data1['flashdata_title'] = 'Error !!';
            $this->session->set_flashdata($data1);
            redirect(base_url() . 'godown/customer','refresh');

        }
    }
    
}
?>