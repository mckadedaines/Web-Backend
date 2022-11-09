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
       <h1>Login</h1>

       <?php
        if (isset($message)) {
             echo $message;
        }
        ?>

       <form action="/login.php" class="form">
        <label for="email">Email: </label><br>
        <input type="email" id="email" name="email" <?php if(isset($clientEmail)){echo "value=$clientEmail";}?> required><br><br>
        <label for="password">Password: </label><br>
        <input type="password" id="password" name="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>
        <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character.</span><br><br>
        <input type="submit" value="Submit">
        <input type="hidden" name="action" value="clientLogin">
       </form>

       <div id="sign_up">
        <p>No account?</p>
        <a href="/phpmotors/accounts/index.php?action=register">Sign up!</a>
       </div>
    </main>

    <footer>
        <hr>
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
        ?>
    </footer>

</body>

</html>