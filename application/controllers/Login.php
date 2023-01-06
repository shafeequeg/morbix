<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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

    }

    //Default function, redirects to logged in user area
    public function index(){

        $this->login();
    }

    public function login() {

        $this->load->view('Login');
    }
    public function process() {


        $data['username'] = $this->security->xss_clean($this->input->post('username'));
        $data['password'] = $this->security->xss_clean($this->input->post('password'));

        // Load the model
        $result=$this->User->process_login($data);

        // Let's check if there are any results
        if($result->num_rows() == 1)
        {
            // If there is a user, then create session data
            $row = $result->row();
            $data = array(
                'login_id' => $row->user_id,
                'user_alias' => $row->name,
                'user_type' => $row->role,
                'avatar' => $row->photo,
                'vendor' => $row->store,
                'validated' => true
            );
            $this->session->set_userdata($data);

            ##storing Last Login Details
            $data2['last_login']=date('Y-m-d, h:i:s');
            $data2['online_status']=1;
            $data2['user_id']=$this->session->userdata('login_id');
            $this->User->update_user($data2);

            ##Insert to User Activity Table
            $activity_data['activity_type']="Login";
            $activity_data['activity']="Logged in Successfully";
            $this->User->insert_activity($activity_data);

            ##Notification
            $data1['flashdata_msg'] = 'You Are Logged In Successfully!';
            $data1['flashdata_type'] = 'info';
            $data1['flashdata_title'] = 'Success !';
            $this->session->set_flashdata($data1);
            ##redirects to Account Dashboard
            redirect($this->session->userdata('user_type').'/dashboard');

        }else{
            ##Notification
            $data1['flashdata_msg'] = 'Sorry.. Invalid Login Credentials!';
            $data1['flashdata_type'] = 'error';
            $data1['flashdata_title'] = 'Error !!';
            $this->session->set_flashdata($data1);
            redirect(base_url());
        }

    }
    public function forget()
    {
        function generate_password($length = 6)
        {
            $chars = "abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789@#";
            $password = substr(str_shuffle($chars), 0, $length);
            return $password;
        }
        $data['email'] = $this->security->xss_clean($this->input->post('email'));
//        Check Account Exists
        $q1 = $this->User->select_user($data);
        if ($q1->num_rows() == 1) {
            $q1=$q1->row();
            $ac_status=$q1->ac_status;
            
            if($ac_status!=1){
                $data2['password'] = generate_password();
                $data2['user_id'] = $q1->user_id;

                $result = $this->User->update_user($data2);
                if ($result == 1) {

                    ##Send Mail
                    $password = $data2['password'];
                    $data5['subject'] = "Password Reset in Concept coms PMA";
                    $message = file_get_contents(base_url() . 'template/assets/email/membership3.html');
                    $message .= '<p style="padding-top:17px; font-size:17px;">Username : ' . $data['email'] . '<br /><br />
                                                                             New Password : ' . $password . '</p><p>
                                             <a href="' . base_url() . '">Click Here To Login to Your Account</a></p>';
                    $message .= file_get_contents(base_url() . 'template/assets/email/membership2.html');
                    $data5['message'] = $message;
                    $data5['to'] = $data['email'];
                    $result4 = $this->User->send_email($data5);
                    $data1['flashdata_msg'] = 'Your Password Reset Successfully.';
                    if ($result4 == 1) {
                        $data1['flashdata_msg'] .= "New Password Sent to Your Email ID";
                        $data1['flashdata_type'] = 'info';
                        $data1['flashdata_title'] = 'Success !';
                    } else {
                        $data1['flashdata_msg'] .= 'Email Sending Failed ! ';
                        $data1['flashdata_type'] = 'error';
                        $data1['flashdata_title'] = 'Error !!';
                    }
                } else {
                    $data1['flashdata_msg'] = 'Sorry.. There Have been Some Error Occurred. Please Try Again!';
                    $data1['flashdata_type'] = 'error';
                    $data1['flashdata_title'] = 'Error !!';

                }
            }else {
                $data1['flashdata_msg'] = 'Sorry.. Your Account Suspended!';
                $data1['flashdata_type'] = 'error';
                $data1['flashdata_title'] = 'Error !!';
            }

        }
        else {
            $data1['flashdata_msg'] = 'Sorry.. No Account Exist with Provided Email ID!';
            $data1['flashdata_type'] = 'error';
            $data1['flashdata_title'] = 'Error !!';
        }
        $this->session->set_flashdata($data1);
        redirect(base_url(), 'refresh');
    }
    function logout() {
        if($this->session->userdata('login_id')!='') {
            $data2['online_status'] = 0;
            $data2['user_id'] = $this->session->userdata('login_id');
            $this->User->update_user($data2);

            ##Insert to User Activity Table
            $activity_data['activity_type'] = "Login";
            $activity_data['activity'] = "Logged Out Successfully";
            $this->User->insert_activity($activity_data);
        }

        $array_items = array('login_id','user_alias','user_type','validated');
        $this->session->sess_destroy();
        $this->session->unset_userdata($array_items);
        $this->session->set_flashdata('logout_notification', 'logged_out');

        redirect(base_url(), 'refresh');
    }
}
