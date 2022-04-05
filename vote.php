<?php
session_start();
include('include/loginheader.php');
if(!$_SESSION['unikid']){
    header("location:pemilihan.php");
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
        <h4 style="color: white; text-align:center;"> Vote</h4>
        <?php 
date_default_timezone_set("Asia/Jakarta");
if(isset($_POST['lihatkandidat'])){
    $nama=$_POST['nama'];
    $select="SELECT * FROM pemilihan WHERE nama='$nama'";
    $run=$conn->query($select);
    if($run->num_rows>0){
        while($row=$run->fetch_array()){
                $mulai=$row['mulai'];
                $akhir=$row['akhir'];
        }
    }
    $current_ts = time();
    $mulai_ts= strtotime($mulai);
    $akhir_ts=strtotime($akhir);
    if($mulai_ts>$current_ts){
        ?>
<div class="alert alert-warning text-center" role="alert">
  <strong> Pemilihan Belum Dimulai </strong>
</div>

<?php
    } else if ($current_ts>$akhir_ts) {
        ?>
    <div class="alert alert-danger text-center" role="alert">
    <strong>Pemilihan Telah Selesai</strong>
</div>

<?php
    }
    else {
        ?>
<div class="alert alert-success text-center" role="alert">
  Pemilihan Sedang Berlangsung, <a href="voting.php?nama=<?php echo str_replace(' ', '-', $nama); ?>" class="alert-link" onclick="return confirm('Anda Akan Masuk Ke Menu Pemilihan?');">Klik Disini</a>
</div>
        
        <?php
    }
}


?>
	    <form class="user" method="POST">
        
								<div class="form-group">
                                    <label for="unikid" style="color: white;">Pilih Pemilihan</label>
                                    <select name="nama" id="" class="form-control">
                                        
                                    <?php 
                                    require("include/db.php");
                                    $select="SELECT * FROM pemilihan";
                                    $run=$conn->query($select);
                                    if($run->num_rows>0){
                                        while($row=$run->fetch_array()){
                   
                                    ?>
                                    <option value="<?php echo $row['nama']?>"><?php echo $row['nama']?></option>
                                    
                                    <?php
                                }
                                    }
                                    ?>
                                    </select>

                                   
                                    <hr>
								<button type = "submit" class="btn btn-warning btn-user btn-block" name="lihatkandidat">Lihat Kandidat</button>
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
</section>
	</html>
    <?php 
        include("include/footer.php");
        ?>