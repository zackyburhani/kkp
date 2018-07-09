<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_HasilKeputusan extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model(['M_HasilKeputusan','M_MatriksSubkriteria','M_TargetSubkriteria']);
	}

	//halaman awal
	public function index()
	{
		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('hasil/V_HasilKeputusan');
		$this->load->view('template/V_Footer');
	}

	//tampil data per-periode
	public function periode()
	{ 
		$periode 	   = $this->input->get('periode_masuk');
		$getAllHasil   = $this->M_HasilKeputusan->getAllHasil($periode);
		$getKesimpulan = $this->M_HasilKeputusan->getKesimpulan($periode);
		$chart   	   = $this->M_HasilKeputusan->chart($periode);
		$baris         = $this->M_HasilKeputusan->barisHasil($periode);
		$barisNotNull  = $this->M_HasilKeputusan->hilangTombolSimpan($periode);

		$data = [
			'barisNotNull'	=> $barisNotNull,
			'baris'			=> $baris,
			'chart'			=> $chart,
			'periode'		=> $periode,
			'getKesimpulan' => $getKesimpulan,
			'getAllHasil'   => $getAllHasil
		];

		$this->load->view('template/V_Header',$data);
		$this->load->view('template/V_Sidebar');
		$this->load->view('hasil/V_HasilKeputusan');
		$this->load->view('template/V_Footer');
	}

	//simpan keterangan calon dengan status lolos
	public function simpanHasil()
	{

		$periode_masuk = $this->input->post('periode_masuk');
		$baris         = $this->M_HasilKeputusan->barisHasil($periode_masuk);
		$barisNotNull  = $this->M_HasilKeputusan->hilangTombolSimpan($periode_masuk);

		$name = "calon";
		$id_calon = array();
		for($i=1; $i<=$baris; $i++) {
			$var = $name.$i;
			$id_calon[] = $this->input->post($var);	
		}

		$i=0;
		while($i<$baris){
			$keterangan = 'Lolos';
			$result = $this->M_HasilKeputusan->simpanHasil($id_calon[$i],$keterangan);
			$i++;
		}

		if (!$result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('C_HasilKeputusan/periode?periode_masuk='.$periode_masuk);
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('C_HasilKeputusan/periode?periode_masuk='.$periode_masuk);
		}
	}
}
