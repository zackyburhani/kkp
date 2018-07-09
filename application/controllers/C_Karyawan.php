<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Karyawan extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('M_Calon');
	}

	//halaman awal 
	public function index()
	{
		$getAllCalon 	= $this->M_Calon->getAllCalon();
		$getKodeCalon 	= $this->M_Calon->getKodeCalon();
		$data = [
			'getKodeCalon' => $getKodeCalon,
			'getAllCalon'  => $getAllCalon
		];
		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('karyawan/V_Karyawan', $data);
		$this->load->view('karyawan/V_EntryKaryawan', $data);
		$this->load->view('karyawan/V_UpdateKaryawan', $data);
		$this->load->view('karyawan/V_HapusKaryawan', $data);
		$this->load->view('karyawan/V_tampilKaryawan',$data);
		$this->load->view('template/V_Footer');
	}
	
	//simpan data calon
	public function tambahKaryawan()
	{
		$id_calon 			= $this->input->post('id_calon');
		$nm_calon 			= $this->input->post('nm_calon');
		$tgl_lahir 			= $this->input->post('tgl_lahir');
		$alamat 			= $this->input->post('alamat');
		$jk 				= $this->input->post('jk');
		$email 				= $this->input->post('email');
		$no_telp 			= $this->input->post('no_telp');
		$pendidikanTerakhir = $this->input->post('pendidikanTerakhir');
		$periode_masuk 		= $this->input->post('periode_masuk');

		$data = [
			'id_calon' 				=> $id_calon,
			'nm_calon' 				=> $nm_calon,
			'tgl_lahir' 			=> $tgl_lahir,
			'alamat' 				=> $alamat,
			'jk' 					=> strtoupper($jk),
			'email' 				=> $email,
			'no_telp' 				=> $no_telp,
			'pendidikan_terakhir' 	=> $pendidikanTerakhir,
			'periode_masuk' 		=> $periode_masuk
		];

		$result = $this->M_Calon->tambahCalon($data);

		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('C_Karyawan');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('C_Karyawan');
		}
	}
	
	//update data calon
	public function updateKaryawan()
	{
		$id_calon 			= $this->input->post('id_calon');
		$nm_calon 			= $this->input->post('nm_calon');
		$tgl_lahir 			= $this->input->post('tgl_lahir');
		$alamat 			= $this->input->post('alamat');
		$jk	 				= $this->input->post('jk');
		$email 				= $this->input->post('email');
		$no_telp			= $this->input->post('no_telp');
		$pendidikanTerakhir = $this->input->post('pendidikanTerakhir');
		$periode_masuk 		= $this->input->post('periode_masuk');

		$data = [
			'nm_calon' 				=> $nm_calon,
			'tgl_lahir' 			=> $tgl_lahir,
			'alamat' 				=> $alamat,
			'jk' 					=> $jk,
			'email'			 		=> $email,
			'no_telp' 				=> $no_telp,
			'pendidikan_terakhir' 	=> $pendidikanTerakhir,
			'periode_masuk'	 		=> $periode_masuk
		];

		$result = $this->M_Calon->UpdateCalon($id_calon, $data);
		
		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Diubah');
	   		redirect('C_Karyawan');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Diubah');
    		redirect('C_Karyawan');
		}
	}
	
	//hapus data calon
	public function deleteKaryawan()
	{
		$id_calon = $this->input->post('id_calon');
		$validasi = $this->M_Calon->validasiHapus('id_calon','target2',$id_calon);

		if($validasi->id_calon == $id_calon){
			$this->session->set_flashdata('pesanGagal','Data karyawan Terhubung Dengan Data Lain');
	   		redirect('C_Karyawan');
		} else {
			$result = $this->M_Calon->DeleteCalon($id_calon);
			if ($result){
				$this->session->set_flashdata('pesan','Data Berhasil Dihapus');
		   		redirect('C_Karyawan');
			}else{
				$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Dihapus');
	    		redirect('C_Karyawan');
			}
		}
	}

	//tampil data per-periode
	public function periode()
	{
		$periode 		 = $this->input->get('periode_masuk');
		$getPeriodeCalon = $this->M_Calon->periode($periode);
		$getKodeCalon 	 = $this->M_Calon->getKodeCalon();
		$getAllCalon 	 = $this->M_Calon->getAllCalon();
		
		$data = [
			'getPeriodeCalon' => $getPeriodeCalon,
			'getKodeCalon' 	  => $getKodeCalon,
			'getAllCalon' 	  => $getAllCalon,
			'tanggalPeriode'  => $periode
		];

		$this->load->view('template/V_Header');
		$this->load->view('template/V_Sidebar');
		$this->load->view('karyawan/V_Karyawan', $data);
		$this->load->view('karyawan/V_EntryKaryawan', $data);
		$this->load->view('karyawan/V_UpdateKaryawan', $data);
		$this->load->view('karyawan/V_HapusKaryawan', $data);
		$this->load->view('karyawan/V_tampilKaryawan',$data);
		$this->load->view('template/V_Footer');
	}

	//cetak data calon karyawan perperiode
	public function Cetak($periode)
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
        $pdf->Cell(186,1,'e-mail : maestro_hardscape@yahoo.com',0,1,'C');

        $pdf->Line(10, 35, 210-11, 35); 
        $pdf->SetLineWidth(0.5); 
		$pdf->Line(10, 35, 210-11, 35);
        $pdf->SetLineWidth(0);     
			
		$pdf->ln(10);
		
		//periode masuk
		$pdf->Cell(1,1,"Periode Masuk : ".tanggal($periode),0,1,'L');
        //penilaian subkriteria kompetensi
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,15,'Penilaian Subkriteria Kompetensi ',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,1,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No.',1,0,'C');
        $pdf->Cell(50,6,'Nama Calon',1,0,'C');
        $pdf->Cell(43,6,'Jurusan',1,0,'C');
        $pdf->Cell(43,6,'Skill',1,0,'C');
        $pdf->Cell(43,6,'Tanggung Jawab',1,1,'C');
        $pdf->SetFont('Arial','',10);
        // $getPeriodeCalon = $this->db->get('calon')->result();
        $getPeriodeCalon = $this->M_Calon->CetakPeriode($periode);
        $no = 1;
        foreach ($getPeriodeCalon as $row){
        	$pdf->Cell(10,6,$no++.".",1,0,'C');
            $pdf->Cell(50,6, ucwords($row->nm_calon),1,0);
            $pdf->Cell(43,6,"",1,0,'C');
            $pdf->Cell(43,6,"",1,0);
            $pdf->Cell(43,6,"",1,1,'C');
        }

        //spasi
        $pdf->Cell(10,5,'',0,1);

        //penilaian subkriteria interview
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,10,'Penilaian Subkriteria Kompetensi ',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,1,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No.',1,0,'C');
        $pdf->Cell(50,6,'Nama Calon',1,0,'C');
        $pdf->Cell(65,6,'Kesiapan Kerja',1,0,'C');
        $pdf->Cell(64,6,'Perilaku',1,1,'C');
        $pdf->SetFont('Arial','',10);
        // $getPeriodeCalon = $this->db->get('calon')->result();
        $getPeriodeCalon = $this->M_Calon->CetakPeriode($periode);
        $no = 1;
        foreach ($getPeriodeCalon as $row){
        	$pdf->Cell(10,6,$no++.".",1,0,'C');
            $pdf->Cell(50,6,ucwords($row->nm_calon),1,0);
            $pdf->Cell(65,6,"",1,0,'C');
            $pdf->Cell(64,6,"",1,1,'C');
        }

        //spasi
        $pdf->Cell(10,5,'',0,1);

        //penilaian Subkriteria konsistensi
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,10,'Penilaian Subkriteria Kompetensi ',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,1,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No.',1,0,'C');
        $pdf->Cell(50,6,'Nama Calon',1,0,'C');
        $pdf->Cell(65,6,'Ketelitian',1,0,'C');
        $pdf->Cell(64,6,'Kejujuran',1,1,'C');
        $pdf->SetFont('Arial','',10);
        // $getPeriodeCalon = $this->db->get('calon')->result();
        $getPeriodeCalon = $this->M_Calon->CetakPeriode($periode);
        $no = 1;
        foreach ($getPeriodeCalon as $row){
        	$pdf->Cell(10,6,$no++.".",1,0,'C');
            $pdf->Cell(50,6,ucwords($row->nm_calon),1,0);
            $pdf->Cell(65,6,"",1,0,'C');
            $pdf->Cell(64,6,"",1,1,'C');
        }

        $pdf->Output();
    }

}