<?php
// Create or access a Session
session_start();
// Get the database connection file
require_once 'library/connections.php';
// Get the PHP Motors model for use as needed
require_once 'model/main-model.php';
// Get the news letter model
require_once 'model/news_letter-model.php';

$classifications = getClassifications();

$navList = buildNav($classifications);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if ($action == NULL){
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}
switch ($action){
    case 'news':
        include 'view/newsletter.php';
        // Filter and store the data
        $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $existingEmail = checkExistingEmail($clientEmail);
        // Check for existing email address in the table
        if($existingEmail){
            $message = "<p class='alerta'>It looks like you have already signup. Look for it on your email.</p>";
            include '../view/home.php';
            exit;
        }
        // Validate email and password
        $clientEmail = checkEmail($clientEmail);
        // Check for missing data
        if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)){
            $message = "<p class='alerta'>Please provide information for all empty form fields.</p>";
            include '../view/newsletter.php';
            exit; 
        }
        // Send the data to the model
        $regOutcome = regNews($clientFirstname, $clientLastname, $clientEmail);
        // Check and report the result
        if($regOutcome === 1){
            setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
            $message = "<p class='alerta'>Thanks for registering $clientFirstname. You will now receive our emails.</p>";
            include '../view/home.php';
            exit;
        } else {
            $message = "<p class='alerta'>Sorry but the registration failed. Please try again.</p>";
            include '../view/newsletter.php';
            exit;
        }
        break;
    }
?>