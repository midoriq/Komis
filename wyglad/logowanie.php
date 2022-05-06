<?php
$conn = mysqli_connect("localhost", "root", "", "komis2");

session_start();

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
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) == 0){ //czy haslo zgadza sie z emailem
            echo "Nieprawidlowe haslo!";
        }
        else{   //poprawne zalogowanie
            while($row = mysqli_fetch_row($query)){
                $_SESSION['User'] = $row[1]; //przypisz imie do User w sesji
                $_SESSION['Email'] = $email;
                $_SESSION['Admin'] = $row[4]; //sprawdz czy uzytkownik jest administratorem
            }
            header("Location: oferta.php");
        }
    }
    
} 

mysqli_close($conn);
?>