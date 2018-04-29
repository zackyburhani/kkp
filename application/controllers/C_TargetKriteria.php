<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_TargetKriteria extends CI_Controller {

	public function index()
	{
		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('target/V_EntryNilaiTargetKriteria');
		$this->load->view('target/V_TargetKriteria');
		$this->load->view('template/V_Footer');
	}
}
