<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->library('form_validation');        
    	$this->load->library('datatables');
        $this->cek_status('Transaksi');
    }

    public function index()
    {
        $data = array(
            'user'=> $this->session->userdata('logged_in')['id'],
            'status' => $this->session->userdata('logged_in')['status'],
        );
        $this->render['content']   = $this->load->view('transaksi/transaksi_list', $data, TRUE);
        $this->load->view('template_admin', $this->render);
    } 

    public function cekout(){
        $data = array(
            'transaksi' => $this->Transaksi_model->get_by_transaksi($this->session->userdata('transaksi_id')),
            'detail' => $this->Transaksi_model->get_by_id($this->session->userdata('transaksi_id'))
        );
        // var_dump($data);
        $this->render['content']   = $this->load->view('transaksi/cekout', $data, TRUE);
        $this->load->view('customer_template', $this->render);
    }

    public function delete_cekout($id){
        $this->load->model('Detail_transaksi_model');
        
        $row = $this->Detail_transaksi_model->get_by_id($id);
        if ($row) {
            $this->Detail_transaksi_model->delete($id);
        }
        redirect(site_url('transaksi/cekout'));
    }

    public function update_cekout($id_transaksi){
        $this->load->model('Detail_transaksi_model');
        $this->load->model('Customer_model');
        if (!empty($id_transaksi)) {
            $produk = $this->Transaksi_model->get_by_transaksi($id_transaksi);
            $user = $this->Customer_model->get_by_id_login($this->session->userdata('logged_in')['id']);
            
            $i = 0;
            $total = 0;
            $ongkir = 0;
            $url = "https://api.rajaongkir.com/starter/cost";
            $metod = "POST";
            $id_apotek = null;
            
            foreach ($produk as $key) {
                if ($key !== $this->input->post("num-product$i",TRUE)) {
                    
                    if (empty($id_apotek) || $id_apotek !== $key->id_apotek) {
                        $query = "origin=$key->id_kota&destination=$user->id_kota&weight=$key->berat&courier=jne";
                        $data_api = $this->api($url,$metod,$query);
                        $ongkir += json_decode($data_api)->rajaongkir->results[0]->costs[0]->cost[0]->value;
                        $id_apotek = $key->id_apotek;   
                    }
                    $data = array(
                        'jumlah'=> $this->input->post("num-product$i",TRUE)
                    );
                    $this->Detail_transaksi_model->update($key->id,$data);

                    $total += ($key->harga * $this->input->post("num-product$i",TRUE));
                }
                $i++;
            }
            $data = array(
                'total' => $total,
                'ongkir' => $ongkir,
            );
            $this->Transaksi_model->update($id_transaksi,$data);
        }
        redirect(site_url('transaksi/cekout'));
    }
    
    public function finis_cekout($id_transaksi){
        $this->load->model('Produk_model');
        if (!empty($id_transaksi)) {
            $produk_all = $this->Transaksi_model->get_by_transaksi($id_transaksi);
            foreach ($produk_all as $key) {
                $produk = $this->Produk_model->get_by_id($key->id_produk);
                $stok = $produk->stok - $key->jumlah;
                $data = array(
                    'stok' => $stok,
                );
                $this->Produk_model->update($produk->id,$data);
            }
            $data = array(
                'status'=> 2,
            );
            $this->Transaksi_model->update($id_transaksi,$data);
            $this->session->unset_userdata('transaksi_id');
        }
        redirect(site_url('produk/index_customer'));
    }
    public function cancle_cekout($id_transaksi){
        $this->load->model('Detail_transaksi_model');
        if (!empty($id_transaksi)) {
            $this->Transaksi_model->delete($id_transaksi);
            $this->Detail_transaksi_model->delete_by_transaksi($id_transaksi);
            $this->session->unset_userdata('transaksi_id');
        }
        redirect(site_url('produk/index_customer'));
    }
    public function json($user,$status) {
        header('Content-Type: application/json');
        if ($status == 0) {
            echo $this->Transaksi_model->json();   
        }else{
            echo $this->Transaksi_model->json_user($user);
        }
    }

    public function read($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'tgl' => $row->tgl,
		'total' => $row->total,
		'metode' => $row->metode,
		'ongkir' => $row->ongkir,
		'status' => $row->status,
		'id_customer' => $row->id_customer,
	    );
            $this->render['content']   = $this->load->view('transaksi/transaksi_read', $data, TRUE);
            $this->load->view('template_admin', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi/create_action'),
	    'id' => set_value('id'),
	    'tgl' => set_value('tgl'),
	    'total' => set_value('total'),
	    'metode' => set_value('metode'),
	    'ongkir' => set_value('ongkir'),
	    'status' => set_value('status'),
	    'id_customer' => set_value('id_customer'),
	);
        $this->render['content']   = $this->load->view('transaksi/transaksi_form', $data, TRUE);
        $this->load->view('template_admin', $this->render);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tgl' => $this->input->post('tgl',TRUE),
		'total' => $this->input->post('total',TRUE),
		'metode' => $this->input->post('metode',TRUE),
		'ongkir' => $this->input->post('ongkir',TRUE),
		'status' => $this->input->post('status',TRUE),
		'id_customer' => $this->input->post('id_customer',TRUE),
	    );

            $this->Transaksi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi/update_action'),
		'id' => set_value('id', $row->id),
		'tgl' => set_value('tgl', $row->tgl),
		'total' => set_value('total', $row->total),
		'metode' => set_value('metode', $row->metode),
		'ongkir' => set_value('ongkir', $row->ongkir),
		'status' => set_value('status', $row->status),
		'id_customer' => set_value('id_customer', $row->id_customer),
	    );
            $this->render['content']   = $this->load->view('transaksi/transaksi_form', $data, TRUE);
            $this->load->view('template_admin', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'tgl' => $this->input->post('tgl',TRUE),
		'total' => $this->input->post('total',TRUE),
		'metode' => $this->input->post('metode',TRUE),
		'ongkir' => $this->input->post('ongkir',TRUE),
		'status' => $this->input->post('status',TRUE),
		'id_customer' => $this->input->post('id_customer',TRUE),
	    );

            $this->Transaksi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);

        if ($row) {
            $this->Transaksi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
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
	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('total', 'total', 'trim|required');
	$this->form_validation->set_rules('metode', 'metode', 'trim|required');
	$this->form_validation->set_rules('ongkir', 'ongkir', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('id_customer', 'id customer', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    private function api($url,$metod,$post){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $metod,
        CURLOPT_POSTFIELDS => $post,
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: 6837122f92ac9ed5da97b37b5c75ee9e"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        return "cURL Error #:" . $err;
        } else {
        return $response;
        }
    }

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-14 15:02:13 */
/* http://harviacode.com */