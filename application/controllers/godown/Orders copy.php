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
        $this->load->model('Stock_model','Stock');
//        Check User Logged in or Not
        if($this->User->is_logged_in('godown')==false){
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
        $this->page_data['page_name'] = 'View_order_godown';
        $this->load->view('Index',$this->page_data);
    }

    public function create_order()
    {
        
//             $this->db->select('*');
//             $this->db->from('stock');
//  //$this->db->join('batch', 'batch.batch_id=stock.stock_batch');
//             $this->page_data['batch']= $this->db->get();
            
            // $data1['batch.delete_status']=0;
            $data2['items.delete_status']=0;
            $data22['category.delete_status']=0;
            $data2['delete_status']=0;
            $data4['ac_status']=1;
            $data4['role']='driver';
            $this->page_data['drivers']= $this->User->select_user($data4)->result();
            $this->page_data['category']= $this->Order->select_category_frm_stock('')->result();
            $this->page_data['batch']= $this->Order->select_batch_frm_stock('')->result();
            $this->page_data['items']= $this->Data->select_items('',$data2)->result();
            $this->page_data['result']= $this->Order->select_order_billing('')->result();
            $this->page_data['customer']=$this->User->select_customer()->result();
            $this->page_data['page_name'] = 'Create_new_order';
            $this->load->view('Index',$this->page_data);
       
        
    }

    public function invoice_create()
    {
        
            
            
            $data1['batch.delete_status']=0;
            $data2['items.delete_status']=0;
            $data2['batch.delete_status']=0;
            $data4['ac_status']=1;
            $data4['role']='driver';
            $this->page_data['drivers']= $this->User->select_user($data4)->result();
            //$this->page_data['batch']= $this->Data->select_batch('',$data1)->result();
            $this->page_data['batch']= $this->Order->select_batch_frm_stock('')->result();
            $this->page_data['items']= $this->Data->select_items('',$data2)->result();
            $this->page_data['result']= $this->Order->select_order_billing('')->result();
            $this->page_data['customer']=$this->User->select_customer()->result();
            $this->page_data['page_name'] = 'Create_new_invoice';
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



    public function order_details($id='')
    {
        if(!empty($id)){
            $data['order_id']=$id;
            $this->page_data['oid']=$id;
            $this->page_data['result']= $this->Order->select_billing('',$data)->result();
            $this->page_data['result1'] =$this->Order->select_order_billing_details('',$data)->row();
            $this->page_data['page_name'] = 'Order_details_godown';
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

    public function shipped()
    {
        $data['order_id'] = $this->security->xss_clean($this->input->post('deleteid'));
        $data['order_status']=2;
        $data['shipped_date_time']= date('Y-m-d H:i:s');
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
        redirect(base_url() . 'godown/orders', 'refresh');
    }



    public function create_customer()
    {
        $id = $this->security->xss_clean($this->input->post('oid'));
        $data['cmobile'] = $this->security->xss_clean($this->input->post('contact'));
//        Check Email Already Exists
        $q1 = $this->User->select_customer('',$data);
        if ($q1->num_rows() == 0) {
           
            $data['cname'] = $this->security->xss_clean($this->input->post('name'));
            $data['cmobile'] = $this->security->xss_clean($this->input->post('contact'));
            $data['caddress'] = $this->security->xss_clean($this->input->post('address'));
            $data['created_date']= date('Y-m-d H:i:s');
            $data['created_by']= $this->session->userdata('login_id'); 

            $result = $this->User->insert_customer($data);
            if ($result['status'] == 1) {
                // $data1['order_id'] = $this->security->xss_clean($this->input->post('oid'));
                // $data1['order_customer'] = $result['insert_id'];
                // $data1['order_status'] = 2;
                // $result1 = $this->Order->update_order($data1);
                $data1['flashdata_msg'] = ' Created Successfully.';
               
            } else {
                $data1['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
                $data1['flashdata_type'] = 'error';
                $data1['flashdata_title'] = 'Error !!';

            }

            $this->session->set_flashdata($data1);
           redirect(base_url() . 'godown/orders/create_order', 'refresh');
        }
        else {
            $data1['flashdata_msg'] = 'Sorry.. Email already Exist. Please Try Again!';
            $data1['flashdata_type'] = 'error';
            $data1['flashdata_title'] = 'Error !!';
            $this->session->set_flashdata($data1);
           redirect(base_url() . 'godown/orders/create_order', 'refresh');
        }
    }

    public function select_customer()
    {
        $data['cid'] = $_POST['cid'];
        $result =$this->User->select_customer('',$data);
        $count = $result->num_rows();
        if($count>0){
            foreach ($result->result() as $row):
                $address[] =$row->caddress;
            endforeach;
        }
        echo json_encode(array("count"=>$count, "address"=>$address));
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
        $data1['order_created_date']= $_POST['date']; 
        $data1['order_created_by']= $this->session->userdata('login_id'); 
        $data1['order_customer']= $_POST['customer']; 
        $data1['driver']= $_POST['driver']; 
        $result = $this->Order->insert_order($data1);
        $orderid = $result['insert_id'];

        $orders = $this->security->xss_clean($this->input->post('orders'));
        if(count($orders)) {
            foreach($orders as $order) {
                $data['batch'] = $order['batchId'];
                $data['item']= $order['itemId'];
                $data['qty']= $order['qty'];
                $data['oid'] = $orderid;

                $data11['stock_item']= $order['itemId'];
                $res=$this->Stock->select_stock('',$data11);
                if ($res->num_rows()!='') {
                    $previous_qty = $res->row()->stock_qty;
                    $input_qty=$order['qty'];
                    $d1['stock_item'] = $order['itemId'];
                    $d1['stock_qty'] = $previous_qty-$input_qty;
                    $result6=$this->Stock->update_stock_qty($d1);
                }
                $result = $this->Order->insert_items($data);

               
                
            }
            echo 'ok';
        }

      
    }

    public function invoice()
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
        $data1['invoice_status']=1;
        $data1['order_created_date']= date('Y-m-d H:i:s');
        $data1['order_created_by']= $this->session->userdata('login_id'); 
        $data1['order_customer']= $_POST['customer']; 
        
        $result = $this->Order->insert_order($data1);
        $orderid = $result['insert_id'];

        $orders = $this->security->xss_clean($this->input->post('orders'));
        if(count($orders)) {
            foreach($orders as $order) {
                $data['batch'] = $order['batchId'];
                $data['item']= $order['itemId'];
                $data['qty']= $order['qty'];
                $data['oid'] = $orderid;

                $data11['stock_item']= $order['itemId'];
                $res=$this->Stock->select_stock('',$data11);
                if ($res->num_rows()!='') {
                    $previous_qty = $res->row()->stock_qty;
                    $input_qty=$order['qty'];
                    $d1['stock_item'] = $order['itemId'];
                    $d1['stock_qty'] = $previous_qty-$input_qty;
                    $result6=$this->Stock->update_stock_qty($d1);
                }
                $result = $this->Order->insert_items($data);

               
                
            }
            echo 'ok';
        }

      
    }

    public function select_batch_frm_stock()
	{
		$data['stock_category']=$_POST['category'];
		$result = $this->Order->select_batch_frm_stock("",$data);
		$count = $result->num_rows();
		if($count>0) {
			foreach ($result->result() as $row):
				$id[] = $row->stock_batch;

				$name[] = $row->batch_name;
                
			endforeach;
			echo json_encode(array("count"=>$count, "id" => $id, "name"=>$name));
		}else{
			echo json_encode(array("count"=>$count));
		}
	}

    public function select_item_frm_stock()
	{
		$data['stock_batch']=$_POST['batch'];
		$result = $this->Order->select_item_frm_stock("",$data);
		$count = $result->num_rows();
		if($count>0) {
			foreach ($result->result() as $row):
				$id[] = $row->stock_item;
				$name[] = $row->item_name;
                $qty[]=$row->stock_qty;
                
			endforeach;
			echo json_encode(array("count"=>$count, "id" => $id, "name"=>$name, "qty"=>$qty));
		}else{
			echo json_encode(array("count"=>$count));
		}
	}
    

    public function select_left_qty()
	{
		$data['stock_batch']=$_POST['batch'];
        $data['stock_item']=$_POST['item'];
		$result = $this->Order->select_item_frm_stock("",$data);
		$count = $result->num_rows();
		if($count>0) {
			foreach ($result->result() as $row):
                $qty[]=$row->stock_qty;
                $pcs[]=$row->total_pcs;
			endforeach;
			echo json_encode(array("count"=>$count, "qty"=>$qty, "pcs"=>$pcs));
		}else{
			echo json_encode(array("count"=>$count));
		}
	}
    

    

    
   


}
