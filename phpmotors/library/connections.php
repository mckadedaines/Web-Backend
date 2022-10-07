<?php
/*
  Proxy connection to PHP motors Database
*/
function phpmotorsConnect(){
  $server = 'localhost:3308';
  $dbname = 'phpmotors';
  $username = 'iClient';
  $password = 'uhrVpr1UuyZmri!J';
  $dsn = "mysql:host=$server;dbname=$dbname";
  $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
  try{
    $link = new PDO($dsn, $username, $password, $options);
    // echo 'Worked';
    return $link;
  } catch(PDOException $e){
    // echo "It didn't work, error: " . $e->getMessage();
    header('Location: /phpmotors/view/500.php');
  }
}
//For Testing Purposes Only
phpmotorsConnect();
?>