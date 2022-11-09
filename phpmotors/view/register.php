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
        <?php
        if (isset($message)) {
             echo $message;
        }
        ?>

       <form method="POST" action="/phpmotors/accounts/index.php" class="form">
        <label for="fname">First Name: </label><br>
        <input type="text" id="fname" name="clientFirstname" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";} ?> required><br><br>
        <label for="lname">Last Name: </label><br>
        <input type="text" id="lname" name="clientLastname" <?php if(isset($clientLastname)){echo "value='$clientLastname'";} ?> required><br><br>
        <label for="email">Email: </label><br>
        <input type="email" id="email" name="clientEmail" <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?> required><br><br>
        <label for="password">Password: </label><br>
        <input type="password" id="password" name="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>
        <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character.</span><br><br>
        <input type="submit" value="Submit" id="regButton" value="Register"><br><br>
        <!-- Add the action name - value pair -->
        <input type="hidden" name="action" value="success">
       </form>
    </main>

    <footer>
        <hr>
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
        ?>
    </footer>

</body>

</html>