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

const UPLOAD_ERRORS = array(
    0=>"No hay error, fichero subido con éxito.",
    1=>"El fichero subido excede la directiva upload_max_filesize de php.ini.",
    2=>"El fichero subido excede la directiva MAX_FILE_SIZE especificada en el formulario HTML.",
    3=>"El fichero fue sólo parcialmente subido.",
    4=>"No se subió ningún fichero.",
    6=>"Falta la carpeta temporal.",
    7=>"No se pudo escribir el fichero en el disco.",
    8=>"Una extensión de PHP detuvo la subida de ficheros."
);
function uploadFiles(array $info){
    for ($i=0; $i < count($info["name"]); $i++) {
        $file_name = $info["name"][$i];
        $tmp_file_name = $info["tmp_name"][$i];
        $error_code = $info["error"][$i];
        $file_size = $info["size"][$i];
        
        $upload_path = TARGET_FOLDER.DIRECTORY_SEPARATOR.$file_name;
        if ($error_code==UPLOAD_ERR_OK && move_uploaded_file($tmp_file_name,$upload_path))
        {
            echo "<details><summary class='msg-ok'>Se ha guardado con éxito el fichero: $file_name</summary>
            <p><strong>Código de error: $error_code --> ".UPLOAD_ERRORS[$error_code]."</strong></p>"
            ."<p><strong>Tamaño: $file_size Bytes</strong></p></details>";

        }
        else{
            echo "<details><summary class='msg-err'>Error en la subida del fichero: $file_name</summary>
            <p><strong>Código de error: $error_code --> ".UPLOAD_ERRORS[$error_code]."</strong></p>"
            ."<p><strong>Tamaño: $file_size Bytes</strong></p></details>";
        }
    } 
}




