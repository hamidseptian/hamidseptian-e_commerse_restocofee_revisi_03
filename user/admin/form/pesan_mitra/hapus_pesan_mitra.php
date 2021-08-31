
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id'];

	$q1=mysqli_query($conn, "DELETE from pesan_mitra where id_pesan_mitra='$id'") or die(mysqli_error()); 
	
?>

	<script type="text/javascript">
		alert('Data pesan_mitra dihapus');
		window.location.href="../../?m=pesan_mitra"

	</script>