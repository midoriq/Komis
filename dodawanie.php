<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dodaj wiersze do bazy danych</title>
</head>
<body>
    <h1>Dodaj kolor</h1>
    <form action="dodawanie.php" method="post">
        <label for="kolor">Dodaj kolor: </label>
        <input type="text" name = "kolor">
        <input type="submit" name = 'submit'>
    </form>
    <?php 
     $conn = mysqli_connect('localhost','root', '', 'komis_samochodowy') or die("Error");

     if(isset($_POST['submit'])){
        $kolor =  $_POST['kolor'];

        $ifExists = "SELECT * FROM kolor WHERE 'kolor' = '".$kolor."'";
        
        if(mysqli_num_rows(mysqli_query($conn, $ifExists)) > 0){
            echo "Kolor juz istnieje";
        }
        else {
           $sql = "INSERT INTO `kolor` (`kolor`) VALUES ('".$kolor."')";
           // INSERT INTO `kolor` (`kolor`) VALUES ('srebrny');
           mysqli_query($conn, $sql);
           echo "Do bazy danych dodano nowy kolor";
        }
     }


     mysqli_close($conn);
    ?>
</body>
</html>