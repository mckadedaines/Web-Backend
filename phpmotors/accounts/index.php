<?php
// Create or access a Session
session_start();
// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
// Validates the email
require_once '../library/functions.php';

$classifications = getClassifications();

$navList = buildNav($classifications);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if ($action == NULL){
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}
switch ($action){
    case 'login':
        include '../view/login.php';
        break;

    case 'register':
        include '../view/register.php';
        break;

    case 'clientLogin':

        $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientEmail = checkEmail($clientEmail);
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $checkPassword = checkPassword($clientPassword);

        if(empty($clientEmail) || empty($clientPassword)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/login.php';
            exit;
        }

        // Query the client data based on the email address
        $clientData = getClient($clientEmail);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if(!$hashCheck) {
        $message = '<p class="notice">Please check your password and try again.</p>';
        include '../view/login.php';
        exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        // Send them to the admin view
        include '../view/admin.php';
        exit;

        break;

    case 'success':

            $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
            $clientEmail = checkEmail($clientEmail);
            $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $checkPassword = checkPassword($clientPassword);

        // Checking for an existing email
        $existingEmail = checkExistingEmail($clientEmail);

        if($existingEmail){
            $message = '<p class="notice">That email address already exists. Do you want to login?</p>';
            include '../view/login.php';
            exit;
        }

        if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/register.php';
            exit;
        }

        // Hashes the clients password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

        if($regOutcome === 1){
            setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
            $_SESSION['message'] = "Thanks for registering $clientFirstname. Please use your email and password to login.";
            header('Location: /phpmotors/accounts/?action=login');
            exit;
        } 
        else {
            $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
            include '../view/register.php';
            exit;
        }
        break;

        case'admin':
            include '../view/admin.php';
            break;

    default:
    include 'view/home.php';

    break;
    }
?>