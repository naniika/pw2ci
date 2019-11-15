<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMhs extends CI_Model {

	function retrieve($limit, $start){
		$this->db->limit($limit, $start);
		$q = $this->db->get('mhs');
		// if ($q->result()) {
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $d) {
				$data[] = array($d->nim, $d->nama, $d->alamat, $d->foto);
			}
			return $data;
		}else
			return false;
	}
	// cek login
	function ceklogin($table, $where){
		return $this->db->get_where($table,$where);
	}
	function add($data){ //$arg
		//$data = array ('nim'=>$arg[0], 'nama'=>$arg[1], 'alamat'=>$arg[2], 'foto'=>$arg[3]);
		$this->db->insert('mhs', $data);
	}
	function delete($id){
		$this->db->where('nim', $id);
		$this->db->delete('mhs');
	}
	public function fotoMhs($id){ // tambahan
		$this->db->where('nim', $id);
		return $this->db->get('mhs')->row();
	  }
	function update($id, $data){ //form
		//$data = array('nim'=>$form[0], 'nama'=>$form[1], 'alamat'=>$form[2], 'foto'=>$form[3]);
		$this->db->where('nim', $id);
		$this->db->update('mhs', $data);
	}
	function getMhs($id){
		$this->db->where('nim', $id);
		$q = $this->db->get('mhs');
		if ($q->result()) {
			foreach ($q->result() as $d) {
				$data = array($d->nim, $d->nama, $d->alamat, $d->foto);
			}
			return $data;
		}else
			return false;
	}
	public function record_count(){
		return $this->db->count_all('mhs');
	}
	public function fetch_mhs($limit, $start){
		$this->db->limit($limit, $start);
		$q = $this->db->get('mhs');
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = array($row->nim, $row->nama, $row->alamat, $row->foto);
			}
			return $data;
		}else
			return false;
	}
}
