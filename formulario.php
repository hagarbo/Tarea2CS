<?php
 require_once __DIR__.DIRECTORY_SEPARATOR."fileManager.php";
 const TARGET_FOLDER = __DIR__.DIRECTORY_SEPARATOR."img";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        body{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            margin-top: 40px;
            margin-left: 20%;
            margin-right: 20%;
        }
        #file-info {
            display: flex;
            flex-wrap: wrap;
            border: solid #4169e1;
            border-width: 2px 0 0 2px;
        }

        .file-data{
            flex-grow: 1;
            width: 500px;
            padding: 0px 30px 15px 30px;
            border: solid #4169e1;
	        border-width: 0 2px 2px 0;
        }        
        h1,h2{
            text-align: center;
        }
        h4 {
            font-size: 1.2em;
            font-weight: bold;
        }

        ol {
            list-style-type: decimal;
            margin-left: 0;
            padding-left: 1.5em;
        }

        li {
            margin-bottom: 0.5em;
        }
        form{
            border: 2px solid green;
            border-radius: 5px;
            padding: 20px 40px 40px 40px;
        }
        form input{
            font-size: 1.2em;
        }
        .msg-ok{
            color: green;
        }
        .msg-err{
            color: red;
        }
    </style>
</head>

<body>
    <h1>Tarea 03.1 - Adrian Garcia Bouzas</h1>
    <form action="#" method="post" enctype="multipart/form-data">
        
        <div>
            <p>
                <label for="ficheros">Adjunte uno o varios ficheros (Solo se aceptan imágenes en formato JPG):</label>
            </p>
            <p>
                <!-- MAX_FILE_SIZE=40M debe preceder al campo de entrada del fichero -->
                <input type="hidden" name="MAX_FILE_SIZE" value="4000000" />
                <input type="file" name="ficheros[]" id="ficheros" multiple accept=".jpg">
            </p>
        </div>

        <div><input type="submit" value="Enviar"></div>

    </form>

    
        <?php
            if (isset($_FILES["ficheros"])) { 
            
            // Impresion de los datos de los ficheros
            echo "<h2>Estos son los datos de los ficheros</h2>";
            echo "<div id='file-info'>";
            echo showFilesInfo($_FILES["ficheros"]);
            echo "</div>";

            // Informacion del estado de las subidas
            echo "<div id='upload-info'>";
            uploadFiles($_FILES["ficheros"]);   
            echo "</div>";
        }
      ?>
    
</body>
</html>