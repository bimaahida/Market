<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Resep extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Resep_model');
        $this->load->library('form_validation');        
    	$this->load->library('datatables');
        $this->cek_status('Resep');
    }

    public function index()
    {
        $this->render['content']   = $this->load->view('resep/resep_list', array(), TRUE);
        $this->load->view('template_admin', $this->render);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Resep_model->json();
    }

    public function read($id) 
    {
        $row = $this->Resep_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'foto' => $row->foto,
		'status' => $row->status,
		'id_transaksi' => $row->id_transaksi,
	    );
            $this->render['content']   = $this->load->view('resep/resep_read', $data, TRUE);
            $this->load->view('template_admin', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('resep'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('resep/create_action'),
	    'id' => set_value('id'),
	    'foto' => set_value('foto'),
	    'status' => set_value('status'),
	    'id_transaksi' => set_value('id_transaksi'),
	);
        $this->render['content']   = $this->load->view('resep/resep_form', $data, TRUE);
        $this->load->view('template_admin', $this->render);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'foto' => $this->input->post('foto',TRUE),
		'status' => $this->input->post('status',TRUE),
		'id_transaksi' => $this->input->post('id_transaksi',TRUE),
	    );

            $this->Resep_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('resep'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Resep_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('resep/update_action'),
		'id' => set_value('id', $row->id),
		'foto' => set_value('foto', $row->foto),
		'status' => set_value('status', $row->status),
		'id_transaksi' => set_value('id_transaksi', $row->id_transaksi),
	    );
            $this->render['content']   = $this->load->view('resep/resep_form', $data, TRUE);
        $this->load->view('template_admin', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('resep'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'foto' => $this->input->post('foto',TRUE),
		'status' => $this->input->post('status',TRUE),
		'id_transaksi' => $this->input->post('id_transaksi',TRUE),
	    );

            $this->Resep_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('resep'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Resep_model->get_by_id($id);

        if ($row) {
            $this->Resep_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('resep'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('resep'));
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
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('id_transaksi', 'id transaksi', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Resep.php */
/* Location: ./application/controllers/Resep.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-14 15:02:13 */
/* http://harviacode.com */