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

    //buat table saw
    public function createTable($field)
    {
        $fields = array(
            'id_calon VARCHAR(10) not null',
            'periode_masuk date null'
        );

        foreach ($field as $item => $value) {
            $fields[] = $value->kd_kriteria.' DECIMAL(5,4)';
        }

        $this->dbforge->add_field($fields);
        $this->dbforge->create_table('saw');
    }

    public function dropTable(){
        $this->dbforge->drop_table('saw');
    }

    public function simpanTargetSAW($data)
    {
        $status = $this->db->insert('saw', $data);
        return $status;
    }

    public function barisSAW()
    {
        $query = $this->db->get("saw_sub");
        return $query->num_rows();
    }

    public function simpanNilaiSAW($id_calon,$total1,$total2,$total3,$periode_masuk)
    {   
        if($total1){
            foreach ($total1 as $key => $value) {
                $this->db->query("UPDATE saw SET K1='".$value."' WHERE id_calon = '".$id_calon."'");
            }
        } if($total2){
            foreach ($total2 as $key => $value) {
                $this->db->query("UPDATE saw SET K2='".$value."' WHERE id_calon = '".$id_calon."'");
            }
        } if($total3){
            foreach ($total3 as $key => $value) {
                $this->db->query("UPDATE saw SET K3='".$value."' WHERE id_calon = '".$id_calon."'");
            }
        }
        
    }


        
}