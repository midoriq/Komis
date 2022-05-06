<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Logowanie</title>
</head>
<body>
     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label>Podaj email: </label>
            <input type="email" name="email"><br>
            <label>Podaj haslo: </label>
            <input type="password" name="password"><br>
            <button type="submit" name = "signin">Sign in</button>
     </form>

     <?php
          include("logowanie.php");
     ?>
</body>
</html>