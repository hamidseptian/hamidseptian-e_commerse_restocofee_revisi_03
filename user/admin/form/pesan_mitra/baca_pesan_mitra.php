<?php 
$id = $_GET['id'];
$q = mysqli_query($conn, "SELECT * from pesan_mitra where id_pesan_mitra = '$id'");
$q2 = mysqli_query($conn, "UPDATE pesan_mitra set status='R' where id_pesan_mitra = '$id'");
$d = mysqli_fetch_array($q);
 ?>
<div class="box-header with-border">
  <h3 class="box-title">Detail Pesan</h3>

  <div class="box-tools pull-right">
      <a href="?m=detail_toko_pesan_mitra&id=<?php echo $idus ?>" class="btn btn-info btn-sm" >Kembali</a>
  </div>
</div>

<form action="form/pesan_mitra/simpanedit_pesan.php" method="post"  enctype="multipart/form-data">
<div class="col-md-12">

  
    <div class="form-group">
    <label>Judul </label> <br>
    <?php echo $d['judul'] ?>
  
     </div>

  

    <div class="form-group">
    <label>Isi</label><br>
        <?php echo $d['isi'] ?>
     </div>

   

</div>
</form>