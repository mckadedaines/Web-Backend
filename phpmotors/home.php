<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/mobile.css">
    <title>Home Page</title>
</head>
<body>
    <header>
        <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . '/snippets/header.php';
        ?>
    </header>

    <nav>
        <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . '/snippets/nav.php';
        ?>
    </nav>

    <main>
        <h1 id="welcome">Welcome to PHP Motors!</h1>

        <div class="info">
            <h2 class="info_p">DMC Delorean</h2>
            <p class="info_p">3 Cup holders</p>
            <p class="info_p">Superman doors</p>
            <p class="info_p">Fuzzy dice!</p>
        </div>

        <img id="car" src="images/delorean.jpg" alt="delorean">

        <div class="container">
            <button id="button">Own Today</button>
        </div>

        <div id="review">
            <h2>DMC Dolrean Reviews</h2>
            <ul id="list">
                <li class="bullet">"So fast its almost like travelingin time." (4/5)</li>
                <li class="bullet">"Coolest ride on the road." (4/5)</li>
                <li class="bullet">"I'm feeling like Marty Mcfly!" (5/5)</li>
                <li class="bullet">"The most futuristic ride of our day." (4.5/5)</li>
                <li class="bullet">"80's livin and I love it!" (5/5)</li>
            </ul>
        </div>

        <h2 id="upgrades">Delorean Upgrades</h2>

        <div id="upgrade_info">
            <img class="upgrade_img" src="images/upgrades/flux-cap.png" alt="flux cap">
            <a class="upgrade_links" href="">Flux Capacitor</a>
            <img class="upgrade_img" src="images/upgrades/flame.jpg" alt="flame decals">
            <a class="upgrade_links" href="">Flame Decals</a>
            <img class="upgrade_img" src="images/upgrades/bumper_sticker.jpg" alt="bumper sticker">
            <a class="upgrade_links" href="">Bumper Stickers</a>
            <img class="upgrade_img" src="images/upgrades/hub-cap.jpg" alt="hub cap">
            <a class="upgrade_links" href="">Hub Caps</a>
        </div>
    </main>

    <footer>
        <hr>
        <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . '/snippets/footer.php';
        ?>
    </footer>
    
</body>
</html>