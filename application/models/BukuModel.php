<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BukuModel extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		//melakukan koneksi database
		$this->load->database();
	}
	public function all(){
		//ambil semua data tabel buku
		return $this->db->get('buku');
	}
	public function getWhere($where){
		//ambil data sesuai kriteria pada tabel buku
		$this->db->where($where);
		return $this->db->get('buku');
	}
	public function insert($data){
		// melakukan insert ke tabel buku
		return $this->db->insert('buku',$data);
	}
	public function update($data,$where){
		//melakukan update ke tabel buku
		$this->db->where($where);
		return $this->db->update('buku',$data);
	}
	public function delete($where){
		//menghapus data pada tabel buku sesuai kriteria
		return $this->db->delete('buku',$where);
	}
	
}
?>