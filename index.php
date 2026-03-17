<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styl.css" type="text/css">
</head>

<body>
    <nav>
        <ul>
            <li>
                <a href="wczasy.html">Wczasy</a>
            </li>
            <li>
                <a href="wycieczki.html">Wycieczki</a>
            </li>
            <li>
                <a href="allinclusive.html">All inclusive</a>
            </li>
        </ul>
    </nav>
    <main>
        <aside>
            <h3>Twój cel wycieczki</h3>
            <label for="miejsce">Miejsce wycieczki</label>
            <form action="#" name="miejsce" method="post">
                <select>
                    <?php
                    $con = new mysqli("localhost", "root", "", "wyprawy");
                    $zapitanie1 = "SELECT nazwa FROM miejsca ORDER BY nazwa ASC;";
                    $result = $con->query($zapitanie1);

                    while($wiersz = $result -> fetch_assoc()){
                        echo "<option>" . $wiersz["nazwa"] . "</option>";
                    }
                    ?>
                    <!-- scrypt 1 -->
                </select>
            </form>
            <label for="dorosly">Ile dorosłych?</label>
            <input type="number" name="dorosly" method="post">
            <label for="dzieci">Ile dzieci?</label>
            <input type="number" name="dzieci" method="post">
            <label for="data">Termin</label>
            <input type="date" name="data" method="post">
            <button type="submit">Symulacja ceny</button>
            <h4>Koszt wycieczki</h4>
            <?php
            $miejsceW = $_POST["nazwa"];
              if(isset($_POST["miejsce"]) && isset($_POST["dorosly"]) && isset($_POST["dzieci"]) && isset($_POST["data"])){
                   $zapitanie2 = "SELECT cena FROM miejsca WHERE nazwa = '$miejsceW'";
                   $result2 = $con -> query($zapitanie2);
                   $dorosle = $_POST["dorosly"];
                   $dzieci = $_POST["dzieci"];
              }
            ?>
            <!-- efect scryptu 2 -->
        </aside>
        <section>
            <h3>Wycieczki</h3>
            <?php
            $zapitanie3 = "SELECT nazwa, cena, link_obraz FROM miejsca WHERE link_obraz LIKE '0%';";
            $result3 = $con->query($zapitanie3);

            while($wiersz2 = $result -> fetch_assoc()){
                echo "<img src=".$result3["link_obraz"]." class='wycieczka' alt='obrazy z wycieczki'>" . "<h2 class='wycieczka>".$result3["nazwa"]."</h2>" . "<p class='wycieczka'>".$result3["cena"]."</p>";
            }
            ?>
            <!-- efect działania scryptu 3 -->
        </section>
    </main>
    <footer>
        <p>autor: kaka</p>
    </footer>
</body>

</html>
<?php
$con->close();
?>
