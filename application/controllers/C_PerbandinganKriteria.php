<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_PerbandinganKriteria extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(['M_Kriteria','M_Calon']);
	} 

	//halaman awal
	public function index()
	{
		$getAllKriteria = $this->M_Kriteria->getAllKriteria();

		$data = [
			'getAllKriteria' => $getAllKriteria
		];

		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('perbandingan/V_PerbandinganKriteria',$data);
		$this->load->view('template/V_Footer');
	}
 
 	//perbandingan matriks
	public function perbandinganMatriks()
	{
		$k1 = $this->input->post('k1');	
		$k2 = $this->input->post('k2');	
		$k3 = $this->input->post('k3');

		if($k1 >= 1){
			$tampung1_p = $k1/1;
			$tampung1_n = 1/$k1;
		} else {
			$tampung1_p = (1/$k1)*-1;
			$tampung1_n = ($k1/1)*-1;
		}

		if($k2 >= 1){
			$tampung2_p = $k2/1;
			$tampung2_n = 1/$k2;
		} else {
			$tampung2_p = (1/$k2)*-1;
			$tampung2_n = ($k2/1)*-1;
		}

		if($k3 >= 1){
			$tampung3_p = $k3/1;
			$tampung3_n = 1/$k3;
		} else {
			$tampung3_p = (1/$k3)*-1;
			$tampung3_n = ($k3/1)*-1;
		}


		// $matriksA = [ 
		// 	[1     ,  $k1/1 , 1/$k2],
		// 	[1/$k1 ,   1    , 1/$k3],
		// 	[$k2/1 ,  $k3/1 ,   1  ]
		// ];

		$matriksA = [ 
			[1           ,  $tampung1_p , $tampung2_n],
			[$tampung1_n ,   1          , $tampung3_n],
			[$tampung2_p ,  $tampung3_p ,   1        ]
		];

		$matriksB = $matriksA;

		$perkalianMatriks 	= $this->perkalian_matriks($matriksB,$matriksA);
		$penjumlahanMatriks = $this->penjumlahan_matriks($perkalianMatriks);
		$eigenvector 		= $this->cari_eigenvector($penjumlahanMatriks);
        $getAllKriteria 	= $this->M_Kriteria->getAllKriteria();

		$baris 		   = $this->M_Calon->jumlah('kriteria');
		
		$kriteria = array();
		foreach($getAllKriteria as $data){
			$kriteria[] = $data->nm_kriteria;
		}

		//view eigenvector
		$view_eigenvector = array();
		for($i=0; $i<$baris; $i++){
			$view_eigenvector[] = [$kriteria[$i],$penjumlahanMatriks[$i],$eigenvector[$i]];
		}

		//view perbandingan kriteria
		$view_perbandingan = array();
		for($i=0; $i<$baris; $i++){
			$view_perbandingan[] = [$kriteria[$i],$matriksA[$i]];
		}

		$data = [
			'view_perbandingan' => $view_perbandingan,
			'matriksA' 			 => $matriksA,
			'perkalianMatriks' 	 => $perkalianMatriks,
			'getAllKriteria' 	 => $getAllKriteria,
			'view_eigenvector'	 => $view_eigenvector
		];

		$alert = $this->alert($data);

		if ($data){
			$this->load->view('template/V_Header');
		 	$this->load->view('template/V_Sidebar');
		 	$this->load->view('perbandingan/V_PerbandinganKriteria',$data);
		 	$this->load->view('template/V_Footer');	   	
		}else{
			$this->load->view('template/V_Header');
		 	$this->load->view('template/V_Sidebar');
		 	$this->load->view('perbandingan/V_PerbandinganKriteria',$data);
		 	$this->load->view('template/V_Footer');
		}
	}

	//hapus data matriks
	public function batal()
	{
		redirect('C_PerbandinganKriteria');
	}

	//memunculkan alert sukses
	public function alert($nilai)
	{	
		if($nilai != null){
			$alert = $this->session->set_flashdata('pesan','Data Berhasil Diproses');
			return $alert;
		} else {
			$alert = $this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Diproses');
			return $alert;
		}
	}

	//simpan nilai eigenvector
	public function simpanEigenvector()
	{
		$e1 = $this->input->post('E1');	
		$e2 = $this->input->post('E2');	
		$e3 = $this->input->post('E3');

		$k1 = $this->input->post('K1');	
		$k2 = $this->input->post('K2');	
		$k3 = $this->input->post('K3');

		$baris = $this->M_Kriteria->jumlah('kriteria');

		$n = 1;
		$array = array();
		$banding = "nilaiBanding";
		for($i=1; $i<=$baris; $i++){
			for($j=1; $j<=$baris; $j++){
				$nilaiBanding = $this->input->post($banding.$n);
				$n++;
				$array[] = $nilaiBanding;
			}
		}

		$ktr = "K";
		$q = 0;
		for($i=1; $i<=$baris; $i++){
			for($j=1; $j<=$baris; $j++){
				$data_banding = [
					'kd_kriteria' => $ktr.$i,
					'kd_kriteria2' => $ktr.$j,
					'nilaiBanding' => $array[$q++]
				];
				//simpan table banding
				$this->M_Kriteria->tambahBanding($data_banding);
			}
		}

		$data1['eigenvector'] = $e1;
		$data2['eigenvector'] = $e2;
		$data3['eigenvector'] = $e3;

		$result1 = $this->M_Kriteria->InsertEigenvector($k1,$data1);
		$result2 = $this->M_Kriteria->InsertEigenvector($k2,$data2);
		$result3 = $this->M_Kriteria->InsertEigenvector($k3,$data3);

		if ($result1 && $result2 && $result3){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('C_PerbandinganKriteria');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('C_PerbandinganKriteria');
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
}
