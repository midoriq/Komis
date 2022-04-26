<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dodawanie samochodow</title>
    <script src="skrypt1.js"></script>
</head>
<body>
    <?php
        $conn = mysqli_connect("localhost", "root", "", "komis_samochodowy");
    ?>
    <!--    marka, model, cena, rok produkcji, przebieg, moc silnika,
            paliwo, skrzynia biegow, kraj pochodzenia, kolor, stan techniczny,
            wypadkowy, kategoria, nadwozie
    -->
    <h2>Dodaj nowy samochod do bazy danych</h2>
    <form action="dodaj_s.php" method="post">
        <select name="marka" id = "marka" onchange = "zmien(this)">
            <option value="0" >-- Wybierz marke --</option>
            <?php
                $sql = "SELECT `id`, `marka` FROM `marka`;";
                $query = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_row($query)){
                    echo "<option value = '".$row[0]."'>".$row[1]."</option>";
                }
            ?>

        </select> <br>

        <select name="model" id = "model">
            <option value="0">-- Wybierz model --</option>
            <?php
                $sql = "SELECT `id`, `model` FROM `model`;";
                $query = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_row($query)){
                    echo "<option value = '".$row[0]."'>".$row[1]."</option>";
                }
            ?>
        </select><br>

        <label>Cena</label>
        <input type="number" name="cena" min = "0"> <br>

        <label>Przebieg</label>
        <input type="number" name="przebieg" min = "1000" max = "200000"> <br>

        <label>Rok produkcji</label>
        <input type="number" name="rok_produkcji" min = "1960" max = "2022"> <br>

        <label>Moc silnika</label>
        <input type="number" name="moc_silnika" min = "40" max = "200"> <br>

        <select name="paliwo">
            <option value="0">-- Wybierz typ paliwa --</option>
            <?php
                $sql = "SELECT `id`, `paliwo` FROM `paliwo`;";
                $query = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_row($query)){
                    echo "<option value = '".$row[0]."'>".$row[1]."</option>";
                }
            ?>
        </select> <br>

        <select name="skrzynia">
            <option value="0">-- Wybierz skrzynie biegow --</option>
            <option value="Manualna">manualna</option>
            <option value="Automatyczna">automatyczna</option>
        </select> <br>

        <select name="kraj">
            <option value="0">-- Wybierz kraj pochodzenia --</option>
            <?php
                $sql = "SELECT `id`, `kraj_pochodzenia` FROM `kraj_pochodzenia`;";
                $query = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_row($query)){
                    echo "<option value = '".$row[0]."'>".$row[1]."</option>";
                }
            ?>
        </select> <br>

        <select name="kolor">
            <option value="0">-- Wybierz kolor --</option>
            <?php
                $sql = "SELECT `id`, `kolor` FROM `kolor`;";
                $query = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_row($query)){
                    echo "<option value = '".$row[0]."'>".$row[1]."</option>";
                }
            ?>
        </select> <br>

        <select name="stan">
            <option value="default">-- Wybierz stan samochodu --</option>
            <option value="uszkodzony">uszkodzony</option>
            <option value="nieuszkodzony">nieuszkodzony</option>
        </select> <br>

        <select name="wypadkowy">
            <option value="wypadkowy">wypadkowy</option>
            <option value="niewypadkowy">niewypadkowy</option>
        </select> <br>

        <select name="kategoria">
            <option value="default">-- Wybierz kategorie --</option>
            <?php
                $sql = "SELECT `id`, `kategoria` FROM `kategoria`;";
                $query = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_row($query)){
                    echo "<option name = '".$row[0]."'>".$row[1]."</option>";
                }
            ?>
        </select> <br>

        <select name="nadwozie">
            <option value="default">-- Wybierz nadwozie --</option>
            <?php
                $sql = "SELECT `id`, `nadwozie` FROM `nadwozie`;";
                $query = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_row($query)){
                    echo "<option name = '".$row[0]."'>".$row[1]."</option>";
                }
            ?>
        </select> <br>

        <input type="submit" value="Dodaj">
    </form>

    <?php
        mysqli_close($conn);
    ?>
</body>
</html>