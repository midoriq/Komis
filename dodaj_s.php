<?php
    // adding a image to database
    if(!empty($_FILES["image"]["name"])){
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);


        //dozwol tylko konretne typy zdjec
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if(in_array($fileType, $allowTypes)){
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        }
    }
    else{
        exit();
    }


    $dane = array($_POST['marka'], $_POST['model'], $_POST['cena'], $_POST['rok_produkcji'], $_POST['przebieg'], $_POST['moc_silnika'], $_POST['paliwo'], $_POST['skrzynia'], $_POST['kraj'], $_POST['kolor'], $_POST['stan'], $_POST['wypadkowy'], $_POST['kategoria'], $_POST['nadwozie']);

    /*
    for($i = 0; $i < count($dane); $i++){
        if($dane[$i] == 0 || $dane[$i] == "0"){
            //echo $dane[$i];
            //exit("Nie podano wszystkich wartosci");
        }
    }
    */
    $conn = mysqli_connect("localhost", "root", "", "komis2");

    $sql = "INSERT INTO `samochod` (`id_marka`, `id_model`, `cena`, `rok_produkcji`, `przebieg`, `moc_silnika`, `id_paliwo`, `skrzynia_biegow`, `id_kraj_pochodzenia`, `id_kolor`, `stan_techniczny`, `wypadkowy`, `id_kategoria`, `id_nadwozie`, `zdjecie`) VALUES ('".$dane[0]."', '".$dane[1]."', '".$dane[2]."', '".$dane[3]."', '".$dane[4]."', '".$dane[5]."', '".$dane[6]."', '".$dane[7]."', '".$dane[8]."', '".$dane[9]."', '".$dane[10]."', '".$dane[11]."', '".$dane[12]."', '".$dane[13]."', '".$image."');";

    if(mysqli_query($conn, $sql)){
        echo "Dodano samochod";
        header('Location: wyswietlanie.php');
    }
    else{
        echo "Cos poszlo nie tak";
    }
    mysqli_close($conn);

    
?>