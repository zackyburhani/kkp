<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_MatriksKriteria extends CI_Controller {
 
	public function __construct() 
	{
		parent::__construct();
		$this->load->model(['M_TargetSubkriteria','M_Kriteria','M_Subkriteria','M_MatriksSubkriteria','M_MatriksKriteria']);
	}

	//halaman awal
	public function index()
	{	
		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('matriks/V_MatriksKriteria');
		$this->load->view('template/V_Footer');
	}

	//validasi untuk view
	public function tanggal($periode)
	{
		$getPeriodeCalon = $this->M_TargetSubkriteria->periode($periode);
			if($getPeriodeCalon != null) {
				foreach ($getPeriodeCalon as $periode) {
				$tanggal = $periode->periode_masuk;
			} return $tanggal;	
		}
	}

	//tampil data per-periode
	public function periode()
	{
		$periode 		 = $this->input->get('periode_masuk');
		$getPeriodeCalon = $this->M_TargetSubkriteria->periode($periode);
		$getAllKriteria  = $this->M_Kriteria->getAllKriteria();
		$matriksISI 	 = $this->M_MatriksSubkriteria->matriksNormalisasiISI($periode);
		$barisCalon 	 = $this->M_MatriksSubkriteria->barisCalon($periode);

		$cekEigenvector    = $this->M_Kriteria->cekEigenvector();
		$cekEigenvectorSub = $this->M_Subkriteria->cekEigenvector();

		if($cekEigenvector->eigenvector == 0 || $cekEigenvectorSub->eigenvector_sub == 0){
			$this->session->set_flashdata('pesanGagal','Data Eigenvector Kosong');
    		redirect('C_MatriksKriteria');
		}

		$maxLoop = array();
		foreach($this->max() as $key=>$value) {
			array_push($maxLoop, $value);
		}

		$bobot = array();
		foreach($this->bobot() as $key=>$value) {
			array_push($bobot, $value);
		}

		$total = $this->total($periode);
		$tanggal = $this->tanggal($periode);

		//perangkingan untuk view
		$id_calon_a = array();
		foreach ($getPeriodeCalon as $a) {
			$id_calon_a[] = $a->id_calon;
		}

		$nm_calon_A = array();
		foreach ($getPeriodeCalon as $a) {
			$nm_calon_a[] = $a->nm_calon;
		}

		if($matriksISI == null){
			$total_view = [0];
		} else{
			//total
			$total_view = array();
			for($i=0; $i<$barisCalon; $i++){
				$total_view[] = [$id_calon_a[$i],$nm_calon_a[$i],$total[$i]];
			}
		}
		
		$data = [
			'matriksISI'      => $matriksISI,
			'tanggal'		  => $tanggal,
			'total_view'	  => $total_view,
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

	//mencari nilai max 
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

	//mengambil nilai bobot eigenvector
	public function bobot()
	{
		$eigenvector = $this->M_MatriksKriteria->eigenvector();
		$array = array();
		foreach($eigenvector as $key) {
			$array[] = $key->eigenvector; 
		} return $array;
	}

	//perhitungan saw
	public function total($periode)
	{
		$getAllSAW = $this->M_MatriksKriteria->getAllSAW($periode);
		$max 	   = $this->M_MatriksKriteria->max();
		$validasi  = $this->M_MatriksKriteria->getAllSAW_validasi($periode);

		if($validasi->K1 == null || $validasi->K2 == null || $validasi->K3 == null){
			$this->session->set_flashdata('pesan','Data Tidak Ditemukan');
	   		redirect('C_MatriksKriteria/');	
		} else{
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
		}
		return $total;
	}

	//simpan hasil perhitungan
	public function simpanHasil($tanggalPeriode)
	{
		$periode_masuk = $this->input->post('periode_masuk');
		$barisCalon    = $this->M_MatriksSubkriteria->barisCalon($tanggalPeriode);

		$name = "id_calon";
		$calon = array();
		for($i=1; $i<=$barisCalon; $i++) {
			$var = $name.$i;
			$calon[] = $this->input->post($var);	
		}

		$total = $this->total($periode_masuk);

		$i=0;
		while($i<$barisCalon){
			$dataSAW = [
				'id_calon'	=> $calon[$i],
				'hasil_akhir'	=> $total[$i]
			];
			$result = $this->M_MatriksKriteria->simpanHasilSAW($dataSAW);
			$i++;
		}
	
		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('C_MatriksKriteria/periode?periode_masuk='.$periode_masuk);
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('C_MatriksKriteria/periode?periode_masuk='.$periode_masuk);
		}
	}
}
