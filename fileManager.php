<?php

function showFilesInfo(array $info): string
{
    $files = [];
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
    $load_ok = [];
    $filesInfoHtml = "";
    for ($i = 0; $i < count($files); $i++) {
        $filesInfoHtml .= "<div class='file-data'><h4>Ficheiro " . $i + 1 . "</h4><ol>";
        foreach ($files[$i] as $key => $value) {
            $filesInfoHtml .= "<li><strong>" . $key . "</strong> : " . $value . "</li>";
        }
        $filesInfoHtml .= "</ol></div>";
    }
    return $filesInfoHtml;
}
