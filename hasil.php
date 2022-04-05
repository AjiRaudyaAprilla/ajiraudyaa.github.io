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
    
        <div class="col-sm-6 col-sm-offset-4 mx-auto bg-gradient alert" >
        <h4 style="color: white; text-align:center;"> Hasil Pemilihan</h4>
        <p class="text text-danger" style="text-align: center;">Pemilihan yang sudah Selesai</p>
	    <form class="user" method="POST">
        <div class="form-group">
                <select name="nama_pemilihan" id="" class="form-control">
                <option name="" id="" select="selected">lihat hasil</option>
                <?php 
                $current_ts=time();
                 require("include/db.php");
                 $select="SELECT * FROM pemilihan";
                 $run=$conn->query($select);
                 if($run->num_rows>0){
                        while($row=$run->fetch_array()){
                            $namapemilihan=$row['nama'];
                            $mulai=$row['mulai'];
                            $akhir=$row['akhir'];
                            ?>

                            <?php
                            $akhir_ts=strtotime($akhir);
                            if($akhir_ts<$current_ts){

                            
                            ?>

                            <option value="<?php echo $namapemilihan; ?>"><?php echo $namapemilihan; ?></option>
                            
                            <?php
                            }
                        }
                    }
                ?>
                </select>
                <hr>
                <button type = "submit" class="btn btn-success btn-user btn-block" name="carihasil">Lihat Hasil</button>
        </div>
		</form>
        <table class="table table-responsive table-hover table-bordered text-center">
            <tr>
                <td>#</td>
                <td>Nama Kandidat</td>
                <td>Perolehan Suara</td>
                <td>Persentase</td>
            </tr>
            <?php 
        if(isset($_POST['carihasil'])){
            $nama_pemilihan=$_POST['nama_pemilihan'];
            $select="SELECT * FROM hasil WHERE nama_pemilihan ='$nama_pemilihan'";
            $run=$conn->query($select);
            if($run->num_rows>0){
                $total_vote_pemilihan=0;
                while($row=$run->fetch_array()){
                    $total_vote_pemilihan=$total_vote_pemilihan+1;
                }
            }
            $select1="SELECT * FROM kandidat WHERE nama_pemilihan='$nama_pemilihan'";
            $run1=$conn->query($select1);
            if($run1->num_rows>0){
                $total=0;
                while($row2=$run1->fetch_array()){
                    $total=$total+1;
                    $kandidat=$row2['nama_kandidat'];
                    $total_vote=$row2['total_vote'];
                    $persentase=(($total_vote/$total_vote_pemilihan)*100);


                    ?>

                    <tr>
                        <td><?php echo $total; ?></td>
                        <td><?php echo $kandidat; ?></td>
                        <td><?php echo $total_vote;?></td>
                        <td>
                            <?php 
                                if($persentase>50){
                                    ?>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="<?php echo $persentase;?>" aria-valuemin="0" aria-valuemax="<?php echo $persentase;?>" style="width : <?php echo $persentase;?>%">
                                        <?php echo $persentase;?>%

                                        </div>

                                    </div>
                                    <?php
                                }
                                else if ($persentase>40){
                                    ?>
                                     <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" aria-valuenow="<?php echo $persentase;?>" aria-valuemin="0" aria-valuemax="<?php echo $persentase;?>" style="width : <?php echo $persentase;?>%">
                                        <?php echo $persentase;?>%

                                        </div>

                                    </div>

                                    <?php
                                }
                                else {
                                    ?>
                                     <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" aria-valuenow="<?php echo $persentase;?>" aria-valuemin="0" aria-valuemax="<?php echo $persentase;?>" style="width : <?php echo $persentase;?>%">
                                        <?php echo $persentase;?>%

                                        </div>

                                    </div>

                                    <?php
                                }

                            
                            ?>
                        </td>

                    </tr>
                    

                    <?php
                }
                ?>
                <tr>
                    <td colspan="2">Total Suara</td>
                    <td ><?php echo $total_vote_pemilihan;?></td>
                    <td></td>
                </tr>
                
                <?php
            }
            else {
                ?>
                <tr >
                <td colspan="4">Data Tidak Ditemukan</td>
            </tr>
            <?php
            }
          
        }

        
        
        ?>

        </table>
    


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