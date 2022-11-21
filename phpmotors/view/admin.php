<?php 
    // if(!isset($_SESSION['loggedin'])){ 
    //     header('Location: /phpmotors/index.php'); 
    //     exit; 
    // } else {
    //     include 'view/admin.php';
    // }
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
    <title>Home Page</title>
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
        echo $navList;
        ?>
    </nav>

    <main>
        
            <!-- // echo $_SESSION[clientData][clientFirstname] $_SESSION[clientData][clientLastname]; -->
            <h1><?php echo $_SESSION['clientData']['clientFirstname'] . ' ' . $_SESSION['clientData']['clientLastname']; ?></h1>
            <ul>
                <li>First Name: <?php $_SESSION['clientData']['clientFirstname'] ?></li>
                <li>Last Name: <?php $_SESSION['clientData']['clientLastname'] ?></li>
                <li>Email: <?php $_SESSION['clientData']['clientEmail'] ?></li>
            </ul>
    </main>

    <footer>
        <hr>
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
        ?>
    </footer>

</body>

</html>