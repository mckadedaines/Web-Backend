<?php 
// Build the classifications option list
$classifList = '<select name="classificationId" id="classificationId">';
$classifList .= "<option>Choose a Car Classification</option>";
foreach ($classifications as $classification) {
 $classifList .= "<option value='$classification[classificationId]'";
 if(isset($classificationId)){
  if($classification['classificationId'] === $classificationId){
   $classifList .= ' selected ';
  }
 } elseif(isset($invInfo['classificationId'])){
 if($classification['classificationId'] === $invInfo['classificationId']){
  $classifList .= ' selected ';
 }
}
$classifList .= ">$classification[classificationName]</option>";
}
$classifList .= '</select>';
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
        if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
            echo "Modify $invInfo[invMake] $invInfo[invModel]";
        } elseif(isset($invMake) && isset($invModel)) { 
            echo "Modify $invMake $invModel"; 
        }
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
        <?php
        if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
	        echo "Modify $invInfo[invMake] $invInfo[invModel]";
        } elseif(isset($invMake) && isset($invModel)) { 
	        echo "Modify$invMake $invModel"; 
        }
        ?>
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
            <input type="text" name="car_make" id="car_make" placeholder="Car Make" required <?php if(isset($car_make)){ echo "value='$car_make'"; } elseif(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>><br><br>
            <label for="car_model">Model:</label>
            <input type="text" name="car_model" id="car_model" required <?php if(isset($car_model)){ echo "value='$car_model'"; } elseif(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>><br><br>
            <label for="car_description">Description:</label>
            <input type="text" name="car_description" id="car_description" required <?php if(isset($car_description)){ echo "value='$car_description'"; } elseif(isset($invInfo['invDescription'])) {echo "value='$invInfo[invDescription]'"; }?>><br><br>
            <label for="car_image">Image Path:</label>
            <input type="text" name="car_image" id="car_image" required <?php if(isset($car_image)){ echo "value=$car_image"; } elseif(isset($invInfo['invImage'])) {echo "value='$invInfo[invImage]'"; }?>><br><br>
            <label for="car_thumbnail">Thumbnail Path:</label>
            <input type="text" name="car_thumbnail" id="car_thumbnail" required <?php if(isset($car_thumbnail)){ echo "value=$car_thumbnail"; } elseif(isset($invInfo['invThumbnail'])) {echo "value='$invInfo[invThumbnail]'"; }?>><br><br>
            <label for="car_price">Price:</label>
            <input type="number" name="car_price" id="car_price" required <?php if(isset($car_price)){ echo "value=$car_price"; } elseif(isset($invInfo['invPrice'])) {echo "value='$invInfo[invPrice]'"; }?>><br><br>
            <label for="car_stock"># in stock:</label>
            <input type="number" name="car_stock" id="car_stock" required <?php if(isset($car_stock)){ echo "value=$car_stock"; } elseif(isset($invInfo['invStock'])) {echo "value='$invInfo[invStock]'"; }?>><br><br>
            <label for="car_color">Color:</label>
            <input type="text" name="car_color" id="car_color" required <?php if(isset($car_color)){ echo "value=$car_color"; } elseif(isset($invInfo['invColor'])) {echo "value='$invInfo[invColor]'"; }?>><br><br>
            <textarea name="invDescription" id="invDescription" required>
            <?php 
                if(isset($invDescription)){ echo $invDescription; } elseif(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; }
            ?>
            </textarea><br>
            <button type="submit" name="submit" value="Update Vehicle">Add Vehicle</button>
            <input type="hidden" name="action" value="updateVehicle">
            <input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} elseif(isset($invId)){ echo $invId;} ?>">
        </form>
    </main>

    <footer>
        <hr>
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
        ?>
    </footer>

</body>

</html>