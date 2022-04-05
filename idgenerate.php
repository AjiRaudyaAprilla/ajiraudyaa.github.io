        <?php
        session_start();
        include("include/loginheader.php");
        if(!$_SESSION['nik']){
            header("location:login.php");
        }

        ?>

        <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
            <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
                
            <section id="idgenerate" class="idgenerate">

            <div class="container">
            <?php 
            require('include/db.php');
            $nik=$_SESSION['nik'];
            $select="SELECT * FROM id_request WHERE nik='$nik'";
            $run=$conn->query($select);
            if($run->num_rows>0){

                ?>
                <hr>
                <div class="col-sm-9 col-sm-offset-4 mx-auto bg-success alert" >
                <h4 style="color: white; text-align:center">Permintaan Sudah Dikirim, Silahkan Refresh Halaman Ini Setelah 30 Detik</h4>
                </div>
                <?php
            }
            else{


                ?>
                <?php
                    $select="SELECT * FROM warga WHERE nik='$nik'";
            $run=$conn->query($select);
            if($run->num_rows>0){
                while ($row=$run->fetch_array()){
                    $nik=$row['nik'];
                    $nama=$row['nama'];
                    $tgl_lahir=$row['tgl_lahir'];
                    $rt=$row['rt'];
                    $unikid=$row['unikid'];
            }
        }

        if($unikid!=""){
            
        ?>
        <div class="col-sm-6 col-sm-offset-4 mx-auto bg-success alert" >
                <h4 style="color: white; text-align:center">Unik ID Anda "<span class="text-danger"><?php echo $unikid; ?></span>"</h4>
                <p><b>Info:</b>Gunakan Unik ID Untuk Login Pemilihan</p>
                </div>

        <?php
        } else {

            ?>

        <div class="col-sm-6 col-sm-offset-4 mx-auto bg-gradient alert" >
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
                                            <hr>
                                        <button type = "submit" class="btn btn-primary btn-user btn-block" name="idrequest"> Kirim Request</button>
                                        </form>
                                        
            </div>
        </div>


        <?php
            }
            }
        ?>
        <?php 
        if(isset($_POST['idrequest'])){
            $nik=$_POST['nik'];
            $nama=$_POST['nama'];
            $tgl_lahir=$_POST['tgl_lahir'];
            $rt=$_POST['rt'];
            require('include/db.php');
            

                $insert="INSERT INTO id_request (id, nik, nama, tgl_lahir, rt) VALUES ('','$nik', '$nama', '$tgl_lahir', '$rt')";
                $run=$conn->query($insert);
                if($run){
                    echo "<script>
                    alert('Permintaan Unik ID Berhasil Dikirim');
                    document.location.href = 'idgenerate.php';
                    </script>";
                }else{
                    echo "gagal";
                }
            
        }


        ?>

            </section>
            </div>
        </section>
        <?php 
        include("include/footer.php");
        ?>
    </body>
        