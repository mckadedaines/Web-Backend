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
        $price = '$' . number_format($vehicle['invPrice'], 2, '.', ',');
        $dv .= '<li>';
        $dv .= "<a href='/phpmotors/vehicles/?action=vehicle&invId=$vehicle[invId]'></a>";
        $dv .= "<img src='$vehicle[imgPath]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'>";
        $dv .= '<hr>';
        $dv .= "<a href='/phpmotors/vehicles/?action=vehicle&invId=$vehicle[invId]'><h2>$vehicle[invMake] $vehicle[invModel]</h2></a>";
        $dv .= "<span> $price </span>";
        $dv .= '</li>';
    }
    $dv .= '</ul>';
    return $dv;
}

function buildClassificationList($classifications)
{
    $classifList = '<select name="classificationId" id="classificationId">';
    $classifList .= "<option>Choose a Car Classification</option>";
    foreach ($classifications as $classification) {
        $classifList .= "<option value='$classification[classificationId]'";
        if (isset($classificationId)) {
            if ($classification['classificationId'] === $classificationId) {
                $classifList .= ' selected ';
            }
        } elseif (isset($invInfo['classificationId'])) {
            if ($classification['classificationId'] === $invInfo['classificationId']) {
                $classifList .= ' selected ';
            }
        }
        $classifList .= ">$classification[classificationName]</option>";
    }
    $classifList .= '</select>';

    return $classifList;
}
