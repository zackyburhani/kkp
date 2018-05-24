<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_TargetSubkriteria extends CI_Model {

    public function __construct(){
		parent::__construct();
	}

	public function simpanTarget($data){

		$checkinsert = false;

		try{

			$this->db->insert('target2',$data);
			$checkinsert = true;
		}catch (Exception $ex) {

			$checkinsert = false;
		}

		return $checkinsert;
	}

	
	public function getAllCalon(){
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
    	$result = $this->db->query("SELECT * FROM calon JOIN target2 ON calon.id_calon = target2.id_calon");
    	return $result->result();
    }

    public function nilai($id_calon)
    {
    	$result = $this->db->query("SELECT * FROM target2 JOIN subkriteria ON target2.kd_subkriteria = subkriteria.kd_subkriteria WHERE id_calon ='".$id_calon."'");
    	return $result->result();
    }

    public function CetakPeriode($periode)
    {
     	$result = $this->db->query("SELECT * FROM calon WHERE periode_masuk = '".$periode."'");
     	return $result->result();
    }

}
