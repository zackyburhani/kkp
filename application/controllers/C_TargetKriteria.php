<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_TargetKriteria extends CI_Controller {
 
	public function __construct() 
	{
		parent::__construct();
		$this->load->model(['M_TargetKriteria','M_Kriteria']);
	}

	//halaman awal
	public function index()
	{
		$getAllKriteria = $this->M_Kriteria->getAllKriteria();
		$data = [
			'getAllKriteria'  => $getAllKriteria
		];

		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('target/V_TargetKriteria',$data);
		$this->load->view('target/V_EntryNilaiTargetKriteria',$data);
		$this->load->view('template/V_Footer');
	}

	//tampil data per-periode
	public function periode()
	{
		$periode 		 = $this->input->get('periode_masuk');
		$getPeriodeCalon = $this->M_TargetKriteria->periode($periode);
		$getAllCalon 	 = $this->M_TargetKriteria->getAllCalon();
		$getAllKriteria  = $this->M_Kriteria->getAllKriteria();
		$nilaiDetail     = $this->M_TargetKriteria->nilaiDetail();
		
		$data = [
		 	'nilaiDetail'	  => $nilaiDetail,
			'getAllKriteria'  => $getAllKriteria,
			'getPeriodeCalon' => $getPeriodeCalon,
			'getAllCalon' 	  => $getAllCalon,
			'tanggalPeriode'  => $periode
		];

		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('target/V_TargetKriteria', $data);
		$this->load->view('target/V_EntryNilaiTargetKriteria', $data);
		$this->load->view('karyawan/V_tampilKaryawan',$data);
		$this->load->view('target/V_nilaiKriteria',$data);
		$this->load->view('template/V_Footer');
	}

	//simpan target
	public function simpanTarget() 
	{
		$kd_kriteria   = $this->input->post('kd_kriteria');
		$id_calon      = $this->input->post('id_calon');
		$nilai_target  = $this->input->post('nilai_target');
		$periode_masuk = $this->input->post('periode_masuk');
		
		$data = [
			'id_calon'     => $id_calon,
			'kd_kriteria'  => $kd_kriteria,
			'nilai_target' => $nilai_target
		];

		$result = $this->M_TargetKriteria->simpanTarget($data);
		
		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('C_TargetKriteria/periode?periode_masuk='.$periode_masuk);
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('C_Kriteria');
		}
	}
}
