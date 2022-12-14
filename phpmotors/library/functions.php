<?php
function checkEmail($clientEmail)
{
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
}

function checkPassword($clientPassword)
{
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
    return preg_match($pattern, $clientPassword);
}

function buildNav($classifications)
{
    // Build a navigation bar using the $classifications array
    $navList = '<nav id="navbar"><ul>';
    $navList .= "<li><a class='nav' href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
    foreach ($classifications as $classification) {
        $navList .= "<li><a class='nav' href='/phpmotors/vehicles/?action=classification&classificationName=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
    }
    $navList .= '</ul></nav>';

    return $navList;
}

// Build the classifications select list 
function buildClassificationList($classifications)
{
    $classificationList = '<select name="classificationId" id="classificationList">';
    $classificationList .= "<option>Choose a Classification</option>";
    foreach ($classifications as $classification) {
        $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>";
    }
    $classificationList .= '</select>';

    return $classificationList;
}

function buildVehiclesDisplay($vehicles)
{
    $dv = '<ul id="inv-display">';
    foreach ($vehicles as $vehicle) {
        $price = number_format($vehicle['invPrice'], 2, '.', ',');
        $dv .= '<li>';
        $dv .= "<a href='/phpmotors/vehicles/?action=vehicleView&invId=$vehicle[invId]'></a>";
        $dv .= "<img src='$vehicle[imgPath]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'>";
        $dv .= '<hr>';
        $dv .= "<a href='/phpmotors/vehicles/?action=vehicleView&invId=$vehicle[invId]'><h2>$vehicle[invMake] $vehicle[invModel]</h2></a>";
        $dv .= "<span> $ $price </span>";
        $dv .= '</li>';
    }
    $dv .= '</ul>';
    return $dv;
}

function buildVehicleDisplay($vehicle)
{
    $vehicle['invPrice'] = number_format($vehicle['invPrice']);

    $dv = "<h1>$vehicle[invMake] $vehicle[invModel]</h1><br>";
    $dv .= '<div class="vehicle-details">';
    $dv .= "<div id='vehicle-img'>";
    $dv .= "<img src='$vehicle[imgPath]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'>";
    $dv .= '</div><br>';
    $dv .= "<p id='vehicle-price'>Price: $$vehicle[invPrice]</p><br>";
    $dv .= "<h2 id='vehicle-title'>$vehicle[invMake] $vehicle[invModel] Details</h2><br>";
    $dv .= "<p id='vehicle-description'>$vehicle[invDescription]</p><br>";
    $dv .= "<p id='vehicle-color'>Color: $vehicle[invColor]</p><br>";
    $dv .= '</div>';
    return $dv;
}