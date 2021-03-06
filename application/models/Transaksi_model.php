<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{

    public $table = 'transaksi';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,tgl,total,metode,ongkir,status,id_customer');
        $this->datatables->from('transaksi');
        //add this line for join
        //$this->datatables->join('table2', 'transaksi.field = table2.field');
         $this->datatables->add_column('action', anchor(site_url('detail_transaksi/list/$1'),'<i class="fa fa-pencil"></i>','class="btn btn-info"')." | ".anchor(site_url('transaksi/delete/$1'),'<i class="fa fa-trash"></i>','class="btn btn-danger"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        return $this->datatables->generate();
    }

    function json_user($user) {
        $this->datatables->select('transaksi.id,tgl,total,metode,ongkir,detail_transaksi.status,id_customer,id_apotek');
        $this->datatables->from('transaksi');
        $this->datatables->where('produk.id_apotek',$user);
        $this->db->distinct();
        //add this line for join
        $this->datatables->join('detail_transaksi', 'transaksi.id = detail_transaksi.id_transaksi');
        $this->datatables->join('produk', 'detail_transaksi.id_produk = produk.id');
        $this->datatables->add_column('action', anchor(site_url('detail_transaksi/list/$1'),'<i class="fa fa-pencil"></i>','class="btn btn-info"')." | ".anchor(site_url('transaksi/delete/$1'),'<i class="fa fa-trash"></i>','class="btn btn-danger"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        return $this->datatables->generate();
    }

    function get_by_transaksi($transaksi)
    {
        $this->db->select('detail_transaksi.id,produk.id as id_produk,produk.nama,produk.id_apotek,produk.stok,harga,jumlah,gambar,berat,id_provinsi,id_kota');
        $this->db->join('produk','produk.id = detail_transaksi.id_produk');
        $this->db->join('apotek','produk.id_apotek = apotek.id');
        $this->db->where('id_transaksi',$transaksi);
        $this->db->where('status',1);
        $this->db->order_by('detail_transaksi.id', $this->order);
        return $this->db->get('detail_transaksi')->result();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
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
	$this->db->or_like('tgl', $q);
	$this->db->or_like('total', $q);
	$this->db->or_like('metode', $q);
	$this->db->or_like('ongkir', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('id_customer', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('tgl', $q);
	$this->db->or_like('total', $q);
	$this->db->or_like('metode', $q);
	$this->db->or_like('ongkir', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('id_customer', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
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

}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-14 15:02:13 */
/* http://harviacode.com */