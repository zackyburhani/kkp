<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_LapRekapitulasiPenilaian extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model(['M_LapPerangkinganNilai','M_LapRekapitulasiPenilaian']);
    }

	public function index()
	{
		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('laporan/V_LapPerangkinganNilai');
		$this->load->view('template/V_Footer');
	}

    public function periode(){
        $periode = $this->input->get('periode_masuk');
        $getLapRekapitulasiPenilaian = $this->M_LapRekapitulasiPenilaian->getLapRekapitulasiPenilaian($periode);
        
        $data = ['getLapRekapitulasiPenilaian' => $getLapRekapitulasiPenilaian,
                'periode' => $periode
    
    ];
       
        $this->load->view('template/V_Header',$data);
		$this->load->view('template/V_Sidebar');
		$this->load->view('laporan/V_LapRekapitulasi');
		$this->load->view('template/V_Footer');
    }

	function cetaklaporanrank(){
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        //cetak gambar
        $image1 = "assets/img/logo2.png";
        $pdf->Cell(1, 0, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 20.10), 0, 0, 'L', false );
        // mencetak string
        $pdf->Cell(186,10,'PT. BIYA MAESTRO HARDSCAPE',0,1,'C');
        $pdf->Cell(9,1,'',0,1);
        $pdf->SetFont('Arial','B',12);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,15,'LAPORAN HASIL REKAPITULASI PENILAIAN ',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,1,'',0,1);
        $pdf->SetFont('Arial','B',6);
        $pdf->Cell(15,6,'ID CALON',1,0);
        $pdf->Cell(30,6,'NAMA',1,0);
        $pdf->Cell(15,6,'JURUSAN',1,0);
        $pdf->Cell(15,6,'SKILL',1,0);
        $pdf->Cell(30,6,'TANGGUNG JAWAB',1,0);
        $pdf->Cell(30,6,'KESIAPAN KERJA',1,0);
        $pdf->Cell(15,6,'PERILAKU',1,0);
        $pdf->Cell(15,6,'KETELITIAN',1,0);
        $pdf->Cell(15,6,'KEJUJURAN',1,0);
        $pdf->Cell(15,6,'HASIL',1,0);
        
        
		$pdf->SetFont('Arial','',6);
        $periode = $this->input->get('periode');
		$hasil = $this->M_LapRekapitulasiPenilaian->getLapRekapitulasiPenilaian($periode);
		
        foreach ($hasil as $row){
			$pdf->Cell(10,7,'',0,1);
            $pdf->Cell(15,6,$row->calon_id,1,0);
            $pdf->Cell(30,6,$row->nm_calon,1,0);
            $pdf->Cell(15,6,$row->jurusan,1,0);
            $pdf->Cell(15,6,$row->skill,1,0);
            $pdf->Cell(30,6,$row->tanggung_jawab,1,0);
            $pdf->Cell(30,6,$row->kesiapan_kerja,1,0);
            $pdf->Cell(15,6,$row->perilaku,1,0);
            $pdf->Cell(15,6,$row->ketelitian,1,0);
            $pdf->Cell(15,6,$row->kejujuran,1,0);
            $pdf->Cell(15,6,$row->hasil,1,0);
        }
        $pdf->Output();
    }

}
