<?php
// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';

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
    case 'login':
        include '../view/login.php';
    break;

    case 'register':
        include '../view/register.php';
    break;

    case 'success':
        // echo 'You are in the case statement.';
        if (isset($message)) {
            //  echo $message;
            $clientFirstname = filter_input(INPUT_POST, 'clientFirstname');
            $clientLastname = filter_input(INPUT_POST, 'clientLastname');
            $clientEmail = filter_input(INPUT_POST, 'clientEmail');
            $clientPassword = filter_input(INPUT_POST, 'clientPassword');
        }

        if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($clientPassword)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/register.php';
            exit;
        }

        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword);

        if($regOutcome === 1){
            $message = "<p>Thank you for registering $clientFirstname. Please use your email and password to login.</p>";
            include '../view/register.php';
            exit;
        } 
        else {
            $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
            include '../view/register.php';
            exit;
        }
        break;

    default:
    echo "default";
    // include 'view/home.php';
    }
?>