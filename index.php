<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Luas Bangunan</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="dashboard.php">Dashboard</a>
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
                                <li><a class="dropdown-item" href="segitiga/index.php">Segitiga</a></li>
                                <li><a class="dropdown-item" href="lingkaran/index.php">Lingkaran</a></li>
                                <li><a class="dropdown-item" href="persegi/index.php">Persegi</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <?php  
            // ambil json
            $json = file_get_contents('./segitiga/segitiga.json');
            $segitiga = json_decode($json,true);
            $s = count($segitiga);

            $json = file_get_contents('./lingkaran/lingkaran.json');
            $lingkaran = json_decode($json,true);
            $l = count($lingkaran);

            $json = file_get_contents('./persegi/persegi.json');
            $persegi = json_decode($json,true);
            $p = count($persegi);
        ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h5 class="text-center">Diagram Batang (Total Perhitungan)</h5>
        <br>
        <div class="d-flex justify-content-center">
            <table>
                <tr>
                    <td valign=bottom>
                        <div style="width:60px; height:<?= $s*40 ?>px; background:#fea; text-align: center;"><?= $s ?>
                    </td>
                    <td valign=bottom>
                        <div style="width:60px; height:<?= $l*40 ?>px; background:#fea;  text-align: center;"><?= $l ?>
                    </td>
                    <td valign=bottom>
                        <div style="width:60px; height:<?= $p*40 ?>px; background:#fea;  text-align: center;"><?= $p ?>
                    </td>
                </tr>
                <tr>
                    <th>Segitiga &nbsp;&nbsp;</th>
                    <th>Lingkaran &nbsp;&nbsp;</th>
                    <th>Persegi &nbsp;&nbsp;</th>
                </tr>
            </table>
        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>


</body>

</html>