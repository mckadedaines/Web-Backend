<?php
// Get the database connection file
require_once 'library/connections.php';
// Get the PHP Motors model for use as needed
require_once 'model/main-model.php';

$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList = '<nav id="navbar"><ul>';
$navList .= "<li><a class='nav' href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
 $navList .= "<li><a class='nav' href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul></nav>';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
$action = filter_input(INPUT_GET, 'action');
}
switch ($action){
    case 'server error':
        include 'view/500.php';

    break;
        
    default:
    include 'view/home.php';
    }
?>