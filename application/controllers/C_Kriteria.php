<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Kriteria extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model(['M_Kriteria','M_Calon']);
	}
	
	public function index()
	{
		$getAllKriteria = $this->M_Kriteria->getAllKriteria();
		$getKdKriteria = $this->M_Kriteria->getKdKriteria();
		$data = [
			'getKdKriteria' => $getKdKriteria,
			'getAllKriteria' => $getAllKriteria
		];
		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('kriteria/V_Kriteria', $data);
		$this->load->view('kriteria/V_EntryKriteria', $data);
		$this->load->view('kriteria/V_UpdateKriteria', $data);
		$this->load->view('kriteria/V_HapusKriteria', $data);
		$this->load->view('template/V_Footer');
	}
	
	public function tambahKriteria() 
	{
		$kd_kriteria = $this->input->post('kd_kriteria');
		$nm_kriteria = $this->input->post('nm_kriteria');
		
		$data = [
			'kd_kriteria' => $kd_kriteria,
			'nm_kriteria' => $nm_kriteria,
		];

		$result = $this->M_Kriteria->tambahKriteria($data);
		
		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('C_Kriteria');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('C_Kriteria');
		}
	}
	
	public function updateKriteria()
	{
		$kd_kriteria = $this->input->post('kd_kriteria');
		$nm_kriteria = $this->input->post('nm_kriteria');

		$data = [
			'nm_kriteria' => $nm_kriteria
		];
		
		$result = $this->M_Kriteria->UpdateKriteria($kd_kriteria,$data);
		
		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Diubah');
	   		redirect('C_Kriteria');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Diubah');
    		redirect('C_Kriteria');
		}
	}
	
	public function deleteKriteria()
	{
		$kd_kriteria = $this->input->post('kd_kriteria');
		$validasi 	 = $this->M_Calon->validasiHapus('kd_kriteria','subkriteria',$kd_kriteria);

		if($validasi->kd_kriteria == $kd_kriteria){
			$this->session->set_flashdata('pesanGagal','Data Kriteria Terhubung Dengan Data Lain');
	   		redirect('C_Kriteria');
		} else {
			$result = $this->M_Kriteria->DeleteKriteria($kd_kriteria);
			if ($result){
				$this->session->set_flashdata('pesan','Data Berhasil Dihapus');
		   		redirect('C_Kriteria');
			}else{
				$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Dihapus');
	    		redirect('C_Kriteria');
			}
		}
	}
	
}