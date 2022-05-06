<?php 
    session_start();
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
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
    </head>
    <body>
        <?php
            if(!isset($_SESSION['User'])){
                header("Location: komis_start.html");
                die();
            }


            echo "<h1>Witam na stronie ".$_SESSION['User']."!</h1><br>";
                echo "<h1>Twoj email to ".$_SESSION['Email']."!</h1><br>";
                echo "<h1>Czy jestes adminem? ".$_SESSION['Admin']."!</h1><br>";
                
                include("wyswietlanie.php");
                echo "<br><a href = 'logout.php?logout'>Log out</a><br>";
        ?>


        <?php
            if($_SESSION['Admin'] == 1){
                echo "<script>
                    document.querySelectorAll('.admin').forEach(a=>a.style.display = 'block');
                </script>";
            }
            else{
                echo "<script>
                    document.querySelectorAll('.admin').forEach(a=>a.style.display = 'none');
                </script>";
            }
        ?>
    </body>
</html>
