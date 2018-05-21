<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Apotek_model');
        $this->load->model('Customer_model');
        $this->load->library('form_validation');        
    }

    function index(){
        $data = array(
            'button' => 'Login',
            'action_login' => site_url('login/login_action'),
            'action_register' => site_url(''),
            );
        $this->load->view('login/index.php', $data);
    }

    public function login_action()
    {
            $data = array(
                'email' => $this->input->post('email_input'),
                'password' => md5($this->input->post('password'))
            );
            $result = $this->User_model->login($data);
            //var_dump($result);
            if($result != FALSE)
            {
                if ($result[0]->status == 1 || $result[0]->status == 0) {
                    if ($result[0]->status == 0) {
                        $session_data = array(
                            'id' => $result[0]->id,
                            'status' => $result[0]->status,
                        );
                        $this->session->set_userdata('logged_in', $session_data);
                        //var_dump($session_data);    
                    }else{
                        $data_login = $this->Apotek_model->get_by_id_login($result[0]->id);
                        $session_data = array(
                            'id' => $data_login->id,
                            'id_user'=> $result[0]->id,
                            'nama' => $data_login->nama,
                            'status' => $result[0]->status,
                        );
                        $this->session->set_userdata('logged_in', $session_data);
                        
                    }
                    redirect('jenis_obat','refresh');
                }else{
                    $data_login = $this->Customer_model->get_by_id_login($result[0]->id);
                    $session_data = array(
                        'id' => $data_login->id,
                        'id_user'=> $result[0]->id,
                        'nama' => $data_login->nama,
                        'status' => $result[0]->status,
                    );
                    $this->session->set_userdata('logged_in', $session_data);
                    //var_dump($result[0]->id);
                    redirect('produk/index_customer','refresh');

                }
            }
            else
            {
                $message['invalid_user'] = 'invalid username or password';
                $this->session->set_flashdata('error_message', $message);
                redirect('/login','refresh');
            }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('login','refresh');
    }


    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenis_obat.php */
/* Location: ./application/controllers/Jenis_obat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-14 15:02:13 */
/* http://harviacode.com */