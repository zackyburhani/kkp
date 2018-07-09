<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_LapPerangkinganNilai extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('M_LapPerangkinganNilai');
        $this->load->library('Excel_generator');
    }

    //halaman awal
	public function index()
	{
		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('laporan/V_LapPerangkinganNilai');
		$this->load->view('template/V_Footer');
	}

    //tampil data per-periode
    public function periode(){
        $periode = $this->input->get('periode_masuk');
        $getLapPerangkinganNilai = $this->M_LapPerangkinganNilai->getLapPerangkinganNilai($periode);
        
        $data = [
            'getLapPerangkinganNilai' => $getLapPerangkinganNilai,
            'periode' => $periode
    
         ];
       
        $this->load->view('template/V_Header',$data);
		$this->load->view('template/V_Sidebar');
		$this->load->view('laporan/V_LapPerangkinganNilai');
		$this->load->view('template/V_Footer');
    }

    //cetak laporan perangkingan dalam bentuk pdf
	public function cetaklaporanrank($periode)
    {
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
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(186,1,'Jl. BPKP No. 37 Sudimara Pinang, Kota Tangerang',0,1,'C');
        $pdf->Cell(186,7,'Telp / Fax : 021-22927310',0,1,'C');
        $pdf->Cell(186,1,'E-mail : maestro_hardscape@yahoo.com',0,1,'C');

        $pdf->Line(10, 35, 210-11, 35); 
        $pdf->SetLineWidth(0.5); 
        $pdf->Line(10, 35, 210-11, 35);
        $pdf->SetLineWidth(0);     
            
        $pdf->ln(6);        
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(190,10,'Laporan Perangkingan Nilai SAW ',0,1,'C');
        //periode masuk
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(1,2,"Periode Masuk : ".tanggal($periode),0,1,'L');
        //penilaian subkriteria kompetensi

        $pdf->Cell(190,5,' ',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,1,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(10,6,'No.',1,0,'C');
        $pdf->Cell(20,6,'ID Calon',1,0,'C');
        $pdf->Cell(50,6,'Nama Calon',1,0,'C');
        $pdf->Cell(20,6,'kompetensi',1,0,'C');
        $pdf->Cell(20,6,'Interview',1,0,'C');
        $pdf->Cell(20,6,'Konsistensi',1,0,'C');
        $pdf->Cell(20,6,'Hasil Akhir',1,0,'C');
        $pdf->Cell(29,6,'Keterangan',1,1,'C');
        $pdf->SetFont('Arial','',8);

		$hasil = $this->M_LapPerangkinganNilai->getLapPerangkinganNilai($periode);

        $no = 1;
        foreach ($hasil as $row)
        {
            $pdf->Cell(10,6,$no++.".",1,0,'C');
            $pdf->Cell(20,6,$row->calon_id,1,0,'C');
            $pdf->Cell(50,6,ucwords($row->nm_calon),1,0);
            $pdf->Cell(20,6,$row->kompetensi,1,0,'C');
            $pdf->Cell(20,6,$row->interview,1,0,'C');
            $pdf->Cell(20,6,$row->konsistensi,1,0,'C');
            $pdf->Cell(20,6,$row->hasil_akhir,1,0,'C');
            if($row->keterangan != null){
                $pdf->Cell(29,6,$row->keterangan,1,1,'C');
            } else {
                $pdf->Cell(29,6,"Tidak Lolos",1,1,'C');
            }    
        }

        $pdf->Output();
    }

    //cetak laporan perangkingan dalam bentuk .xlsx
    public function Excel($periode)
    {
        $query = $this->M_LapPerangkinganNilai->ExportExcel($periode);
        $this->excel_generator->set_query($query);
        $this->excel_generator->set_header(array('ID CALON', 'NAMA CALON','KOMPETENSI','INTERVIEW','KONSISTENSI','HASIL','KETERANGAN'));
        $this->excel_generator->set_column(array('calon_id', 'nm_calon','kompetensi','interview','konsistensi','hasil_akhir','keterangan'));
        $this->excel_generator->set_width(array(10, 20, 15, 15,15,15,15));
        $this->excel_generator->exportTo2007('Perangkingan Nilai Periode '.tanggal($periode));
    }

    //cetak laporan perangkingan dalam bentuk .doc
    public function Word($periode)
    {
        $hasil = $this->M_LapPerangkinganNilai->getLapPerangkinganNilai($periode);
        $data = [
            'periode' =>$periode,
            'word' => $hasil
        ];
        $this->load->view('laporan/word_LapPerangkingan',$data);
    }

}
