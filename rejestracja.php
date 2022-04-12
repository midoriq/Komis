<!--        --------------  REJESTRACJA  --------------        -->
<?php
$conn = mysqli_connect("localhost", "root", "", "komis_samochodowy");

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])){
    $imie = ucfirst( $_POST['imie']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    // walidacja

    $sql = "SELECT * FROM `uzytkownicy` WHERE `email` = '".$email."';";
    $qry = mysqli_query($conn, $sql);

    if(mysqli_num_rows($qry) == 0){ // czy email istnieje w bazie danych

    }
    else{
        echo "Email jest juz zajety!";
    }
}

mysqli_close($conn);
?>