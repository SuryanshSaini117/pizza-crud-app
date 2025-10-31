<?php
    session_start();
     include_once "db-connection.php";
     $id = $_GET['id'];
     if(isset($_POST['update']))
        {
            $size = $_POST['pizzaSize'];
            // print_r($size);die();
            $type = $_POST['crustType'];
            if (!isset($_POST['corn'])) {
                $corn = 'no';
            }
            else{
                $corn = $_POST['corn'];
            }
            if (!isset($_POST['pepper'])) {
                $pepper = 'no';
            }
            else{
                $pepper = $_POST['pepper'];
            }
            if (!isset($_POST['mushroom'])) {
                $mushroom = 'no';
            }
            else{
                $mushroom = $_POST['mushroom'];
            }
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $message = $_POST['textarea'];
            //validation -----------------------------------------------------------------------------------------------------
            if (is_null($name) || $name == '') 
            {
                // die('hello');
            // print_r("name required");die();
            $_SESSION['err_message'] = "Name Required.";
                header('location: edit-order.php?id='.$id.'');
                
            }
            elseif(strlen($name) < 2 ||strlen($name) >20 ){
                // print_r("enter valid name");die();
                $_SESSION['err_message'] = "Enter Valid Name.";
                header('location: edit-order.php?id='.$id.'');

            }
            elseif (!preg_match("/^[a-zA-Z ]*$/", $name)){
                //  print_r("Only letters and white space allowed in name.");die(); 
                $_SESSION['err_message'] = "Only charecters are allowed in name.";
                header('location: edit-order.php?id='.$id.'');
            }
            elseif(strlen($phone) < 10 ||strlen($phone) >12 ){
                // print_r("enter valid phone no");die();
                $_SESSION['err_message'] = "enter valid phone number.";
                header("location: edit-order.php?id='.$id.'");
            }
            elseif (!preg_match("/^\+?[0-9\s\-\(\)]{7,20}$/", $phone)){
                //  print_r("Only numbers a allowed in phone number.");die(); 
                $_SESSION['err_message'] = "enter valid phone no";
                header("location: edit-order.php?id='.$id.'");
            }
            elseif (is_null($message) || $message == '') 
            {
                // print_r("message required");die();
                $_SESSION['err_message'] = "message required";
                header("location: edit-order.php?id='.$id.'");
            }
            elseif(strlen($message) < 2 ||strlen($message) >50 ){
                // print_r("enter message minimum 100 words");die();
                $_SESSION['err_message'] = "enter message minimum 100 words";
                header("location: edit-order.php?id='.$id.'");
            }
            elseif (!preg_match("/^[a-zA-Z ]*$/", $message)){
                //  print_r("Only letters and white space allowed in message.");die(); 
                $_SESSION['err_message'] = "Only letters and white space allowed in message";
                header("location: edit-order.php?id='.$id.'");
            }
            else{   
                mysqli_query($conn,"UPDATE pizza_orders SET pizza_size = '$size',crust_type = '$type',corn = '$corn',pepper = '$pepper',mushroom = '$mushroom',name = '$name',phone_no = '$phone',message = '$message' WHERE id = '$id'");
                header("location: index.php");
            }
        }
?>