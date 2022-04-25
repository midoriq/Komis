<?php 
    session_start();
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 20)) {
        // last request was more than 30 minutes ago
        session_unset();     // unset $_SESSION variable for the run-time 
        session_destroy();   // destroy session data in storage
        header("Location: komis_start.html");
    }
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Oferta</title>
        <style>
            body {
                background-color: #94b49f;
            }
        </style>
    </head>
    <body>
        <?php
            if(isset($_SESSION['User'])){
                echo "<h1>Witam na stronie".$_SESSION['User']."!</h1><br>";
                echo "<a href = 'logout.php?logout'>Log out</a>";
            }
            else{
                header("Location: komis_start.html");
            }
        ?>
    </body>
</html>
