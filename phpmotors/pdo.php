function phpmotorsConnect(){
    $server = 'localhost';
    $dbname = 'phpmotors';
    $username = 'iClient';
    $password = 'uhrVpr1UuyZmri!J';
    $dsn = "mysql:host=$server;dbname=$dbname";
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $link = new PDO($dsn, $username, $password, $options)
    }
}