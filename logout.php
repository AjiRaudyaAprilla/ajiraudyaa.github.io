<?php
session_start();
unset($_SESSION['nama']);
unset($_SESSION['nik']);
unset ($_SESSION['unikid']);
session_destroy();
header("location:index.php");

?>