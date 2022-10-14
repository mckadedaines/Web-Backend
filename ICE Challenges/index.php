<?php

    $act = filter_input(INPUT_POST, 'act');
    if ($act == NULL){
        $act = filter_input(INPUT_GET, 'act');
    }
    switch ($act){
        case 'phpinfo':
            include 'activity/phpinfo.php';
            break;

        case 'bird':
            include 'activity/bird.php';
            break;

        default:
            include 'activity/404.php';
            break;
        }
?>