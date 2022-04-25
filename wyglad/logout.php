<?php
     session_start();
     if(isset($GET['logout'])){
          session_destroy();
          header("Location: komis_start.html");
     }
     else{
          header("Location: komis_start.html");
     }
?>