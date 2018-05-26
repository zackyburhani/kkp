<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_MatriksSubkriteria extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model(['M_TargetSubkriteria','M_Kriteria','M_Subkriteria','M_MatriksSubkriteria']);
	}

	public function index()
	{
		$getAllKriteria    = $this->M_Kriteria->getAllKriteria();

		$data = [
			'getAllKriteria' 	 => $getAllKriteria,
		];

		$this->load->view('template/V_Header',$data);
		$this->load->view('template/V_Sidebar');
		$this->load->view('matriks/V_MatriksSubkriteria');
		$this->load->view('template/V_Footer');
	}

	public function bobot()
	{
		$eigenvector_sub = $this->M_TargetSubkriteria->eigenvector_sub();
		$array = array();
		foreach($eigenvector_sub as $key) {
			$array[] = $key->eigenvector_sub; 
		} return $array;
	}

	public function max()
	{
		$max = $this->M_TargetSubkriteria->max();
		$array = array();
		foreach($max as $key) {
			$array[] = $key->maxSK1;
			$array[] = $key->maxSK2;
			$array[] = $key->maxSK3;
			$array[] = $key->maxSK4;
			$array[] = $key->maxSK5;
			$array[] = $key->maxSK6;
			$array[] = $key->maxSK7;
		} return $array;
	}

	public function periode()
	{
		$periode 		   = $this->input->get('periode_masuk');
		$getPeriodeCalon   = $this->M_TargetSubkriteria->periode($periode);
		$getAllCalon 	   = $this->M_TargetSubkriteria->getAllCalon();
		
		$getAllKriteria    = $this->M_Kriteria->getAllKriteria();
		$nilaiDetail       = $this->M_TargetSubkriteria->nilaiDetail();

		$max 			   = $this->M_TargetSubkriteria->max();
		$getAllSAW_sub 	   = $this->M_TargetSubkriteria->getAllSAW_sub();


		$maxLoop = array();
		foreach($this->max() as $key=>$value) {
			array_push($maxLoop, $value);
		}

		$bobot = array();
		foreach($this->bobot() as $key=>$value) {
			array_push($bobot, $value);
		}

		foreach ($max as $key) {
			foreach ($getAllSAW_sub as $data) {
				round($data->SK1/$key->maxSK1,4);
				round($data->SK2/$key->maxSK2,4);
				round($data->SK3/$key->maxSK3,4);
				round($data->SK4/$key->maxSK4,4);
				round($data->SK5/$key->maxSK5,4);
				round($data->SK6/$key->maxSK6,4);
				round($data->SK7/$key->maxSK7,4);
			}
		}

		foreach ($max as $key) {
			foreach ($getAllSAW_sub as $data) {
				$total = round(
					(($data->SK1/$key->maxSK1)*$bobot[0])+
					(($data->SK2/$key->maxSK2)*$bobot[1])+
					(($data->SK3/$key->maxSK3)*$bobot[2]),4);
			}
		}

		foreach ($max as $key) {
			foreach ($getAllSAW_sub as $data) {
				$total = round(
					(($data->SK4/$key->maxSK4)*$bobot[3])+
					(($data->SK5/$key->maxSK5)*$bobot[4]),4);
			}
		}

		foreach ($max as $key) {
			foreach ($getAllSAW_sub as $data) {
				$total = round(
					(($data->SK6/$key->maxSK6)*$bobot[5])+
					(($data->SK7/$key->maxSK7)*$bobot[6]),4);
			}
		}


		$data = [
			'max'				=> $maxLoop,
			'getAllSAW_sub'		=> $getAllSAW_sub,
			'getAllKriteria' 	=> $getAllKriteria,
		 	'nilaiDetail'	  	=> $nilaiDetail,
			'getPeriodeCalon' 	=> $getPeriodeCalon,
			'getAllCalon' 	  	=> $getAllCalon,
			'tanggalPeriode'  	=> $periode
		];

		$this->load->view('template/V_Header',$data);
		$this->load->view('template/V_Sidebar');
		$this->load->view('matriks/V_MatriksSubkriteria');
		$this->load->view('template/V_Footer');
	}
}
