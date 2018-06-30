<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_TargetKriteria extends CI_Model {

    public function __construct()
    {
		parent::__construct();
	}

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
	
	public function getAllCalon()
    {
		$result = $this->db->get('calon');
		return $result->result();
	}

    public function periode($periode_masuk)
    {
    	$result = $this->db->query("SELECT * FROM calon WHERE periode_masuk = '".$periode_masuk."'");
    	return $result->result();
    }

    public function nilaiDetail()
    {
    	$result = $this->db->query("SELECT * FROM calon JOIN target ON calon.id_calon = target.id_calon");
    	return $result->result();
    }

    public function nilai($id_calon)
    {
    	$result = $this->db->query("SELECT * FROM target JOIN kriteria ON target.kd_kriteria = kriteria.kd_kriteria WHERE id_calon ='".$id_calon."'");
    	return $result->result();
    }

    public function CetakPeriode($periode)
    {
     	$result = $this->db->query("SELECT * FROM calon WHERE periode_masuk = '".$periode."'");
     	return $result->result();
    }

}
