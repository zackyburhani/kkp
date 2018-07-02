<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_LapRekapitulasiPenilaian extends CI_Model {

    public function __construct(){
		parent::__construct();
	}

    public function getLapRekapitulasiPenilaian($periode_masuk){
        $result = $this->db->query("SELECT calon.id_calon as calon_id,calon.nm_calon,
        (SELECT nilai_target2 FROM target2 WHERE kd_subkriteria = 'SK1' and id_calon = calon_id) as jurusan, 
        (SELECT nilai_target2 FROM target2 WHERE kd_subkriteria = 'SK2' and id_calon = calon_id) as skill,
        (SELECT nilai_target2 FROM target2 WHERE kd_subkriteria = 'SK3' and id_calon = calon_id) as tanggung_jawab,
        (SELECT nilai_target2 FROM target2 WHERE kd_subkriteria = 'SK4' and id_calon = calon_id) as kesiapan_kerja,
        (SELECT nilai_target2 FROM target2 WHERE kd_subkriteria = 'SK5' and id_calon = calon_id) as perilaku,
        (SELECT nilai_target2 FROM target2 WHERE kd_subkriteria = 'SK6' and id_calon = calon_id) as ketelitian,
        (SELECT nilai_target2 FROM target2 WHERE kd_subkriteria = 'SK7' and id_calon = calon_id) as kejujuran,
        (SELECT hasil_akhir FROM hasil WHERE id_calon = calon_id) as hasil
        FROM calon where calon.periode_masuk = '".$periode_masuk."'");
        return $result->result();
    }

    public function ExportExcel($periode_masuk){
        $result = $this->db->query("SELECT calon.id_calon as calon_id,calon.nm_calon as nm_calon,
        (SELECT nilai_target2 FROM target2 WHERE kd_subkriteria = 'SK1' and id_calon = calon_id) as jurusan, 
        (SELECT nilai_target2 FROM target2 WHERE kd_subkriteria = 'SK2' and id_calon = calon_id) as skill,
        (SELECT nilai_target2 FROM target2 WHERE kd_subkriteria = 'SK3' and id_calon = calon_id) as tanggung_jawab,
        (SELECT nilai_target2 FROM target2 WHERE kd_subkriteria = 'SK4' and id_calon = calon_id) as kesiapan_kerja,
        (SELECT nilai_target2 FROM target2 WHERE kd_subkriteria = 'SK5' and id_calon = calon_id) as perilaku,
        (SELECT nilai_target2 FROM target2 WHERE kd_subkriteria = 'SK6' and id_calon = calon_id) as ketelitian,
        (SELECT nilai_target2 FROM target2 WHERE kd_subkriteria = 'SK7' and id_calon = calon_id) as kejujuran,
        (SELECT hasil_akhir FROM hasil WHERE id_calon = calon_id) as hasil
        FROM calon where calon.periode_masuk = '".$periode_masuk."'");
        return $result;
    }
    
}
