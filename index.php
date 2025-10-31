<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listing Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .session{
            color:white;
            background: green;
            height:50px;
            font-size:30px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    
    <div class="container" >
        <?php
            session_start();
            if(isset($_SESSION['success'])){
        ?>
            <div class=" row session"> 
                <?php 
                    echo $_SESSION['success']; 
                ?>
            </div>
            <?php  }
                session_destroy();
            ?>
        <div class="row"><a href="add-order.php">Add Order</a></div>
        <h1>Order list</h1>
        <?php 
            include_once "db-connection.php";
            $pizzas = mysqli_query($conn,"SELECT * FROM pizza_orders WHERE status!= 'deleted'");
            // print_r($pizza);die();
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>action</th>
                    <th>id</th>
                    <th>pizza size</th>
                    <th>type</th>
                    <th>corn</th>
                    <th>papper</th>
                    <th>mushroom</th>
                    <th>name</th>
                    <th>phone no.</th>
                    <th>message</th>
                    <th>status</th>
                    <th>created at</th>
                    <th>updated at</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pizzas as $key=> $pizza) { ?>
                    <?php
                    if($pizza['status']=='active'){
                    ?>
                        <tr>
                            <td>
                                <a href="edit-order.php?id=<?php echo $pizza['id']?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="delete.php?id=<?php echo $pizza['id']?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                            <td style="background-color:green;"><?php echo $key+1 ?></td>
                            <td style="background-color:green;"><?php echo $pizza['pizza_size']?></td>
                            <td style="background-color:green;"><?php echo $pizza['crust_type']?></td>
                            <td style="background-color:green;"><?php echo $pizza['corn']?></td>
                            <td style="background-color:green;"><?php echo $pizza['pepper']?></td>
                            <td style="background-color:green;"><?php echo $pizza['mushroom']?></td>
                            <td style="background-color:green;"><?php echo $pizza['name']?></td>
                            <td style="background-color:green;"><?php echo $pizza['phone_no']?></td>
                            <td style="background-color:green;"><?php echo $pizza['message']?></td>
                            <td style="background-color:green;"><?php echo $pizza['status']?></td>
                            <td style="background-color:green;"><?php echo $pizza['created_at']?></td>
                            <td style="background-color:green;"><?php echo $pizza['updated_at']?></td>
                        </tr>
                    <?php } ?>
                    <?php
                    if($pizza['status']=='inactive'){
                    ?>
                        <tr>
                            <td>
                                <a href="edit-order.php?id=<?php echo $pizza['id']?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="delete.php?id=<?php echo $pizza['id']?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                            <td style="background-color:red;"><?php echo $key+1 ?></td>
                            <td style="background-color:red;"><?php echo $pizza['pizza_size']?></td>
                            <td style="background-color:red;"><?php echo $pizza['crust_type']?></td>
                            <td style="background-color:red;"><?php echo $pizza['corn']?></td>
                            <td style="background-color:red;"><?php echo $pizza['pepper']?></td>
                            <td style="background-color:red;"><?php echo $pizza['mushroom']?></td>
                            <td style="background-color:red;"><?php echo $pizza['name']?></td>
                            <td style="background-color:red;"><?php echo $pizza['phone_no']?></td>
                            <td style="background-color:red;"><?php echo $pizza['message']?></td>
                            <td style="background-color:red;"><?php echo $pizza['status']?></td>
                            <td style="background-color:red;"><?php echo $pizza['created_at']?></td>
                            <td style="background-color:red;"><?php echo $pizza['updated_at']?></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
         <!-- <button class="btn btn-primary" >send</button>
         <button class="btn btn-primary" >reset</button> -->
    </div>
</body>
</html>