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
?>