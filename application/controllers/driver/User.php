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
        if($this->User->is_logged_in('master')==false){
            redirect(base_url(), 'refresh');
        }
//        File Directory
        $this->page_data['directory'] = "modules/user";
        $this->page_data['controller_directory'] = $this->session->userdata('user_type');
    }
    public function index()
    {
//        $this->view();
    }

    public function engineers()
    {
        $data['role'] = 'engineer';
        $this->page_data['user_type'] = 'engineer';
        $this->page_data['result']=$this->User->select_user($data)->result();
        $this->page_data['page_name'] = 'User';
        $this->load->view('Index',$this->page_data);

    }
    public function site_supervisors()
    {
        $data['role'] = 'site_supervisor';
        $this->page_data['user_type'] = 'site_supervisor';
        $this->page_data['result']=$this->User->select_user($data)->result();
        $this->page_data['page_name'] = 'User';
        $this->load->view('Index',$this->page_data);
    }
    public function factory_supervisors()
    {
        $data['role'] = 'factory_supervisor';
        $this->page_data['user_type'] = 'factory_supervisor';
        $this->page_data['result']=$this->User->select_user($data)->result();
        $this->page_data['page_name'] = 'User';
        $this->load->view('Index',$this->page_data);
    }
    public function factory_managers()
    {
        $data['role'] = 'factory_manager';
        $this->page_data['user_type'] = 'factory_manager';
        $this->page_data['result']=$this->User->select_user($data)->result();
        $this->page_data['page_name'] = 'User';
        $this->load->view('Index',$this->page_data);
    }
    public function admin()
    {
        $data['role'] = 'admin';
        $this->page_data['user_type'] = 'admin';
        $this->page_data['result']=$this->User->select_user($data)->result();
        $this->page_data['page_name'] = 'User';
        $this->load->view('Index',$this->page_data);

    }


    public function create()
    {
        function generate_password($length = 6)
        {
            $chars = "abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789@#";
            $password = substr(str_shuffle($chars), 0, $length);
            return $password;
        }
        $data['email'] = $this->security->xss_clean($this->input->post('email'));
//        Check Email Already Exists
        $q1 = $this->User->select_user($data);
        if ($q1->num_rows() == 0) {

            $data['name'] = $this->security->xss_clean($this->input->post('name'));
            $data['phone'] = $this->security->xss_clean($this->input->post('phone'));
            $data['role'] = $this->security->xss_clean($this->input->post('user_type'));
            $data['password'] = generate_password();
            $data['ac_status'] = 1;
            $data['created_date'] = date('Y-m-d');
            $target_path1 = "uploads/user/";
            if($_FILES['uploaded_file']["size"]>0) {
                $target_path = "uploads/user/";
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
                $filename = "user.png";
            }
            $data['photo']= base_url().$target_path1.$filename;

            $result = $this->User->insert_user($data);
            if ($result['status'] == 1) {

                ##Send Mail
                $password = $data['password'];
                $data5['subject'] = "Account Activation in Concept coms PMA";
                $message = file_get_contents(base_url() . 'template/assets/email/membership1.html');
                $message .= '<p style="padding-top:17px; font-size:17px;">Username : ' . $data['email'] . '<br /><br />
                                                                             Password : ' . $password . '</p><p>
                                             <a href="' . base_url() . '">Click Here To Login to Your Account</a></p>';
                $message .= file_get_contents(base_url() . 'template/assets/email/membership2.html');
                $data5['message'] = $message;
                $data5['to'] = $data['email'];
                $result4 = $this->User->send_email($data5);

                $data1['flashdata_msg'] = 'User Account Created Successfully.';
                if ($result4 == 1) {
                    $data1['flashdata_msg'] .= "Account Access Details are Sent to User's Email";
                    $data1['flashdata_type'] = 'info';
                    $data1['flashdata_title'] = 'Success !';
                } else {
                    $data1['flashdata_msg'] .= 'User Email Sending Failed ! ';
                    $data1['flashdata_type'] = 'error';
                    $data1['flashdata_title'] = 'Error !!';
                }
            } else {
                $data1['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
                $data1['flashdata_type'] = 'error';
                $data1['flashdata_title'] = 'Error !!';

            }

            $this->session->set_flashdata($data1);
            if ($data['role'] == 'factory_manager') {
                redirect(base_url() . 'master/user/factory_managers', 'refresh');
            } elseif ($data['role'] == 'engineer') {
                redirect(base_url() . 'master/user/engineers', 'refresh');
            } elseif ($data['role'] == 'site_supervisor') {
                redirect(base_url() . 'master/user/site_supervisors', 'refresh');
            } elseif ($data['role'] == 'factory_supervisor') {
                redirect(base_url() . 'master/user/factory_supervisors', 'refresh');
            } elseif ($data['role'] == 'admin') {
                redirect(base_url() . 'master/user/admin', 'refresh');
            }
        }
        else {
            $data1['flashdata_msg'] = 'Sorry.. Email already Exist. Please Try Again!';
            $data1['flashdata_type'] = 'error';
            $data1['flashdata_title'] = 'Error !!';
            $this->session->set_flashdata($data1);
            redirect(base_url() . 'master/user', 'refresh');
        }
    }
    public function update()
    {
        $user_type = $this->security->xss_clean($this->input->post('user_type'));
        $data['email'] = $this->security->xss_clean($this->input->post('email'));
        $data['user_id'] = $this->security->xss_clean($this->input->post('user_id'));
        $data['ac_status'] = $this->security->xss_clean($this->input->post('status'));
        if ($data['ac_status'] == 'on') {
            $data['ac_status'] = 1;
        } else {
            $data['ac_status'] = 0;
        }
        $data['name'] = $this->security->xss_clean($this->input->post('name'));
        $data['phone'] = $this->security->xss_clean($this->input->post('phone'));
        $target_path1 = "uploads/user/";
        if($_FILES['uploaded_file']["size"]>0) {
            $target_path = "uploads/user/";
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

//        Check If Email Already Exist
        $q1 = $this->User->select_user(array("email"=>$data['email'] ));
        if($q1->num_rows() == 1) {
//            If Email Already Existing with 1 User
            $user_id=$q1->row()->user_id;
//            Check The user with Existing email id is current user or not
            if($data['user_id'] == $user_id){
//                if user = current user
                $result1 = $this->User->update_user($data);
                if ($result1 == 1 ) {

                    $data1['flashdata_msg'] = 'User Account Updated Successfully!';
                    $data1['flashdata_type'] = 'info';
                    $data1['flashdata_title'] = 'Success !';

                } else {
                    $data1['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
                    $data1['flashdata_type'] = 'error';
                    $data1['flashdata_title'] = 'Error !!';

                }

            }else{
                //                if user != current user
                $data1['flashdata_msg'] = 'Sorry.. Email already Exist. Please Try Again!';
                $data1['flashdata_type'] = 'error';
                $data1['flashdata_title'] = 'Error !!';
            }

        }
//        If there is No Existence
        elseif($q1->num_rows() == 0)
        {
            $result1 = $this->User->update_user($data);
            if ($result1 == 1) {

                $data1['flashdata_msg'] = 'User Account Updated Successfully!';
                $data1['flashdata_type'] = 'info';
                $data1['flashdata_title'] = 'Success !';

            } else {
                $data1['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
                $data1['flashdata_type'] = 'error';
                $data1['flashdata_title'] = 'Error !!';

            }

        }
        $this->session->set_flashdata($data1);
        if ($user_type == 'factory_manager') {
            redirect(base_url() . 'master/user/factory_managers', 'refresh');
        } elseif ($user_type == 'engineer') {
            redirect(base_url() . 'master/user/engineers', 'refresh');
        } elseif ($user_type == 'site_supervisor') {
            redirect(base_url() . 'master/user/site_supervisors', 'refresh');
        } elseif ($user_type == 'factory_supervisor') {
            redirect(base_url() . 'master/user/factory_supervisors', 'refresh');
        } elseif ($user_type == 'admin') {
            redirect(base_url() . 'master/user/admin', 'refresh');
        }


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
        redirect(base_url() . 'master/user/change_password', 'refresh');
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
            redirect(base_url() . 'master/user/profile/'.$data['user_id']);

        } else {
            $data1['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
            $data1['flashdata_type'] = 'error';
            $data1['flashdata_title'] = 'Error !!';
            $this->session->set_flashdata($data1);
            redirect(base_url() . 'master/user/profile/'.$data['user_id']);

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
            redirect(base_url() . 'master/user/profile/'.$data['user_id']);

        }
    }
}
?>