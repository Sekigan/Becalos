<?php
$nombre = $_FILES['archivo']['name'];
$ubicaciontmp = $_FILES['archivo']['tmp_name'];

if (!file_exists('archivosConvo')) {
    mkdir('archivosConvo', 0777, true);
    if (file_exists('archivosConvo')) {
        if (move_uploaded_file($ubicaciontmp, 'archivosConvo/' . $nombre)) {
            echo "archivo guardado";
        } else {
            echo "archivo no guardado";
        }
    } else {
        if (move_uploaded_file($ubicaciontmp, 'archivosConvo/' . $nombre)) {
            echo "archivo guardado";
        } else {
            echo "archivo no guardado";
        }
    }
}
