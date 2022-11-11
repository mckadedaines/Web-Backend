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
        // require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php';
        echo $navList;
        ?>
    </nav>

    <main>
       <form action="/phpmotors/index.php" method="POST">
        <label for="news_first">First Name:</label>
        <input id="news_first" name="news_first" type="text" placeholder="First Name"><br><br>
        <label for="news_last">Last Name:</label>
        <input id="news_last" name="news_last" type="text" placeholder="Last Name"><br><br>
        <label for="news_email">Email:</label>
        <input id="news_email" name="news_email" type="email" placeholder="Email"><br><br>
        <button type="submit">Submit</button>
        <input type="hidden" name="action" value="news">
       </form>
    </main>

    <?php
        if ($_SESSION['loggedin']){
                $firstname = $_SESSION['clientData']['clientFirstname'];
                $lastname = $_SESSION['clientData']['clientLastname'];
                $email = $_SESSION['clientData']['clientEmail'];
                echo $firstname, $lastname, $email;
            }
            ?>

    <footer>
        <hr>
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
        ?>
    </footer>

</body>

</html>