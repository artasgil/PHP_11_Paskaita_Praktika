<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knygų biblioteka</title>
    <style>
        body {
            background-color: #fff;
            padding: 20px;
        }

        .top-information,
        .bottom-information {
            padding: 0 20px;
        }

        td,
        th {
            text-align: left;
            border: 1px solid black;
        }

        table tbody tr:hover,
        table tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body>
    <div class='button-block'>
        <form action="knygubiblioteka.php" method="get">
            <button type="submit" name="visos">visos kategorijos</button>
            <button type="submit" name="Kategorija0">Kategorija0</button>
            <button type="submit" name="Kategorija1">Kategorija1</button>
            <button type="submit" name="Kategorija2">Kategorija2</button>
            <button type="submit" name="Kategorija3">Kategorija3</button>
            <button type="submit" name="Kategorija4">Kategorija4</button>
        </form>

        <?php
        $category = "";
        if (isset($_GET["Kategorija0"])) {
            $category = "kategorija0";
        } else if (isset($_GET["Kategorija1"])) {
            $category = "kategorija1";
        } else if (isset($_GET["Kategorija2"])) {
            $category = "kategorija2";
        } else if (isset($_GET["Kategorija3"])) {
            $category = "kategorija3";
        } else if (isset($_GET["Kategorija4"])) {
            $category = "kategorija4";
        }

        $knygos = [];

        //atsakingas uz kategorijas
        for ($i = 0; $i < 5; $i++) {

            // $kategorija= "Kategorija".$i;

            $kategorija = [];


            //atsakingas uz knygas
            $atsitiktinis = rand(5, 15);
            for ($j = 0; $j < $atsitiktinis; $j++) {
                $kategorija[$j] = array(
                    "pavadinimas" => "Knyga" . $i . $j,
                    "autorius" => "Autorius" . $j,
                    "puslapiu skaicius" => rand(1, 100),
                    "kategorija" => "kategorija" . $i
                );
            }


            $knygos["kategorija" . $i] = $kategorija;
        }

        // var_dump($knygos);

        // echo "<table>";
        // //Suskaiciuojam kiek is viso yra kategoriju
        // for ($i=0; $i <count($knygos); $i++) {   //einame per kategorijas

        //     // var_dump($knygos["kategorija".$i]);


        //     for($j = 0; $j<count($knygos["kategorija".$i]); $j++) {  //einame per knygas
        //         echo "<tr>";
        //         echo "<td>".$knygos["kategorija".$i][$j]["pavadinimas"]."</td>";
        //         echo "<td>".$knygos["kategorija".$i][$j]["autorius"]."</td>";
        //         echo "<td>".$knygos["kategorija".$i][$j]["kategorija"]."</td>";
        //         echo "</tr>";
        //     }
        // }

        // echo "</table>";

        //2 BUDAS
        echo "<div>";
        echo '<table id="hoverable-data-table" class="table hover nowrap" style="width:100%">';
        echo "<thead>";
        echo "<th>Knygos pavadinimas</th>";
        echo "<th>Autorius</th>";
        echo "<th>Puslapiu skaicius</th>";
        echo "<th>Kategorija</th>";
        echo "</thead>";
        foreach ($knygos as $kategorija) {
            foreach ($kategorija as $knyga) {
                if (isset($_GET["visos"])) {
                    $category = $knyga["kategorija"];
                }
                if ($knyga["kategorija"] == $category) {
                    echo "<tr>";
                    echo "<td>" . $knyga["pavadinimas"] . "</td>";
                    echo "<td>" . $knyga["autorius"] . "</td>";
                    echo "<td>" . $knyga["puslapiu skaicius"] . "</td>";

                    echo "<td>" . $knyga["kategorija"] . "</td>";
                    echo "</tr>";
                }
            }
        }

        echo "</table>";
        echo "</div>";

        ?>
</body>

</html>