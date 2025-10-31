<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .err{
            color:white;
            background: red;
            height:50px;
            font-size:30px;
             font-weight: bold;
        }
    </style>
</head>
<body>
    
    <div class="container" style="margin: auto;">
        <?php
            session_start();
            if(isset($_SESSION['err_message'])){
        ?>
            <div class=" row err">
                <?php echo  $_SESSION['err_message'];?>
            </div> 
        <?php   }
        ?>
        <h1>Order pizza!</h1>
        <hr>
        <form action="add-order-backend.php"class="form" method="post" enctype="multipart/form-data">
            <h2>Select the pizza size</h2>
            <div class="form-check">
                <input type="radio" class="form-check-input"  id="radio1" name="pizzaSize"  value="big" checked >
                <label class="form-check-label" for="radio1">big</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="radio2" name="pizzaSize" value="midium">
                <label class="form-check-label" for="radio2">midium</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="radio3" name="pizzaSize" value="small">
                <label class="form-check-label" for="radio3">small</label>
            </div>
            <div>
                <h2>select the crust type</h2>
                <select class="form-select" name="crustType" id="">
                    <option class="form-select" value="thin">thin</option>
                    <option class="form-select" value="thick"> thick</option>
                    <option class="form-select" value="stuffed">stuffed</option>
                </select>
            </div>
            <div>
                <h2>select the filler</h2> 
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="check1" name="corn" value="yes">
                    <label for="form-check-label">corn</label>
                </div> 
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="check2" name="pepper" value="yes">
                    <label class="form-check-label">pepper</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="check3" name="mushroom" value="yes">
                    <label class="form-check-label">mushroom</label>
                </div>
            </div>
            <label for="name" class="form-check-label">Name:</label>
            <input type="text" name="name" class="form-control">
            <label for="phone" class="form-check-label">phone no:</label>
            <input type="text" name="phone" class="form-control">
            <br>
            <div class="form-group">
                <textarea name="textarea" id="" placeholder="message" class="form-control" rows="5"></textarea>
            </div>
            <button class="btn btn-info" name="send">Send</button>
            <button class="btn btn-info">Reset</button>
        </form>
    </div>
</body>
</html>