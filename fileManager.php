<?php

function showFilesInfo(array $info): string
{
    $files = [];
    /* echo "<pre>";
    print_r($info);
    echo "</pre>"; */
    /* Array con formato Array (
        [1] => Array(
                        ["name"] => nombre_fichero_0.ext
                        ["full_path"] => full_path__fichero_1
                        ...
                        ["size"] => tamaño fichero 1
                        ),
        [2] => Array(
                        ["name"] => nombre_fichero_2.ext
                        ["full_path"] => full_path__fichero_2
                        ....
                        ["size"] => tamaño fichero 2
                        ),
    ..... */
    foreach ($info as $key => $value) {
        for ($i = 0; $i < count($info[$key]); $i++) {
            $files[$i][$key] = $value[$i];
        }
    }

    // Recorremos el nuevo array y construimos el html de salida
    $filesInfoHtml = "";
    for ($i = 0; $i < count($files); $i++) {
        $filesInfoHtml .= "<div class='file-data'><h4>Fichero " . $i + 1 . "</h4><ol>";
        foreach ($files[$i] as $key => $value) {
            $filesInfoHtml .= "<li><strong>" . $key . "</strong> : " . $value . "</li>";
        }
        $filesInfoHtml .= "</ol></div>";
    }
    return $filesInfoHtml;
}

function uploadFiles(array $info){
    for ($i=0; $i < count($info["name"]); $i++) {
        $file_name = $info["name"][$i];
        $tmp_file_name = $info["tmp_name"][$i];
        $error_code = $info["error"][$i];
        $file_size = $info["size"][$i];
        
        if ($error_code==UPLOAD_ERR_OK && is_uploaded_file($tmp_file_name))
        {
            $upload_path = TARGET_FOLDER.DIRECTORY_SEPARATOR.$file_name;
            if (move_uploaded_file($tmp_file_name,$upload_path))
                echo "<p class='msg-ok'>Se ha guardado con éxito el fichero: $file_name
                (<strong>Código de error->$error_code, Tamaño->$file_size</strong>)</p>";
            else{
                echo "<p class='msg-err'>Error en la subida del fichero: $file_name 
                (<strong>Código de error->$error_code, Tamaño->$file_size</strong>)</p>";
            }
        }
        else{
            echo "<p class='msg-err'>Error en la subida del fichero: $file_name 
                (<strong>Código de error->$error_code, Tamaño->$file_size</strong>)</p>";
        }
    } 
}

