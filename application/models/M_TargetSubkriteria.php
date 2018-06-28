<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_TargetSubkriteria extends CI_Model {

    public function __construct(){
		parent::__construct();
        $this->load->dbforge();
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

    public function simpanNilaiTarget($id,$data,$id_calon){
        $this->db->query("UPDATE target2 SET nilai_target2='".$data."' WHERE id_calon = '".$id_calon."'  and kd_subkriteria='".$id."'");
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

    // public function eigenvector_sub($kd_kriteria)
    // {
    //     $result = $this->db->query("SELECT eigenvector_sub FROM subkriteria WHERE kd_kriteria = '".$kd_kriteria."'");
    //     return $result->result();
    // }
 
    public function nilai_target2($kd_subkriteria)
    {
        $result = $this->db->query("SELECT nilai_target2,eigenvector_sub FROM target2,subkriteria,kriteria WHERE kriteria.kd_kriteria = subkriteria.kd_kriteria AND target2.kd_subkriteria = subkriteria.kd_subkriteria and subkriteria.kd_subkriteria = '".$kd_subkriteria."'");
        return $result->result();
    }

    public function max()
    {
        $result = $this->db->query("SELECT MAX(SK1) as maxSK1,MAX(SK2) as maxSK2,MAX(SK3) as maxSK3, MAX(SK4) as maxSK4,MAX(SK5) as maxSK5,MAX(SK6) as maxSK6,MAX(SK7) as maxSK7 FROM saw_sub");
        return $result->result();
    }

    public function getAllSAW_sub(){
        $result = $this->db->get('saw_sub');
        return $result->result();
    }

    public function eigenvector_sub()
    {
        $result = $this->db->query("SELECT eigenvector_sub FROM subkriteria");
        return $result->result();
    }

    //PERCOBAAN
    public function createTable($field)
    {
        $fields = array(
            'id_calon VARCHAR(10) not null',
            'periode_masuk date null'
        );

        foreach ($field as $item => $value) {
            $fields[] = $value->kd_subkriteria.' INT(4)';
        }

        $this->dbforge->add_field($fields);
        $this->dbforge->create_table('saw_sub');
    }

    public function dropTable($table){
        $this->dbforge->drop_table($table);
    }

    public function simpanTargetSAW($data)
    {
        $status = $this->db->insert('saw_sub', $data);
        return $status;
    }

    public function hilangkanTombol($id_calon)
    {
        $result = $this->db->query("SELECT * FROM target2 where id_calon = '$id_calon' and nilai_target2 != 0");
        return $result->result();
    }

    //coba coba

    // public function max($kd_subkriteria)
    // {
    //     $result = $this->db->query("SELECT target2.nilai_target2 FROM subkriteria,target2 WHERE subkriteria.kd_subkriteria = target2.kd_subkriteria and nilai_target2 = (SELECT max(nilai_target2) FROM target2 WHERE kd_subkriteria = '".$kd_subkriteria."')");
    //     return $result->result();
    // }


    // public function table_bayangan($id_calon,$kd_subkriteria)
    // {
    //     $result = $this->db->query("

    //         SELECT 

    //             (SELECT id_calon FROM target2 where id_calon = '$id_calon' GROUP BY id_calon) as id_calon

    //             ,periode_masuk,

    //             (SELECT nilai_target2 FROM target2 where kd_subkriteria = '$kd_subkriteria' and id_calon = '$id_calon' GROUP BY nilai_target2) as SK1,

    //             (SELECT nilai_target2 FROM target2 where kd_subkriteria = '$kd_subkriteria' and id_calon = '$id_calon' GROUP BY nilai_target2) as SK2,

    //             (SELECT nilai_target2 FROM target2 where kd_subkriteria = '$kd_subkriteria' and id_calon = '$id_calon' GROUP BY nilai_target2) as SK3,

    //             (SELECT nilai_target2 FROM target2 where kd_subkriteria = '$kd_subkriteria' and id_calon = '$id_calon' GROUP BY nilai_target2) as SK4,

    //             (SELECT nilai_target2 FROM target2 where kd_subkriteria = '$kd_subkriteria' and id_calon = '$id_calon' GROUP BY nilai_target2) as SK5,

    //             (SELECT nilai_target2 FROM target2 where kd_subkriteria = '$kd_subkriteria' and id_calon = '$id_calon' GROUP BY nilai_target2) as SK6,

    //             (SELECT nilai_target2 FROM target2 where kd_subkriteria = '$kd_subkriteria' and id_calon = '$id_calon' GROUP BY nilai_target2) as SK7

    //         from calon,target2 where calon.id_calon = target2.id_calon GROUP by id_calon

    //     ");
    //     return $result->result();
    // }


}



//backup
// public function max($kd_subkriteria)
//     {
//         $result = $this->db->query("SELECT subkriteria.nm_subkriteria,target2.nilai_target2 FROM subkriteria,target2 WHERE subkriteria.kd_subkriteria = target2.kd_subkriteria and nilai_target2 = (SELECT max(nilai_target2) FROM target2 WHERE kd_subkriteria = '".$kd_subkriteria."')");
//         return $result->result();
//     }
