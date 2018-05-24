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

		$sk4 = $this->input->post('sk4');
		$sk5 = $this->input->post('sk5');

		$matriksA = [ 
			[1      ,  1/$sk1 , 1/$sk2],
			[$sk1/1 ,   1     , 1/$sk3],
			[$sk2/1 ,  $sk3/1 ,   1   ]
		];

		$matriksA2 = [ 
			[1      ,  1/$sk4],
			[$sk4/1 ,       1]
		];

		$matriksA3 = [ 
			[1      ,  1/$sk5],
			[$sk5/1 ,       1]
		];

		$matriksB = $matriksA;
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

		$data = [
			'getSubkriteria'	  => $getSubkriteria,
			'getSubkriteria2'	  => $getSubkriteria2,
			'getSubkriteria3'	  => $getSubkriteria3,
			 
			'matriksA' 			  => $matriksA,
			'matriksA2'			  => $matriksA2,
			'matriksA3'			  => $matriksA3,
			
			'penjumlahanMatriks'  => $penjumlahanMatriks,
			'penjumlahanMatriks2' => $penjumlahanMatriks2,
			'penjumlahanMatriks3' => $penjumlahanMatriks3,
			
			'eigenvector' 		  => $eigenvector,
			'eigenvector2' 		  => $eigenvector2,
			'eigenvector3' 		  => $eigenvector3,
			
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

	//fungsi untuk menghapus data session matriks
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

	//fungsi simpan nilai eigenvector
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
