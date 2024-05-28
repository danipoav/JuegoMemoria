<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Estilo/style.css">
</head>

<body>
    <h1>JOC DE LA MEMORIA</h1>
    <?php
    session_start();
    include("./Funciones.php");

    if(isset($_POST['juga'])){
        $num = $_POST['juga'];

        if($_SESSION['tablaext'][$num] == 0){
            $_SESSION['tablaext'][$num] = 1;
            $_SESSION['arraynums'][] = $num;

            if(count($_SESSION['arraynums']) == 3){
                if($_SESSION['tabla'][$_SESSION['arraynums'][0]] == $_SESSION['tabla'][$_SESSION['arraynums'][1]]){
                    $_SESSION['tablaext'][$_SESSION['arraynums'][0]] = 2;
                    $_SESSION['tablaext'][$_SESSION['arraynums'][1]] = 2;
                } else {
                    $_SESSION['tablaext'][$_SESSION['arraynums'][0]] = 0;
                    $_SESSION['tablaext'][$_SESSION['arraynums'][1]] = 0;
                }
                $numero3 = $_SESSION['arraynums'][2];
                $_SESSION['arraynums'] = [];
                $_SESSION['arraynums'][0] = $numero3;
            }
        }
    
        if(isset($_SESSION['tabla'])){
            mostraTaula();
        } else {
            creaTaula();
            mostraTaula();
        }
    } else {
        unset($_SESSION['tablaext']);
        unset($_SESSION['tabla']);
        creaTaula();
        mostraTaula();
    }
    
    ?>
</body>

</html>