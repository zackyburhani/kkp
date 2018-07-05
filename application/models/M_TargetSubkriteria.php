<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_TargetSubkriteria extends CI_Model {

    public function __construct()
    {
		parent::__construct();
	}

	public function simpanTarget($data)
    {
		$checkinsert = false;
		try{
			$this->db->insert('target2',$data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		} 
		return $checkinsert;
	}

    public function simpanNilaiTarget($id,$data,$id_calon)
    {
        $this->db->query("UPDATE target2 SET nilai_target2='".$data."' WHERE id_calon = '".$id_calon."'  and kd_subkriteria='".$id."'");
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

    //coba
    public function periode2($periode_masuk)
    {
        $result = $this->db->query("SELECT id_calon,nm_calon FROM calon WHERE periode_masuk = '".$periode_masuk."'");
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
 
    public function nilai_target2($kd_subkriteria)
    {
        $result = $this->db->query("SELECT nilai_target2,eigenvector_sub FROM target2,subkriteria,kriteria WHERE kriteria.kd_kriteria = subkriteria.kd_kriteria AND target2.kd_subkriteria = subkriteria.kd_subkriteria and subkriteria.kd_subkriteria = '".$kd_subkriteria."'");
        return $result->result();
    }

    public function max()
    {
        $result = $this->db->query("
            SELECT 
                (SELECT MAX(nilai_target2) FROM target2 WHERE target2.kd_subkriteria = 'SK1') as maxSK1,
                (SELECT MAX(nilai_target2) FROM target2 WHERE target2.kd_subkriteria = 'SK2') as maxSK2,
                (SELECT MAX(nilai_target2) FROM target2 WHERE target2.kd_subkriteria = 'SK3') as maxSK3,
                (SELECT MAX(nilai_target2) FROM target2 WHERE target2.kd_subkriteria = 'SK4') as maxSK4,
                (SELECT MAX(nilai_target2) FROM target2 WHERE target2.kd_subkriteria = 'SK5') as maxSK5,
                (SELECT MAX(nilai_target2) FROM target2 WHERE target2.kd_subkriteria = 'SK6') as maxSK6,
                (SELECT MAX(nilai_target2) FROM target2 WHERE target2.kd_subkriteria = 'SK7') as maxSK7
            FROM target2 GROUP by maxSK1
        ");
        return $result->result();
    }

    public function getAllSAW_sub($tgl)
    {
        $result = $this->db->query("
            SELECT calon.id_calon as calon_id,periode_masuk,
                (SELECT target2.nilai_target2 FROM target2 WHERE target2.kd_subkriteria = 'SK1' AND id_calon = calon_id) as SK1,
                (SELECT target2.nilai_target2 FROM target2 WHERE target2.kd_subkriteria = 'SK2' AND id_calon = calon_id) as SK2,
                (SELECT target2.nilai_target2 FROM target2 WHERE target2.kd_subkriteria = 'SK3' AND id_calon = calon_id) as SK3,
                (SELECT target2.nilai_target2 FROM target2 WHERE target2.kd_subkriteria = 'SK4' AND id_calon = calon_id) as SK4,
                (SELECT target2.nilai_target2 FROM target2 WHERE target2.kd_subkriteria = 'SK5' AND id_calon = calon_id) as SK5,
                (SELECT target2.nilai_target2 FROM target2 WHERE target2.kd_subkriteria = 'SK6' AND id_calon = calon_id) as SK6,
                (SELECT target2.nilai_target2 FROM target2 WHERE target2.kd_subkriteria = 'SK7' AND id_calon = calon_id) as SK7
            FROM target2,calon WHERE calon.id_calon = target2.id_calon and periode_masuk = '$tgl' GROUP by calon.id_calon
        ");
        return $result->result();
    }

    public function eigenvector_sub()
    {
        $result = $this->db->query("SELECT eigenvector_sub FROM subkriteria");
        return $result->result();
    }

    public function hilangkanTombol($id_calon)
    {
        $result = $this->db->query("SELECT * FROM target2 where id_calon = '$id_calon' and nilai_target2 != 0");
        return $result->result();
    }

}