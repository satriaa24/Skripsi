<?php
session_start();


require ("../FPDF/fpdf.php");

class myPDF extends FPDF {
    function header () {
        $nilai = $_SESSION['nilai'];
        $kode_alternatif = $_SESSION['kode_alternatif'];

        include_once("../views/config.php");
        
        $this->SetFont('Arial', 'B', 18);
        $this->cell(276,5, 'LAPORAN HASIL SELEKSI', 0, 0, 'C');
        $this->ln();
        $this->SetFont('Arial','', 14);
        $this->cell(276,15, 'Taman Rekreasi Rainbow Lake', 0, 0, 'C');


        $this->ln();
        $this->SetFont('Arial', 'B', 14);

        $this->Cell(20, 10, 'No', 1,0, 'C');
        $this->Cell(40, 10, 'Nama Lengkap', 1,0,'C');
        $this->Cell(40, 10, 'Jabatan', 1,0, 'C');
        $this->Cell(40, 10, 'Username', 1,0, 'C');
        $this->Cell(40, 10, 'Tanggal Lahir', 1,0, 'C');
        $this->Cell(40, 10, 'Alamat', 1,0, 'C');
        $this->Cell(60, 10, 'Perolehan Nilai', 1,0, 'C');


        $no = 0;
            for ($i = 0; $i < count($nilai); $i++) {
                $no++;
                $id = $kode_alternatif[$i];
                $obj = mysqli_query($koneksi, "SELECT * FROM tb_alternatif WHERE kode_alternatif = '$id' ");
                $arr = mysqli_fetch_array($obj);

                $this->ln();
                $this->SetFont('Arial', '', 13);
    
                $this->Cell(20, 10, $no, 1,0, 'C');
                $this->Cell(40, 10, $arr['nama_alternatif'], 1,0,'C');
                $this->Cell(40, 10, $arr['hak_akses'], 1,0, 'C');
                $this->Cell(40, 10, $arr['username'], 1,0, 'C');
                $this->Cell(40, 10, $arr['tanggal_lahir'], 1,0, 'C');
                $this->Cell(40, 10, $arr['alamat_alternatif'], 1,0, 'C');
                $this->Cell(60, 10, $nilai[$i], 1,0, 'C');
            
            }
    }

}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4', 0);
$pdf->Output();
?>