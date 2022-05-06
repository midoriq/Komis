<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Oferta samochody</title>
     <link rel="stylesheet" href="styl.css">
</head>

<body>
     <?php

          $conn = mysqli_connect("localhost", "root", "", "komis2");

          //---------usuwanie auta------------
          if(isset($_POST['usun'])){
               $id = $_POST['id'];
               
               // ask for making sure if admin want to delete a car
               if ($_POST['confirm'] == 'true'){
                    echo "<script> alert('Samochod zostal pomyslnie usuniety');</script>";
                    $sql = "DELETE FROM `samochod` WHERE `id` = $id";

                    mysqli_query($conn, $sql);
               }
          }

          $sql = "SELECT samochod.id, marka.marka, model.model, samochod.`zdjecie` FROM `samochod` INNER JOIN marka ON marka.id = samochod.id_marka INNER JOIN model ON model.id = samochod.id_model";

          $query = mysqli_query($conn, $sql);

          

          if(mysqli_num_rows($query) > 0){
               $id = 0;
               while($row = mysqli_fetch_row($query)){ ?>
                    <img width = "200" src="data:image/jpg; charset=utf8; base64,<?php echo base64_encode($row[3]); ?>" /> <br>
                    <!-- ------- DO USUNIECIA SAMOCHODU Z WSZYSTKIMI INFORMACJAMI -->
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                         <input type="hidden" name="id" value = "<?php echo $row[0]; ?>">
                         <input type="hidden" name="confirm" class = "confirm" value = "default">
                         <button onclick = "confirmDelete('<?php echo $id; ?>', '<?php echo $row[1]; ?>', '<?php echo $row[2]; ?>')" class = 'admin' type = "submit" name = "usun">x</button>
                    </form>
                    <h2><?php echo $row[1]." ".$row[2];  ?></h2>
                    
               <?php $id++; } 
          }

          mysqli_close($conn);
     ?>


          <script src="app.js"></script>
</body>
</html>