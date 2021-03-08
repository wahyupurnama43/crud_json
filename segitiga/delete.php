<?php 
if($_GET['hapus'] == 1) {
    // ambil data json
    $json = file_get_contents('segitiga.json');
    $data = json_decode($json,true);

    // menghapus data pada array atau hapus file
    unset($data[$_GET['id']]);
    
    
    $fileJson = json_encode($data, JSON_PRETTY_PRINT);
    if (file_put_contents('segitiga.json',$fileJson)) {
        header('Location: index.php');
    }
}