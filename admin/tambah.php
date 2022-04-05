<?php 

$conn=mysqli_connect("localhost", "root", "", "voting");
if(isset($_POST['register'])){
	$nik=$_POST['nik'];
	$nama=$_POST['nama'];
	$tgl_lahir= $_POST['tgl_lahir'];
	$password = $_POST["password"];
	$rt=$_POST['rt'];
	$password2=password_hash($password, PASSWORD_DEFAULT);

	$select="SELECT * FROM warga where nik = '$nik'";
	$exe=$conn->query($select);
	if($exe->num_rows>0){
		echo "<script>
		alert('Nik Sudah Terdaftar');
		document.location.href = 'login.php';
		</script>";
	}else {
		$insert="INSERT INTO warga (nik,nama,tgl_lahir,password,rt) VALUES ('$nik', '$nama', '$tgl_lahir', '$password2', '$rt')";

		$run=$conn->query($insert);
		if($run){
			echo "<script>
			alert('Data Berhasil Ditambah');
			document.location.href = 'index.php';
			</script>";
	}
	
	else {
		echo "Error";
	}
	}
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

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrasi</h1>
                            </div>
                            <form class="user" method="POST">
                            <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nik" name="nik"
                                        placeholder="Masukan Nomor NIK" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"  name="nama"id="nama"
                                        placeholder="Masukan Nama Lengkap" required>
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir"required>
                                </div>
                                
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password"
                                        placeholder="Masukan Password" name="password"required>
                                </div>

                                <div class="form-group" >
                                    <select name="rt" id="RT" class="form-control" required>
                                    <option value="" >RT</option>
                                    <option value="1" >1</option>
                                    <option value="2" >2</option>
                                    <option value="3">3</option>
                                    </select>
                                </div>

                            <button type = "submit" class="btn btn-primary btn-user btn-block" name="register"> Register</button>
                            
                                <hr>
                                
                            </form>	
                            
                            <div class="text-center">
                                <a class="small" href="index.php">Kembali</a>
                            </div>
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