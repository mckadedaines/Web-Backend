<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/phpmotors/css/normalize.css">
    <link rel="stylesheet" href="/phpmotors/css/mobile.css">
    <link rel="stylesheet" href="/phpmotors/css/large.css">
    <title>Update Account Page</title>
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
        <?php
        // print_r($_SESSION);
        if(isset($message)){
            echo $message;
        }
        if(!isset($clientFirstname)){
            $clientFirstname = $_SESSION['clientData']['clientFirstname'];
        }
        if(!isset($clientLastname)){
            $clientLastname = $_SESSION['clientData']['clientLastname'];
        }
        if(!isset($clientEmail)){
            $clientEmail = $_SESSION['clientData']['clientEmail'];
        }
        ?>
    <form method="POST" action="/phpmotors/accounts/index.php" class="form">
        <label for="fname">First Name: </label><br>
        <input type="text" id="fname" name="clientFirstname" value="<?php echo $clientFirstname ?>" required><br><br>
        <label for="lname">Last Name: </label><br>
        <input type="text" id="lname" name="clientLastname" value="<?php echo $clientLastname ?>" required><br><br>
        <label for="email">Email: </label><br>
        <input type="email" id="email" name="clientEmail" value="<?php echo $clientEmail ?>" required><br><br>
        <input type="submit" value="Submit" id="regButton" value="Register"><br><br>
        <!-- Add the action name - value pair -->
        <input type="hidden" name="action" value="updateClient">
    </form><br><br>

    <form method="POST" action="/phpmotors/accounts/index.php" class="form">
        <label for="password">Password: </label><br>
        <input type="password" id="password" name="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>
        <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character.</span><br><br>
        <input type="submit" value="Submit" id="regButton" value="Register"><br><br>
        <!-- Add the action name - value pair -->
        <input type="hidden" name="action" value="updatePassword">
    </form>

        <?php 
            if(intval($_SESSION['clientData']['clientLevel']) > 1){
                echo "<h2>Administrative Functions</h2>";
                echo "<p>Use the link below to manage your account.</p>";
                echo "<p><a href='/phpmotors/accounts/index.php?action=updateAccount'>Account Management</a></p>";
                echo "<p>Use the link below to manage inventory.</p>";
                echo "<p><a href='/phpmotors/vehicles/index.php?action=classification'>Vehicle Management</a></p>";
            }
        ?>
    </main>

    <footer>
        <hr>
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
        ?>
    </footer>

</body>

</html>