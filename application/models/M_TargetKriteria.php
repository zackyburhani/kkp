<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_TargetKriteria extends CI_Model {

    public function __construct()
    {
		parent::__construct();
	}

    //simpan
	public function simpanTarget($data)
    {
		$checkinsert = false;
		try{
			$this->db->insert('target',$data);
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

    //ambil data per-periode
    public function periode($periode_masuk)
    {
    	$result = $this->db->query("SELECT * FROM calon WHERE periode_masuk = '".$periode_masuk."'");
    	return $result->result();
    }

    //ambil nilai 
    public function nilaiDetail()
    {
    	$result = $this->db->query("SELECT * FROM calon JOIN target ON calon.id_calon = target.id_calon");
    	return $result->result();
    }

    //ambil nilai berdasarkan id
    public function nilai($id_calon)
    {
    	$result = $this->db->query("SELECT * FROM target JOIN kriteria ON target.kd_kriteria = kriteria.kd_kriteria WHERE id_calon ='".$id_calon."'");
    	return $result->result();
    }

}
