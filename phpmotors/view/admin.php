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
        
        <h1>Welcome <?php echo $_SESSION['clientData']['clientFirstname'] . ' ' . $_SESSION['clientData']['clientLastname']; ?></h1>
        <ul>
            <li>First Name: <?php echo $_SESSION['clientData']['clientFirstname'] ?></li>
            <li>Last Name: <?php echo $_SESSION['clientData']['clientLastname'] ?></li>
            <li>Email: <?php echo $_SESSION['clientData']['clientEmail'] ?></li>
        </ul>


        <?php 
                        echo "<h2>Administrative Functions</h2>";

            if(intval($_SESSION['clientData']['clientLevel']) >= 1){
                echo "<p>Use the link below to manage your account.</p>";
                echo "<p><a href='/phpmotors/accounts/index.php?action=updateAccount'>Account Management</a></p>";
            }
                if(intval($_SESSION['clientData']['clientLevel']) > 1){
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