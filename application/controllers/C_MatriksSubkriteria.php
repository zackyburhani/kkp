<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_MatriksSubkriteria extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model(['M_TargetSubkriteria','M_Kriteria','M_Subkriteria','M_MatriksSubkriteria','M_Calon']);
	}

	public function index()
	{
		$a = "";
		$getAllKriteria    = $this->M_Kriteria->getAllKriteria();
		$matriksISI = $this->M_MatriksSubkriteria->matriksNormalisasiISI($a);

		$data = [
			'matriksISI'=>$matriksISI,
			'getAllKriteria' 	 => $getAllKriteria
		];

		$this->load->view('template/V_Header',$data);
		$this->load->view('template/V_Sidebar');
		$this->load->view('matriks/V_MatriksSubkriteria');
		$this->load->view('template/V_Footer');
	}

	public function tanggal($periode)
	{
		$getPeriodeCalon = $this->M_TargetSubkriteria->periode($periode);
			if($getPeriodeCalon != null) {
				foreach ($getPeriodeCalon as $periode) {
				$tanggal = $periode->periode_masuk;
			} return $tanggal;	
		}
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
		if ($this->db->table_exists('saw_sub') == false )
		{
			$this->session->set_flashdata('pesanGagal','Anda Belum Memasukan Nilai Target');
			redirect('C_MatriksSubkriteria');
		}

		$periode 		   = $this->input->get('periode_masuk');
		$getPeriodeCalon   = $this->M_TargetSubkriteria->periode($periode);
		$getAllCalon 	   = $this->M_TargetSubkriteria->getAllCalon();
		
		$getAllKriteria    = $this->M_Kriteria->getAllKriteria();
		$nilaiDetail       = $this->M_TargetSubkriteria->nilaiDetail();

		$max 			   = $this->M_TargetSubkriteria->max();
		$getAllSAW_sub 	   = $this->M_TargetSubkriteria->getAllSAW_sub($periode);
		$matriksISI 	   = $this->M_MatriksSubkriteria->matriksNormalisasiISI($periode);

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

		$total1 = array();
		foreach ($max as $key) {
			foreach ($getAllSAW_sub as $data) {
				$total1[] = round(
					(($data->SK1/$key->maxSK1)*$bobot[0])+
					(($data->SK2/$key->maxSK2)*$bobot[1])+
					(($data->SK3/$key->maxSK3)*$bobot[2]),4);
			}
		}

		$total2 = array();
		foreach ($max as $key) {
			foreach ($getAllSAW_sub as $data) {
				$total2[] = round(
					(($data->SK4/$key->maxSK4)*$bobot[3])+
					(($data->SK5/$key->maxSK5)*$bobot[4]),4);
			}
		}

		$total3 = array();
		foreach ($max as $key) {
			foreach ($getAllSAW_sub as $data) {
				$total3[] = round(
					(($data->SK6/$key->maxSK6)*$bobot[5])+
					(($data->SK7/$key->maxSK7)*$bobot[6]),4);
			}
		}

		$tanggal = $this->tanggal($periode);

		$data = [
			'matriksISI'		=> $matriksISI,
			'tanggal'			=> $tanggal,
			'total1'			=> $total1,
			'total2'			=> $total2,
			'total3'			=> $total3,
			'bobot'				=> $bobot,
			'max'				=> $maxLoop,
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

	private function kriteria()
	{
		$kriteria = array();
		$getAllKriteria    = $this->M_Kriteria->getAllKriteria();
		foreach ($getAllKriteria as $row) {
			$kriteria[] = $row->kd_kriteria;
		}
		return $kriteria;
	} 

	public function simpanNilai($tanggalPeriode)
	{

		$getPeriodeCalon   = $this->M_TargetSubkriteria->periode($tanggalPeriode);

		$max 			= $this->M_TargetSubkriteria->max();		
		$getAllSAW_sub 	= $this->M_TargetSubkriteria->getAllSAW_sub($tanggalPeriode);
		$getAllKriteria    = $this->M_Kriteria->getAllKriteria();

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

		$total1 = array();
		foreach ($max as $key) {
			foreach ($getAllSAW_sub as $data) {
				$total1[] = round(
					(($data->SK1/$key->maxSK1)*$bobot[0])+
					(($data->SK2/$key->maxSK2)*$bobot[1])+
					(($data->SK3/$key->maxSK3)*$bobot[2]),4);
			}
		}

		$total2 = array();
		foreach ($max as $key) {
			foreach ($getAllSAW_sub as $data) {
				$total2[] = round(
					(($data->SK4/$key->maxSK4)*$bobot[3])+
					(($data->SK5/$key->maxSK5)*$bobot[4]),4);
			}
		}

		$total3 = array();
		foreach ($max as $key) {
			foreach ($getAllSAW_sub as $data) {
				$total3[] = round(
					(($data->SK6/$key->maxSK6)*$bobot[5])+
					(($data->SK7/$key->maxSK7)*$bobot[6]),4);
			}
		}

		$baris 		   = $this->M_Calon->jumlah('kriteria');
		$barisCalon = $this->M_MatriksSubkriteria->barisCalon($tanggalPeriode);

		$name = "id_calon";
		$calon = array();
		for($i=1; $i<=$barisCalon; $i++) {
			$var = $name.$i;
			$calon[] = $this->input->post($var);	
		}

		//simpan ke table saw
		$i=0;
		while($i<$barisCalon){
			$dataSAW = [
				'id_calon'		=> $calon[$i],
				'periode_masuk' => $tanggalPeriode,
				'K1'			=> $total1[$i],
				'K2'			=> $total2[$i],
				'K3'			=> $total3[$i]
			];
			$result = $this->M_MatriksSubkriteria->simpanTargetSAW($dataSAW);
			$i++;
		}

		//simpan ke table target
		foreach ($getAllKriteria as $kriteria) {
			$i=0;
			while($i<$barisCalon){
				$dataTarget = [
					'kd_kriteria' 	=> $kriteria->kd_kriteria,
					'id_calon'		=> $calon[$i],
				];
				$result1 = $this->M_MatriksSubkriteria->simpanTarget($dataTarget);
				$i++;
			}	
		}
	
		$kriteria = $this->kriteria();
		$j=0;
		for($i=0; $i<$baris; $i++){
			while($j<$barisCalon){
				$result2 = $this->M_MatriksSubkriteria->isiTarget($total1[$j],$calon[$j],$kriteria[$i]);
				$j++;
			}
		}

		$j=0;
		for($i=1; $i<$baris; $i++){
			while($j<$barisCalon){
				$result2 = $this->M_MatriksSubkriteria->isiTarget($total2[$j],$calon[$j],$kriteria[$i]);
				$j++;
			}
		}

		$j=0;
		for($i=2; $i<$baris; $i++){
			while($j<$barisCalon){
				$result2 = $this->M_MatriksSubkriteria->isiTarget($total3[$j],$calon[$j],$kriteria[$i]);
				$j++;
			}
		}

		if (!$result2){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('C_MatriksSubkriteria/periode?periode_masuk='.$tanggalPeriode);
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('C_MatriksSubkriteria/periode?periode_masuk='.$tanggalPeriode);
		}
	}
}
