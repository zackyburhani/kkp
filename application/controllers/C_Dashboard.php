<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Dashboard extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('M_Calon');
	}

	//halaman awal
	public function index()
	{
		$totalCalon 	  = $this->M_Calon->jumlah('calon');
		$totalKriteria 	  = $this->M_Calon->jumlah('kriteria');
		$totalSubkriteria = $this->M_Calon->jumlah('subkriteria');

		$data = [
			'totalCalon' 		=> $totalCalon,
			'totalKriteria' 	=> $totalKriteria,
			'totalSubkriteria' 	=> $totalSubkriteria
		];

		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('index',$data);
		$this->load->view('template/V_Footer');
	}
}
