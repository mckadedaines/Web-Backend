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
        <input type="text" id="email" name="email"><br><br>
        <label for="password">Password: </label><br>
        <input type="text" id="password" name="password"><br><br>
        <input type="submit" value="Submit">
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