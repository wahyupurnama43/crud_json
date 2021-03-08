<?php 
if($_GET['hapus'] == 1) {
    // ambil data json
    $json = file_get_contents('persegi.json');
    $data = json_decode($json,true);

    unset($data[$_GET['id']]);

    $fileJson = json_encode($data, JSON_PRETTY_PRINT);
    if (file_put_contents('persegi.json',$fileJson)) {
        header('Location: index.php');
    }
}