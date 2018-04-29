<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Subkriteria extends CI_Controller {

	public function index()
	{
		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('subkriteria/V_SubKriteria');
		$this->load->view('subkriteria/V_EntrySubKriteria');
		$this->load->view('subkriteria/V_UpdateSubKriteria');
		$this->load->view('subkriteria/V_HapusSubKriteria');
		$this->load->view('template/V_Footer');
	}
}
