<?php
    $dane = array($_POST['marka'], $_POST['model'], $_POST['cena'], $_POST['rok_produkcji'], $_POST['przebieg'], $_POST['moc_silnika'], $_POST['paliwo'], $_POST['skrzynia'], $_POST['kraj'], $_POST['kolor'], $_POST['stan'], $_POST['wypadkowy'], $_POST['kategoria'], $_POST['nadwozie']);
    
    print_r($dane);

    for($i = 0; $i < count($dane); $i++){
        if($dane[$i] == 0 || $dane[$i] == "0"){
            //echo $dane[$i];
            //exit("Nie podano wszystkich wartosci");
        }
    }
    $conn = mysqli_connect("localhost", "root", "", "");

    $sql = "INSERT INTO `samochod` (`id_marka`, `id_model`, `cena`, `rok_produkcji`, `przebieg`, `moc_silnika`, `id_paliwo`, `skrzynia_biegow`, `id_kraj_pochodzenia`, `id_kolor`, `stan_techniczny`, `wypadkowy`, `id_kategoria`, `id_nadwozie`) VALUES 
    ($dane[0], $dane[1], $dane[2], $dane[3], $dane[4], $dane[5], $dane[6], $dane[7], $dane[8], $dane[9], $dane[10], $dane[11], $dane[12], $dane[13]);";
    
    $query = mysqli_query($conn, $sql);
    mysqli_close($conn);
?>