<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_MatriksSubkriteria extends CI_Model {

    public function __construct(){
		parent::__construct();
	}

	public function matriksTarget($kd_kriteria)
    {
    	$result = $this->db->query("SELECT * FROM calon,target2,subkriteria where subkriteria.kd_subkriteria = target2.kd_subkriteria and calon.id_calon = target2.id_calon AND kd_kriteria = '".$kd_kriteria."'");
    	return $result->result();
    }

    public function matriksTargetNilai($id_calon,$kd_kriteria)
    {
    	$result = $this->db->query("SELECT * FROM target2,kriteria,subkriteria WHERE target2.kd_subkriteria = subkriteria.kd_subkriteria and kriteria.kd_kriteria = subkriteria.kd_kriteria and id_calon = '".$id_calon."' and kriteria.kd_kriteria = '".$kd_kriteria."'");
    	return $result->result();
    }

    public function matriksNormalisasi($tgl,$id_calon)
    {
        $result = $this->db->query("SELECT saw_sub.id_calon,calon.periode_masuk,SK1,SK2,SK3,SK4,SK5,SK6,SK7 FROM calon, saw_sub WHERE saw_sub.periode_masuk = '".$tgl."' and saw_sub.id_calon = '".$id_calon."' GROUP by SK1");
        return $result->result();
    }



}