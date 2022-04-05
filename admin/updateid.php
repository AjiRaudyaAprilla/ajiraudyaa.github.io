<?php 
include('headeradmin.php');

?>

<div class="container-fluid">
    <?php 
    $postfix="";
    $prefix="";
    $idgenerated="";
    $conn=new mysqli("localhost", "root", "", "voting");
    $id=$_GET['id'];
    $select = "SELECT * FROM id_request WHERE id='$id'";
    $run=$conn->query($select);
    if($run->num_rows>0){
        while($row=$run->fetch_array()){
            $nik=$row['nik'];
            $nama=$row['nama'];
            $tgl_lahir=$row['tgl_lahir'];
            $rt=$row['rt'];
        }
        switch ($rt) {
            case '1':
                $prefix="rt1";
                $rand=rand(99999, 12345);
                $postfix="abc";
                $idgenerated=$prefix.$rand.$postfix;
                break;
                case '2':
                $prefix="rt2";
                $rand=rand(99999, 12345);
                $postfix="abc";
                $idgenerated=$prefix.$rand.$postfix;
                break;
                case '3':
                $prefix="rt3";
                $rand=rand(99999, 12345);
                $postfix="abc";
                $idgenerated=$prefix.$rand.$postfix;
                break;
                    
            default:
                # code...
                break;
        }




            ?>

        <div class="col-sm-6 col-sm-offset-4 mx-auto bg-success alert" >
        <h4 style="color: white; text-align:center;"> Data</h4>
	<form class="user" method="POST">
								<div class="form-group">
                                    <label for="" style="color: white;">Nomor NIK</label>
										<input type="text" class="form-control form-control-user" name="nik"
											required value="<?php echo $nik; ?>" readonly>
									</div>
                                    <div class="form-group">
                                    <label for="" style="color: white;">Nama</label>
										<input type="text" class="form-control form-control-user" name="nama"
											required value="<?php echo $nama; ?>" readonly>
									</div>
                                    <div class="form-group">
                                    <label for="" style="color: white;">Tanggal Lahir</label>
										<input type="text" class="form-control form-control-user" name="tgl_lahir"
											required value="<?php echo $tgl_lahir; ?>" readonly>
									</div>
                                    <div class="form-group">
                                    <label for="" style="color: white;">RT</label>
										<input type="text" class="form-control form-control-user" name="rt"
											required value="<?php echo $rt; ?>" readonly>
									</div>
                                    <div class="form-group">
                                    <label for="" style="color: white;">Unik ID</label>
										<input type="text" class="form-control form-control-user" name="unikid"
											required value="<?php echo strtoupper($idgenerated);?>" readonly>
									</div>
                                    <hr>
								<button type = "submit" class="btn btn-primary btn-user btn-block" name="update" onclick="return confirm('Simpan?');">Kirim Unik ID</button>
								</form>
    </div>
</div>

<?php
        
    } else {
        echo "Data tidak ditemukan";
    }
    
    
    ?>

<?php 

if(isset($_POST['update'])){
    $nik=$_POST['nik'];
    $unikid=$_POST['unikid'];

    $update="UPDATE warga SET unikid='$unikid' WHERE nik='$nik'";
    $run=$conn->query($update);
    if($run){
        $delete="DELETE FROM id_request WHERE nik='$nik'";
        $del=$conn->query($delete);
        if($delete){
            echo "<script>
        alert('Unik ID Berhasil Dikirim');
        document.location.href = 'idrequest.php';
        </script>";
        }

    }else {
        echo "<script>
        alert('Unik ID Gagal Dikirim');
        document.location.href = 'updateid.php';
        </script>";
    }
}
?>