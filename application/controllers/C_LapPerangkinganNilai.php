<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_LapPerangkinganNilai extends CI_Controller {

	public function index()
	{
		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('laporan/V_LapPerangkinganNilai');
		$this->load->view('template/V_Footer');
	}
}
