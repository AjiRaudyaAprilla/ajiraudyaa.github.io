<?php 

$conn = mysqli_connect("localhost","root", "", "voting" );

function query($query){
    global $conn;
    $result=mysqli_query($conn, $query);
    $rows=[];
    while($row=mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return $rows;
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM warga WHERE id=$id");
    return mysqli_affected_rows($conn);
}


function ubah($data){
    global $conn;

    $id=$data["id"];
    $nik=htmlspecialchars($data["nik"]);
    $nama=htmlspecialchars($data["nama"]);
    $tgl_lahir=htmlspecialchars($data["tgl_lahir"]);
    $rt=htmlspecialchars($data["rt"]);


    $query = "UPDATE warga SET 
    nik='$nik',
    nama='$nama',
    tgl_lahir='$tgl_lahir',
    rt='$rt' WHERE id = $id
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



function registrasi($data) {

    global $conn;

    $nik = $data["nik"];
    $nama = $data["nama"];
    $tgl_lahir = $data["tgl_lahir"];
    $password = $data["password"];
    $password2= $data["password2"];
    $rt = $data["rt"];

    //cek nik
    $result = mysqli_query($conn, "SELECT nik FROM warga WHERE nik='$nik'");

    if(mysqli_fetch_assoc($result)){
        echo "<script>
        alert ('Nomor Nik Sudah Terdaftar');
        </script>";
        return false;
    }

    //cek password dengan password 2
    if($password !== $password2){
        echo "<script>
        alert ('Password Tidak Sama');
        </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //Simpan ke database
    mysqli_query($conn, "INSERT INTO warga VALUES ('', '$nik', '$nama', '$tgl_lahir', '$password', '$rt', '')");
    return mysqli_affected_rows($conn);

}



?>