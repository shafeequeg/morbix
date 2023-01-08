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
        if($this->User->is_logged_in('godown')==false){
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
        $data['delete_status']=0;
       
        $this->page_data['result']= $this->Stock->select_stock('')->result();
        $this->page_data['batch']= $this->Data->select_batch('',$data)->result();
        $this->page_data['items']= $this->Data->select_items('',$data)->result();
        $this->page_data['category']= $this->Data->select_category('',$data)->result();
        $this->page_data['customers']= $this->User->select_customer('')->result();
        $this->page_data['page_name'] = 'Stock';
        $this->load->view('Index',$this->page_data);
    }
    public function create()
    {
        $d['stock_category']=$this->security->xss_clean($this->input->post('category'));
        $d['stock_batch']=$this->security->xss_clean($this->input->post('batch'));
        $d['stock_item']=$this->security->xss_clean($this->input->post('item'));
        $insert_qty=$this->security->xss_clean($this->input->post('qty'));
        $res = $this->Stock->select_stock('',$d);
        if($res->num_rows() == 1){
            $previous_qty = $res->row()->stock_qty;
            $stock_qty = $previous_qty+$insert_qty;
            $data2['stock_id']= $res->row()->stock_id;
            $data2['stock_qty']=$stock_qty;
            $res2 = $this->Stock->update_stock($data2);
            
            if($res2==1){
                $h['hcategory']=$this->security->xss_clean($this->input->post('category'));
                $h['hbatch']=$this->security->xss_clean($this->input->post('batch'));
                $h['hitem']=$this->security->xss_clean($this->input->post('item'));
                $h['hqty']=$this->security->xss_clean($this->input->post('qty'));
                $h['pcs_per_box']=$this->security->xss_clean($this->input->post('pcsperbox'));
                $h['total_pcs']=$this->security->xss_clean($this->input->post('total_pcs'));
                $h['created_date_time']=date('Y-m-d H:i:s');
                $h['created_by']=$this->session->userdata('login_id');
                $h=$this->Stock->insert_stock_history($h);

                $data1['flashdata_msg'] = 'Added Successfully!';
                $data1['flashdata_type'] = 'info';
                $data1['flashdata_title'] = 'Success !';
    
            }else{
                $data1['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
                $data1['flashdata_type'] = 'error';
                $data1['flashdata_title'] = 'Error !!';
    
            }
           $this->session->set_flashdata($data1);
           redirect(base_url() . 'godown/stock', 'refresh');
        }else{
            $data['stock_category']=$this->security->xss_clean($this->input->post('category'));
            $data['stock_batch']=$this->security->xss_clean($this->input->post('batch'));
            $data['stock_item']=$this->security->xss_clean($this->input->post('item'));
            $data['stock_qty']=$this->security->xss_clean($this->input->post('qty'));
            $data['pcs_per_box']=$this->security->xss_clean($this->input->post('pcsperbox'));
            $data['total_pcs']=$this->security->xss_clean($this->input->post('total_pcs'));
            $data['stock_status']=1;
            $data['stock_created_date']=date('Y-m-d H:i:s');
            $data['stock_created_by']=$this->session->userdata('login_id');
            $data['store']=$this->session->userdata('vendor');
            $target_path1 = "uploads/products/";
            if($_FILES['uploaded_file']["size"]>0) {
                $target_path = "uploads/products/";
                $filename = basename($_FILES['uploaded_file']['name']);

                $target_path = $target_path . $filename;

                while (file_exists($target_path)) {

                    $filename = rand(0, 1000) . $filename;
                    $target_path = $target_path . $filename;
                }

                if (!move_uploaded_file($_FILES['uploaded_file']["tmp_name"], $target_path1 . $filename)) {

                    $imageerror = "An Error Occurred While Trying to Upload Image";
                }
            }else
            {
                $filename = "noimage.jpg";
            }
            $data['photo']= base_url().$target_path1.$filename;
            $h['hcategory']=$this->security->xss_clean($this->input->post('category'));
            $h['hbatch']=$this->security->xss_clean($this->input->post('batch'));
            $h['hitem']=$this->security->xss_clean($this->input->post('item'));
            $h['hqty']=$this->security->xss_clean($this->input->post('qty'));
            $h['pcs_per_box']=$this->security->xss_clean($this->input->post('pcsperbox'));
            $h['total_pcs']=$this->security->xss_clean($this->input->post('total_pcs'));
            $h['created_date_time']=date('Y-m-d H:i:s');
            $h['created_by']=$this->session->userdata('login_id');
            $target_path1 = "uploads/products/";
            if($_FILES['uploaded_file']["size"]>0) {
                $target_path = "uploads/products/";
                $filename = basename($_FILES['uploaded_file']['name']);

                $target_path = $target_path . $filename;

                while (file_exists($target_path)) {

                    $filename = rand(0, 1000) . $filename;
                    $target_path = $target_path . $filename;
                }

                if (!move_uploaded_file($_FILES['uploaded_file']["tmp_name"], $target_path1 . $filename)) {

                    $imageerror = "An Error Occurred While Trying to Upload Image";
                }
            }else
            {
                $filename = "noimage.jpg";
            }
            $h['photo']= base_url().$target_path1.$filename;
            $result=$this->Stock->insert_stock($data);
            if($result['status']==1){
                $h=$this->Stock->insert_stock_history($h);
                $data1['flashdata_msg'] = 'Added Successfully!';
                $data1['flashdata_type'] = 'info';
                $data1['flashdata_title'] = 'Success !';

            }else{
                $data1['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
                $data1['flashdata_type'] = 'error';
                $data1['flashdata_title'] = 'Error !!';

            }
            $this->session->set_flashdata($data1);
            redirect(base_url() . 'godown/stock', 'refresh');
        }
        

    }
    
    public function update()
    {
        $data['stock_id']=$this->security->xss_clean($this->input->post('stock_id'));
        $data['stock_category']=$this->security->xss_clean($this->input->post('category'));
        $data['stock_batch']=$this->security->xss_clean($this->input->post('batch'));
        $data['stock_item']=$this->security->xss_clean($this->input->post('item'));
        $data['stock_qty']=$this->security->xss_clean($this->input->post('qty'));
        $data['pcs_per_box']=$this->security->xss_clean($this->input->post('pcsperbox'));
        $data['total_pcs']=$this->security->xss_clean($this->input->post('total_pcs'));
        $target_path1 = "uploads/products/";
        if($_FILES['uploaded_file']["size"]>0) {
            $target_path = "uploads/products/";
            $filename = basename($_FILES['uploaded_file']['name']);

            $target_path = $target_path . $filename;

            while (file_exists($target_path)) {

                $filename = rand(0, 1000) . $filename;
                $target_path = $target_path . $filename;
            }

            if (!move_uploaded_file($_FILES['uploaded_file']["tmp_name"], $target_path1 . $filename)) {

                $imageerror = "An Error Occurred While Trying to Upload Image";
            }
            $data['photo']= base_url().$target_path1.$filename;
        }else
        {
            $filename = $this->input->post('img');
            $data['photo']= $filename;
        }
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
        redirect(base_url() . 'godown/stock', 'refresh');
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
                $data2['category']=$this->security->xss_clean($this->input->post('category1'));
                $data2['batch']=$this->security->xss_clean($this->input->post('batch1'));
                $data2['item']=$this->security->xss_clean($this->input->post('item1'));
                $data2['qty']=$this->security->xss_clean($this->input->post('qty'));
                $data2['pcs_per_box']=$this->security->xss_clean($this->input->post('pcsperbox'));
                $data2['total_pcs']=$this->security->xss_clean($this->input->post('total_pcs'));
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
               redirect(base_url() . 'godown/stock', 'refresh');
            }
        }else{
            
            $damage=$this->security->xss_clean($this->input->post('qty'));
            $d['stock_id']=$this->security->xss_clean($this->input->post('stock_id'));
            $q1 = $this->Stock->select_stock('',$d);
            $leftqty = $q1->row()->stock_qty;
            $dmgqty = $q1->row()->damage;
            $stock = $leftqty-$damage;
            $damage_qty = $dmgqty+$damage;
            $d1['stock_qty']=$stock;
            $d1['stock_id']=$this->security->xss_clean($this->input->post('stock_id'));
            $d1['return_status']=3;
            $d1['damage']=$damage_qty;
            $result=$this->Stock->update_stock($d1);
            //insert history
            $d2['sid']=$this->security->xss_clean($this->input->post('stock_id'));
            $d2['category']=$this->security->xss_clean($this->input->post('category1'));
            $d2['batch']=$this->security->xss_clean($this->input->post('batch1'));
            $d2['item']=$this->security->xss_clean($this->input->post('item1'));
            $d2['qty']=$this->security->xss_clean($this->input->post('qty'));
            $d2['pcs_per_box']=$this->security->xss_clean($this->input->post('pcsperbox'));
            $d2['total_pcs']=$this->security->xss_clean($this->input->post('total_pcs'));
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
            redirect(base_url() . 'godown/stock', 'refresh');
        }
    
        
        
    }

    public function remove_damage()
    {
        $data['stock_id']=$this->security->xss_clean($this->input->post('deleteid'));
        $data['damage']=0;
        $result=$this->Stock->update_stock($data);
        if($result==1){

            $data1['flashdata_msg'] = 'Damage Removed Successfully!';
            $data1['flashdata_type'] = 'success';
            $data1['flashdata_title'] = 'Success !';

        }else{
            $data1['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
            $data1['flashdata_type'] = 'error';
            $data1['flashdata_title'] = 'Error !!';

        }
        $this->session->set_flashdata($data1);
        redirect(base_url() . 'godown/stock', 'refresh');
    }

    public function select_item_from_batch()
	{
		$data['batch']=$_POST['batch'];
		$result = $this->Data->select_items_checking("",$data);
		$count = $result->num_rows();
		if($count>0) {
			foreach ($result->result() as $row):
				$id[] = $row->item_id;

				$name[] = $row->item_name;
                
			endforeach;
			echo json_encode(array("count"=>$count, "id" => $id, "name"=>$name));
		}else{
			echo json_encode(array("count"=>$count));
		}
	}

    public function select_stock()
    {
       

            $user_type=$this->session->userdata('user_type');
            $json_data=array();
            $j=0;
    
            $data=array();
            // $data['q.quot_type']='job_brief';
            // if($_POST['status']!='' && $_POST['status']!='all'){
            //     $data['q.approval_status']=$_POST['status'];
            // }
            $result	=	$this->Stock->select_stock($data);
            $result_array=$result->result();
    
            $json_data['draw']=5;
            $json_data['recordsTotal']=$result->num_rows();
            $json_data['recordsFiltered']=$result->num_rows();
            $array=array();
            foreach($result_array as $row):
                $c=$row->stock_category;
                if($c == 0){
                    $category = 'no category selected';
                }else{
                    $category = $row->cat_name;
                }
                if($row->stock_qty !='' && $row->stock_qty !=0)
                {$status="<span class='label label-success ' style='margin-bottom: 5px;margin-right: 5px' >Instock</span>";}
                else
                {$status="<span class='label label-danger ' style='margin-bottom: 5px;margin-right: 5px' >Outofstock</span>";}

                if($row->damage!='0')
                {$damageitem="<span class='label label-primary ' style='margin-bottom: 5px;margin-right: 5px' > $row->damage Qty Damage </span>";}
                
                else{
                    $damageitem="";
                }

               $img='<img style="width:50px;height: 50px;" src="'. $row->photo.'">';
                $btn_edit='<a style="margin-left: 5px;margin-right: 5px" id="gallery_edit_btn" href="#gallery_edit_modal" data-toggle="modal" class="btn btn-warning m-btn m-btn--icon  m-btn--icon-only  m-btn--pill m-btn--air">
                                <i class="fa fa-edit"></i>
                            </a>';
                $btn_delete='<a style="margin-left: 5px;margin-right: 5px" id="gallery_delete_btn" href="#gallery_delete_modal" data-toggle="modal" class="btn btn-danger m-btn m-btn--icon  m-btn--icon-only  m-btn--pill m-btn--air">
                                <i class="fa fa-trash"></i>
                            </a>';
                $array[$j][]=$row->stock_id;
                $array[$j][]=$category;
                $array[$j][]=$row->stock_category;
                $array[$j][]=$row->batch_name;
                $array[$j][]=$row->stock_batch;
                $array[$j][]=$row->item_name;
                $array[$j][]=$row->stock_item;
                $array[$j][]=$row->stock_qty;
                $array[$j][]=$row->pcs_per_box;
                $array[$j][]=$row->total_pcs;
                $array[$j][]=$row->photo;
                $array[$j][]=$img;
                $array[$j][]=$status.$damageitem;
                $array[$j][]=$btn_edit.$btn_delete;
    
                $j++;
            endforeach;
    
            $json_data['data']=$array;
            echo json_encode($json_data);  // send data as json format
        
    }
    


}
