<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_LapPerangkinganNilai extends CI_Model {

    public function __construct(){
		parent::__construct();
	}

    //ambil data untuk perangkingan nilai
    public function getLapPerangkinganNilai($periode_masuk)
    {
        $result = $this->db->query("
            SELECT calon.id_calon as calon_id, calon.nm_calon,
                (SELECT nilai_target FROM target,calon WHERE target.id_calon = calon.id_calon and calon.id_calon = calon_id and target.kd_kriteria = 'K1') as kompetensi,
                (SELECT nilai_target FROM target,calon WHERE target.id_calon = calon.id_calon and calon.id_calon = calon_id and target.kd_kriteria = 'K2') as interview,
                (SELECT nilai_target FROM target,calon WHERE target.id_calon = calon.id_calon and calon.id_calon = calon_id and target.kd_kriteria = 'K3') as konsistensi,
            hasil.hasil_akhir, hasil.keterangan from calon join hasil on calon.id_calon=hasil.id_calon WHERE calon.periode_masuk = '$periode_masuk' order by hasil_akhir DESC
        ");
        return $result->result();
    }

    //ambil data untuk perangkingan nilai excel
    public function ExportExcel($periode_masuk){
        $result = $this->db->query("
            SELECT calon.id_calon as calon_id, calon.nm_calon,
                (SELECT nilai_target FROM target,calon WHERE target.id_calon = calon.id_calon and calon.id_calon = calon_id and target.kd_kriteria = 'K1') as kompetensi,
                (SELECT nilai_target FROM target,calon WHERE target.id_calon = calon.id_calon and calon.id_calon = calon_id and target.kd_kriteria = 'K2') as interview,
                (SELECT nilai_target FROM target,calon WHERE target.id_calon = calon.id_calon and calon.id_calon = calon_id and target.kd_kriteria = 'K3') as konsistensi,
            hasil.hasil_akhir, hasil.keterangan from calon join hasil on calon.id_calon=hasil.id_calon WHERE calon.periode_masuk = '$periode_masuk' order by hasil_akhir DESC
        ");
        return $result;
    }
    
}
