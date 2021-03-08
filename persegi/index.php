<?php  
$sisi = '';

$ID = '';
$editmode = false;
    // ambil data id
if (isset($_GET['id'])) {
    // $id_edit = $_GET['id'];
    // ambil data json
    // $json = file_get_contents('persegi.json');
    // $data = json_decode($json,true);
    // foreach ($data as $key =>$value) { 
    //   if ($key == $id_edit) { 
    //       $return = $value; 
    //   } 
    // } 
    // if (isset($return)) { 
    //   if ($_GET['edit']) { 
    //     $editmode = true; 
    //     $sisi = $return['sisi']; 
    //     $ID = $return['id']; 
    //   } 
    // } 
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />

    <title>Hitung Bangun Ruang</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Luas Bangunan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="../segitiga/index.php">Segitiga</a></li>
                                <li><a class="dropdown-item" href="../lingkaran/index.php">Lingkaran</a></li>
                                <li><a class="dropdown-item" href="../persegi/index.php">Persegi</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="card-title text-center">
                    <h1>Input Luas persegi</h1>
                </div>
                <form action="../action.php" method="POST">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Sisi</label>
                                <input type="number" required="" name="sisi" step="any" min="0" max="100"
                                    class="form-control" value="<?= $sisi ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-end mt-3">
                        <?php if ($editmode == false): ?>
                        <button class="btn btn-primary" name="persegi" type="submit" value="tambah">Submit</button>
                        &nbsp;
                        <?php else: ?>
                        <!-- <input type="hidden" name="id" value="<?= $ID ?>" />
                            <button class="btn btn-primary" name="persegi" type="submit" value="edit">Edit</button> -->
                        &nbsp;<a href="." class="btn btn-secondary" type="reset">Reset</a>
                        <?php endif ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Sisi</th>
                    <th>Hasil Luas</th>
                    <th>Create</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $json = file_get_contents('persegi.json');
                $data = json_decode($json,true);
                if ($data !== null && !empty($data)) :
                    // foreach untuk ngambil tanggal
                    foreach ($data as $key =>$v) { 
                        $sort[$key] = strtotime($v['create_at']); 
                    }
                    // sort data yang di tetapkan oleh index yang berisi waktu created_at lalu yang di sort yaitu $data 
                    array_multisort($sort,SORT_DESC,$data); 
                    $i=1; 
                foreach ($data as $k => $h): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $h['sisi'] ?> cm</td>
                    <td><?= $h['luas'] ?> cm <sup>2</sup></td>
                    <td><?= $h['create_at'] ?></td>
                    <td class="d-flex">
                        <!-- <a href="?id=<?= $h['id'] ?>&edit=1" class="btn btn-primary">Edit</a> -->
                        &nbsp;
                        <form action="delete.php" method="GET" onsubmit="return confirm('Apakah anda yakin?')">
                            <input type="hidden" name="id" value="<?= $h['id'] ?>" />
                            <input type="hidden" name="hapus" value="1" />
                            <button type="submit" class="btn btn-danger">hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</body>

</html>