<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_POST['Login'])) {
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];

        $archivo = fopen("../Fichero/Usuaris.txt", "r");

        if ($archivo) {

            $usuario_valido = false;

            while (($linea = fgets($archivo)) != false) {
                $variables = explode("/", $linea);
                $usutxt = $variables[0];
                $contratxt = $variables[1];

                if ($usuario == trim($usutxt) && $contraseña == trim($contratxt)) {
                    $usuario_valido = true;
                    break;
                }
            }
            fclose($archivo);

            if ($usuario_valido) {
                header("Location: Juego.php");
            } else {
                header("Location: Error.php");
            }
        } else {
            echo "Nose pudo encontar el archivo txt!";
        }
    } else {
        echo "No se han enviado parametros!";
    }
    ?>
</body>

</html>