<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_HasilKeputusan extends CI_Model {

    public function __construct(){
		parent::__construct();
	}
	
	public function getAllHasil($periode_masuk)
	{
		$result = $this->db->query("SELECT keterangan,calon.id_calon,nm_calon,hasil_akhir FROM calon JOIN hasil ON calon.id_calon = hasil.id_calon and periode_masuk = '".$periode_masuk."' order by hasil_akhir DESC");
		return $result->result();
	}

	public function getKesimpulan($periode_masuk)
	{
		$result = $this->db->query("SELECT nm_calon,hasil_akhir FROM calon,hasil WHERE calon.id_calon = hasil.id_calon and hasil_akhir = (SELECT max(hasil_akhir) FROM calon JOIN hasil ON calon.id_calon = hasil.id_calon WHERE periode_masuk = '".$periode_masuk."') and periode_masuk = '".$periode_masuk."'");
		return $result->result();
	}

	public function simpanHasil($id_calon,$keterangan){

		$this->db->query("UPDATE hasil SET keterangan = '".$keterangan."' WHERE id_calon = '".$id_calon."'");	        
    }

    public function barisHasil($periode_masuk)
    {
        $query = $this->db->query("SELECT * FROM hasil,calon WHERE calon.id_calon = hasil.id_calon and calon.periode_masuk = '".$periode_masuk."'");

        return $query->num_rows();
    }

 


	

}
