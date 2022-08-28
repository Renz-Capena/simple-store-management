<?php
    require'connection.php';
    $con = connect();

    $getItemsDatabase = "SELECT * FROM items ORDER BY name";
    $itemsList = $con->query($getItemsDatabase);
    $selectColumn = $itemsList->fetch_assoc(); 
    $empty = $itemsList->num_rows;

    // echo $empty;

    if(isset($_POST['addItemBtn'])){
       $item = $_POST['itemName'];
       $itemDescription = $_POST['itemDescription'];
       $itemPrice = $_POST['itemPrice'];

       $command = "INSERT INTO items (`name`,`description`,`price`) VALUES ('$item','$itemDescription','$itemPrice')";

       $con->query($command);

       header('location: index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capeña Store</title>
    <link rel='stylesheet' href='css/style.css'>
</head>
<body>
    <header>
        <a class='itemsBtn' href='index.php'>ITEMS</a>
        <button id='addItemsBtn'>ADD</button>
        <a class='deleteItemBtn' href='delete.php'>DELETE</a>
        <a href="inventory.php" class='inventoryBtn'>INVENTORY</a>
    </header>

    <div class='overlay'></div>
    <form class='formAddItems' method='post'>
        <h3>Add Items</h3>
        <br>
        <input type="text" name="itemName" required>
        <br>
        <label>ITEM NAME</label>
        <br><br>
        <input type="text" name="itemDescription">
        <br>
        <label>ITEM DESCRIPTION</label>
        <br><br>
        <input type="number" name="itemPrice" required>
        <br>
        <label>ITEM PRICE</label>
        <br><br>
        <button name='addItemBtn' >ADD ITEM</button>
        <br><br>
        <p id='formAddItemsClose'>CLOSE</p>
    </form>

    <table class='tableItems'>
        <thead>
            <tr>
                <th>NAME</th>
                <th>DESCRIPTION</th>
                <th>PRICE</th>
            </tr>
        </thead>
        <tbody>
            <?php if($empty){ ?>
                <?php do{ ?>
                    <tr>
                        <td><?php echo $selectColumn['name'] ?></td>
                        <td><?php echo $selectColumn['description'] ?></td>
                        <td><?php echo $selectColumn['price'] ?></td>
                    </tr>
                <?php }while($selectColumn = $itemsList->fetch_assoc()); ?>
            <?php }else{ ?>
                <tr>
                    <td colspan='3'>No items Detected!</td>
                </tr>
            <?php }; ?>
        </tbody>
    </table>


    
   
    












    <script src='js/main.js'></script>
</body>
</html>