<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Kriteria extends CI_Model {

    public function __construct()
    {
		parent::__construct();
	}

	//simpan
	public function tambahKriteria($data)
	{
		$checkinsert = false;
		try{
			$this->db->insert('kriteria',$data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		}
		return $checkinsert;
	}

	//simpan
	public function tambahBanding($data)
	{
		$checkinsert = false;
		try{
			$this->db->insert('banding',$data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		}
		return $checkinsert;
	}

	//ambil semua data kriteria
	public function getAllKriteria()
	{
		$result = $this->db->get('kriteria');
		return $result->result();
	}

	//ambil data kriteria sesuai id
	public function getNamaKriteria($kd)
	{
		$result = $this->db->query("SELECT nm_kriteria,kd_kriteria FROM kriteria where kriteria.kd_kriteria = '$kd'");
		return $result->row();
	}

	//ambil data kriteria sesuai id
	public function getKriteria($id)
	{
		$result = $this->db->where('kd_kriteria',$id)->get('kriteria');
		return $result->row();
	}

	//update
	public function UpdateKriteria($id,$data)
	{
		$checkupdate = false;
		try{
			$this->db->where('kd_kriteria',$id);
			$this->db->update('kriteria',$data);
			$checkupdate = true;
		}catch (Exception $ex) {

			$checkupdate = false;
		}
		return $checkupdate;
	}

	//hapus
	public function DeleteKriteria($id)
	{
		$checkupdate = false;
		try{
			$this->db->where('kd_kriteria',$id);
			$this->db->delete('kriteria');
			$checkupdate = true;
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;
	}
	
	//autonumber kriteria
	public function getKdKriteria()
    {
    	$q  = $this->db->query("select MAX(RIGHT(kd_kriteria,1)) as kd_max from kriteria");
       	$kd = "";
       	if($q->num_rows() > 0) {
         	foreach ($q->result() as $k) {
           		$tmp = ((int)$k->kd_max)+1;
           		$kd = sprintf("%01s",$tmp);
        	}
       } else {
         $kd = "1";
       }
       return "K".$kd;
     }

     //simpan eigenvector
     public function InsertEigenvector($id,$data)
     {
		$checkupdate = false;
		try{
			$this->db->where('kd_kriteria',$id);
			$this->db->update('kriteria',$data);
			$checkupdate = true;
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;
	}

	//cari baris
	public function jumlah($table)
  	{
    	$query = $this->db->query("SELECT * FROM $table");
    	return $query->num_rows();
  	}

  	//validasi eigenvector
  	public function cekEigenvector()
  	{
    	$query = $this->db->query("SELECT kriteria.eigenvector FROM kriteria");
    	return $query->row();
  	}
}
