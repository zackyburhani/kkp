<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_MatriksKriteria extends CI_Model {

    public function __construct(){
		parent::__construct();
	}

    public function nilaiTarget($id_calon)
    {
        $result = $this->db->query("SELECT * FROM saw where id_calon='".$id_calon."'");
        return $result->result();
    }
        
    public function matriksNormalisasi($tgl,$id_calon)
    {
        $result = $this->db->query("SELECT saw.id_calon,calon.periode_masuk,K1,K2,K3 FROM calon, saw WHERE saw.periode_masuk = '".$tgl."' and saw.id_calon = '".$id_calon."' GROUP by K1");
        return $result->result();
    }

    public function max()
    {
        $result = $this->db->query("SELECT MAX(K1) as maxK1,MAX(K2) as maxK2,MAX(K3) as maxK3 FROM saw");
        return $result->result();
    }

    public function eigenvector()
    {
        $result = $this->db->query("SELECT eigenvector FROM kriteria");
        return $result->result();
    }

    public function getAllSAW($tgl){
        $result = $this->db->query("SELECT * FROM saw JOIN calon on calon.id_calon = saw.id_calon WHERE calon.periode_masuk = '$tgl'");
        return $result->result();
    }

    public function simpanHasilSAW($data)
    {
        $status = $this->db->insert('hasil', $data);
        return $status;
    }

    public function hilangkanTombol($tgl)
    {
        $result = $this->db->query("SELECT * FROM hasil JOIN calon on hasil.id_calon = calon.id_calon WHERE calon.periode_masuk = '$tgl'");
        return $result->result();
    }
}