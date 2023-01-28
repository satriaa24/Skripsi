<?php
include '../views/config.php';
require('../pdf/fpdf.php');
date_default_timezone_set('Asia/Jakarta');
$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('https://i.ibb.co/j88Xszh/Screenshot-18.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'Taman Rekreasi Rainbow Lake Bekasi',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 0821-5601-3095',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Jl. Marrakash Square, Bahagia, Kec. Babelan, Kabupaten Bekasi, Jawa Barat 17610',0,'L');
// $pdf->SetX(4);
// $pdf->MultiCell(19.5,0.5,'website : https://www.ruhmtech.id/ - email : hello@ruhmtech.id',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Karyawan",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("d/m/Y | H:i"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Nama Karyawan', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Jabatan', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Username', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Tanggal Lahir', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Alamat', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;

$query = "SELECT * FROM tb_alternatif where hak_akses='karyawan'
";
$sql_karyawan = mysqli_query($conn, $query) or die(mysqli_error($conn));
while ($data = mysqli_fetch_array($sql_karyawan)) {

	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
    $pdf->Cell(4, 0.8, $data['nama_alternatif'], 1, 0,'C');
	$pdf->Cell(5, 0.8, $data['hak_akses'],1, 0, 'C');
    $pdf->Cell(5, 0.8, $data['username'],1, 0, 'C');
    $pdf->Cell(5, 0.8, $data['tanggal_lahir'],1, 0, 'C');
	$pdf->Cell(6, 0.8, $data['alamat_alternatif'],1, 1, 'C');
	$no++;
}
$pdf->ln(1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(42,0.7,"Tanggal: ".date("d/m/Y"),0,0,'C');

$pdf->ln(1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(42,0.7,"Mengetahui",0,10,'C');

$pdf->ln(1);
$pdf->ln(1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(42,0.7,"Muhammad Agus",0,10,'C');


$pdf->Output("LAPORAN_KARYAWAN.pdf","I");

?>

