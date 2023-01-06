<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {

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
        $this->load->model('Order_model','Order');
//        Check User Logged in or Not
        if($this->User->is_logged_in('driver')==false){
            redirect(base_url(), 'refresh');
        }
//        File Directory
        $this->page_data['directory'] = "modules/orders";
        $this->page_data['controller_directory'] = $this->session->userdata('user_type');

    }
    public function index()
    {
        $this->view();
    }
    public function view()
    {
       // $data['order_created_by']=$this->session->userdata('login_id'); 
        $this->page_data['result']= $this->Order->select_order('')->result();
        $this->page_data['page_name'] = 'Driver_order_view';
        $this->load->view('Index',$this->page_data);
    }

   

    public function order_details($id='')
    {
        if(!empty($id)){
            $data['order_id']=$id;
            $this->page_data['oid']=$id;
            $this->page_data['result']= $this->Order->select_billing('',$data)->result();
            $this->page_data['result1'] =$this->Order->select_order_billing_details('',$data)->row();
            $this->page_data['page_name'] = 'Order_details_driver';
            $this->load->view('Index',$this->page_data);
        }
        
    }

    public function profile($id='')
    {
        if(!empty($id)){
            $data['order_id']=$id;
            $this->page_data['oid']=$id;
            $this->page_data['result']= $this->Order->select_billing('',$data)->result();
            $this->page_data['result1'] =$this->Order->select_order_billing_details('',$data)->row();
            $this->page_data['page_name'] = 'Order_details_godown_view';
            $this->load->view('Index',$this->page_data);
        }
        
    }

    public function deliverd()
    {
        $data['order_id'] = $this->security->xss_clean($this->input->post('order_id'));
        $data['order_remarks'] = $this->security->xss_clean($this->input->post('remarks'));
        $data['order_status']=3;
        $data['delivery_date_time']= date('Y-m-d H:i:s');
        $result = $this->Order->update_order($data);
        if($result==1){

            $data1['flashdata_msg'] = 'Shipped Successfully!';
            $data1['flashdata_type'] = 'success';
            $data1['flashdata_title'] = 'Success !';

        }else{
            $data1['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
            $data1['flashdata_type'] = 'error';
            $data1['flashdata_title'] = 'Error !!';

        }
        $this->session->set_flashdata($data1);
        redirect(base_url() . 'driver/orders', 'refresh');
    }

   

   
    

    

    
   


}
