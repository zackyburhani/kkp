<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_TargetSubkriteria extends CI_Controller {
 
	public function __construct() 
	{
		parent::__construct();
		$this->load->model(['M_TargetSubkriteria','M_Subkriteria','M_Kriteria']);
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
		$kd_subkriteria  = $this->input->post('kd_subkriteria');
		$id_calon     = $this->input->post('id_calon');
		$nilai_target2 = $this->input->post('nilai_target2');
		$periode_masuk = $this->input->post('periode_masuk');
		
		$data = [
			'id_calon'     => $id_calon,
			'kd_subkriteria'  => $kd_subkriteria,
			'nilai_target2' => $nilai_target2
		];

		$result = $this->M_TargetSubkriteria->simpanTarget($data);
		
		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('C_TargetSubkriteria/periode?periode_masuk='.$periode_masuk);
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('C_TargetSubkriteria');
		}
	}
}
