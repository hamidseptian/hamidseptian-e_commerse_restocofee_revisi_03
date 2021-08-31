<?php 

 ?><div class="box-header with-border">
  <h3 class="box-title">Data Toko</h3>

  <div class="box-tools pull-right">
    <!-- <a href="" class="btn btn-default btn-sm"  target="_blank">Print Data Paket</a> -->
    <!-- <a href="#" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#addballroom">Print Data Toko</a> -->
  </div>
</div>


<hr>
<?php 
  $q1=mysqli_query($conn, "SELECT * from toko where status !='0' order by status asc");
  $no=1;
 ?>

 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        
        <td>Nama Toko</td>
        <td>Jenis Konveksi</td>
        <td>Alamat Toko</td>
        <td>No HP Toko</td>
        <td>Username</td>
        <td>Status</td>
        <td>Option</td>
      </tr>
    </thead>
  <?php 
  while ($d1=mysqli_fetch_array($q1)) { 
    ?>
  <tr>
    <td><?php echo $no++ ?></td>
   
    <td><?php echo $d1['nama_toko'] ?></td>
   
    <td><?php echo $d1['jenis_toko'] ?></td>
    <td><?php echo $d1['alamat_toko'] ?></td>
    <td><?php echo $d1['nohp_toko'] ?></td>
    <td><?php echo $d1['username'] ?></td>
    <td><?php echo $status_toko[$d1['status']] ?></td>
    <td>
      <a href="?a=detail_toko_pesan_mitra&id=<?php echo $d1['id_toko'] ?>" class="btn btn-info btn-xs" >Lihat Pesan</a>
      <?php 
   ?>
    </td>
  </tr>
  <?php } ?>
</table>