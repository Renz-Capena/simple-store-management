<?php
    require'connection.php';
    $con = connect();
    

    $getSoldItems = "SELECT * FROM solditems";
    $itemsList = $con->query($getSoldItems);
    $itemColumns = $itemsList->fetch_assoc();
    $checkItemsIfNull = $itemsList->num_rows;


    if(isset($_POST['addBtn'])){
        $itemSold = $_POST['itemSold'];
        $itemPrice = $_POST['itemSoldPrice'];

        $insertItem = "INSERT INTO solditems(`name`, `price`) VALUES ('$itemSold','$itemPrice')";

        $con->query($insertItem);

        header("location: inventory.php");
    }

    if(isset($_POST['deleteSoldItemBtn'])){
        $deleteSoldItem = $_POST['soldItem'];

        $deleteSoldItem = "DELETE FROM solditems WHERE id='$deleteSoldItem'";

        $con->query($deleteSoldItem);

        header("location: inventory.php");
    }

    if(isset($_POST['yesBtn'])){
        $deleteAllInventory = "DELETE FROM solditems";

        $con->query($deleteAllInventory);
       
        // header("lcoation: inventory.php");
        header("Refresh:0");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capeña Store</title>
    <link rel='stylesheet' href='css/inventory_style.css'>
</head>
<body>
    <header>
        <a class='backBtn' href='index.php'>BACK</a>
        <button id='deleteThisInventoryBtn'>DELETE THIS INVENTORY</button>
    </header>    

    <form class='soldForm' method='post'>
        <h3>ADD ITEMS SOLD</h3>
        <br>
        <input type="text" placeholder='ITEM NAME' name='itemSold' required>
        <br><br>
        <input type="number" placeholder='ITEM PRICE' name="itemSoldPrice" required>
        <br><br>
        <button name='addBtn'>ADD</button>
    </form>

    <div class='overlay'></div>
    <div class='deleteInventory_wrapper'>
        <h4>ARE YOU SURE TO DELETE ALL INVENTORY?</h4>
        <form method='post'>
            <button name='yesBtn'>YES</button>
        </form>
        <button id='noBtn'>NO</button>
    </div>

    <table class='soldItemsTable'>
        <thead>
            <tr>
                <th>NAME</th>
                <th>PRICE</th>
                <th>DELETE</th>
            </tr>
        </thead>
        <tbody>
            <?php if($checkItemsIfNull){ ?>
                <?php do{ ?>
                    <tr>
                        <td><?php echo $itemColumns['name'] ?></td>
                        <td id='soldPrice'><?php echo $itemColumns['price'] ?></td>
                        <td>
                            <form method='post'>
                                <input type="hidden" name='soldItem' value='<?php echo $itemColumns['id'] ?>'>
                                <button name='deleteSoldItemBtn' class='deleteSoldItemBtn'>DELETE</button>
                            </form>
                        </td>
                    </tr>
                <?php }while($itemColumns = $itemsList->fetch_assoc()) ?>
            <?php }else{ ?>
                <tr>
                    <td colspan='3'>No sold yet!</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br><br>
    <br><br>
    <p>.</p>

    <div class='totalSold_wrapper'>
        <p>TOTAL SOLD TODAY: </p>
        <p class='result_wrapper'>₱<span id='totalSoldResult'>0</span></p>
    </div>











    <script src='js/inventory.js'></script>
</body>
</html>