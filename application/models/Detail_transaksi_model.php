<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_transaksi_model extends CI_Model
{

    public $table = 'detail_transaksi';
    public $id = 'detail_transaksi.id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json($transaksi) {
        $this->datatables->select('id,id_transaksi,id_produk,jumlah,status');
        $this->datatables->from('detail_transaksi');
        $this->datatables->where('id_transaksi',$transaksi);
        //add this line for join
        //$this->datatables->join('table2', 'detail_transaksi.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('detail_transaksi/update_status/$1/'.$transaksi.'/konfirm'),'Konfimasi')." | ".anchor(site_url('detail_transaksi/update_status/$1/'.$transaksi.'/konfirm'),'Reject'), 'id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_by_produk($produk,$transaksi)
    {
        $this->db->where('id_transaksi', $transaksi);
        $this->db->where('id_produk', $produk);
        return $this->db->get($this->table)->row();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('id_transaksi', $q);
	$this->db->or_like('id_produk', $q);
	$this->db->or_like('jumlah', $q);
	$this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('id_transaksi', $q);
	$this->db->or_like('id_produk', $q);
	$this->db->or_like('jumlah', $q);
	$this->db->or_like('status', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    function delete_by_transaksi($id)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->delete($this->table);
    }
    

}

/* End of file Detail_transaksi_model.php */
/* Location: ./application/models/Detail_transaksi_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-14 15:02:13 */
/* http://harviacode.com */