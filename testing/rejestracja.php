<!--        --------------  REJESTRACJA  --------------        -->
<?php
$conn = mysqli_connect("localhost", "root", "", "komis_samochodowy");

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])){
    $imie = ucfirst( $_POST['imie']); // zamiana znakow zeby zaczynaly sie z wielkiej litery
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $sql = "SELECT * FROM `uzytkownicy` WHERE `email` = '".$email."';";
    $qry = mysqli_query($conn, $sql);

    if(mysqli_num_rows($qry) == 0){ // czy email istnieje w bazie danych
        if($password == $password2){ // hasla sa rowne
            $qry = mysqli_query($conn, "INSERT INTO `uzytkownicy` (`imie`, `email`, `haslo`) VALUES ('".$imie."', '".$email."', '".$password."');");
            // ----- TUTAJ PROSTA WALIDACJA HASLA I EMAILA -----
        
            //------ ZMIEŃ LOKALIZACJE DO STRONY LOGOWANIA -----    
            header("Location: log_in.php");
        }
        else{
            echo "Hasla nie sa rowne";
        }
    }
    else{
        echo "Email jest juz zajety!";
    }
}

mysqli_close($conn);
?>