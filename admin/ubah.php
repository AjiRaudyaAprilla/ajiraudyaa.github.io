<?php 

require 'functions.php';

$id = $_GET["id"];

$wrg=query("SELECT * FROM warga WHERE id = $id ")[0];

if(isset($_POST["submit"])){

    if(ubah($_POST) > 0 ){
        echo "<script>
		alert('berhasil di ubah');
		document.location.href = 'index.php';
		</script>";
    } else {
        echo "<script>
		alert('Gagal ');
		document.location.href = 'index.php';
		</script>";
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
                                <h1 class="h4 text-gray-900 mb-4">Ubah</h1>
                            </div>
                            <form class="user" method="POST">
                                <input type="hidden" name="id" value="<?= $wrg["id"]; ?>">
                            <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nik" name="nik"
                                        value="<?= $wrg["nik"]; ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"  name="nama"id="nama"
                                        placeholder="Masukan Nama Lengkap"  value="<?= $wrg["nama"]; ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir"  value="<?= $wrg["tgl_lahir"]; ?>"required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"  name="rt"id="rt"
                                        placeholder="Masukan Nama Lengkap"  value="<?= $wrg["rt"]; ?>"required>
                                </div>
                            <button type = "submit" class="btn btn-primary btn-user btn-block" name="submit"> Simpan</button>
                            
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