<?php
session_start();
include('include/loginheader.php');
if(!$_SESSION['nik']){
    header("location:login.php");
}
?>


<section id="hero" class="d-flex flex-column justify-content-end align-items-center">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
        
    <section id="idgenerate" class="idgenerate">


		<div class="container">
            <?php 
                include("include/db.php");
                $nik=$_SESSION['nik'];
                $select="SELECT * FROM warga WHERE nik='$nik'";
                $run=$conn->query($select);
                if($run->num_rows>0){
                while ($row=$run->fetch_array()){
                $unikid=$row['unikid'];
                
        }
    }
            ?>
        <div class="col-sm-6 col-sm-offset-4 mx-auto bg-gradient alert" >
        <h4 style="color: white; text-align:center;"> Login Pemilihan</h4>
	    <form class="user" method="POST">
            
<?php 

require ("include/db.php");
if(isset($_POST['login'])){
    $unikid=$_POST['unikid'];
    $password=$_POST['password'];

    $result=mysqli_query($conn, "SELECT * FROM warga WHERE unikid='$unikid'");
    
    if(mysqli_num_rows($result) === 1){

		$row=mysqli_fetch_assoc($result);
        
			if(password_verify($password, $row["password"])){
            $_SESSION['nama']=$nama=$row['nama'];
			$_SESSION['nik']=$nik=$row['nik'];
            $_SESSION['unikid']=$unikid=$row['unikid'];
            echo  "<script>
            alert('Selamat Datang');
            document.location.href = 'vote.php';
            </script>";
			exit;
			}
    }
    $error=true;

}

?>
        
        <?php 
								if(isset($error)) {
									echo "<script>
										alert ('Password Salah');
										document.location.href = 'pemilihan.php';
										</script>";
								} ?>
								<div class="form-group">
                                    <label for="unikid" style="color: white;">Unik ID</label>
										<input type="text" class="form-control form-control-user" name="unikid" id="unikid"
											required value="<?php echo $unikid; ?>" readonly>
									</div>
                                    <div class="form-group">
                                    <label for="" style="color: white;">Masukan Password</label>
										<input type="password" class="form-control form-control-user" name="password"
											required value="" >
									</div>
                                    <hr>
								<button type = "submit" class="btn btn-warning btn-user btn-block" name="login">Pilih Sekarang</button>
								</form>
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
</section>


	</html>
    <?php 
        include("include/footer.php");
        ?>