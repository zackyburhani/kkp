<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Karyawan extends CI_Controller {

	public function index()
	{
		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('karyawan/V_Karyawan');
		$this->load->view('karyawan/V_EntryKaryawan');
		$this->load->view('karyawan/V_UpdateKaryawan');
		$this->load->view('karyawan/V_HapusKaryawan');
		$this->load->view('template/V_Footer');
	}
}


/*
*
*INI CONTROLLER SISCA
*
*/
