<?php
include ('connect.php');
$id_job = $_GET['id'];
$sql = "delete from job where id_job  = '" . $id_job . "'";
$query = mysqli_query($conn, $sql);
// echo $id_job;
if ($query)
    header('location:admin.php');
?>