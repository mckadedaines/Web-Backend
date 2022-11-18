<?php
    echo "<img class='logo' src='/phpmotors/images/site/logo.png' alt='logo'>";
    if(isset($cookieFirstname)){
        echo "<span class=cookieFirstname>Welcome $cookieFirstname</span>";
    }
    echo "<a id='account' href='/phpmotors/accounts/index.php?action=login'>My account</a>";
?>