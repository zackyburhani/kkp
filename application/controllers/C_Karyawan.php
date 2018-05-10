<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Karyawan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_Calon');
	}
	public function index()
	{
		$getAllCalon = $this->M_Calon->getAllCalon();
		$getKodeCalon = $this->M_Calon->getKodeCalon();
		$data = [
			'getKodeCalon' => $getKodeCalon,
			'getAllCalon' => $getAllCalon
		];
		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('karyawan/V_Karyawan', $data);
		$this->load->view('karyawan/V_EntryKaryawan', $data);
		$this->load->view('karyawan/V_UpdateKaryawan', $data);
		$this->load->view('karyawan/V_HapusKaryawan', $data);
		$this->load->view('karyawan/V_tampilKaryawan',$data);
		$this->load->view('template/V_Footer');
	}
	
	public function tambahKaryawan(){
		$id_calon = $this->input->post('id_calon');
		$nm_calon = $this->input->post('nm_calon');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$alamat = $this->input->post('alamat');
		$jk = $this->input->post('jk');
		$email = $this->input->post('email');
		$no_telp = $this->input->post('no_telp');
		$pendidikanTerakhir = $this->input->post('pendidikanTerakhir');
		
		$data = [
			'id_calon' => $id_calon,
			'nm_calon' => $nm_calon,
			'tgl_lahir' => $tgl_lahir,
			'alamat' => $alamat,
			'jk' => strtoupper($jk),
			'email' => $email,
			'no_telp' => $no_telp,
			'pendidikan_terakhir' => $pendidikanTerakhir
		];

		$result = $this->M_Calon->tambahCalon($data);

		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('C_Karyawan');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('C_Karyawan');
		}
	}
	
	public function updateKaryawan(){
		$id_calon = $this->input->post('id_calon');
		$nm_calon = $this->input->post('nm_calon');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$alamat = $this->input->post('alamat');
		$jk = $this->input->post('jk');
		$email = $this->input->post('email');
		$no_telp = $this->input->post('no_telp');
		$pendidikanTerakhir = $this->input->post('pendidikanTerakhir');
		
		$data = [
			'nm_calon' => $nm_calon,
			'tgl_lahir' => $tgl_lahir,
			'alamat' => $alamat,
			'jk' => $jk,
			'email' => $email,
			'no_telp' => $no_telp,
			'pendidikan_terakhir' => $pendidikanTerakhir
		];

		$result = $this->M_Calon->UpdateCalon($id_calon, $data);
		
		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Diubah');
	   		redirect('C_Karyawan');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Diubah');
    		redirect('C_Karyawan');
		}
	}
	
	public function deleteKaryawan(){
		$id_calon = $this->input->post('id_calon');
		
		$result = $this->M_Calon->DeleteCalon($id_calon);
		
		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Dihapus');
	   		redirect('C_Karyawan');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Dihapus');
    		redirect('C_Karyawan');
		}
	}
}


