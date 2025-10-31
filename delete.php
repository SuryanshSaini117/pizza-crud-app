<?php
    include_once "db-connection.php";
    $id = $_GET['id'];
    // print_r($id);die();
    mysqli_query($conn,"DELETE FROM pizza_orders WHERE id = '$id'");
    header("location:index.php");
?>