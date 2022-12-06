<!-- This is the accounts model -->

<!-- This model will handle site registrations -->

<?php
// This function will grab the clients info and store it into the database
function regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword){
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // echo $clientFirstname;
    // The SQL statement
    $sql = 'INSERT INTO clients (clientFirstName, clientLastname, clientEmail, clientPassword)
        VALUES (:clientFirstname, :clientLastname, :clientEmail, :clientPassword)';
    // Create the prepared statement using phpmotors connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_STR);
    $stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}


// Checks for an existing email address
function checkExistingEmail($clientEmail){
    // Creates a connection object using the phpmotors connection function
    $db = phpmotorsConnect();

    // Selects the email data from the database
    $sql = 'SELECT clientEmail
            FROM clients
            WHERE clientEmail = :email';

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
    $stmt->execute();

    $matchEmail = $stmt->fetch(PDO::FETCH_NUM);

    $stmt->closeCursor();

    if(empty($matchEmail)){
        // echo "Nothing found";
        return 0;
        // exit;
    }
    else {
        // echo "Match found";
        return 1;
        // exit;
    }
}
// Get client data based on an email address
function getClient($clientEmail){
    $db = phpmotorsConnect();
    $sql = 'SELECT clientId, clientFirstname, clientLastname, clientEmail, clientLevel, clientPassword FROM clients WHERE clientEmail = :clientEmail';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    $stmt->execute();
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $clientData;
   }

function updateClient($clientFirstname, $clientLastname, $clientEmail, $clientId){
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // echo $clientFirstname;
    // The SQL statement
    $sql = 'UPDATE clients 
            SET clientFirstName = :clientFirstname, clientLastname = :clientLastname, clientEmail = :clientEmail
            WHERE clientId = :clientId';
    // Create the prepared statement using phpmotors connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_STR);
    $stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}

function checkExistingEmailUpdate($clientEmail){
    // Creates a connection object using the phpmotors connection function
    $db = phpmotorsConnect();

    // Selects the email data from the database
    $sql = 'SELECT clientEmail, clientId
            FROM clients
            WHERE clientEmail = :email AND clientId <> :clientId';

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
    $stmt->bindValue(':clientId', $_SESSION['clientData']['clientId'], PDO::PARAM_INT);
    $stmt->execute();

    $matchEmail = $stmt->fetch(PDO::FETCH_NUM);

    $stmt->closeCursor();

    if(empty($matchEmail)){
        // echo "Nothing found";
        return 0;
        // exit;
    }
    else {
        // echo "Match found";
        return 1;
        // exit;
    }
}

    function updatePassword($hashedPassword, $clientId){
        // Create a connection object using the phpmotors connection function
        $db = phpmotorsConnect();
        // echo $clientFirstname;
        // The SQL statement
        $sql = 'UPDATE clients 
                SET clientPassword = :clientPassword
                WHERE clientId = :clientId';
        // Create the prepared statement using phpmotors connection
        $stmt = $db->prepare($sql);
        // The next four lines replace the placeholders in the SQL
        // statement with the actual values in the variables
        // and tells the database the type of data it is
        $stmt->bindValue(':clientPassword', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
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