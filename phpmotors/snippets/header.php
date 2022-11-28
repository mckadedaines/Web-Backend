<?php
    echo "<img class='logo' src='/phpmotors/images/site/logo.png' alt='logo'>";
    if(isset($_SESSION['loggedin'])){
        echo "<span class=cookieFirstname>Welcome</span>".$_SESSION['clientData']['clientFirstname'];
    }
    echo "<a id='account' href='/phpmotors/accounts/index.php?action=login'>My account</a>";
?>