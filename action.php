<?php 
date_default_timezone_set('Asia/Ujung_Pandang');

if (isset($_POST['lingkaran']) && $_POST['lingkaran'] == 'tambah') {
    $json = file_get_contents('lingkaran/lingkaran.json');
    $data = json_decode($json, true);
    $id = uniqid(rand());
    $extra = array(
        'id' => $id,
        'jari' => $_POST['jari'],
        'luas' => 3.14 * pow($_POST['jari'],2),
        'create_at' => date('Y-m-d h:i:s A'),
    );
    $data[$id] = $extra;
    $final = json_encode($data,JSON_PRETTY_PRINT);
    if (file_put_contents('lingkaran/lingkaran.json',$final)) {
        header('Location: http://localhost/lat_ujikom/lingkaran/index.php');
    }
}

if (isset($_POST['lingkaran']) && $_POST['lingkaran'] == 'edit') {
    $id = $_POST['id'];
    $json = file_get_contents('lingkaran/lingkaran.json');
    $data = json_decode($json, true);
    foreach ($data as $key => $value) {
        if ($value['id'] == $id) {
            $data[$key]['jari'] = $_POST['jari'];   
            $data[$key]['luas'] =  3.14 * pow($_POST['jari'],2);   
            $final = json_encode($data,JSON_PRETTY_PRINT);
            if (file_put_contents('lingkaran/lingkaran.json',$final)) {
                header('Location: http://localhost/lat_ujikom/lingkaran/index.php');
            }
        }
    }
}

if (isset($_POST['segitiga']) && $_POST['segitiga'] == 'tambah') {
    // panggil file json
    $json = file_get_contents('segitiga/segitiga.json');
    // rubah file json menjadi array
    $data = json_decode($json, true);

    $id = uniqid(rand());
    $extra = array(
                'id' => $id,
                'alas' => $_POST['alas'],
                'tinggi'  => $_POST['tinggi'],
                'luas' => 0.5 * $_POST['alas'] * $_POST['tinggi'],
                'create_at' => date('Y-m-d h:i:s A'),
            );
    // menyimpan data array  yng akan di masukkan ke dalam array json
    $data[$id] = $extra;
    // merubah data array menjadi json 
    $final = json_encode($data,JSON_PRETTY_PRINT);
    // ketika sudah selesai ubah ke arrya menjadi json maka masukkan data itu ke file json
    if (file_put_contents('segitiga/segitiga.json',$final)) {
        header('Location: http://localhost/lat_ujikom/segitiga/index.php');
    }
}

if (isset($_POST['segitiga']) && $_POST['segitiga'] == 'edit') {
    $id = $_POST['id'];
    $json = file_get_contents('segitiga/segitiga.json');
    $data = json_decode($json, true);
    foreach ($data as $key => $value) {
        if ($value['id'] == $id) {
            $data[$key]['alas'] = $_POST['alas'];   
            $data[$key]['tinggi'] = $_POST['tinggi'];   
            $data[$key]['luas'] =  0.5 * $_POST['alas'] * $_POST['tinggi'];   
            $final = json_encode($data,JSON_PRETTY_PRINT);
            if (file_put_contents('segitiga/segitiga.json',$final)) {
                header('Location: http://localhost/lat_ujikom/segitiga/index.php');
            }
        }
    }
}

if (isset($_POST['persegi']) && $_POST['persegi'] == 'tambah') {
    $json = file_get_contents('persegi/persegi.json');
    $data = json_decode($json, true);
    $id = uniqid(rand());
    $extra = array(
        'id' => $id,
        'sisi' => $_POST['sisi'],
        'luas' => $_POST['sisi'] * $_POST['sisi'],
        'create_at' => date('Y-m-d h:i:s A'),
    );
    $data[$id] = $extra;
    $final = json_encode($data,JSON_PRETTY_PRINT);
    if (file_put_contents('persegi/persegi.json',$final)) {
        header('Location: http://localhost/lat_ujikom/persegi/index.php');
    }
}

if (isset($_POST['persegi']) && $_POST['persegi'] == 'edit') {
    $id = $_POST['id'];
    $json = file_get_contents('persegi/persegi.json');
    $data = json_decode($json, true);
    foreach ($data as $key => $value) {
        if ($value['id'] == $id) {
            $data[$key]['sisi'] = $_POST['sisi'];   
            $data[$key]['luas'] =  $_POST['sisi'] * $_POST['sisi'];   
            $final = json_encode($data,JSON_PRETTY_PRINT);
            if (file_put_contents('persegi/persegi.json',$final)) {
                header('Location: http://localhost/lat_ujikom/persegi/index.php');
            }
        }
    }
}