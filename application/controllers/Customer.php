<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->library('form_validation');        
    	$this->load->library('datatables');
        $this->cek_status('Customer');
    }

    public function index()
    {
        $this->render['content']   = $this->load->view('customer/customer_list', array(), TRUE);
        $this->load->view('template_admin', $this->render);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Customer_model->json();
    }

    public function read($id) 
    {
        $row = $this->Customer_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
		'alamat' => $row->alamat,
		'no_hp' => $row->no_hp,
		'id_login' => $row->id_login,
	    );
            $this->render['content']   = $this->load->view('customer/customer_read', $data, TRUE);
            $this->load->view('template_admin', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('customer/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	    'alamat' => set_value('alamat'),
	    'no_hp' => set_value('no_hp'),
	    'id_login' => set_value('id_login'),
	);
        $this->render['content']   = $this->load->view('customer/customer_form', $data, TRUE);
        $this->load->view('template_admin', $this->render);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'id_login' => $this->input->post('id_login',TRUE),
	    );

            $this->Customer_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('customer'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Customer_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('customer/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
		'alamat' => set_value('alamat', $row->alamat),
		'no_hp' => set_value('no_hp', $row->no_hp),
		'id_login' => set_value('id_login', $row->id_login),
	    );
            $this->render['content']   = $this->load->view('customer/customer_form', $data, TRUE);
            $this->load->view('template_admin', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'id_login' => $this->input->post('id_login',TRUE),
	    );

            $this->Customer_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('customer'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Customer_model->get_by_id($id);

        if ($row) {
            $this->Customer_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('customer'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer'));
        }
    }

    private function cek_status($path){
        $data = $this->session->userdata('logged_in');
        //var_dump($data['status']);
        $status = $data['status'];
        if (! $this->acl->is_public($path))
        {
            if (! $this->acl->is_allowed($path, $status))
            {
                redirect('login/logout','refresh');
            }
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
	$this->form_validation->set_rules('id_login', 'id login', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Customer.php */
/* Location: ./application/controllers/Customer.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-14 15:02:13 */
/* http://harviacode.com */