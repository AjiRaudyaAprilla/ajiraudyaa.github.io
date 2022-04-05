<?php 

session_start();
?>

<?php
	require("include/db.php");

	
	if(isset($_POST['login'])){
	$nik=$_POST['nik'];
	$password = $_POST["password"];

    $result=mysqli_query($conn, "SELECT * FROM warga WHERE nik='$nik'");
    
    if(mysqli_num_rows($result) === 1){

		$row=mysqli_fetch_assoc($result);
        
			if(password_verify($password, $row["password"])){
            $_SESSION['nama']=$nama=$row['nama'];
			$_SESSION['nik']=$nik=$row['nik'];
            echo  "<script>
            alert('Selamat Datang');
            document.location.href = 'welcome.php';
            </script>";
			exit;
			}
        
    }
    $error=true;
}
	?>

	<!DOCTYPE html>
	<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Halaman Login</title>

		<!-- Custom fonts for this template-->
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link
			href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
			rel="stylesheet">

		<!-- Custom styles for this template-->
		<link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

	</head>

	<body class="bg-secondary">

		<div class="container">

			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
						<div class="col-lg-7 bg-gradient">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Login</h1>
								</div>
								<form class="user" method="POST">
								<?php 
								if(isset($error)) {
									echo "<script>
										alert ('Password Salah');
										document.location.href = 'login.php';
										</script>";
								} ?>
								<div class="form-group">
										<input type="text" class="form-control form-control-user" id="nik" name="nik"
											placeholder="Masukan Nomor NIK" required>
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-user" id="password"
											placeholder=" Masukan Password" name="password" required>
									</div>

									

								<button type = "submit" class="btn btn-success btn-user btn-block" name="login"> Login</button>
                                <hr>
								<a href="registrasi.php" type = "submit" class="btn btn-danger btn-user btn-block""> Belum Registrasi ?</a>
									<hr>
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<!-- Bootstrap core JavaScript-->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="js/sb-admin-2.min.js"></script>

	</body>

	</html>