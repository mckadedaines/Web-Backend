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
        if(isset($message)){
            echo $message;
        }
        ?>

        <br><br><form action="/phpmotors/vehicles/index.php" method="POST">
        <?php
        echo $class_select;
        ?>           
            <br><br><lable for="car_make">Make:</lable>
            <input type="text" name="car_make" required><br><br>
            <label for="car_model">Model:</label>
            <input type="text" name="car_model"  required><br><br>
            <label for="car_description">Description:</label>
            <input type="text" name="car_description" required><br><br>
            <label for="car_image">Image Path:</label>
            <input type="text" name="car_image" value="/phpmotors/images/no-image.png" required><br><br>
            <label for="car_thumbnail">Thumbnail Path:</label>
            <input type="text" name="car_thumbnail" value="/phpmotors/images/no-image.png" required><br><br>
            <label for="car_price">Price:</label>
            <input type="number" name="car_price" required><br><br>
            <label for="car_stock"># in stock:</label>
            <input type="number" name="car_stock" required><br><br>
            <label for="car_color">Color:</label>
            <input type="text" name="car_color" required><br><br>
            <button type="submit">Add Vehicle</button>
            <input type="hidden" name="action" value="add_vehicle">
    </main>

    <footer>
        <hr>
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
        ?>
    </footer>

</body>

</html>