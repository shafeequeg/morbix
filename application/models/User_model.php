<?php
class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function is_logged_in($user_type)
    {
        // Return true or false based on the presence of user data
        if ($this->session->userdata('login_id') == "" || $this->session->userdata('user_type') != $user_type){
            return false;
        }else{
            return true;
        }
    }
    public function process_login($data)
    {
        // Run the query
        $query = $this->db->get_where('users',$data);
        return $query;
    }

    public function select_user($data='')
    {
        $this->db->select('*')->from('users');
        if(!empty($data)){
            $this->db->where($data);
        }
        $query = $this->db->get();
        return $query;

    }
    public function insert_user($data)
    {
        $query=$this->db->insert('users', $data);
        $result['status']= $query;
        $result['insert_id']=$this->db->insert_id();
        return $result;
    }

    public function update_user($data)
    {
        $this->db->where('user_id', $data['user_id']);
        $query=$this->db->update('users', $data);
        return $query;
    }


    public function insert_activity($data)
    {
        $data['user'] = $this->session->userdata('login_id');
        $data['date'] = date("Y-m-d h:i:s");
        $query=$this->db->insert('user_activities', $data);
        return $query;
    }

    ##Send Email
    public function send_email($data)
    {
        ##mail Function
        $settings=$this->db->select('*')->from('settings')->get()->row();
        $smtp_port=$settings->smtp_port;
        $smtp_host=$settings->smtp_host;
        $smtp_user=$settings->smtp_user;
        $smtp_pass=$settings->smtp_pass;

        $subject = $data['subject'];
        $to=$data['to'];
        $message = $data['message'];
        $message.='Thanks for being a Concept customer.<br />For any query or clarification, please feel free to contact us and we will be glad to assist you.<br />
        <br /><br />Sincerely,<b style="text-decoration:underline; font-weight:normal; color:#F60;">Team Concept</b>
                         </td></tr></table><center><br />'.$smtp_user.'</center><!-- End of Mailchimp badge --></td>
                        </tr><!-- End of main container --></table></body></html>';

        $this->load->library('My_PHPMailer');
        $mail = new PHPMailer();
        //                $mail->IsSMTP(); // we are going to use SMTP
        //                $mail->SMTPAuth   = true; // enabled SMTP authentication
        //                $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        //                $mail->Host       = $smtp_host;      // setting GMail as our SMTP server
        //                $mail->Port       = $smtp_port;                   // SMTP port to connect to GMail
        //                $mail->Username   = $smtp_user;  // user email address
        //                $mail->Password   = $smtp_pass;            // password in GMail
        $mail->SetFrom($smtp_user, 'Concept coms');  //Who is sending the email
        $mail->Subject    = $subject;
        $mail->Body      = $message;
        $mail->AltBody    = "Plain text message";
        $destino = $to; // Who is addressed the email to
        $mail->AddAddress($destino);
        $mail=$mail->Send();  //Sending Mail
        return $mail;
    }



    //customers 

    public function select_customer($columns='*',$where_data='',$order_by_c='',$order_by='',$limit='')
    {
        $this->db->select($columns)->from('customers');
        if(!empty($where_data)){
            $this->db->where($where_data);
        }
        if(!empty($order_by_c)&&!empty($order_by)){
            $this->db->order_by($order_by_c,$order_by);
        }
        if(!empty($limit)){
            $this->db->limit($limit);
        }
        $query = $this->db->get();
        return $query;
    }

    public function insert_customer($data)
    {
        $query=$this->db->insert('customers', $data);
        $result['status']= $query;
        $result['insert_id']=$this->db->insert_id();
        return $result;
    }
public function update_customer($data)
    {
        $this->db->where('cid', $data['cid']);
        $query=$this->db->update('customers', $data);
        return $query;
    }
}
?>