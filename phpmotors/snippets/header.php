<?php
    echo "<img class='logo' src='/phpmotors/images/site/logo.png' alt='logo'>";
    if(isset($_SESSION['loggedin'])){
        echo "<div class=cookieFirstname><a href='/phpmotors/accounts/index.php?action=admin' class=cookieFirstname>Welcome " .$_SESSION['clientData']['clientFirstname']."</a> |<a href='/phpmotors/accounts/index.php?action=logout' class=cookieFirstname'>Logout</a></div>";
    }
    else {
        echo "<a id='account' href='/phpmotors/accounts/index.php?action=login'>My account</a>";
    }
?>