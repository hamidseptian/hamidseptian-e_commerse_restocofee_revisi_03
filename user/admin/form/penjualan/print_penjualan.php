<?php
session_start();
include "../../../../assets/koneksi.php";
require_once("../../../../assets/dompdf/src/Autoloader.php");
Dompdf\Autoloader::register();
use Dompdf\Dompdf;
$bulan = $_GET['bulan'];
$tahun = $_GET['tahun'];
if ($_SESSION['level']=='Karyawan') {
  $id_karyawan = $_SESSION['id_admin'];
  $q_k = mysqli_query($conn, "SELECT * from karyawan where id_karyawan='$id_karyawan'");
  $d_k = mysqli_fetch_array($q_k);
  $id_toko = $d_k['id_toko'];
}else{
  $id_toko = $_SESSION['id_admin'];
}

$nama_bulan = array(
                '01' => 'JANUARI',
                '02' => 'FEBRUARI',
                '03' => 'MARET',
                '04' => 'APRIL',
                '05' => 'MEI',
                '06' => 'JUNI',
                '07' => 'JULI',
                '08' => 'AGUSTUS',
                '09' => 'SEPTEMBER',
                '10' => 'OKTOBER',
                '11' => 'NOVEMBER',
                '12' => 'DESEMBER',
        );

$waktu = $nama_bulan[$bulan].' '.$tahun;
$q_toko = mysqli_query($conn, "SELECT * from toko where id_toko='$id_toko'");
$d_toko = mysqli_fetch_array($q_toko);
$html = '

<div style="width: 100px;float: left; margin-right:10px">
  <img src="../../../../assets/logo.png" style="width: 100px;">
</div>

<div style="width: 700px; float:left;margin-top:-20px">
 
    <h4>
     '.$d_toko['nama_toko'].'
    </h4>
      <p style="font-size:12px; margin-top:-15px">
Alamat : '.$d_toko['alamat_toko'].'<br>No HP : '.$d_toko['nohp_toko'].'</p>


</div>

<div style="clear:both;"></div>
<hr>
<br>
<center>
<p style="margin-top:-5px; font-size:15px">
Laporan Penjualan <br>Bulan '.$waktu.'
</center
</p>



<table style=" font-size:11px;border-collapse: collapse; width: 100%;" border=1>
   <thead>
      <tr>
        <td>No</td>
        
        <td>Pelanggan</td>
        <td>Tanggal Pesan</td>
        <td>Jenis Produk</td>
        <td>Nama Produk</td>
        <td>Harga</td>
        <td>Qty</td>
        <td>Total</td>
      </tr>
    </thead>
               
';
$no1 = 1;
 
   $q1=mysqli_query($conn, "SELECT * from pesanan 
    join produk on pesanan.id_produk=produk.id_produk
    join pelanggan on pelanggan.id_pelanggan=pesanan.id_pelanggan
    join toko on produk.id_toko=toko.id_toko
    where produk.id_toko='$id_toko' and pesanan.status_pesanan in ('Selesai')
    and month(tanggal_pesan)='$bulan' and year(tanggal_pesan)='$tahun'
    ");
  $no=1;
   $kumpulkan_data = [];
      $totalharga = 0;
  while ($d1=mysqli_fetch_array($q1)) { 
      $total =  $d1['harga'] * $d1['jumlah_pesanan'];
      $totalharga += $total;
     $html .='<tr>
      <td>'.$no++.'</td>
      <td>'.$d1['nama_pelanggan'].'</td>
      <td>'.$d1['tanggal_pesan'].'</td>
      <td>'.$d1['jenis'].'</td>
      <td>'.$d1['nama_produk'].'</td>
      <td>'.number_format($d1['harga']).'</td>
      <td>'.$d1['jumlah_pesanan'].'</td>
      <td>'.number_format($total).'</td>
      
     
    </tr>';
    }
 
 $html .='<tfoot>
    <tr>
      <td colspan="7">Total</td>
      <td>'.number_format($totalharga).'</td>
    </tr>
  </tfoot>';
      // $pendapatan  =  $totkredit- $totdebit;
      // $pendapatan  =  $totkredit- $totdebit;
      // $html .='<tfoot>
      //       <tr>
      //         <td colspan="3">Total</td>
      //         <td>'. number_format($totkredit).'</td>
      //         <td>'.number_format( $totdebit).'</td>
      //       </tr>
      //       <tr>
      //         <td colspan="3">Pendapatan </td>
      //         <td colspan="2">'.number_format($pendapatan).'</td>
      //       </tr>
      //     </tfoot>';
        //  $pendapatan = $totalpemasukan - $totalpengeluaran;
        // $html .='
        //  <tfoot>
        //   <tr>
        //     <td colspan="2">Total</td>
        //     <td>'.number_format($totalpemasukan).'</td>
        //     <td>'.number_format($totalpengeluaran).'</td>
        //   </tr>
        //   <tr>
        //     <td colspan="2">Total Pendapatan</td>
        //     <td colspan="2">'.number_format($pendapatan).'
        //     </td>
          
           
        //   </tr>
        // </tfoot>
        // ';

$html .= '
</table>';
$html .= '
<br>
<div style="float:right; font-size:11px; text-align:center">
    Padang, '.date('d').' '.$nama_bulan[date('m')].' '.date('Y').'
    <br>
    <br>
    <br>
    <br>
    '.$d_toko['pemilik_toko'].'<br>
   
  <center>
  </center>
</div>';
$dompdf = new Dompdf();
// $customPaper = array(0,0,200,360);
// $dompdf->set_paper($customPaper);
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream('Laporan Penjualan.pdf', ['Attachment'=>0]);

?>
<p style="font-size: "></p>

