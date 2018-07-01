<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_LapPerangkinganNilai extends CI_Model {

    public function __construct(){
		parent::__construct();
	}

    public function getLapPerangkinganNilai($periode_masuk){
        $result = $this->db->query("SELECT calon.id_calon, calon.nm_calon, hasil.hasil_akhir, hasil.keterangan from calon join hasil on calon.id_calon=hasil.id_calon WHERE calon.periode_masuk='".$periode_masuk."' order by hasil_akhir DESC");
        return $result->result();
    }
    
}
