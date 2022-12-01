<?php
// Create or access a Session
session_start();
// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/vehicles-model.php';
// Gets the functions
require_once '../library/functions.php';

$classifications = getClassifications();
$classificationList = buildClassificationList($classifications);
// var_dump($classifications);
// exit;

$navList = buildNav($classifications);

$class_select = '<select name="classificationId">';
foreach ($classifications as $classification) {
    $class_select .= "<option value='$classification[classificationId]'";
    if(isset($classificationId)){
        if($classification['classificationId'] === $classificationId){
            $class_select .= 'selected';
        }
    }
    $class_select .= "> $classification[classificationName]</option>";
   }
   $class_select .= '</select>';

   
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if ($action == NULL){
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}
switch ($action){
    case 'classification_page':
        include '../view/addClassification.php';
        
        break;

    case 'add_classification':
        $class_name = trim(filter_input(INPUT_POST, 'class_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

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

    case 'addVehicle_page':
        include '../view/addVehicle.php';

        break;

    case 'add_vehicle':
        $car_make = trim(filter_input(INPUT_POST, 'car_make', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $car_model = trim(filter_input(INPUT_POST, 'car_model', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $car_description = trim(filter_input(INPUT_POST, 'car_description', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $car_image = trim(filter_input(INPUT_POST, 'car_image', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $car_thumbnail = trim(filter_input(INPUT_POST, 'car_thumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $car_price = trim(filter_input(INPUT_POST, 'car_price', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_ALLOW_FRACTION));
        $car_stock = trim(filter_input(INPUT_POST, 'car_stock', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $car_color = trim(filter_input(INPUT_POST, 'car_color', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        if(empty($car_make) || empty($car_model) || empty($car_description) || empty($car_image) || empty($car_thumbnail) || empty($car_price) || empty($car_stock) || empty($car_color)){
            $message = "Sorry please enter all the information<br><br>";
            include '../view/addVehicle.php';
            exit;
        }

        $vehicle_outcome = vehicle_outcome($car_make, $car_model, $car_description, $car_image, $car_thumbnail, $car_price, $car_stock, $car_color, $classificationId);

        if($vehicle_outcome === 1){
            $message = "Vehicle added!<br><br>";
            header('Location: /phpmotors/vehicles/index.php?action=addVehicle_page');
        }
        else {
            $message = "Please try again later.";
            include '../view/addVehicle.php';
        }

        break;

    case 'getInventoryItems':
        // Get the classificationId 
        $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT); 
        // Fetch the vehicles by classificationId from the DB 
        $inventoryArray = getInventoryByClassification($classificationId); 
        // Convert the array to a JSON object and send it back 
        echo json_encode($inventoryArray); 
        break;


    case 'mod':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
        $invInfo = getInvItemInfo($invId);
        if(count($invInfo) < 1){
            $message = 'Sorry, no vehicle information could be found.';
           }
        include '../view/vehicle-update.php';
        exit;
    break;

    default:
    include '../view/vehicle-mang.php';
        break;
    }
