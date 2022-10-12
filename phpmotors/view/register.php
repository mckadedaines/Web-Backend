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
       <form action="/register.php" class="form">
        <label for="fname">First Name: </label><br>
        <input type="text" id="fname" name="fname"><br><br>
        <label for="lname">Last Name: </label><br>
        <input type="text" id="lname" name="lname"><br><br>
        <label for="email">Email: </label><br>
        <input type="text" id="email" name="email"><br><br>
        <label for="password">Password: </label><br>
        <input type="text" id="password" name="password"><br><br>
        <input type="submit" id="submit" name="submit"><br><br>
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