<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Con_Auth extends CI_Controller
{
    public function  __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';

            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        }
        else{
            $this->_login();
        }
    }

    private function _login(){

        $email=$this->input->post('email');
        $password=$this->input->post('password');

        $user = $this->db->get_where('user',['email' => $email])->row_array();

        if($user != null){
            //cek user sudah aktivasi atau tidak
            if ($user['is_active'] == 1) {

                //cek password sama dengan database
                if (password_verify($password, $user['password'])) {
                    //set data session
                    $data = 
                    [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    //end set data session
                    
                    //alihkan ke kontroler user atau view user
                    redirect('Con_User');
                }else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Salah!</div>');
                    redirect('index.php/Con_Auth');
                }
                
            }else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email tersebut belum di Aktifkan. Silakan cek inbox email !</div>');
            redirect('index.php/Con_Auth');
            }

        }
        else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email tersebut belum terdaftar !</div>');
            redirect('index.php/Con_Auth');
        }
        
    }

    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',["is_unique" => "Email sudah pernah didaftarkan. Silakan Login !"]);

        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[8]|matches[password2]',
            [
                "matches" => "password dont match",
                "min_length" => "password too short"
            ]
        );

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name',true)),
                'email' => htmlspecialchars($this->input->post('email',true)),
                'image' => 'avatar_default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Akun Berhasil Dibuat!. Silakan Login!</div>');
            redirect('index.php/Con_Auth');
            //echo "User Berhasil di Daftarkan";
        }
    }
    
    
    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Logout!</div>');
        redirect('index.php/Con_Auth');

    }
}
