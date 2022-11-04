<?php
function class_outcome($class_name){
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // echo $clientFirstname;
    // The SQL statement
    $sql = 'INSERT INTO carclassification (classificationName)
        VALUES (:class_name)';
    // Create the prepared statement using phpmotors connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':class_name', $class_name, PDO::PARAM_STR);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}

function vehicle_outcome($car_make, $car_model, $car_description, $car_image, $car_thumbnail, $car_price, $car_stock, $car_color, $classificationId){
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // echo $clientFirstname;
    // The SQL statement
    $sql = 'INSERT INTO inventory (invMake, invModel, invDescription, invImage, invThumbnail, invPrice, invStock, invColor, classificationId)
        VALUES (:car_make, :car_model, :car_description, :car_image, :car_thumbnail, :car_price, :car_stock, :car_color, :classificationId)';
    // Create the prepared statement using phpmotors connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':car_make', $car_make, PDO::PARAM_STR);
    $stmt->bindValue(':car_model', $car_model, PDO::PARAM_STR);
    $stmt->bindValue(':car_description', $car_description, PDO::PARAM_STR);
    $stmt->bindValue(':car_image', $car_image, PDO::PARAM_STR);
    $stmt->bindValue(':car_thumbnail', $car_thumbnail, PDO::PARAM_STR);
    $stmt->bindValue(':car_price', $car_price, PDO::PARAM_STR);
    $stmt->bindValue(':car_stock', $car_stock, PDO::PARAM_STR);
    $stmt->bindValue(':car_color', $car_color, PDO::PARAM_STR);
    $stmt->bindValue(':classificationId', $classificationId, PDO::PARAM_STR);

    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}
?>