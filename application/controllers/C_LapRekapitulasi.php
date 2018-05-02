<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_LapRekapitulasi extends CI_Controller {

	public function index()
	{
		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('laporan/V_LapRekapitulasi');
		$this->load->view('template/V_Footer');
	}
}
