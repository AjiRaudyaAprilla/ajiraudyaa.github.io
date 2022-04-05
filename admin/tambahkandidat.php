<?php 

include("headeradmin.php");

?>

<div class="col-sm-6 col-sm-offset-4 mx-auto bg-success alert" >
        <h4 style="color: white; text-align:center;"> Tambah Pemilihan</h4>
	<form class="user" method="GET" action="detailkandidat.php">
								<div class="form-group">
                                    <label for="" style="color: white;">Tambah Kandidat</label>
									<select name="namapemilihan" id="" class="form-control">
                                        <option name="" id="" select="selected">Cari Disini</option>
                                    <?php 
                                    $conn=new mysqli("localhost", "root", "", "voting");
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
									</div>
									<div class="form-group">
                                    <label for="" style="color: white;">Jumlah Kandidat</label>
										<input type="text" class="form-control form-control-user" name="jumlahkandidat"
											required>
									</div>
                                    
                                    
                                    <hr>
								<button type = "submit" class="btn btn-primary btn-user btn-block" name="tambah" onclick="return confirm('Jumlah Kandidat Benar?');">Tambah</button>
								</form>
    </div>
</div>

