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

// Get vehicles by classificationId 
function getInventoryByClassification($classificationId){ 
    $db = phpmotorsConnect(); 
    $sql = ' SELECT * FROM inventory WHERE classificationId = :classificationId'; 
    $stmt = $db->prepare($sql); 
    $stmt->bindValue(':classificationId', $classificationId, PDO::PARAM_INT); 
    $stmt->execute(); 
    $inventory = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    $stmt->closeCursor(); 
    
    return $inventory; 
   }

// Get vehicle information by invId
function getInvItemInfo($invId){
    $db = phpmotorsConnect();
    $sql = 'SELECT * FROM inventory WHERE invId = :invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $invInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $invInfo;
   }

// Update a vehicle
   function updateVehicle($car_make, $car_model, $car_description, $car_image, $car_thumbnail, $car_price, $car_stock, $car_color, $classificationId, $invId){
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // echo $clientFirstname;
    // The SQL statement
    $sql = 'UPDATE inventory SET car_make = :car_make, car_model = :car_model, car_description = :car_description, car_image = :car_image, car_thumbnail = :car_thumbnail, car_price = :car_price, car_stock = :car_stock, car_color = :car_color, classificationId = :classificationId WHERE invId = :invId';
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
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);

    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}

// Deletes a vehicle
function deleteVehicle($invId){
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // echo $clientFirstname;
    // The SQL statement
    $sql = 'DELETE FROM inventory WHERE invId = :invId';
    // Create the prepared statement using phpmotors connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}

function getVehiclesByClassification($classificationName){
    $db = phpmotorsConnect();
    $sql = "SELECT * FROM inventory INNER JOIN images ON inventory.invId = images.invId WHERE classificationId IN (SELECT classificationId FROM carclassification WHERE classificationName = :classificationName) AND images.imgPath LIKE '%-tn.jpg'";    $stmt = $db->prepare($sql);
    $stmt->bindValue(':classificationName', $classificationName, PDO::PARAM_STR);
    $stmt->execute();
    $vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $vehicles;
   }
?>