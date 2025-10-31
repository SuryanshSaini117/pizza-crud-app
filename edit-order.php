<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
<body>
    <div class="container" style="margin: auto;">
        <h1>Edit the pizza Order!</h1>
        <hr>
        <?php
            include_once 'db-connection.php';
            $id = $_GET['id'];
            $result = mysqli_query($conn,"SELECT * FROM pizza_orders WHERE id = '$id'");
            $value = mysqli_fetch_assoc( $result);
            // print_r($value);die();
            ?>
            <?php
                session_start();
                if(isset($_SESSION['err_message'])){
            ?>
                <div style="color:red;">
                    <?php echo  $_SESSION['err_message'];?>
                </div> 
            <?php   }
            ?>
        <form action="edit-order-backend.php?id=<?php echo $value['id']?>"class="form" method="post" enctype="multipart/form-data">
            <h2>Select the pizza size</h2>
            <div class="form-check">
                <input  <?php echo $value['pizza_size'] == 'big' ? 'checked': '';?> type="radio" class="form-check-input"  id="radio1" name="pizzaSize"  value="big" checked >
                <label class="form-check-label" for="radio1">big</label>
            </div>
            <div class="form-check">
                <input  <?php echo $value['pizza_size'] == 'midium' ? 'checked': '';?> type="radio" class="form-check-input" id="radio2" name="pizzaSize" value="midium">
                <label class="form-check-label" for="radio2">midium</label>
            </div>
            <div class="form-check">
                <input  <?php echo $value['pizza_size'] == 'small' ? 'checked': '';?> type="radio" class="form-check-input" id="radio3" name="pizzaSize" value="small">
                <label class="form-check-label" for="radio3">small</label>
            </div>
            <div>
                <h2>select the crust type</h2>
                <select class="form-select" name="crustType" id="">
                    <option <?php echo  $value['crust_type'] == 'thin' ? 'selected': '';?> class="form-select" value="thin">thin</option>
                    <option <?php echo  $value['crust_type'] == 'thick' ? 'selected': '';?> class="form-select" value="thick"> thick</option>
                    <option <?php echo  $value['crust_type'] == 'stuffed' ? 'selected': '';?> class="form-select" value="stuffed">stuffed</option>
                </select>
            </div>
            <div>
                <h2>select the filler</h2> 
                <div class="form-check">
                    <input <?php echo  $value['corn'] == 'yes' ? 'checked': '';?> class="form-check-input" type="checkbox" id="check1" name="corn" value="yes">
                    <label for="form-check-label">corn</label>
                </div> 
                <div class="form-check">
                    <input <?php echo  $value['pepper'] == 'yes' ? 'checked': '';?> class="form-check-input" type="checkbox" id="check2" name="pepper" value="yes">
                    <label class="form-check-label">pepper</label>
                </div>
                <div class="form-check">
                    <input <?php echo  $value['mushroom'] == 'yes' ? 'checked': '';?> class="form-check-input" type="checkbox" id="check3" name="mushroom" value="yes">
                    <label class="form-check-label">mushroom</label>
                </div>
            </div>
            <label for="name" class="form-check-label">Name:</label>
            <input type="text" name="name" class="form-control" value="<?php echo $value['name']?>">
            <label for="phone" class="form-check-label">phone no:</label>
            <input type="text" name="phone" class="form-control" value="<?php echo $value['phone_no']?>">
            <br>
            <div class="form-group">
                <textarea name="textarea" id="" placeholder="message" class="form-control" rows="5"><?php echo $value['message']?></textarea>
            </div>
            <button class="btn btn-info" name="update">update</button>
            <button class="btn btn-info">Reset</button>
        </form>
    </div>
</body>
</html>