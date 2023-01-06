<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends CI_Controller {

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
//        Check User Logged in or Not
        if($this->User->is_logged_in('admin')==false){
            redirect(base_url(), 'refresh');
        }
//        File Directory
        $this->page_data['directory'] = "modules/data_manage";
        $this->page_data['controller_directory'] = $this->session->userdata('user_type');
    }
    public function index()
    {
        $this->view();
    }
    public function view()
    {
        $data['batch.delete_status']=0;
        $data1['items.delete_status']=0;
        $this->page_data['batch']= $this->Data->select_batch('',$data)->result();
        $this->page_data['result']= $this->Data->select_items('',$data1)->result();
        $this->page_data['page_name'] = 'Item';
        $this->load->view('Index',$this->page_data);
    }
    public function create()
    {
        $data['item_name']=$this->security->xss_clean($this->input->post('item'));
        $data['batch']=$this->security->xss_clean($this->input->post('batch'));
        $result=$this->Data->insert_items($data);
        if($result['status']==1){

            $data1['flashdata_msg'] = 'Added Successfully!';
            $data1['flashdata_type'] = 'success';
            $data1['flashdata_title'] = 'Success !';

        }else{
            $data1['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
            $data1['flashdata_type'] = 'error';
            $data1['flashdata_title'] = 'Error !!';

        }
        $this->session->set_flashdata($data1);
        redirect(base_url() . 'admin/item', 'refresh');

    }
    public function delete()
    {

        $data['item_id']=$this->security->xss_clean($this->input->post('deleteid'));
        $data['delete_status']=1;
        $result=$this->Data->update_items($data);
        if($result==1){

            $data1['flashdata_msg'] = 'Deleted Successfully!';
            $data1['flashdata_type'] = 'error';
            $data1['flashdata_title'] = 'Success !';

        }else{
            $data1['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
            $data1['flashdata_type'] = 'error';
            $data1['flashdata_title'] = 'Error !!';

        }
        $this->session->set_flashdata($data1);
        redirect(base_url() . 'admin/item', 'refresh');
    }
    public function update()
    {
        $data['item_id']=$this->security->xss_clean($this->input->post('item_id'));
        $data['item_name']=$this->security->xss_clean($this->input->post('item'));
        $data['batch']=$this->security->xss_clean($this->input->post('batch'));
        $result=$this->Data->update_items($data);
        if($result==1){

            $data1['flashdata_msg'] = 'Updated Successfully!';
            $data1['flashdata_type'] = 'info';
            $data1['flashdata_title'] = 'Success !';

        }else{
            $data1['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
            $data1['flashdata_type'] = 'error';
            $data1['flashdata_title'] = 'Error !!';

        }
        $this->session->set_flashdata($data1);
        redirect(base_url() . 'admin/item', 'refresh');
    }


}
