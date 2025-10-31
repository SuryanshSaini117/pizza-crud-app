<?php
 $conn = new mysqli('localhost','root',"",'pizza_hut');
  if ($conn->connect_error) {
        die("Connection failed: ".$conn->connect_error);
    }
    // echo "Connected successfully (Object-Oriented)"; 
?>