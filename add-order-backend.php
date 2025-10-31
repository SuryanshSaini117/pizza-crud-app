<?php
    session_start();
    include_once "db-connection.php";
    if(isset($_POST['send']))
    {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $message = $_POST['textarea'];
        $size = $_POST['pizzaSize'];
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

        // validation foe err message ---------------------------------------------------------------------------------------
        if (is_null($name) || $name == '') 
        {
        // print_r("name required");die();
        $_SESSION['err_message'] = "Name Required.";
            header("location: add-order.php");
        }
        elseif(strlen($name) < 2 ||strlen($name) >20 ){
            // print_r("enter valid name");die();
            $_SESSION['err_message'] = "Enter Valid Name.";
            header("location: add-order.php");

        }
        elseif (!preg_match("/^[a-zA-Z ]*$/", $name)){
            //  print_r("Only letters and white space allowed in name.");die(); 
            $_SESSION['err_message'] = "Only charecters are allowed in name.";
            header("location: add-order.php");
        }
        elseif(strlen($phone) < 10 ||strlen($phone) >12 ){
            // print_r("enter valid phone no");die();
            $_SESSION['err_message'] = "enter valid phone number.";
            header("location: add-order.php");
        }
        elseif (!preg_match("/^\+?[0-9\s\-\(\)]{7,20}$/", $phone)){
            //  print_r("Only numbers a allowed in phone number.");die(); 
            $_SESSION['err_message'] = "enter valid phone no";
            header("location: add-order.php");
        }
        elseif (is_null($message) || $message == '') 
        {
            // print_r("message required");die();
            $_SESSION['err_message'] = "message required";
            header("location: add-order.php");
        }
        elseif(strlen($message) < 2 ||strlen($message) >50 ){
            // print_r("enter message minimum 100 words");die();
            $_SESSION['err_message'] = "enter message minimum 100 words";
            header("location: add-order.php");
        }
        elseif (!preg_match("/^[a-zA-Z ]*$/", $message)){
            //  print_r("Only letters and white space allowed in message.");die(); 
            $_SESSION['err_message'] = "Only letters and white space allowed in message";
            header("location: add-order.php");
        }
        else{   
            // print_r($name);die();
            // print_r($mushroom);die();
            mysqli_query($conn,"INSERT INTO pizza_orders (pizza_size,crust_type,corn,pepper,mushroom,name,phone_no,message) VALUE ('$size','$type','$corn','$pepper','$mushroom','$name','$phone','$message')");
            $_SESSION['success'] = "Your data submited successfully.";
            header("location:index.php");
        }
        
        // session_destroy();
    }
?>