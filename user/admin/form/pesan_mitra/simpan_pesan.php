
<?php
include "../../../../assets/koneksi.php";



$id_toko		= $_POST['id_toko'];
$judul		= $_POST['judul'];
$isi		= $_POST['isi'];
$tgls = date('Y-m-d');
$jams = date('H:i');




$sql = "INSERT INTO pesan_mitra set
id_toko='$id_toko',
judul='$judul',
tanggal='$tgls',
jam='$jams',
isi='$isi'
";


mysqli_query($conn, $sql)or die(mysqli_error());
?>
<script type='text/javascript'>
	alert('Data pesan berhasil disimpan');
	window.location.href="../../?a=detail_toko_pesan_mitra&id=<?php echo $id_toko ?>";
</script>