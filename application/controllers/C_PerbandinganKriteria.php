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

	public function perbandinganMatriks()
	{
		$k1 = $this->input->post('k1');	
		$k2 = $this->input->post('k2');	
		$k3 = $this->input->post('k3');	

		$matriksA = [ 
			[1     ,  $k1/1 , 1/$k2],
			[1/$k1 ,   1    , 1/$k3],
			[$k2/1 ,  $k3/1 ,   1  ]
		];

		$data = [
			'hasil' => $matriksA
		];

		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('perbandingan/V_PerbandinganKriteria',$data);
		$this->load->view('template/V_Footer');
	}

	public function perkalian_matriks($matriks_a, $matriks_b) {
		$hasil = array();
		for ($i=0; $i<sizeof($matriks_a); $i++) {
			for ($j=0; $j<sizeof($matriks_b[0]); $j++) {
				$temp = 0;
				for ($k=0; $k<sizeof($matriks_b); $k++) {
					$temp += $matriks_a[$i][$k] * $matriks_b[$k][$j];
				}
				$hasil[$i][$j] = $temp;
			}
		}
		return $hasil;
	}


}
