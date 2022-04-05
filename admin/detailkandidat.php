<?php 

include("headeradmin.php");

?>

<div class="col-sm-6 col-sm-offset-4 mx-auto bg-success alert" >
        <h4 style="color: white; text-align:center;"> Detail Kandidat</h4>
	<form class="user" method="POST">
	<?php 
    $conn=new mysqli("localhost", "root", "", "voting");
    $namapemilihan=$_GET['namapemilihan'];
    $jumlahkandidat=$_GET['jumlahkandidat'];


    ?>

    <label for="">Nama Pemilihan</label>
    <input type="text" class="form-control" value="<?php echo $namapemilihan; ?>" readonly>
    <hr>


    <?php

    for($i=1; $i<=$jumlahkandidat; $i++){

    ?>

    <div class="form-group">
            <label for="" style="color: white;">Nama Kandidat <?php echo $i; ?></label>
			<input type="text" class="form-control form-control-user" name="namakandidat<?php echo $i; ?>" required>
	</div>

    <?php
    }
    ?>
    <hr>
		<button type = "submit" class="btn btn-primary btn-user btn-block" name="tambahdetail" onclick="return confirm('Simpan?');">Simpan</button>
	</form>
    </div>
</div>
<?php 
if(isset($_POST['tambahdetail'])){
    $jumlahkandidat=$_GET['jumlahkandidat'];
    $namapemilihan=$_GET['namapemilihan'];

    for($i=1; $i<=$jumlahkandidat; $i++){
        $namakandidat[]=$_POST['namakandidat'.$i];
    }

    for($i=0; $i<$jumlahkandidat; $i++){
        $insert="INSERT INTO kandidat (nama_kandidat, nama_pemilihan) VALUES ('$namakandidat[$i]', '$namapemilihan')";
        $run=$conn->query($insert);
    }
    if($run){
        echo "<script>
        alert('Pemilihan Telah Siap Dimulai');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "Error";
    }
}

?>
