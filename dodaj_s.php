<?php
    //aaa wszystko z danych
    $marka = $_POST['marka'];
    



    $conn = mysqli_connect("localhost", "root", "", "");

    $sql = "INSERT INTO `samochod` (`id`, `id_marka`, `id_model`, `cena`, `rok_produkcji`, `przebieg`, `moc_silnika`, `id_paliwo`, `skrzynia_biegow`, `id_kraj_pochodzenia`, `id_kolor`, `stan_techniczny`, `wypadkowy`, `id_kategoria`, `id_nadwozie`) VALUES (NULL, \'5\', \'5\', \'10000\', \'2013\', \'80000\', \'100\', \'2\', \'Manualna\', \'3\', \'6\', \'uszkodzony\', \'1\', \'1\', \'4\');";

    mysqli_close($conn);
?>