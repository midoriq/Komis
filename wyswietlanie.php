<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Oferta samochody</title>
</head>
<body>
     <?php
          $conn = mysqli_connect("localhost", "root", "", "komis2");

          $sql = "SELECT marka.marka, model.model, `zdjecie` FROM `samochod` INNER JOIN marka ON marka.id = samochod.id_marka INNER JOIN model ON model.id = samochod.id_model";

          $query = mysqli_query($conn, $sql);

          if(mysqli_num_rows($query) > 0){
               while($row = mysqli_fetch_row($query)){ ?>
                    <img width = "200" src="data:image/jpg; charset=utf8; base64,<?php echo base64_encode($row[2]); ?>" /> <br>
                    <h2><?php echo $row[0]." ".$row[1];  ?></h2>
               <?php } 
          }

          mysqli_close($conn);
     ?>
</body>
</html>