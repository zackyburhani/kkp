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

		$matriksB = $matriksA;

		$perkalianMatriks = $this->perkalian_matriks($matriksB,$matriksA);
		$penjumlahanMatriks = $this->penjumlahan_matriks($perkalianMatriks);
		$eigenvector = $this->cari_eigenvector($penjumlahanMatriks);
                 

		$data = [
			'matriksA' => $matriksA,
			'perkalianMatriks' => $perkalianMatriks,
			'penjumlahanMatriks' => $penjumlahanMatriks,
			'eigenvector' => $eigenvector
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

	//fungsi untuk menghapus data session matriks
	public function batal()
	{
		redirect('C_PerbandinganKriteria');
	}

	//memunculkan alert sukses
	public function alert($nilai)
	{	
		if($nilai != null){
			$alert = $this->session->set_flashdata('pesan','Data Berhasil Disimpan');
			return $alert;
		} else {
			$alert = $this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
			return $alert;
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
