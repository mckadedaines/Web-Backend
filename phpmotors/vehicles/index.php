<?php
// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/vehicles-model.php';

$classifications = getClassifications();
// var_dump($classifications);
// exit;

// Build a navigation bar using the $classifications array
$navList = '<nav id="navbar"><ul>';
$navList .= "<li><a class='nav' href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
 $navList .= "<li><a class='nav' href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul></nav>';

$class_select = '<select name="car_classification">';
foreach ($classifications as $classification) {
    $class_select .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>";
   }
   $class_select .= '</select>';

   
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
$action = filter_input(INPUT_GET, 'action');
}
switch ($action){
    case 'classification_page':
        include '../view/addClassification.php';
    break;

    case 'add_classification':
        $class_name = filter_input(INPUT_POST, 'class_name');

        if(empty($class_name)){
            $message = "Sorry please enter something";
            include '../view/addClassification.php';
            exit;
        }

        $class_outcome = class_outcome($class_name);

        if($class_outcome === 1){
            $message = "Classification added successfully!";
            // include '../view/addClassification.php';
            header('Location: /phpmotors/vehicles/index.php?action=classification_page');
        }
        else {
            $message = "Please try again later";
            include '../view/addClassification.php';
        }

    break;

    default:
    // echo $class_select;
    include '../view/vehicle-mang.php';
    // include 'view/home.php';
    }
?>