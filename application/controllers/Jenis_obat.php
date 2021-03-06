<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_obat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_obat_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');

        $this->cek_status('Jenis_obat');
    }

    public function index()
    {
        $this->render['content']   = $this->load->view('jenis_obat/jenis_obat_list', array(), TRUE);
        $this->load->view('template_admin', $this->render);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Jenis_obat_model->json();
    }

    public function read($id) 
    {
        $row = $this->Jenis_obat_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
	    );
            $this->render['content']   = $this->load->view('jenis_obat/jenis_obat_read', $data, TRUE);
            $this->load->view('template_admin', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_obat'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenis_obat/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	);
        $this->render['content']   = $this->load->view('jenis_obat/jenis_obat_form', $data, TRUE);
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
	    );

            $this->Jenis_obat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_obat'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenis_obat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis_obat/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
	    );
            $this->render['content']   = $this->load->view('jenis_obat/jenis_obat_form', $data, TRUE);
        $this->load->view('template_admin', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_obat'));
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
	    );

            $this->Jenis_obat_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_obat'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenis_obat_model->get_by_id($id);

        if ($row) {
            $this->Jenis_obat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_obat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_obat'));
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

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenis_obat.php */
/* Location: ./application/controllers/Jenis_obat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-24 17:01:52 */
/* http://harviacode.com */