<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Rejestracja</title>
</head>
<body>
     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <label>Podaj imie: </label>
          <input type="text" name="imie"><br>
          <label>Podaj email: </label>
          <input type="email" name="email"><br>
          <label>Podaj haslo: </label>
          <input type="password" name="password"><br>
          <label>Powtorz haslo: </label>
          <input type="password" name="password2"><br>
          <button type="submit" name = "signup">Sign in</button>
     </form>

     <?php 
          include("rejestracja.php");
     ?>
</body>
</html>