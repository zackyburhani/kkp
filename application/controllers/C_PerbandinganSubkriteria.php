<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_PerbandinganSubkriteria extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(['M_Subkriteria','M_Calon','M_Kriteria']);
	} 

	//halaman awal
	public function index()
	{
		$getAllSubkriteria 	= $this->M_Subkriteria->getAllSubkriteria();
		$getSubkriteria 	= $this->M_Subkriteria->getSubkriteria('K1');
		$getSubkriteria2 	= $this->M_Subkriteria->getSubkriteria('K2');
		$getSubkriteria3 	= $this->M_Subkriteria->getSubkriteria('K3');

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

	//perbandingan matriks
	public function perbandinganMatriks()
	{
		$sk1 = $this->input->post('sk1');	
		$sk2 = $this->input->post('sk2');	
		$sk3 = $this->input->post('sk3');

		$sk4 = $this->input->post('sk4');
		$sk5 = $this->input->post('sk5');

		if($sk1 >= 1){
			$tampung1_p = $sk1/1;
			$tampung1_n = 1/$sk1;
		} else {
			$tampung1_p = (1/$sk1)*-1;
			$tampung1_n = ($sk1/1)*-1;
		}

		if($sk2 >= 1){
			$tampung2_p = $sk2/1;
			$tampung2_n = 1/$sk2;
		} else {
			$tampung2_p = (1/$sk2)*-1;
			$tampung2_n = ($sk2/1)*-1;
		}

		if($sk3 >= 1){
			$tampung3_p = $sk3/1;
			$tampung3_n = 1/$sk3;
		} else {
			$tampung3_p = (1/$sk3)*-1;
			$tampung3_n = ($sk3/1)*-1;
		}

		if($sk4 >= 1){
			$tampung4_p = $sk4/1;
			$tampung4_n = 1/$sk4;
		} else {
			$tampung4_p = (1/$sk4)*-1;
			$tampung4_n = ($sk4/1)*-1;
		}

		if($sk5 >= 1){
			$tampung5_p = $sk5/1;
			$tampung5_n = 1/$sk5;
		} else {
			$tampung5_p = (1/$sk5)*-1;
			$tampung5_n = ($sk5/1)*-1;
		}

		// $matriksA = [ 
		// 	[1      ,  1/$sk1 , 1/$sk2],
		// 	[$sk1/1 ,   1     , 1/$sk3],
		// 	[$sk2/1 ,  $sk3/1 ,   1   ]
		// ];

		// $matriksA2 = [ 
		// 	[1      ,  1/$sk4],
		// 	[$sk4/1 ,       1]
		// ];

		// $matriksA3 = [ 
		// 	[1      ,  1/$sk5],
		// 	[$sk5/1 ,       1]
		// ];

		$matriksA = [ 
			[     1      ,  $tampung1_n , $tampung2_n],
			[$tampung1_p ,       1      , $tampung3_n],
			[$tampung2_p ,  $tampung3_p ,       1    ]
		];

		$matriksA2 = [ 
			[     1      ,  $tampung4_n],
			[$tampung4_p ,       1     ]
		];

		$matriksA3 = [ 
			[    1       ,  $tampung5_n],
			[$tampung5_p ,       1     ]
		];

		$matriksB  = $matriksA;
		$matriksB2 = $matriksA2;
		$matriksB3 = $matriksA3;

		$perkalianMatriks 	 = $this->perkalian_matriks($matriksB,$matriksA);
		$perkalianMatriks2 	 = $this->perkalian_matriks($matriksB2,$matriksA2);
		$perkalianMatriks3 	 = $this->perkalian_matriks($matriksB3,$matriksA3);
		
		$penjumlahanMatriks  = $this->penjumlahan_matriks($perkalianMatriks);
		$penjumlahanMatriks2 = $this->penjumlahan_matriks($perkalianMatriks2);
		$penjumlahanMatriks3 = $this->penjumlahan_matriks($perkalianMatriks3);

		$eigenvector 		 = $this->cari_eigenvector($penjumlahanMatriks);
		$eigenvector2 		 = $this->cari_eigenvector($penjumlahanMatriks2);
		$eigenvector3 		 = $this->cari_eigenvector($penjumlahanMatriks3);
        
        $getAllSubkriteria 	 = $this->M_Subkriteria->getAllSubkriteria();
        $getSubkriteria      = $this->M_Subkriteria->getSubkriteria('K1');
        $getSubkriteria2     = $this->M_Subkriteria->getSubkriteria('K2');
		$getSubkriteria3     = $this->M_Subkriteria->getSubkriteria('K3');
		
		$subkriteria1 = array();
		foreach($getSubkriteria as $data){
			$subkriteria1[] = $data->nm_subkriteria;
		}

		$subkriteria2 = array();
		foreach($getSubkriteria2 as $data){
			$subkriteria2[] = $data->nm_subkriteria;
		}

		$subkriteria3 = array();
		foreach($getSubkriteria3 as $data){
			$subkriteria3[] = $data->nm_subkriteria;
		}

		//view perbandingan subkriteria1
		$baris_sub1 = count($subkriteria1);
		$view_subkriteria1 = array();
		for($i=0; $i<$baris_sub1; $i++){
			$view_subkriteria1[] = [$subkriteria1[$i],$matriksA[$i]];
		}

		//view perbandingan subkriteria2
		$baris_sub2 = count($subkriteria2);
		$view_subkriteria2 = array();
		for($i=0; $i<$baris_sub2; $i++){
			$view_subkriteria2[] = [$subkriteria2[$i],$matriksA2[$i]];
		}

		//view perbandingan subkriteria2
		$baris_sub3 = count($subkriteria3);
		$view_subkriteria3 = array();
		for($i=0; $i<$baris_sub3; $i++){
			$view_subkriteria3[] = [$subkriteria3[$i],$matriksA3[$i]];
		}

		//view eigenvector subkriteria1
		$baris_sub1 = count($subkriteria1);
		$view_eigenvector1 = array();
		for($i=0; $i<$baris_sub1; $i++){
			$view_eigenvector1[] = [$subkriteria1[$i],$penjumlahanMatriks[$i],$eigenvector[$i]];
		}

		//view eigenvector subkriteria2
		$baris_sub2 = count($subkriteria2);
		$view_eigenvector2 = array();
		for($i=0; $i<$baris_sub2; $i++){
			$view_eigenvector2[] = [$subkriteria2[$i],$penjumlahanMatriks2[$i],$eigenvector2[$i]];
		}

		//view eigenvector subkriteria1
		$baris_sub3 = count($subkriteria3);
		$view_eigenvector3 = array();
		for($i=0; $i<$baris_sub3; $i++){
			$view_eigenvector3[] = [$subkriteria3[$i],$penjumlahanMatriks3[$i],$eigenvector3[$i]];
		}

		$data = [
			'getSubkriteria'	  => $getSubkriteria,
			'getSubkriteria2'	  => $getSubkriteria2,
			'getSubkriteria3'	  => $getSubkriteria3,
			 
			'matriksA' 			  => $matriksA,
			'matriksA2'			  => $matriksA2,
			'matriksA3'			  => $matriksA3,

			'view_subkriteria1'	  => $view_subkriteria1,
			'view_subkriteria2'	  => $view_subkriteria2,
			'view_subkriteria3'	  => $view_subkriteria3,
			
			'penjumlahanMatriks'  => $penjumlahanMatriks,
			'penjumlahanMatriks2' => $penjumlahanMatriks2,
			'penjumlahanMatriks3' => $penjumlahanMatriks3,
			
			'eigenvector' 		  => $eigenvector,
			'eigenvector2' 		  => $eigenvector2,
			'eigenvector3' 		  => $eigenvector3,

			'view_eigenvector1'	  => $view_eigenvector1,
			'view_eigenvector2'	  => $view_eigenvector2,
			'view_eigenvector3'	  => $view_eigenvector3,
			
			'perkalianMatriks' 	  => $perkalianMatriks,
			'getAllSubkriteria'   => $getAllSubkriteria
		];

		$alert = $this->alert($data);

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

	//hapus data matriks
	public function batal()
	{
		redirect('C_PerbandinganSubkriteria');
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
		//key subkriteria
		$SK1 = $this->input->post('SK1');
		$SK2 = $this->input->post('SK2');
		$SK3 = $this->input->post('SK3');
		$SK4 = $this->input->post('SK4');
		$SK5 = $this->input->post('SK5');
		$SK6 = $this->input->post('SK6');
		$SK7 = $this->input->post('SK7');		

		//eigenvector kompetensi
		$SE_kompetensi1  = $this->input->post('SE_kompetensi1');
		$SE_kompetensi2  = $this->input->post('SE_kompetensi2');
		$SE_kompetensi3  = $this->input->post('SE_kompetensi3');

		//eigenvector interview
		$SE_interview1   = $this->input->post('SE_interview1');
		$SE_interview2   = $this->input->post('SE_interview2');

		//eigenvector konsistensi
		$SE_konsistensi1 = $this->input->post('SE_konsistensi1');
		$SE_konsistensi2 = $this->input->post('SE_konsistensi2');

		$data1['eigenvector_sub'] = $SE_kompetensi1;
		$data2['eigenvector_sub'] = $SE_kompetensi2;
		$data3['eigenvector_sub'] = $SE_kompetensi3;

		$data4['eigenvector_sub'] = $SE_interview1;
		$data5['eigenvector_sub'] = $SE_interview2;

		$data6['eigenvector_sub'] = $SE_konsistensi1;
		$data7['eigenvector_sub'] = $SE_konsistensi2;

		//kriteria
		$kriteria1 = $this->input->post('kriteria1');
		$kriteria2 = $this->input->post('kriteria2');
		$kriteria3 = $this->input->post('kriteria3');	

		$baris1 = $this->M_Subkriteria->jumlah_subkriteria('subkriteria',$kriteria1);
		$baris2 = $this->M_Subkriteria->jumlah_subkriteria('subkriteria',$kriteria2);
		$baris3 = $this->M_Subkriteria->jumlah_subkriteria('subkriteria',$kriteria3);

		$baris_total = $this->M_Calon->jumlah('subkriteria');

		//tangkap nilai banding berdasarkan kd_kriteria K1
		$n = 1;
		$array1 = array();
		$banding2 = "nilaiBanding2a";
		for($i=1; $i<=$baris1; $i++){
			for($j=1; $j<=$baris1; $j++){
				$nilaiBanding2a = $this->input->post($banding2.$n);
				$n++;
				$array1[] = $nilaiBanding2a;
			}
		}

		//tangkap nilai banding berdasarkan kd_kriteria K2
		$m = 1;
		$array2 = array();
		$banding2 = "nilaiBanding2b";
		for($i=1; $i<=$baris2; $i++){
			for($j=1; $j<=$baris2; $j++){
				$nilaiBanding2b = $this->input->post($banding2.$m);
				$m++;
				$array2[] = $nilaiBanding2b;
			}
		}

		//tangkap nilai banding berdasarkan kd_kriteria K3
		$b = 1;
		$array3 = array();
		$banding2 = "nilaiBanding2c";
		for($i=1; $i<=$baris3; $i++){
			for($j=1; $j<=$baris3; $j++){
				$nilaiBanding2c = $this->input->post($banding2.$b);
				$b++;
				$array3[] = $nilaiBanding2c;
			}
		}

		//simpan nilai banding berdasarkan kd_kriteria K1
		$sktr = "SK";
		$q = 0;
		for($i=1; $i<=$baris1; $i++){
			for($j=1; $j<=$baris1; $j++){
				$data_banding1 = [
					'kd_subkriteria' => $sktr.$i,
					'kd_subkriteria2' => $sktr.$j,
					'nilaiBanding2' => $array1[$q++]
				];
				$this->M_Subkriteria->tambahBanding($data_banding1);
			}
		}

		//simpan nilai banding berdasarkan kd_kriteria K2
		$sktr = "SK";
		$q = 0;
		$k = 4;
		$l = 4;
		for($i=1; $i<=$baris2; $i++){
			for($j=1; $j<=$baris2; $j++){
				$data_banding1 = [
					'kd_subkriteria' => $sktr.$k,
					'kd_subkriteria2' => $sktr.$l,
					'nilaiBanding2' => $array2[$q++]
				];
				$this->M_Subkriteria->tambahBanding($data_banding1);
				$l++;
			}
			$l = 4;
			$k++;
		}


		//simpan nilai banding berdasarkan kd_kriteria K3
		$sktr = "SK";
		$q = 0;
		$m = 6;
		$n = 6;
		for($i=1; $i<=$baris3; $i++){
			for($j=1; $j<=$baris3; $j++){
				$data_banding1 = [
					'kd_subkriteria' => $sktr.$m,
					'kd_subkriteria2' => $sktr.$n,
					'nilaiBanding2' => $array3[$q++]
				];
				$this->M_Subkriteria->tambahBanding($data_banding1);
				$n++;
			}
			$n = 6;
			$m++;
		}


		// echo json_encode($array1)."<br>";
		// echo json_encode($array2)."<br>";
		// echo json_encode($array3); die();

		$result1 = $this->M_Subkriteria->InsertEigenvector($SK1,$data1);
		$result2 = $this->M_Subkriteria->InsertEigenvector($SK2,$data2);
		$result3 = $this->M_Subkriteria->InsertEigenvector($SK3,$data3);

		$result4 = $this->M_Subkriteria->InsertEigenvector($SK4,$data4);
		$result5 = $this->M_Subkriteria->InsertEigenvector($SK5,$data5);

		$result6 = $this->M_Subkriteria->InsertEigenvector($SK6,$data6);
		$result7 = $this->M_Subkriteria->InsertEigenvector($SK7,$data7);


		if ($result1 && $result2 && $result3 && $result4 && $result5 && $result6 && $result7){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('C_PerbandinganSubkriteria');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('C_PerbandinganSubkriteria');
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
