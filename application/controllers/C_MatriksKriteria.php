<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_MatriksKriteria extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model(['M_TargetSubkriteria','M_Kriteria','M_Subkriteria','M_MatriksSubkriteria','M_MatriksKriteria']);
	}

	public function index()
	{
		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('matriks/V_MatriksKriteria');
		$this->load->view('template/V_Footer');
	}

	public function periode()
	{
		$periode 		 = $this->input->get('periode_masuk');
		$getPeriodeCalon = $this->M_TargetSubkriteria->periode($periode);
		$getAllKriteria  = $this->M_Kriteria->getAllKriteria();
		$getAllSAW 		 = $this->M_MatriksKriteria->getAllSAW();
		$max 			 = $this->M_MatriksKriteria->max();

		$maxLoop = array();
		foreach($this->max() as $key=>$value) {
			array_push($maxLoop, $value);
		}

		$bobot = array();
		foreach($this->bobot() as $key=>$value) {
			array_push($bobot, $value);
		}

		foreach ($max as $key) {
			foreach ($getAllSAW as $data) {
				round($data->K1/$key->maxK1,4);
				round($data->K2/$key->maxK2,4);
				round($data->K3/$key->maxK3,4);
			}
		}

		$total = array();
		foreach ($max as $key) {
			foreach ($getAllSAW as $data) {
				$total[] = round(
					(($data->K1/$key->maxK1)*$bobot[0])+
					(($data->K2/$key->maxK2)*$bobot[1])+
					(($data->K3/$key->maxK3)*$bobot[2]),4);
			}
		}

		$data = [
			'total'			  => $total,
			'max'			  => $maxLoop,
			'tanggalPeriode'  => $periode,
			'getAllKriteria'  => $getAllKriteria,
			'getPeriodeCalon' => $getPeriodeCalon
		];
		
		$this->load->view('template/V_Header',$data);
		$this->load->view('template/V_Sidebar');
		$this->load->view('matriks/V_MatriksKriteria');
		$this->load->view('template/V_Footer');
	}

	public function max()
	{
		$max = $this->M_MatriksKriteria->max();
		$array = array();
		foreach($max as $key) {
			$array[] = $key->maxK1;
			$array[] = $key->maxK2;
			$array[] = $key->maxK3;
		} return $array;
	}

	public function bobot()
	{
		$eigenvector = $this->M_MatriksKriteria->eigenvector();
		$array = array();
		foreach($eigenvector as $key) {
			$array[] = $key->eigenvector; 
		} return $array;
	}








}
