<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T101_spp2_model extends CI_Model
{

    public $table = 't101_spp2';
    public $id = 'idspp';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
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
        $this->db->like('idspp', $q);
	$this->db->or_like('idsiswa', $q);
	$this->db->or_like('jatuhtempo', $q);
	$this->db->or_like('bulan', $q);
	$this->db->or_like('nobayar', $q);
	$this->db->or_like('tglbayar', $q);
	$this->db->or_like('byrspp', $q);
	$this->db->or_like('byrcatering', $q);
	$this->db->or_like('byrworksheet', $q);
	$this->db->or_like('ket', $q);
	$this->db->or_like('idadmin', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idspp', $q);
	$this->db->or_like('idsiswa', $q);
	$this->db->or_like('jatuhtempo', $q);
	$this->db->or_like('bulan', $q);
	$this->db->or_like('nobayar', $q);
	$this->db->or_like('tglbayar', $q);
	$this->db->or_like('byrspp', $q);
	$this->db->or_like('byrcatering', $q);
	$this->db->or_like('byrworksheet', $q);
	$this->db->or_like('ket', $q);
	$this->db->or_like('idadmin', $q);
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

    // get total rows
    function total_rows_2($q = NULL) {
        $this->db->select('t101_spp2.*, nis, namasiswa, tahunajaran');
        $this->db->from($this->table);
        $this->db->join('t004_siswa', 't101_spp2.idsiswa = t004_siswa.idsiswa', 'left');
        $this->db->where('nobayar', '');
        $this->db->like('nis', $q);
        $this->db->or_like('namasiswa', $q);
        $this->db->group_by('t101_spp2.idsiswa');
        return $this->db->count_all_results();
    }

    // get data with limit and search, only nis and namasiswa
    function get_limit_data_2($limit, $start = 0, $q = NULL) {
        // $query = "select a.*, b.nis, b.namasiswa, b.tahunajaran from t101_spp2 a left join t004_siswa b on a.idsiswa = b.idsiswa where (nis like '%".$q."%' or namasiswa like '%".$q."%') and nobayar = '' group by a.idsiswa";
        // return $this->db->query($query)->result();
        $this->db->select('idspp, t101_spp2.idsiswa, nis, namasiswa, tahunajaran, t003_kelas.kelas, t101_spp2.byrspp, t101_spp2.byrcatering, t101_spp2.byrworksheet');
        $this->db->from($this->table);
        $this->db->join('t004_siswa', 't101_spp2.idsiswa = t004_siswa.idsiswa', 'left');
        $this->db->join('t003_kelas', 't004_siswa.idkelas = t003_kelas.idkelas', 'left');
        $this->db->where('nobayar', '');
        $this->db->like('nis', $q);
        $this->db->or_like('namasiswa', $q);
        $this->db->group_by('t101_spp2.idsiswa');
        return $this->db->get()->result();
    }

}

/* End of file T101_spp2_model.php */
/* Location: ./application/models/T101_spp2_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-18 18:31:54 */
/* http://harviacode.com */