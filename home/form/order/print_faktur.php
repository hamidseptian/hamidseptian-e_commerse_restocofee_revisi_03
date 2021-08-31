<?php
session_start();
include "../../../assets/koneksi.php";
require_once("../../../assets/dompdf/src/Autoloader.php");
Dompdf\Autoloader::register();
use Dompdf\Dompdf;
$id_toko = $_GET['id_toko'];
$id_pelanggan = $_GET['id_pelanggan'];
$waktu_pesan = $_GET['waktu'];
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

$q_toko = mysqli_query($conn, "SELECT * from toko where id_toko='$id_toko'");
$d_toko = mysqli_fetch_array($q_toko);
$q_pelanggan = mysqli_query($conn, "SELECT * from pelanggan where id_pelanggan='$id_pelanggan'");
$d_pelanggan = mysqli_fetch_array($q_pelanggan);
$id_domisili_pel = $d_pelanggan['id_domisili'];
$html = '

<div style="width: 100px;float: left; margin-right:10px">
  <img src="../../../assets/logo.png" style="width: 100px;">
</div>

<div style="width: 700px; float:left;margin-top:-20px">
 <p style="margin-bottom:-20px; font-size:10px"><b>E-Restoran & Coffee Shop</b></p>
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
</center>
</p>

<div style="float:left; width:60%">
<table style=" font-size:11px;border-collapse: collapse; width: 100%;" >
      <tr>
        <td width="100px">Nama</td>
        <td width="10px">:</td>
        <td>'.$d_pelanggan['nama_pelanggan'].'</td>
      </tr>
      <tr>
        <td width="100px">Alamat</td>
        <td width="10px">:</td>
        <td>'.$d_pelanggan['alamat_pelanggan'].'</td>
      </tr>
      
      <tr>
        <td width="100px">No HP</td>
        <td width="10px">:</td>
        <td>'.$d_pelanggan['nohp_pelanggan'].'</td>
      </tr>
      <tr>
        <td width="100px">Tanggal Transaksi</td>
        <td width="10px">:</td>
        <td>'.$waktu_pesan.'</td>
      </tr>
  
  </table>
  </div>
<div  style="float:right; width:40%">
 <div style="text-align:right"><h4>Faktur Pemesanan</h4></div>
  </div>
<div style="clear:both"></div>
<br>
<table style=" font-size:11px;border-collapse: collapse; width: 100%;" border=1>
   <thead>
      <tr>
        <td>No</td>
        <td>Produk</td>
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
    where pesanan.id_toko='$id_toko' and pesanan.id_pelanggan='$id_pelanggan' and pesanan.tanggal_pesan='$waktu_pesan'
    ");
  $no=1;
   $kumpulkan_data = [];
      $totalharga = 0;
  while ($d1=mysqli_fetch_array($q1)) { 
      $total =  $d1['harga'] * $d1['jumlah_pesanan'];
      $totalharga += $total;
     $html .='<tr>
      <td>'.$no++.'</td>
      <td>'.$d1['nama_produk'].'</td>
      <td>'.number_format($d1['harga']).'</td>
      <td>'.$d1['jumlah_pesanan'].'</td>
      <td>'.number_format($total).'</td>
      
     
    </tr>';
    }
 

  $q_cek_ongkir = mysqli_query($conn, "SELECT * from ongkir where id_toko='$id_toko' and id_domisili='$id_domisili_pel'");
        $d_cek_ongkir = mysqli_fetch_array($q_cek_ongkir);
        $ongkir = $d_cek_ongkir==''? 0 : $d_cek_ongkir['ongkir'];

        $total_belanja = $totalharga + $ongkir;


 $html .='<tfoot>
    <tr>
      <td colspan="4">Total Belanja</td>
      <td>'.number_format($totalharga).'</td>
    </tr>
    <tr>
      <td colspan="4">Ongkir</td>
      <td>'.number_format($ongkir).'</td>
    </tr>
    <tr>
      <td colspan="4">Total</td>
      <td>'.number_format($total_belanja).'</td>
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
$dompdf->stream('Faktur belanja - '.$d_toko['nama_toko'].'.pdf', ['Attachment'=>0]);

?>
<p style="font-size: "></p>

