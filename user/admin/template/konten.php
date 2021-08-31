<?php 
@$menu= $_GET['a'];
if ($menu=='') {
	// echo "Selamat datand si halaman administrator";
	include "form/dashboard/dashboard_admin.php";
}
elseif ($menu=='toko') {
	
	include "form/toko/data_toko.php";
}
elseif ($menu=='produk_toko') {
	
	include "form/produk_toko/data_toko.php";
}
elseif ($menu=='lihat_produk') {
	
	include "form/produk_toko/lihat_produk.php";
}
elseif ($menu=='pesan_mitra') {
	
	include "form/pesan_mitra/data_toko.php";
}
elseif ($menu=='detail_toko_pesan_mitra') {
	
	include "form/pesan_mitra/daftar_pesan_mitra.php";
}
elseif ($menu=='edit_pesan_mitra') {
	
	include "form/pesan_mitra/edit_pesan_mitra.php";
}
elseif ($menu=='pelanggan') {
	include "form/pelanggan/data_pelanggan.php";
}
elseif ($menu=='wilayah') {
	include "form/wilayah/data_wilayah.php";
}
elseif ($menu=='edit_admin') {
	include "form/admin/edit_admin.php";
}
else{
	echo "Fitur ini belum tersedia";
}

//
?>

