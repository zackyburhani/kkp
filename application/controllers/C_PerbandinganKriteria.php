<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_PerbandinganKriteria extends CI_Controller {

	public function index()
	{
		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('perbandingan/V_PerbandinganKriteria');
		$this->load->view('template/V_Footer');
	}
}
