<?php
$conn = mysqli_connect("localhost", "root", "", "komis_samochodowy");

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signin'])){ //sprawdzenie czy formularz zostal wyslany
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `uzytkownicy` WHERE `email` = '".$email."';";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) == 0){ //czy login istnieje
        echo "Nieprawidlowy login!";
    }
    else{
        $sql = "SELECT * FROM `uzytkownicy` WHERE `haslo` = '".$password."' AND `email` = '".$email."';";
        if(mysqli_num_rows(mysqli_query($conn, $sql)) == 0){ //czy haslo zgadza sie z emailem
            echo "Nieprawidlowe haslo!";
        }
        else{   //poprawne zalogowanie
            "super, zalogowane";
        }
    }
    
} 

mysqli_close($conn);
?>