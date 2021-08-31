<?php 


  $id = $_GET['id'];
  $q1=mysqli_query($conn, "SELECT * from toko where id_toko='$id'")or die(mysqli_error());
  $d1=mysqli_fetch_array($q1);
  $q2=mysqli_query($conn, "SELECT * from pesan_mitra where id_toko='$id'")or die(mysqli_error());
  $no=1;
 ?><div class="box-header with-border">
  <h3 class="box-title">Data Pesan ke <br>Toko <?php echo $d1['nama_toko'] ?></h3>

  <div class="box-tools pull-right">
    <?php if ($_SESSION['level']=='Admin') { ?>
      <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#addpesan_mitra">Pesan Baru</a>
    <?php } ?>
  </div>
</div>



<form action="form/pesan_mitra/simpan_pesan.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="addpesan_mitra">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pesan baru ke toko <?php echo $d1['nama_toko'] ?></h4>
              </div>
              <div class="modal-body">
              <div class="form-group">
                  <label>Judul</label>
                  <input type="hidden" name="id_toko" class="form-control" value="<?php echo $id ?>">
                  <input type="text" name="judul" class="form-control">
              </div> 
              
             
              <div class="form-group">
                  <label>Pesan</label>
                  <textarea name="isi" required class="ckeditor" id="ckeditor"></textarea>
              </div> 
             
             
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah data yang anda masukan sudah benar.?')">Simpan Data Pesan</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>


<hr>
<?php 
  $q1=mysqli_query($conn, "SELECT * from pesan_mitra where id_toko='$id'");
  $no=1;
 ?>

 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        <td>Waktu</td>
        <td>Judul</td>
        <td>Isi</td>
        <td>Option</td>
      </tr>
    </thead>
  <?php 
  while ($d1=mysqli_fetch_array($q1)) {
    if($d1['status']=='R'){
      $read = "";
    }else{
      $read = "style='background: #d2fefc '";
    }

    ?>
  <tr <?php echo $read; ?>>
    <td><?php echo $no++ ?></td>
   
 
    <td><?php echo $d1['tanggal'] ?></td>
    <td><?php echo $d1['judul'] ?></td>
    <td><?php echo $d1['isi'] ?></td>
     <td>
      <?php if ($_SESSION['level']=='Admin') { ?>
      <a href="form/pesan_mitra/hapus_pesan_mitra.php?id=<?php echo $d1['id_pesan_mitra'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin.?')">Hapus</a>
      <a href="?a=edit_pesan_mitra&id=<?php echo $d1['id_pesan_mitra'] ?>" class="btn btn-warning btn-xs">Edit</a>
      <?php }else{ ?>    
      <a href="?m=baca_pesan_mitra&id=<?php echo $d1['id_pesan_mitra'] ?>" class="btn btn-warning btn-xs">Lihat Pesan</a>
      <?php } ?>
    </td>
   
  </tr>
  <?php } ?>
</table>