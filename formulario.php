<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>

<body>
    <h1>Formulario con ficheros</h1>
    <form action="#" method="post" enctype="multipart/form-data">


        <div><label for="ficheros">Adjunte uno o varios ficheros (Solo se aceptan imágenes en formato JPG):</label>
            <input type="file" name="ficheros[]" id="ficheros" multiple accept=".jpg">
        </div>

        <div><input type="submit" value="Enviar"></div>

    </form>
</body>

<?php
require_once "fileManager.php";
foreach ($_FILES as $input => $infoArr) { //$input será el valor de name en el marcado HTML (sin corchetes)
    echo showFilesInfo($infoArr);
}
?>

</html>