<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_PerbandinganSubkriteria extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_Subkriteria');
	} 

	public function index()
	{
		$getAllSubkriteria = $this->M_Subkriteria->getAllSubkriteria();
		$getSubkriteria = $this->M_Subkriteria->getSubkriteria('K1');
		$getSubkriteria2 = $this->M_Subkriteria->getSubkriteria('K2');
		$getSubkriteria3 = $this->M_Subkriteria->getSubkriteria('K3');

		$data = [
			'getSubkriteria'	=> $getSubkriteria,
			'getSubkriteria2'	=> $getSubkriteria2,
			'getSubkriteria3'	=> $getSubkriteria3,
			'getAllSubkriteria' => $getAllSubkriteria
		];

		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('perbandingan/V_PerbandinganSubkriteria',$data);
		$this->load->view('template/V_Footer');
	} 

	public function perbandinganMatriks()
	{
		
		$sk1 = $this->input->post('sk1');	
		$sk2 = $this->input->post('sk2');	
		$sk3 = $this->input->post('sk3');
		$sk3 = $this->input->post('sk3');
		$sk3 = $this->input->post('sk5');

		$matriksA = [ 
			[1     ,  $sk1/1 , 1/$sk2],
			[1/$sk1 ,   1    , 1/$sk3],
			[$sk2/1 ,  $sk3/1 ,   1  ]
		];

		$matriksA2 = [ 
			[1     ,  $sk1/1],
			[1/$sk1 ,   1   ]
		];

		$matriksB2 = $matriksA2;
		$matriksB = $matriksA;

		$perkalianMatriks 	= $this->perkalian_matriks($matriksB,$matriksA);
		$perkalianMatriks2 	= $this->perkalian_matriks($matriksB2,$matriksA2);
		$penjumlahanMatriks = $this->penjumlahan_matriks($perkalianMatriks);
		$penjumlahanMatriks2 = $this->penjumlahan_matriks($perkalianMatriks2);
		$eigenvector 		= $this->cari_eigenvector($penjumlahanMatriks);
		$eigenvector2 		= $this->cari_eigenvector($penjumlahanMatriks2);
        $getAllSubkriteria 	= $this->M_Subkriteria->getAllSubkriteria();
        $getSubkriteria = $this->M_Subkriteria->getSubkriteria('K1');
        $getSubkriteria2 = $this->M_Subkriteria->getSubkriteria('K2');
		$getSubkriteria3 = $this->M_Subkriteria->getSubkriteria('K3');

		$data = [
			'getSubkriteria2'	  => $getSubkriteria2,
			'getSubkriteria3'	  => $getSubkriteria3,
			'getSubkriteria'	  => $getSubkriteria, 
			'matriksA' 			  => $matriksA,
			'matriksA2'			  => $matriksA2,
			'perkalianMatriks' 	  => $perkalianMatriks,
			'penjumlahanMatriks'  => $penjumlahanMatriks,
			'penjumlahanMatriks2' => $penjumlahanMatriks2,
			'eigenvector' 		  => $eigenvector,
			'eigenvector2' 		  => $eigenvector2,
			'getAllSubkriteria'   => $getAllSubkriteria
		];

		if ($data){
			$this->load->view('template/V_Header');
		 	$this->load->view('template/V_Sidebar');
		 	$this->load->view('perbandingan/V_PerbandinganSubkriteria',$data);
		 	$this->load->view('template/V_Footer');	   	
		}else{
			$this->load->view('template/V_Header');
		 	$this->load->view('template/V_Sidebar');
		 	$this->load->view('perbandingan/V_PerbandinganSubkriteria',$data);
		 	$this->load->view('template/V_Footer');
		}
	}

	//fungsi menghitung perkalian matriks
	public function perkalian_matriks($matriks_a, $matriks_b) 
	{
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

	//fungsi mencari eigenvector
	public function cari_eigenvector($cari_total) 
	{
        $hasil3 = array();
        for ($i=0; $i<sizeof($cari_total); $i++) {
            $temp2 = $cari_total[$i];
            $hasil3[$i] = $temp2;
        }
        $total = array_sum($hasil3);
        for ($j=0; $j<sizeof($cari_total); $j++) {
            $eigenvektor = $cari_total[$j]/$total;
            $hasil3[$j] = $eigenvektor;
        }
        return $hasil3;
    }

    //fungsi menjumlahkan matriks
    public function penjumlahan_matriks($matriks1) 
    {
        $hasil1 = array();
        for ($i=0; $i<sizeof($matriks1); $i++) {
           	$temp2 = 0;
            for ($k=0; $k<sizeof($matriks1); $k++) {
              	$temp2 = $temp2+$matriks1[$i][$k];
            }
            $hasil1[$i] = $temp2;
        }
        return $hasil1;
   	}

   	//ga tau dipake apa engga
    function cari_total($cari_total) 
    {
    	$hasil2 = array();
        for ($i=0; $i<sizeof($cari_total); $i++) {
        	$temp2 = $cari_total[$i];
            $hasil2[$i] = $temp2;
        }
        $total = array_sum($hasil2);
        return $total;
    }




}
