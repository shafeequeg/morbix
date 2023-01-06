<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock extends CI_Controller {

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
        if($this->User->is_logged_in('manager')==false){
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
        $data1['batch.delete_status']=0;
        $data2['items.delete_status']=0;
        $data2['batch.delete_status']=0;
        $this->page_data['result']= $this->Stock->select_stock('')->result();
        $this->page_data['batch']= $this->Data->select_batch('',$data1)->result();
        $this->page_data['items']= $this->Data->select_items('',$data2)->result();
        $this->page_data['customers']= $this->User->select_customer('')->result();
        $this->page_data['page_name'] = 'Stock';
        $this->load->view('Index',$this->page_data);
    }
    public function create()
    {
        $data['stock_batch']=$this->security->xss_clean($this->input->post('batch'));
        $data['stock_item']=$this->security->xss_clean($this->input->post('item'));
        $data['stock_qty']=$this->security->xss_clean($this->input->post('qty'));
        $data['stock_status']=1;
        $data['stock_created_date']=date('Y-m-d H:i:s');
        $data['stock_created_by']=$this->session->userdata('login_id');
        $data['store']=$this->session->userdata('vendor');
        $result=$this->Stock->insert_stock($data);
        if($result['status']==1){

            $data1['flashdata_msg'] = 'Added Successfully!';
            $data1['flashdata_type'] = 'info';
            $data1['flashdata_title'] = 'Success !';

        }else{
            $data1['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
            $data1['flashdata_type'] = 'error';
            $data1['flashdata_title'] = 'Error !!';

        }
       $this->session->set_flashdata($data1);
       redirect(base_url() . 'manager/stock', 'refresh');

    }
    
    public function update()
    {
        $data['stock_id']=$this->security->xss_clean($this->input->post('stock_id'));
        $data['stock_batch']=$this->security->xss_clean($this->input->post('batch'));
        $data['stock_item']=$this->security->xss_clean($this->input->post('item'));
        $data['stock_qty']=$this->security->xss_clean($this->input->post('qty'));
        $result=$this->Stock->update_stock($data);
        if($result==1){

            $data1['flashdata_msg'] = 'Updated Successfully!';
            $data1['flashdata_type'] = 'success';
            $data1['flashdata_title'] = 'Success !';

        }else{
            $data1['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
            $data1['flashdata_type'] = 'error';
            $data1['flashdata_title'] = 'Error !!';

        }
        $this->session->set_flashdata($data1);
        redirect(base_url() . 'manager/stock', 'refresh');
    }

    public function return()
    {
        $status=$this->security->xss_clean($this->input->post('return'));
        if($status == 1){
            $data['stock_id']=$this->security->xss_clean($this->input->post('stock_id'));
            $new_qty=$this->security->xss_clean($this->input->post('qty'));
            $q1 = $this->Stock->select_stock('',$data);
            if($q1->num_rows() == 1) {
                $qty=$q1->row()->stock_qty;
                $quantity = $qty+$new_qty;
                $data1['stock_qty']=$quantity;
                $data1['stock_id']=$this->security->xss_clean($this->input->post('stock_id'));
                $data1['return_status']=1;
                $result=$this->Stock->update_stock($data1);
                $data2['sid']=$this->security->xss_clean($this->input->post('stock_id'));
                $data2['batch']=$this->security->xss_clean($this->input->post('batch1'));
                $data2['item']=$this->security->xss_clean($this->input->post('item1'));
                $data2['qty']=$this->security->xss_clean($this->input->post('qty'));
                $data2['status']=$this->security->xss_clean($this->input->post('return'));
                $data2['remarks']=$this->security->xss_clean($this->input->post('remarks'));
                $data2['customer']=$this->security->xss_clean($this->input->post('customer'));
                $data2['created_date_time']=date('Y-m-d H:i:s');
                $data2['created_by']=$this->session->userdata('login_id');
                $result1=$this->Stock->insert_return($data2);
                if($result1==1){
           
                    $data1['flashdata_msg'] = 'Updated Successfully!';
                    $data1['flashdata_type'] = 'success';
                    $data1['flashdata_title'] = 'Success !';
                }else{
                    $data1['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
                    $data1['flashdata_type'] = 'error';
                    $data1['flashdata_title'] = 'Error !!';
        
                }
                $this->session->set_flashdata($data1);
               redirect(base_url() . 'manager/stock', 'refresh');
            }
        }else{
            
            $damage=$this->security->xss_clean($this->input->post('qty'));
            $d['stock_id']=$this->security->xss_clean($this->input->post('stock_id'));
            $q1 = $this->Stock->select_stock('',$d);
            $leftqty = $q1->row()->stock_qty;
            $damagestock = $leftqty-$damage;
            $d1['stock_qty']=$damagestock;
            $d1['stock_id']=$this->security->xss_clean($this->input->post('stock_id'));
            $d1['return_status']=3;
            $d1['damage']=$this->security->xss_clean($this->input->post('qty'));
            $result=$this->Stock->update_stock($d1);
            //insert history
            $d2['sid']=$this->security->xss_clean($this->input->post('stock_id'));
            $d2['batch']=$this->security->xss_clean($this->input->post('batch1'));
            $d2['item']=$this->security->xss_clean($this->input->post('item1'));
            $d2['qty']=$this->security->xss_clean($this->input->post('qty'));
            $d2['status']=$this->security->xss_clean($this->input->post('return'));
            $d2['remarks']=$this->security->xss_clean($this->input->post('remarks'));
            $d2['customer']=$this->security->xss_clean($this->input->post('customer'));
            $d2['created_date_time']=date('Y-m-d H:i:s');
            $d2['created_by']=$this->session->userdata('login_id');
            $result1=$this->Stock->insert_return($d2);
            if($result1==1){
        
                $data1['flashdata_msg'] = 'Updated Successfully!';
                $data1['flashdata_type'] = 'success';
                $data1['flashdata_title'] = 'Success !';
            }else{
                $data1['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
                $data1['flashdata_type'] = 'error';
                $data1['flashdata_title'] = 'Error !!';
    
            }
            $this->session->set_flashdata($data1);
            redirect(base_url() . 'manager/stock', 'refresh');
        }

        


        
    }

    public function remove_damage()
    {
        $data['stock_id']=$this->security->xss_clean($this->input->post('deleteid'));
        $data['damage']=0;
        $result=$this->Stock->update_stock($data);
        if($result==1){

            $data1['flashdata_msg'] = 'Updated Successfully!';
            $data1['flashdata_type'] = 'success';
            $data1['flashdata_title'] = 'Success !';

        }else{
            $data1['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
            $data1['flashdata_type'] = 'error';
            $data1['flashdata_title'] = 'Error !!';

        }
        $this->session->set_flashdata($data1);
        redirect(base_url() . 'manager/stock', 'refresh');
    }
    


}
