<?php
session_start();
include('include/loginheader.php');
if(!$_SESSION['unikid']){
    header("location:pemilihan.php");
    exit();
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
        <h4 style="color: white; text-align:center;"> Kandidat</h4>
	    <form class="user" method="POST">
            <?php 
            require('include/db.php');
            $nama=$_GET['nama'];
            $nama=str_replace('-', ' ', $nama);
            ?>
            <div class="form-group">
            <input type='text' value = "<?php echo $nama; ?>" class='form-control' readonly/>;
            </div>
            <?php
            $select="SELECT * FROM kandidat WHERE nama_pemilihan='$nama'";
            $run=$conn->query($select);
            if($run->num_rows>0){
                while($row=$run->fetch_array()){
                    ?>
                    
                    <div class="form-check" style="color: white;">
                    <input type="radio" name="namakandidat" class="form-check-input" value="<?php echo $row['nama_kandidat']?>">
                    <label class="form-check-label"><?php echo $row['nama_kandidat']?></label>
                    <hr>
                    </div>
                    <?php
                }
            } 
            ?>

            <button type = "submit" class="btn btn-success btn-user btn-block" name="pilih" onclick="return confirm('Apakah Anda Yakin Memilih Calon Ini ?');">Pilih Calon </button>
		</form>
    </div>
</div>

<?php 

if(isset($_POST['pilih'])){
    $nama_kandidat=$_POST['namakandidat'];
    $nik=$_SESSION['nik'];
    $kandidathash=password_hash($nama_kandidat, PASSWORD_DEFAULT);

    $select="SELECT * FROM hasil WHERE nik='$nik' AND nama_pemilihan='$nama'";
    $exel=$conn->query($select);
    if($exel->num_rows>0){
        echo "<script>
                alert('Anda Hanya Dapat Melakukan Pemilihan 1x');
                document.location.href = 'logout.php';
                </script>";
    } else {
        $insert="INSERT INTO hasil (nik, nama_kandidat, nama_pemilihan) VALUES ('$nik', '$kandidathash', '$nama')";
        $run=$conn->query($insert);
        if($run){
            $update="UPDATE kandidat SET total_vote=total_vote+1 WHERE nama_kandidat='$nama_kandidat' AND nama_pemilihan='$nama'";
            $exe=$conn->query($update);
            if($exe){
                echo "<script>
                alert('Pilihan Anda Telah Disimpan');
                document.location.href = 'hasil.php';
                </script>";
            } else {
                echo "Vote Gagal";
            }
        } else {
            echo "Error";
        }
    }


}


?>





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
    include('include/footer.php');
    ?>