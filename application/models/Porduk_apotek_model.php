<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Porduk_apotek_model extends CI_Model
{

    public $table = 'porduk_apotek';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,id_apotek,id_produk');
        $this->datatables->from('porduk_apotek');
        //add this line for join
        //$this->datatables->join('table2', 'porduk_apotek.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('porduk_apotek/read/$1'),'Read')." | ".anchor(site_url('porduk_apotek/update/$1'),'Update')." | ".anchor(site_url('porduk_apotek/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        return $this->datatables->generate();
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
	$this->db->or_like('id_apotek', $q);
	$this->db->or_like('id_produk', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('id_apotek', $q);
	$this->db->or_like('id_produk', $q);
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

}

/* End of file Porduk_apotek_model.php */
/* Location: ./application/models/Porduk_apotek_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-14 15:02:13 */
/* http://harviacode.com */