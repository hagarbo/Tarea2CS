<?php
 require_once "fileManager.php";
 const TARGET_FOLDER = __DIR__.DIRECTORY_SEPARATOR."img";

?>

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

        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        
        <div><label for="ficheros">Adjunte uno o varios ficheros (Solo se aceptan imágenes en formato JPG):</label>
            <input type="file" name="ficheros[]" id="ficheros" multiple accept=".jpg">
        </div>

        <div><input type="submit" value="Enviar"></div>

    </form>

    
        <?php
            if (isset($_FILES["ficheros"])) { 
            
            // Impresion de los datos de los ficheros
            echo "<h3>Estos son los datos de los ficheros</h3>";
            echo "<div id='file-info'>";
            echo showFilesInfo($_FILES["ficheros"]);
            echo "</div>";

            // Informacion del estado de las subidas
            echo "<div id='upload-info'>";
            foreach ($_FILES["ficheros"]["name"] as $key => $value) {
                echo "<p>Se ha guardado con éxito el fichero: $value</p>";
            }
            echo "</div>";
        }
      ?>
    
</body>
</html>