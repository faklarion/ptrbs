<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_kapal_keluar_model extends CI_Model
{

    public $table = 'tbl_kapal_keluar';
    public $id = 'id_kapal_keluar';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->join('tbl_kapal', 'tbl_kapal.id_kapal = tbl_kapal_keluar.id_kapal');
        return $this->db->get($this->table)->result();
    }

    function get_by_date($awal, $akhir)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->join('tbl_kapal', 'tbl_kapal.id_kapal = tbl_kapal_keluar.id_kapal');
        $this->db->where("tanggal_keluar BETWEEN '$awal' AND '$akhir'");
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
        $this->db->like('id_kapal_keluar', $q);
	$this->db->or_like('id_kapal', $q);
	$this->db->or_like('tanggal_keluar', $q);
	$this->db->or_like('pelabuhan_tujuan', $q);
	$this->db->or_like('muatan_keluar', $q);
	$this->db->or_like('alasan_keluar', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_kapal_keluar', $q);
	$this->db->or_like('id_kapal', $q);
	$this->db->or_like('tanggal_keluar', $q);
	$this->db->or_like('pelabuhan_tujuan', $q);
	$this->db->or_like('muatan_keluar', $q);
	$this->db->or_like('alasan_keluar', $q);
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

/* End of file Tbl_kapal_keluar_model.php */
/* Location: ./application/models/Tbl_kapal_keluar_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2025-01-21 07:31:32 */
/* http://harviacode.com */