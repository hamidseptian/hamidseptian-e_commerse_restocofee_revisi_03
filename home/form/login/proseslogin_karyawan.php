<?php 
session_start();
include "../../../assets/koneksi.php";
$user=$_POST['username'];
$pass=$_POST['password'];
//$password= password_hash($pass, PASSWORD_DEFAULT);
//echo $user."<br>".$password;

// $sql= "insert into admin(nama_user, username, password, level) values ('Hamid', '$user', '$password', 'admin')";
// $execute=mysqli_query($conn, $sql);

$sql= "SELECT * from karyawan where username='$user'";
$execute=mysqli_query($conn, $sql)or die(mysqli_error());
//$x = mysqli_fetch_array($execute);
$jml=mysqli_num_rows($execute);
//echo $jml;
if ($jml>0) {
	$data=mysqli_fetch_array($execute);
	$passdb=$data['password'];
//	$verivikasi=password_verify($pass, $passdb);
	if ($passdb == $pass) {
		

			$_SESSION['login']=true;
		
			
			$_SESSION['id_admin']=$data['id_karyawan'];
			$_SESSION['level']="Karyawan";
			
			header("Location:../../../user/admin/");
		
	}
	else{
		echo "<script>
				alert('Password Salah');
			</script>
		";

    	echo "<meta http-equiv='refresh' content='0; url=http:../../../home/?h=login_karyawan'>";
		
	}
	
}

else{

	echo "<script>
				alert('Username dan password salah');
			</script>
		";
    	echo "<meta http-equiv='refresh' content='0; url=http:../../../home/?h=login_karyawan'>";
	
}



 ?>