<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Kriteria extends CI_Controller {

	public function index()
	{
		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('kriteria/V_Kriteria');
		$this->load->view('kriteria/V_EntryKriteria');
		$this->load->view('kriteria/V_UpdateKriteria');
		$this->load->view('kriteria/V_HapusKriteria');
		$this->load->view('template/V_Footer');
	}
}
