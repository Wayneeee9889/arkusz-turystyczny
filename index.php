<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biuro turystyczne</title>
    <link rel="stylesheet" href="styl.css" type="text/css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="wczasy.html">Wczasy</a></li>
            <li><a href="wycieczki.html">Wysieczki</a></li>
            <li><a href="allinclusive.html">All inclusive</a></li>
        </ul>
    </nav>
    <main>
        <aside>
            <h3>Twój cel wyprawy</h3>
            <form action="index.php" method="post">
                <label>Miejsce wycieczki</label>
                <select name="miejsce">
                    <!-- scrypt 1 -->
                    <?php
                    $connect = new mysqli("localhost", "root", "", "wyprawy");
                    $zadanie1 = "SELECT nazwa FROM miejsca ORDER BY nazwa ASC;";
                    $odp = $connect->query($zadanie1);
                    while ($wiersz = $odp->fetch_assoc()) {
                        echo '<option>' . $wiersz["nazwa"] . '</option>';
                    };
                    ?>
                </select>
                <label for="dorosli">Ile dorosłych?</label>
                <input name="dorosli" type="number">
                <label for="dzieci">Ile dzieci?</label>
                <input name="dzieci" type="number">
                <label for="data">Termin</label>
                <input name="data" type="date">
                <button>Symulacja ceny</button>
                <!-- scrypt 2 -->
                <?php

                if (isset($_POST["miejsce"])) {
                    $miesceW = $_POST["miejsce"];
                    $pytanie2 = "SELECT cena FROM miejsca WHERE nazwa = $miejsceW ;";
                    $result = $connect->query($pytanie2);
                    $termin = $_POST["data"];
                    echo '<p>'.  $termin . '</p>'
                }
                ?>
                <h4>Koszt wycieczki</h4>
                <!-- efekt dziełania skryptu 2 -->
            </form>
        </aside>
        <section>
            <h3>Wycieczki</h3>
            <!-- efekt dziełania scryptu 3 -->
        </section>
    </main>
    <footer>
        <p>Autor: kaka</p>
    </footer>
</body>

</html>