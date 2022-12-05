<?php 
if($_SESSION['clientData']['clientLevel'] < 2){
    header('location: /phpmotors/');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/phpmotors/css/normalize.css">
    <link rel="stylesheet" href="/phpmotors/css/mobile.css">
    <link rel="stylesheet" href="/phpmotors/css/large.css">
    <title>
        <?php 
        if(isset($invInfo['car_make'])){ 
        echo "Delete $invInfo[car_make] $invInfo[car_model]";}
        ?> | PHP Motors
    </title>
</head>

<body>
    <div class="back-img"></div>

    <header>
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php';
        ?>
    </header>

    <nav>
        <?php
        // require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php';
        echo $navList;
        ?>
    </nav>

    <main>
    <h1>
        <?php if(isset($invInfo['car_make'])){ 
	    echo "Delete $invInfo[car_make] $invInfo[car_model]";} ?>
    </h1>

        <?php
        if(isset($message)){
            echo $message;
        }
        ?>

        <br><br><form action="/phpmotors/vehicles/index.php" method="POST">
        <?php
        echo $class_select;
        ?>           
            <br><br><label for="car_make">Make:</label>
            <input type="text" name="car_make" id="car_make" readonly <?php if(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>><br><br>
            <label for="car_model">Model:</label>
            <input type="text" name="car_model" id="car_model" readonly <?php if(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>><br><br>
            <label for="car_description">Description:</label>
            <textarea name="invDescription" id="invDescription" required>
            <?php 
                if(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; }
            ?>
            </textarea><br><br>
            <button type="submit" name="submit" value="Delete Vehicle">Delete Vehicle</button>
            <input type="hidden" name="action" value="deleteVehicle">
            <input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} elseif(isset($invId)){ echo $invId;} ?>">
        </form>

        <p>Confirm Vehicle Deletion. The delete is permanent.</p>
    </main>

    <footer>
        <hr>
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
        ?>
    </footer>

</body>

</html>