<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_TargetSubkriteria extends CI_Controller {
 
	public function __construct() 
	{
		parent::__construct();
		$this->load->model(['M_TargetSubkriteria','M_MatriksSubkriteria','M_Subkriteria','M_Kriteria','M_Calon']);
	}

	public function index()
	{
		$getAllSubkriteria = $this->M_Subkriteria->getAllSubkriteria();
		$data = [
			'getAllSubkriteria'  => $getAllSubkriteria
		];

		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('target/V_TargetSubkriteria',$data);
		$this->load->view('target/V_EntryNilaiTargetSubkriteria',$data);
		$this->load->view('template/V_Footer');
	}

	//fungsi menampilkan data calon berdasarkan periode masuk
	public function periode()
	{
		$periode 		   = $this->input->get('periode_masuk');
		$getPeriodeCalon   = $this->M_TargetSubkriteria->periode($periode);
		$getAllCalon 	   = $this->M_TargetSubkriteria->getAllCalon();
		$getAllSubkriteria = $this->M_Subkriteria->getAllSubkriteria();
		$getAllKriteria    = $this->M_Kriteria->getAllKriteria();
		$nilaiDetail       = $this->M_TargetSubkriteria->nilaiDetail();
		
		
		$data = [
			'getAllKriteria' 	 => $getAllKriteria,
		 	'nilaiDetail'	  	 => $nilaiDetail,
		 	'getAllSubkriteria'  => $getAllSubkriteria,
			'getPeriodeCalon' 	 => $getPeriodeCalon,
			'getAllCalon' 	  	 => $getAllCalon,
			'tanggalPeriode'  	 => $periode
		];

		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('target/V_TargetSubkriteria', $data);
		$this->load->view('target/V_EntryNilaiTargetSubkriteria', $data);
		$this->load->view('karyawan/V_tampilKaryawan',$data);
		$this->load->view('target/V_nilaiSubkriteria',$data);
		$this->load->view('template/V_Footer');
	}

	public function simpanTarget() 
	{

		$id_calon      = $this->input->post('id_calon');
		$periode_masuk = $this->input->post('periode_masuk');
		$baris 		   = $this->M_Calon->jumlah('subkriteria');

		$id = 1;
		$kd_sub = "kd_subkriteria";
		$kd_subkriteria = array();
		for($i=1; $i<=$baris; $i++){
			$sub_kriteria = $this->input->post($kd_sub.$id);	
			$kd_subkriteria[] = $sub_kriteria;
			$id++;
		}

		$kd = 1;
		$nilai_t = "nilai_target2";
		$nilai_target2 = array();
		for($i=1; $i<=$baris; $i++){
			$n_target = $this->input->post($nilai_t.$kd);	
			$nilai_target2[] = $n_target;
			$kd++;
		}

		$q = 0;
		$w = 0;
		for($i=1; $i<=$baris; $i++){
			$data = [
				'kd_subkriteria'  => $kd_subkriteria[$q++],
				'id_calon'     	  => $id_calon,
				'nilai_target2'	  => $nilai_target2[$w++]
			];
			$result = $this->M_TargetSubkriteria->simpanTarget($data);
		}

		/////////////////////////////table bayangan//////////////////////////

		// $dataSAW_sub = [
		// 	'id_calon'  	=> $id_calon,
		// 	'periode_masuk' => $periode_masuk,
		// 	'SK1' 			=> $nilai_target1,
		// 	'SK2'			=> $nilai_target2,
		// 	'SK3'			=> $nilai_target3,
		// 	'SK4'			=> $nilai_target4,
		// 	'SK5'			=> $nilai_target5,
		// 	'SK6'			=> $nilai_target6,
		// 	'SK7'			=> $nilai_target7,
		// ];

		// $getAllSubkriteria = $this->M_Subkriteria->getAllSubkriteria();
		// $getAllKriteria    = $this->M_Kriteria->getAllKriteria();

		// if ($this->db->table_exists('saw_sub') == false )
		// {
		// 	//buat tabel saw_sub
		// 	$this->M_TargetSubkriteria->createTable($getAllSubkriteria);
		// 	//buat tabel saw
		// 	$this->M_MatriksSubkriteria->createTable($getAllKriteria);
		// }

		// $dataSAW_sub = [
		// 	'id_calon'  	=> $id_calon,
		// 	'periode_masuk' => $periode_masuk,
		// 	'SK1' 			=> $nilai_target2[0],
		// 	'SK2' 			=> $nilai_target2[1],
		// 	'SK3' 			=> $nilai_target2[2],
		// 	'SK4' 			=> $nilai_target2[3],
		// 	'SK5' 			=> $nilai_target2[4],
		// 	'SK6' 			=> $nilai_target2[5],
		// 	'SK7' 			=> $nilai_target2[6]
		// ];			
		// $result2 = $this->M_TargetSubkriteria->simpanTargetSAW($dataSAW_sub);

		/////////////////////////////table bayangan//////////////////////////

		if ($result2){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('C_TargetSubkriteria/periode?periode_masuk='.$periode_masuk);
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('C_TargetSubkriteria/periode?periode_masuk='.$periode_masuk);
		}
	}


	public function bobot()
	{
		$eigenvector_sub = $this->M_TargetSubkriteria->eigenvector_sub();
		$array = array();
		foreach($eigenvector_sub as $key) {
			$array[] = $key->eigenvector_sub; 
		} return $array;
	}

	public function max()
	{
		$max = $this->M_TargetSubkriteria->max();
		$array = array();
		foreach($max as $key) {
			$array[] = $key->maxSK1;
			$array[] = $key->maxSK2;
			$array[] = $key->maxSK3;
			$array[] = $key->maxSK4;
			$array[] = $key->maxSK5;
			$array[] = $key->maxSK6;
			$array[] = $key->maxSK7;
		} return $array;
	}


	public function HitungTarget()
	{
		$getAllSubkriteria = $this->M_Subkriteria->getAllSubkriteria();

		$nilai 			  = $this->M_TargetSubkriteria->nilaiDetail();
		$eigenvector_sub = $this->M_TargetSubkriteria->eigenvector_sub();

		$max = $this->M_TargetSubkriteria->max();
		$getAllSAW_sub = $this->M_TargetSubkriteria->getAllSAW_sub();
		


		$bobot = array();
		foreach($this->bobot() as $key=>$value) {
			array_push($bobot, $value);
		}

		foreach ($max as $key) {
			foreach ($getAllSAW_sub as $data) {
				round($data->SK1/$key->maxSK1,4);
				round($data->SK2/$key->maxSK2,4);
				round($data->SK3/$key->maxSK3,4);
				round($data->SK4/$key->maxSK4,4);
				round($data->SK5/$key->maxSK5,4);
				round($data->SK6/$key->maxSK6,4);
				round($data->SK7/$key->maxSK7,4);
			}
		}


		foreach ($max as $key) {
			foreach ($getAllSAW_sub as $data) {
				echo $total = round(
					(($data->SK1/$key->maxSK1)*$bobot[0])+
					(($data->SK2/$key->maxSK2)*$bobot[1])+
					(($data->SK3/$key->maxSK3)*$bobot[2]),4);
			}
		}

		foreach ($max as $key) {
			foreach ($getAllSAW_sub as $data) {
				echo $total = round(
					(($data->SK4/$key->maxSK4)*$bobot[3])+
					(($data->SK5/$key->maxSK5)*$bobot[4]),4);
			}
		}

		foreach ($max as $key) {
			foreach ($getAllSAW_sub as $data) {
				echo $total = round(
					(($data->SK6/$key->maxSK6)*$bobot[5])+
					(($data->SK7/$key->maxSK7)*$bobot[6]),4);
			}
		}
	}


}
