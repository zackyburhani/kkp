<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Calon extends CI_Model {

    public function __construct()
    {
		parent::__construct();
	}

	//simpan
	public function tambahCalon($data)
	{
		$checkinsert = false;
		try{
			$this->db->insert('calon',$data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		}
		return $checkinsert;
	}
	
	//ambil semua data calon
	public function getAllCalon()
	{
		$result = $this->db->get('calon');
		return $result->result();
	}

	//ambil semua data calon berdasarkan id
	public function getCalon($id)
	{
		$result = $this->db->where('id_calon',$id)->get('calon');
		return $result->row();
	}

	//update
	public function UpdateCalon($id,$data)
	{
		$checkupdate = false;
		try{
			$this->db->where('id_calon',$id);
			$this->db->update('calon',$data);
			$checkupdate = true;
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;
	}

	//hapus
	public function DeleteCalon($id)
	{
		$checkupdate = false;
		try{
			$this->db->where('id_calon',$id);
			$this->db->delete('calon');
			$checkupdate = true;
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;
	}

	//autonumber calon
	public function getKodeCalon()
    {
       	$q  = $this->db->query("select MAX(RIGHT(id_calon,3)) as kd_max from calon");
       	$kd = "";
    	if($q->num_rows() > 0) {
        	foreach ($q->result() as $k) {
          		$tmp = ((int)$k->kd_max)+1;
           		$kd = sprintf("%03s",$tmp);
        	}
    	} else {
         $kd = "001";
    	}
       	return "CL".$kd;
    }

    //tampil data per-periode
    public function periode($periode_masuk)
    {
     	$result = $this->db->query("SELECT * FROM calon WHERE periode_masuk = '".$periode_masuk."'");
     	return $result->result();
    }

    //cetak periode
    public function CetakPeriode($periode)
    {
    	$result = $this->db->query("SELECT * FROM calon WHERE periode_masuk = '".$periode."'");
     	return $result->result();
    }

    //mencari baris
    public function jumlah($table)
  	{
    	$query = $this->db->query("SELECT * FROM $table");
    	return $query->num_rows();
  	}

  	//validasi hapus
  	public function validasiHapus($kolom,$table,$id)
    {
     	$result = $this->db->query("SELECT $kolom FROM $table WHERE $kolom = '$id'");
     	return $result->row();
    }
}
