<?php 
    require'connection.php';
    $con = connect();

    $getlist = "SELECT * FROM items ORDER BY name";
    $listItems = $con->query($getlist);
    $listColumn = $listItems->fetch_assoc();
    $checkItemsifNull = $listItems->num_rows;

    if(isset($_POST['deleteBtn'])){
        $itemNumber = $_POST['itemNumber'];

        $deleteCommand = "DELETE FROM items WHERE id='$itemNumber'";
        $con->query($deleteCommand);

        // echo "<script>alert($itemNumber)</script>";

        header("location: delete.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capeña Store</title>
    <link rel='stylesheet' href='css/delete_style.css'>
</head>
<body>
    <header>
        <a class='backBtn' href='index.php'>BACK</a>
    </header>
    
    <table>
        <thead>
            <tr>
                <th>NAME</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php if($checkItemsifNull) { ?>
                <?php do{ ?>
                <tr>
                    <td><?php echo $listColumn['name'] ?></td>
                    <td>
                        <form method='post'>
                            <input type="hidden" name="itemNumber" value="<?php echo $listColumn['id'] ?>">
                            <button name='deleteBtn'>DELETE</button>
                        </form>
                    </td>
                </tr>
                <?php }while($listColumn = $listItems->fetch_assoc()) ?>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>