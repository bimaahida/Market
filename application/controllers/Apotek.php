<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Apotek extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Apotek_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');

        $this->cek_status('Apotek');
    }

    public function index()
    {
        $this->render['content']   = $this->load->view('apotek/apotek_list', array(), TRUE);
        $this->load->view('template_admin', $this->render);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Apotek_model->json();
    }

    public function read($id) 
    {
        $row = $this->Apotek_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
		'no_hp' => $row->no_hp,
		'alamat' => $row->alamat,
		'no_rek' => $row->no_rek,
		'no_izin' => $row->no_izin,
		'apoteker' => $row->apoteker,
		'id_login' => $row->id_login,
	    );
            $this->render['content']   = $this->load->view('apotek/apotek_read', $data, TRUE);
            $this->load->view('template_admin', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('apotek'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('apotek/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	    'no_hp' => set_value('no_hp'),
	    'alamat' => set_value('alamat'),
	    'no_rek' => set_value('no_rek'),
	    'no_izin' => set_value('no_izin'),
	    'apoteker' => set_value('apoteker'),
	    'id_login' => set_value('id_login'),
	);
        $this->render['content']   = $this->load->view('apotek/apotek_form', $data, TRUE);
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
		'no_hp' => $this->input->post('no_hp',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_rek' => $this->input->post('no_rek',TRUE),
		'no_izin' => $this->input->post('no_izin',TRUE),
		'apoteker' => $this->input->post('apoteker',TRUE),
		'id_login' => $this->input->post('id_login',TRUE),
	    );

            $this->Apotek_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('apotek'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Apotek_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('apotek/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
		'no_hp' => set_value('no_hp', $row->no_hp),
		'alamat' => set_value('alamat', $row->alamat),
		'no_rek' => set_value('no_rek', $row->no_rek),
		'no_izin' => set_value('no_izin', $row->no_izin),
		'apoteker' => set_value('apoteker', $row->apoteker),
		'id_login' => set_value('id_login', $row->id_login),
	    );
            $this->render['content']   = $this->load->view('apotek/apotek_form', $data, TRUE);
            $this->load->view('template_admin', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('apotek'));
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
		'no_hp' => $this->input->post('no_hp',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_rek' => $this->input->post('no_rek',TRUE),
		'no_izin' => $this->input->post('no_izin',TRUE),
		'apoteker' => $this->input->post('apoteker',TRUE),
		'id_login' => $this->input->post('id_login',TRUE),
	    );

            $this->Apotek_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('apotek'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Apotek_model->get_by_id($id);

        if ($row) {
            $this->Apotek_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('apotek'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('apotek'));
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
	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('no_rek', 'no rek', 'trim|required');
	$this->form_validation->set_rules('no_izin', 'no izin', 'trim|required');
	$this->form_validation->set_rules('apoteker', 'apoteker', 'trim|required');
	$this->form_validation->set_rules('id_login', 'id login', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Apotek.php */
/* Location: ./application/controllers/Apotek.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-14 15:02:13 */
/* http://harviacode.com */