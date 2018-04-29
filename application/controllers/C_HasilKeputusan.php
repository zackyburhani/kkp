<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_HasilKeputusan extends CI_Controller {

	public function index()
	{
		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('hasil/V_HasilKeputusan');
		$this->load->view('template/V_Footer');
	}
}
