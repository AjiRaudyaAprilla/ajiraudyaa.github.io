<?php 

include("headeradmin.php");

?>

<div class="col-sm-6 col-sm-offset-4 mx-auto bg-success alert" >
        <h4 style="color: white; text-align:center;"> Tambah Pemilihan</h4>
	<form class="user" method="POST">
								<div class="form-group">
                                    <label for="" style="color: white;">Nama Pemilu</label>
										<input type="text" class="form-control form-control-user" name="namapemilu"
											required>
									</div>
                                    <div class="form-group">
                                    <label for="" style="color: white;">Mulai Pemilu</label>
										<input type="date" class="form-control form-control-user" name="mulaipemilu"
											required>
									</div>
                                    <div class="form-group">
                                    <label for="" style="color: white;">Akhir Pemilu</label>
										<input type="date" class="form-control form-control-user" name="akhirpemilu"
											required>
									</div>
                                    
                                    <hr>
								<button type = "submit" class="btn btn-primary btn-user btn-block" name="tambah" onclick="return confirm('Simpan?');">Simpan</button>
								</form>
    </div>
</div>

<?php 
$conn=new mysqli("localhost", "root", "", "voting");
if(isset($_POST['tambah'])){
    $namapemilu=$_POST['namapemilu'];
    $mulaipemilu=$_POST['mulaipemilu'];
    $akhirpemilu=$_POST['akhirpemilu'];
    $insert="INSERT INTO pemilihan (nama, mulai, akhir) VALUES ('$namapemilu', '$mulaipemilu', '$akhirpemilu')";
    $run=$conn->query($insert);
    if($run){
        echo "<script>
        alert('Pemilihan Ditambah');
        document.location.href = 'tambahkandidat.php';
        </script>";
    } else {
        echo "gagal";
    }
}

?>