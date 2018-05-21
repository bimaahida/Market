<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->library('form_validation');        
    	$this->load->library('datatables');
    }

    public function index()
    {
        $this->cek_status('Produk/index');
        $this->render['content']   = $this->load->view('produk/produk_list', array(), TRUE);
        $this->load->view('template_admin', $this->render);
    } 
    public function index_customer($id = null){
        $this->load->model('Jenis_obat_model');
        
        $data['kategori'] = $this->Jenis_obat_model->get_all_by_produk();
        if ($id !== null) {
            $data['produk'] = $this->Produk_model->get_by_categori($id);   
        }else{
            $data['produk'] = $this->Produk_model->get_all();   
        }
        $this->render['content']   = $this->load->view('produk/list_produk_customer', $data, TRUE);
        $this->load->view('customer_template', $this->render);
    }

    public function create_transaksi($produk){
        $this->load->model('Detail_transaksi_model');
        if (!empty($this->session->userdata('transaksi_id'))) {
            $produk_data = $this->Detail_transaksi_model->get_by_produk($produk,$this->session->userdata('transaksi_id'));
            //var_dump($produk_data);
            if (empty($produk_data)) {
                $data = array(
                    'id_transaksi' => $this->session->userdata('transaksi_id'),
                    'id_produk' => $produk,
                    'jumlah' => 1,
                    'status' => 1,
                );   
                $this->Detail_transaksi_model->insert($data);
            }else{
                $data = array(
                    'jumlah' => $produk_data->jumlah + 1,
                );
                $this->Detail_transaksi_model->update($produk_data->id,$data);
            }

        }else{
            $this->load->model('Transaksi_model');
            $data_produk = $this->Produk_model->get_by_id($produk);
            
            $data = array(
                'total' => $data_produk->harga,
                'metode' => 'JNE',
                'ongkir' => 1,
                'status' => 1,
                'id_customer' => $this->session->userdata('logged_in')['id'],
            );
            
            $last_id = $this->Transaksi_model->insert($data);

            if (!empty($last_id)) {
                $this->session->set_userdata('transaksi_id',$last_id);
                $data = array(
                    'id_transaksi' => $this->session->userdata('transaksi_id'),
                    'id_produk' => $produk,
                    'jumlah' => 1,
                    'status' => 1,
                );
                $this->Detail_transaksi_model->insert($data);
            }
        }
        redirect(site_url('transaksi/cekout'));
    }
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Produk_model->json();
    }

    public function read($id) 
    {
        $row = $this->Produk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
		'komposisi' => $row->komposisi,
		'indikasi' => $row->indikasi,
		'isi' => $row->isi,
		'harga' => $row->harga,
		'gambar' => $row->gambar,
		'stok' => $row->stok,
		'berat' => $row->berat,
		'id_jenis' => $row->id_jenis,
		'id_apotek' => $row->id_apotek,
	    );
            $this->render['content']   = $this->load->view('produk/produk_read', $data, TRUE);
            $this->load->view('template_admin', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('produk/create_action'),
            'id' => set_value('id'),
            'nama' => set_value('nama'),
            'komposisi' => set_value('komposisi'),
            'indikasi' => set_value('indikasi'),
            'isi' => set_value('isi'),
            'harga' => set_value('harga'),
            'gambar' => set_value('gambar'),
            'stok' => set_value('stok'),
            'berat' => set_value('berat'),
            'id_jenis' => set_value('id_jenis'),
            'id_apotek' => set_value('id_apotek'),
        );
        $this->render['content']   = $this->load->view('produk/produk_form', $data, TRUE);
        $this->load->view('template_admin', $this->render);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $config['upload_path']          = './assets/upload/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1000000000;
            $config['max_width']            = 10240;
            $config['max_height']           = 7680;
            $this->load->library('upload', $config);

            // var_dump($this->upload->do_upload('gambar_form'));

            if ( ! $this->upload->do_upload('gambar_form'))
            {
                    $error = array('error' => $this->upload->display_errors());

                    var_dump($error);
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $data = array(
                    'nama' => $this->input->post('nama',TRUE),
                    'komposisi' => $this->input->post('komposisi',TRUE),
                    'indikasi' => $this->input->post('indikasi',TRUE),
                    'isi' => $this->input->post('isi',TRUE),
                    'harga' => $this->input->post('harga',TRUE),
                    'gambar' => $this->upload->data('file_name'),
                    'stok' => $this->input->post('stok',TRUE),
                    'berat' => $this->input->post('berat',TRUE),
                    'id_jenis' => $this->input->post('id_jenis',TRUE),
                    'id_apotek' => $this->input->post('id_apotek',TRUE),
                );
                $this->Produk_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('produk'));
            }
        }
    }
    
    public function update($id) 
    {
        $row = $this->Produk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('produk/update_action'),
                'id' => set_value('id', $row->id),
                'nama' => set_value('nama', $row->nama),
                'komposisi' => set_value('komposisi', $row->komposisi),
                'indikasi' => set_value('indikasi', $row->indikasi),
                'isi' => set_value('isi', $row->isi),
                'harga' => set_value('harga', $row->harga),
                'gambar' => set_value('gambar', $row->gambar),
                'stok' => set_value('stok', $row->stok),
                'berat' => set_value('berat', $row->berat),
                'id_jenis' => set_value('id_jenis', $row->id_jenis),
                'id_apotek' => set_value('id_apotek', $row->id_apotek),
                );
            $this->render['content']   = $this->load->view('produk/produk_form', $data, TRUE);
            $this->load->view('template_admin', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $config['upload_path']          = './assets/upload/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1000000000;
            $config['max_width']            = 10240;
            $config['max_height']           = 7680;
            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('gambar_form'))
                {
                    // $error = array('error' => $this->upload->display_errors());
                    // var_dump($error);
                    $data = array(
                        'nama' => $this->input->post('nama',TRUE),
                        'komposisi' => $this->input->post('komposisi',TRUE),
                        'indikasi' => $this->input->post('indikasi',TRUE),
                        'isi' => $this->input->post('isi',TRUE),
                        'harga' => $this->input->post('harga',TRUE),
                        'gambar' => $this->input->post('gambar',TRUE),
                        'stok' => $this->input->post('stok',TRUE),
                        'berat' => $this->input->post('berat',TRUE),
                        'id_jenis' => $this->input->post('id_jenis',TRUE),
                        'id_apotek' => $this->input->post('id_apotek',TRUE),
                    );
                }
                else
                {
                    if ($this->input->post('gambar',TRUE) == $this->upload->data('file_name')) {
                        $data = array(
                            'nama' => $this->input->post('nama',TRUE),
                            'komposisi' => $this->input->post('komposisi',TRUE),
                            'indikasi' => $this->input->post('indikasi',TRUE),
                            'isi' => $this->input->post('isi',TRUE),
                            'harga' => $this->input->post('harga',TRUE),
                            'gambar' => $this->input->post('gambar',TRUE),
                            'stok' => $this->input->post('stok',TRUE),
                            'berat' => $this->input->post('berat',TRUE),
                            'id_jenis' => $this->input->post('id_jenis',TRUE),
                            'id_apotek' => $this->input->post('id_apotek',TRUE),
                        );
                    }else{
                        $data = array(
                            'nama' => $this->input->post('nama',TRUE),
                            'komposisi' => $this->input->post('komposisi',TRUE),
                            'indikasi' => $this->input->post('indikasi',TRUE),
                            'isi' => $this->input->post('isi',TRUE),
                            'harga' => $this->input->post('harga',TRUE),
                            'gambar' => $this->upload->data('file_name'),
                            'stok' => $this->input->post('stok',TRUE),
                            'berat' => $this->input->post('berat',TRUE),
                            'id_jenis' => $this->input->post('id_jenis',TRUE),
                            'id_apotek' => $this->input->post('id_apotek',TRUE),
                            );
                    }
                }
                $this->Produk_model->update($this->input->post('id', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('produk'));   
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Produk_model->get_by_id($id);

        if ($row) {
            $this->Produk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('produk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produk'));
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
	$this->form_validation->set_rules('komposisi', 'komposisi', 'trim|required');
	$this->form_validation->set_rules('indikasi', 'indikasi', 'trim|required');
	$this->form_validation->set_rules('isi', 'isi', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('stok', 'stok', 'trim|required');
	$this->form_validation->set_rules('berat', 'berat', 'trim|required|numeric');
	$this->form_validation->set_rules('id_jenis', 'id jenis', 'trim|required');
	$this->form_validation->set_rules('id_apotek', 'id apotek', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-24 16:26:15 */
/* http://harviacode.com */