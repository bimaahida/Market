<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detail_transaksi_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
        $this->cek_status('Detail_transaksi');
    }

    public function list($transaksi)
    {
        $this->render['content']   = $this->load->view('detail_transaksi/detail_transaksi_list', array('transaksi' => $transaksi), TRUE);
        $this->load->view('template_admin', $this->render);
    } 

    public function update_status($id,$transaksi,$status){
        $this->load->model('Transaksi_model');
        if ($status == 'konfirm') {
            $data = array(
                'status' => 0
            );
        }else{
            $data = array(
                'status' => 2
            );
        }
        $this->Detail_transaksi_model->update($id, $data);
        $data = array(
            'status' => 3
        );
        $this->Transaksi_model->update($transaksi, $data);
        redirect(site_url('detail_transaksi/list/'.$transaksi));

    }
    
    public function json($transaksi) {
        header('Content-Type: application/json');
        echo $this->Detail_transaksi_model->json($transaksi);
    }

    public function read($id) 
    {
        $row = $this->Detail_transaksi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_transaksi' => $row->id_transaksi,
		'id_produk' => $row->id_produk,
		'jumlah' => $row->jumlah,
		'status' => $row->status,
	    );
            $this->load->view('detail_transaksi/detail_transaksi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_transaksi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detail_transaksi/create_action'),
	    'id' => set_value('id'),
	    'id_transaksi' => set_value('id_transaksi'),
	    'id_produk' => set_value('id_produk'),
	    'jumlah' => set_value('jumlah'),
	    'status' => set_value('status'),
	);
        $this->load->view('detail_transaksi/detail_transaksi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_transaksi' => $this->input->post('id_transaksi',TRUE),
		'id_produk' => $this->input->post('id_produk',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Detail_transaksi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detail_transaksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detail_transaksi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detail_transaksi/update_action'),
		'id' => set_value('id', $row->id),
		'id_transaksi' => set_value('id_transaksi', $row->id_transaksi),
		'id_produk' => set_value('id_produk', $row->id_produk),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'status' => set_value('status', $row->status),
	    );
            $this->load->view('detail_transaksi/detail_transaksi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_transaksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_transaksi' => $this->input->post('id_transaksi',TRUE),
		'id_produk' => $this->input->post('id_produk',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Detail_transaksi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detail_transaksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detail_transaksi_model->get_by_id($id);

        if ($row) {
            $this->Detail_transaksi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detail_transaksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_transaksi'));
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
	$this->form_validation->set_rules('id_transaksi', 'id transaksi', 'trim|required');
	$this->form_validation->set_rules('id_produk', 'id produk', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Detail_transaksi.php */
/* Location: ./application/controllers/Detail_transaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-14 15:02:13 */
/* http://harviacode.com */