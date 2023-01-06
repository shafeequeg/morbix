<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
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
        if($this->User->is_logged_in('sales')==false){
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

        $this->page_data['result']=$this->User->select_user()->result();
        $this->page_data['page_name'] = 'User';
        $this->load->view('Index',$this->page_data);

    }
   



    

    public function change_password()
    {
        $this->page_data['page_name'] = 'Change_password';
        $this->load->view('Index',$this->page_data);
    }

    public function update_password(){
        $current_pass_posted=$this->input->post('current_pass');

        $user=$this->User->select_user(array("user_id"=>$this->session->userdata('login_id')));
        if($user->num_rows()==1){
            $current_password=$user->row()->password;
            if($current_password==$current_pass_posted)
            {
                $new_pss=$this->input->post('new_pass');
                $new_pass_confirm=$this->input->post('new_pass_confirm');
                if($new_pss==$new_pass_confirm)
                {
                    $data['password']=$new_pss;
                    $data['user_id']=$this->session->userdata('login_id');
                    // Load the model
                    $result = $this->User->update_user($data);
                    // Now we verify the result

                    if ($result == 1) {

                        $data1['flashdata_msg'] = 'Password Updated Successfully! ';
                        $data1['flashdata_type'] = 'info';
                        $data1['flashdata_title'] = 'Success !';

                    } else {
                        $data1['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
                        $data1['flashdata_type'] = 'error';
                        $data1['flashdata_title'] = 'Error !!';

                    }
                }
                else
                {
                    $data1['flashdata_msg'] = 'Sorry.. New Password and Confirmation Password is Not Matching!';
                    $data1['flashdata_type'] = 'error';
                    $data1['flashdata_title'] = 'Error !!';

                }
            }
            else
            {
                $data1['flashdata_msg'] = 'Sorry.. Entered Password is Not Matching Your Current Password!';
                $data1['flashdata_type'] = 'error';
                $data1['flashdata_title'] = 'Error !!';
            }
        }else{
            $data1['flashdata_msg'] = 'Sorry.. There has been Some Error Occurred. Please Try Later!';
            $data1['flashdata_type'] = 'error';
            $data1['flashdata_title'] = 'Error !!';
        }

        $this->session->set_flashdata($data1);
        redirect(base_url() . 'sales/user/change_password', 'refresh');
    }

    public function profile($id= '')
    {
        if(!empty($id)){
            $data['user_id']=$id;
            $this->page_data['result'] =$this->User->select_user($data)->row();
            $this->page_data['page_name'] = 'User_profile';
            $this->load->view('Index',$this->page_data);
        }else{
//		    Show 404
        }
    }
    public function update_profile()
    {
        $data['user_id'] = $this->security->xss_clean($this->input->post('user_id'));
        $data['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['phone'] = $this->security->xss_clean($this->input->post('phone'));


        $result1 = $this->User->update_user($data);
        if ($result1 == 1) {

            $data1['flashdata_msg'] = 'User Profile Updated Successfully!';
            $data1['flashdata_type'] = 'info';
            $data1['flashdata_title'] = 'Success !';
            $this->session->set_flashdata($data1);
            redirect(base_url() . 'sales/user/profile/'.$data['user_id']);

        } else {
            $data1['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
            $data1['flashdata_type'] = 'error';
            $data1['flashdata_title'] = 'Error !!';
            $this->session->set_flashdata($data1);
            redirect(base_url() . 'sales/user', 'refresh');

        }




    }
    public function profile_photo()
    {
        $data['user_id'] = $this->security->xss_clean($this->input->post('user_id'));
        if($_FILES['uploaded_file']["size"]>0) {
            $target_path = "uploads/user/";
            $target_path1 = "uploads/user/";
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
            $filename = $this->input->post('img');
        }
        $data['photo']= base_url().$target_path1.$filename;

        $result1 = $this->User->update_user($data);
        if ($result1 == 1) {
//      Change Session Variable
            $this->session->set_userdata(array('avatar' => $data['photo']));

            $data1['flashdata_msg'] = 'User Profile Updated Successfully!';
            $data1['flashdata_type'] = 'info';
            $data1['flashdata_title'] = 'Success !';
            $this->session->set_flashdata($data1);
            redirect(base_url() . 'admin/user/profile/'.$data['user_id']);

        } else {
            $data1['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
            $data1['flashdata_type'] = 'error';
            $data1['flashdata_title'] = 'Error !!';
            $this->session->set_flashdata($data1);
            redirect(base_url() . 'manager/user', 'refresh');

        }
    }

}
?>