<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_MatriksSubkriteria extends CI_Model {

    public function __construct()
    {
		parent::__construct();
	}

    //ambil data berdasarkan kode kriteria
	public function matriksTarget($kd_kriteria)
    {
    	$result = $this->db->query("SELECT * FROM calon,target2,subkriteria where subkriteria.kd_subkriteria = target2.kd_subkriteria and calon.id_calon = target2.id_calon AND kd_kriteria = '".$kd_kriteria."'");
    	return $result->result();
    }

    //ambil data berdasarkan id dan kode kriteria
    public function matriksTargetNilai($id_calon,$kd_kriteria)
    {
    	$result = $this->db->query("SELECT * FROM target2,kriteria,subkriteria WHERE target2.kd_subkriteria = subkriteria.kd_subkriteria and kriteria.kd_kriteria = subkriteria.kd_kriteria and id_calon = '".$id_calon."' and kriteria.kd_kriteria = '".$kd_kriteria."'");
    	return $result->result();
    }
    
    //ambil data untuk matriks normalisasi
    public function matriksNormalisasi($tgl,$id_calon)
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
            FROM target2,calon WHERE calon.id_calon = target2.id_calon and periode_masuk = '$tgl' and calon.id_calon = '$id_calon' GROUP by SK1
        ");
        return $result->result();
    }

    //ambil data untuk matriks normalisasi
    public function matriksNormalisasiISI($tgl)
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

    //simpan
    public function simpanTarget($data)
    {
        $status = $this->db->insert('target', $data);
        return $status;
    }

    //update target
    public function isiTarget($nilai_target,$id_calon,$kd_kriteria)
    {
        $this->db->query("UPDATE target SET nilai_target = '".$nilai_target."' WHERE id_calon = '".$id_calon."' and kd_kriteria = '".$kd_kriteria."'");
    }

    //cari baris
    public function barisCalon($tgl)
    {
        $query = $this->db->query("SELECT * FROM calon WHERE calon.periode_masuk = '$tgl'");
        return $query->num_rows();
    }

    //validasi
    public function hilangkanTombol($tgl)
    {
        $result = $this->db->query("SELECT * FROM target JOIN calon on target.id_calon = calon.id_calon WHERE calon.periode_masuk = '$tgl'");
        return $result->result();
    }  
     
}