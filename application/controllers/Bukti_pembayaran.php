<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bukti_pembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bukti_pembayaran_model');
        $this->load->library('form_validation');        
    	$this->load->library('datatables');
        $this->cek_status('Bukti_pembayaran');
    }

    public function index()
    {
        //$this->load->view('bukti_pembayaran/bukti_pembayaran_list', array(), FALSE);
        $this->render['content']   = $this->load->view('bukti_pembayaran/bukti_pembayaran_list', array(), TRUE);
        $this->load->view('template_admin', $this->render);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Bukti_pembayaran_model->json();
    }

    public function read($id) 
    {
        $row = $this->Bukti_pembayaran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'pengirim' => $row->pengirim,
		'penerima' => $row->penerima,
		'foto' => $row->foto,
		'tgl_upload' => $row->tgl_upload,
		'id_transaksi' => $row->id_transaksi,
	    );
            $this->render['content']   = $this->load->view('bukti_pembayaran/bukti_pembayaran_read', $data, TRUE);
            $this->load->view('template_admin', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bukti_pembayaran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('bukti_pembayaran/create_action'),
	    'id' => set_value('id'),
	    'pengirim' => set_value('pengirim'),
	    'penerima' => set_value('penerima'),
	    'foto' => set_value('foto'),
	    'tgl_upload' => set_value('tgl_upload'),
	    'id_transaksi' => set_value('id_transaksi'),
	);
        $this->render['content']   = $this->load->view('bukti_pembayaran/bukti_pembayaran_form', $data, TRUE);
        $this->load->view('template_admin', $this->render);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'pengirim' => $this->input->post('pengirim',TRUE),
		'penerima' => $this->input->post('penerima',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'tgl_upload' => $this->input->post('tgl_upload',TRUE),
		'id_transaksi' => $this->input->post('id_transaksi',TRUE),
	    );

            $this->Bukti_pembayaran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('bukti_pembayaran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Bukti_pembayaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('bukti_pembayaran/update_action'),
		'id' => set_value('id', $row->id),
		'pengirim' => set_value('pengirim', $row->pengirim),
		'penerima' => set_value('penerima', $row->penerima),
		'foto' => set_value('foto', $row->foto),
		'tgl_upload' => set_value('tgl_upload', $row->tgl_upload),
		'id_transaksi' => set_value('id_transaksi', $row->id_transaksi),
	    );
            $this->render['content']   = $this->load->view('bukti_pembayaran/bukti_pembayaran_form', $data, TRUE);
            $this->load->view('template_admin', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bukti_pembayaran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'pengirim' => $this->input->post('pengirim',TRUE),
		'penerima' => $this->input->post('penerima',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'tgl_upload' => $this->input->post('tgl_upload',TRUE),
		'id_transaksi' => $this->input->post('id_transaksi',TRUE),
	    );

            $this->Bukti_pembayaran_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('bukti_pembayaran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Bukti_pembayaran_model->get_by_id($id);

        if ($row) {
            $this->Bukti_pembayaran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bukti_pembayaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bukti_pembayaran'));
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
	$this->form_validation->set_rules('pengirim', 'pengirim', 'trim|required');
	$this->form_validation->set_rules('penerima', 'penerima', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');
	$this->form_validation->set_rules('tgl_upload', 'tgl upload', 'trim|required');
	$this->form_validation->set_rules('id_transaksi', 'id transaksi', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Bukti_pembayaran.php */
/* Location: ./application/controllers/Bukti_pembayaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-14 15:02:13 */
/* http://harviacode.com */