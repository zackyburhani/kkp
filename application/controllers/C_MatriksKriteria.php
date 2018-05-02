<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_MatriksKriteria extends CI_Controller {

	public function index()
	{
		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('matriks/V_MatriksKriteria');
		$this->load->view('template/V_Footer');
	}
}
