<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_TargetSubkriteria extends CI_Controller {

	public function index()
	{
		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('target/V_EntryNilaiTargetSubkriteria');
		$this->load->view('target/V_TargetSubkriteria');
		$this->load->view('template/V_Footer');
	}
}
