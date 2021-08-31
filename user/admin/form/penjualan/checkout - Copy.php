<?php 
session_start();
$id=$_GET['id'];
$idtoko = $_SESSION['id_admin'];

$q5=mysqli_query($conn, "SELECT * FROM pelanggan where id_pelanggan = '$id'")or die(mysqli_error());
$d5=mysqli_fetch_array($q5);
$idkel = $d5['id_kelurahan'];

$q6=mysqli_query($conn, "SELECT * FROM ongkir where id_kelurahan = '$idkel' and id_toko='$idtoko'")or die(mysqli_error());
$d6=mysqli_fetch_array($q6);
$ongkir = $d6['ongkir'];



 ?>
 <?php 
  $q1=mysqli_query($conn, "SELECT * from pesanan 
    join barang on pesanan.id_barang=barang.id_barang
    join pelanggan on pelanggan.id_pelanggan=pesanan.id_pelanggan
    join toko on barang.id_toko=toko.id_toko
    where barang.id_toko='$idtoko' and pesanan.id_pelanggan='$id'");
  $q3=mysqli_query($conn, "SELECT * from pesanan 
    join barang on pesanan.id_barang=barang.id_barang
    join pelanggan on pelanggan.id_pelanggan=pesanan.id_pelanggan
    join toko on barang.id_toko=toko.id_toko
    where barang.id_toko='$idtoko' and pesanan.id_pelanggan='$id'");


  $q2=mysqli_query($conn, "SELECT * from pelanggan join kelurahan on pelanggan.id_kelurahan=kelurahan.id_kelurahan where pelanggan.id_pelanggan='$id'");
  $d2=mysqli_fetch_array($q2);
  $no=1;
 ?><div class="box-header with-border">
  <h3 class="box-title">Pesanan Atas Nama <?php echo $d2['nama_pelanggan'] ?></h3>

  
</div>

<hr>

<div class="col-md-8">
  <label>Daftar Pesanan</label>
 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        
        <td>Barang</td>
        <td>Jumlah Pesanan </td>
        <td>Harga Perunit</td>
        <td>Total Harga</td>
       
        
      </tr>
    </thead>
  <?php 
  $nol=0;
  while ($d1=mysqli_fetch_array($q1)) { 
    ?>
  <tr>
    <td><?php echo $no++ ?></td>
   
    
    <td><?php echo $d1['nama_barang'] ?></td>
    <td><?php echo $d1['jumlah_pesanan'] ?> Unit</td>
    <td>Rp. <?php echo number_format($d1['harga_jual']) ?></td>
   
    <td>
      <?php  $totbel = $d1['harga_jual']* $d1['jumlah_pesanan'];
      echo "Rp. ".number_format($totbel) ;
    $totalbelanja = $nol+=$totbel;
     ?></td>
    
   
  </tr>
  <?php } ?>
  <tr>
    <td colspan="4">Total Belanja</td>
    <td colspan="2">Rp. <?php echo number_format($totalbelanja) ?></td>
  </tr>
  <tr>
    <td colspan="4">Ongkir Ke Alamat Pelanggan</td>
    <td colspan="2">Rp. <?php echo number_format($ongkir) ?></td>
  </tr>
  <tr>
    <td colspan="4">Total</td>
    <td colspan="2">
      <?php  
      $totaltransaksi = $ongkir + $totalbelanja;
      echo"Rp. ". number_format($totaltransaksi);
    ?>
      
    </td>
  </tr>
</table>
</div>

<?php 
$d3=mysqli_fetch_array($q3) ?>
<div class="col-md-4">
  <form method="post" action="form/toko/pesanan/simpan_pembayaran.php">
    <div class="form-group">
      <label>Data Pelanggan</label>
      <table class="table table-striped">
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td><?php echo $d2['nama_pelanggan'] ?></td>
        </tr>
        <tr>
          <td>No HP</td>
          <td>:</td>
          <td><?php echo $d2['nohp_pelanggan'] ?></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td><?php echo $d2['alamat_pelanggan'] ?></td>
        </tr>
        <tr>
          <td>Domisili</td>
          <td>:</td>
          <td><?php echo $d2['nama_kelurahan'] ?></td>
        </tr>
        <tr>
          <td>Total Belanja</td>
          <td>:</td>
          <td>Rp. <?php echo number_format($totaltransaksi) ?></td>
        </tr>
       
      </table>

      <input type="hidden" name="total" class="form-control" value="<?php echo $totaltransaksi ?>" readonly>
      <input type="hidden" name="id" class="form-control" value="<?php echo $id ?>">
      <input type="hidden" name="tglp" class="form-control" value="<?php echo $d3['tanggal_pesan'] ?>">
    </div>
    <div class="form-group">
      <label>Jumlah Pambayaran</label>
      <input type="text" name="jml" class="form-control" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
    </div>
    <div class="form-group">
      
      <input type="submit" value="Simpan Data Pembayaran" class="btn btn-info">
    </div>
    
  </form>
</div>