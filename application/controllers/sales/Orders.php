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
        if($this->User->is_logged_in('sales')==false){
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
        $data['order_created_by']=$this->session->userdata('login_id'); 
        $this->page_data['result']= $this->Order->select_order('',$data)->result();
        $this->page_data['page_name'] = 'View_order';
        $this->load->view('Index',$this->page_data);
    }

    public function add()
    {
        $data1['batch.delete_status']=0;
        $data2['items.delete_status']=0;
        $data2['batch.delete_status']=0;
        $this->page_data['batch']= $this->Data->select_batch('',$data1)->result();
        $this->page_data['items']= $this->Data->select_items('',$data2)->result();
        $this->page_data['page_name'] = 'Order';
        $this->load->view('Index',$this->page_data);
    }

    public function create()
    {
        $order_prefix="INV-N";
        $order = $this->Order->select_order("order_id,order_no",array(),'order_id','desc',1);
            if($order->num_rows()==1){
                $previous_order_no = $order->row()->order_no;
                $unique_id = substr($previous_order_no, 5);
                $new_no = (int)$unique_id+1;
            }else{
                $new_no = 0001; // Starting No When No Data is Present
            }
        $data1['order_no'] =$order_prefix.str_pad($new_no, 4, '0', STR_PAD_LEFT);
        $data1['order_status']=1;
        $data1['order_created_date']= date('Y-m-d H:i:s');
        $data1['order_created_by']= $this->session->userdata('login_id'); 
        $result = $this->Order->insert_order($data1);
        $orderid = $result['insert_id'];

        $orders = $this->security->xss_clean($this->input->post('orders'));
        if(count($orders)) {
            foreach($orders as $order) {
                $data['batch'] = $order['batchId'];
                $data['item']= $order['itemId'];
                $data['qty']= $order['qty'];
                $data['oid'] = $orderid;
                $result = $this->Order->insert_items($data);
            }
            echo 'ok';
        }

      
    }


}
