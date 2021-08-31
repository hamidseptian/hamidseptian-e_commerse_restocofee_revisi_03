<?php 
$id = $_GET['id'];
$q = mysqli_query($conn, "SELECT * from pesan_mitra where id_pesan_mitra = '$id'");
$d = mysqli_fetch_array($q);
 ?>
<head>
     <script type="text/javascript" src="form/pesan_mitra/ckeditor/ckeditor.js"></script>
</head>
<form action="form/pesan_mitra/simpanedit_pesan.php" method="post"  enctype="multipart/form-data">
<div class="col-md-12">

  
    <div class="form-group">
    <label>Judul </label>
    <input type="hidden" class="form-control" name="id"  maxlength="250" required value="<?php echo $d['id_pesan_mitra'] ?>">
    <input type="hidden" class="form-control" name="id_toko"  maxlength="250" required value="<?php echo $d['id_toko'] ?>">
    <input type="text" class="form-control" name="judul"  maxlength="250" required value="<?php echo $d['judul'] ?>">
     </div>

  

    <div class="form-group">
    <label>Isi</label><br>
    <textarea class="ckeditor" id="ckedtor" name="isi" rows="10" required><?php echo $d['isi'] ?></textarea>
     </div>

    <div class="form-group">
    <input type="submit" value="Publikasikan" class="btn btn-info">
     </div>

</div>
</form>