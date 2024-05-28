<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //session_start();
    function creaTaula()
    {

        $parejas = array();
        for ($i = 128000; $i < 128060; $i++) {
            $parejas[] = $i;
        }
        shuffle($parejas);
        $tablaExterior = array();
        $parejas_mezcladas = array();
        for ($i = 0; $i < 10; $i++) {
            $parejas_mezcladas[] = $parejas[$i];
            $parejas_mezcladas[] = $parejas[$i];
            $tablaExterior[] = 0;
            $tablaExterior[] = 0;
        }
        shuffle($parejas_mezcladas);
        $_SESSION['arraynums'] = array();
        $_SESSION['tabla'] = $parejas_mezcladas;
        $_SESSION['tablaext'] = $tablaExterior;
    }

    function mostraTaula()
    {
        echo "<form method='post'>";
        echo "<table>";

        $contador = 0;

        for ($i = 0; $i < 4; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 5; $j++) {

                if ($_SESSION['tablaext'][$contador] == 0) {
                    echo "<td>";
                    echo "<button type='submit' name='juga' value=" . $contador . "> &#128070</button";
                    echo "</td>";
                } else {
                    echo "<td>";
                    echo "<button type='submit' name='juga' value=" . $contador . "> &#".$_SESSION['tabla'][$contador]."</button";
                    echo "</td>";
                }

                $contador++;
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "<br><br>";

        echo "<button type='submit' name='reset' value='reset'>Començar nova partida</button>";
        echo "</form>";
    }

    ?>
</body>

</html>