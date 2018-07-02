<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Subkriteria extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model(['M_Subkriteria','M_Kriteria','M_Calon']);
	}

	public function index()
	{
		$getAllKriteria    = $this->M_Kriteria->getAllKriteria();
		$getAllSubkriteria = $this->M_Subkriteria->getAllSubkriteria();
		$getKdSubkriteria  = $this->M_Subkriteria->getKdSubkriteria();
		$getNmKriteria 	   = $this->M_Subkriteria->getNmKriteria();
		$data = [
			'getNmKriteria'		=> $getNmKriteria,
			'getKdSubkriteria'  => $getKdSubkriteria,
			'getAllSubkriteria' => $getAllSubkriteria,
			'getAllKriteria'    => $getAllKriteria
		];

		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('subkriteria/V_SubKriteria',$data);
		$this->load->view('subkriteria/V_EntrySubKriteria',$data);
		$this->load->view('subkriteria/V_UpdateSubKriteria',$data);
		$this->load->view('subkriteria/V_HapusSubKriteria',$data);
		$this->load->view('template/V_Footer');
	}

	public function tambahSubkriteria() 
	{
		$kriteria = $this->input->post('kriteria');
		$kd_subkriteria = $this->input->post('kd_subkriteria');
		$nm_subkriteria = $this->input->post('nm_subkriteria');
		
		$data = [
			'kd_subkriteria' => $kd_subkriteria,
			'nm_subkriteria' => $nm_subkriteria,
			'kd_kriteria'=> $kriteria
		];

		$result = $this->M_Subkriteria->tambahSubkriteria($data);
		
		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('C_Subkriteria');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('C_Subkriteria');
		}
	}

	public function updateSubkriteria()
	{
		$kd_kriteria    = $this->input->post('kriteria');
		$nm_subkriteria = $this->input->post('nm_subkriteria');
		$kd_subkriteria = $this->input->post('kd_subkriteria');

		$data = [
			'kd_kriteria' 	 => $kd_kriteria,
			'nm_subkriteria' => $nm_subkriteria
		];
		
		$result = $this->M_Subkriteria->UpdateSubkriteria($kd_subkriteria,$data);
		
		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Diubah');
	   		redirect('C_Subkriteria');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Diubah');
    		redirect('C_Subkriteria');
		}
	}

	public function deleteSubkriteria()
	{
		$kd_subkriteria = $this->input->post('kd_subkriteria');
		$validasi 	    = $this->M_Calon->validasiHapus('kd_subkriteria','target2',$kd_subkriteria);

		if($validasi->kd_subkriteria == $kd_subkriteria){
			$this->session->set_flashdata('pesanGagal','Data Kriteria Terhubung Dengan Data Lain');
			redirect('C_Subkriteria');
		} else {
			$result = $this->M_Subkriteria->DeleteSubkriteria($kd_subkriteria);
			if ($result){
				$this->session->set_flashdata('pesan','Data Berhasil Dihapus');
		   		redirect('C_Subkriteria');
			}else{
				$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Dihapus');
	    		redirect('C_Subkriteria');
			}
		}
	}

}

