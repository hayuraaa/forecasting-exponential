<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="fontawesome/css/all.css" />
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #42a5f5">
        <a class="navbar-brand" href="index.php">
            <span class="menu-collapse">Prediksi Stok Darah</span>
        </a>
    </nav>

    <div class="row" id="body-row">
        <div id="sidebar-container" class="sidebar-expanded d-none d-md-block col-2">
            <ul class="list-group sticky-top sticky-offset">
                <a href="index.php" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <i class="fas fa-home fa-fw mr-3"></i>
                        <span class="menu-collapse">Beranda</span>
                    </div>
                </a>
                <a href="data.php" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <i class="fas fa-database fa-fw mr-3"></i>
                        <span class="menu-collapse">Data</span>
                    </div>
                </a>
                <a href="#prediksiSubmenu" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <i class="fas fa-table fa-fw mr-3"></i>
                        <span class="menu-collapse">Prediksi</span>
                        <i class="fas fa-caret-down ml-auto"></i>
                    </div>
                </a>
                <div id="prediksiSubmenu" class="collapse">
                    <a href="doubleprediksi.php" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="menu-collapse">Double Exponential</span>
                        </div>
                    </a>
                    <a href="prediksi.php" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="menu-collapse">Triple Exponential</span>
                        </div>
                    </a>
                    <a href="prediksi_linier.php" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="menu-collapse">Linear Regression</span>
                        </div>
                    </a>
                </div>
                <a href="grafik.php" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <i class="fas fa-chart-line fa-fw mr-3"></i>
                        <span class="menu-collapse">Grafik</span>
                    </div>
                </a>
                <a href="logout.php" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <i class="fas fa-sign-out-alt fa-fw mr-3"></i>
                        <span class="menu-collapse">Logout</span>
                    </div>
                </a>
            </ul>
        </div>

        <?php
        include("koneksi.php");
        require_once __DIR__ . '/vendor/autoload.php';

        use Phpml\Regression\LeastSquares;

        $nourut = 1;
        $rows = array();
        $waktu = array();

        if (isset($_POST['kota'])) {
            $kota = trim($_POST['kota']);
            $sql = "SELECT * from tb_data where id_kategori=$kota";
        } else {
            $sql = "SELECT * from tb_data where id_kategori=1";
        }

        $hasil = mysqli_query($koneksi, $sql) or exit("error query: <b>" . $sql . "</b>.");
        while ($data = mysqli_fetch_array($hasil)) {
            $rows[] = $data['unit'];
            $waktu[] = $data['waktu'];
        }

        $samples = [];
        $targets = [];
        for ($i = 0; $i < count($rows); $i++) {
            $samples[] = [$i];
            $targets[] = $rows[$i];
        }

        $regression = new LeastSquares();
        $regression->train($samples, $targets);

        $periode = $_POST['txtperiode'];
        $prediksi = $periode + count($rows);
        $fore = [];

        for ($i = 0; $i < $prediksi; $i++) {
            $fore[$i] = round($regression->predict([$i]));
        }

        $mape = [];
        for ($i = 0; $i < count($rows); $i++) {
            $mape[] = round(abs(($rows[$i] - $fore[$i]) / $rows[$i]) * 100, 1) . "%";
        }
        ?>

        <div class="col-md-10 p-4" style="background-color: #F2F3F4">
            <div class="card border-0">
                <h2 class="text-center">Hasil Prediksi Stok Darah Linear Regression</h2>
                <div class="card-body">
                    <div class="geser">
                        <table class="table table-hover table-bordered table-sm mt-3">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Unit</th>
                                    <th>Forecast</th>
                                    <th>MAPE</th>
                                </tr>
                            </thead>
                            <?php
                            for ($i = 0; $i < count($rows); $i++) {
                            ?>
                                <tr>
                                    <td><?php echo $nourut++; ?></td>
                                    <td><?php echo $waktu[$i]; ?></td>
                                    <td><?php echo $rows[$i]; ?></td>
                                    <td><?php echo $fore[$i]; ?></td>
                                    <td><?php echo $mape[$i]; ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <table class="table table-hover table-bordered table-sm mt-3">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Forecast</th>
                            </tr>
                        </thead>
                        <?php
                        for ($i = count($rows); $i < $prediksi; $i++) { ?>
                            <tr>
                                <td><?php echo $nourut++ ?></td>
                                <td><?php echo $fore[$i] ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                    <div class="card border">
                        <div class="card-body">
                            <?php echo "<b>Hasil Prediksi Linear Regression dari Stok Darah untuk <span style='color:red'>" . $periode . "</span> bulan kedepan adalah <span style='color:red'>" . $fore[$prediksi - 1] . "</span></b>" ?>
                        </div>
                        <div class="card-footer">
                            <a href="simpan.php" class="btn btn-primary btn-sm" role="button"><i class="fas fa-plus"></i> simpan</a>
                        </div>
                    </div>
                    <?php
                    $sql = "INSERT into tb_grafik(waktu,aktual,prediksi,mape)";
                    $sql .= "VALUES ('" . json_encode($waktu) . "','" . json_encode($rows) . "','" . json_encode($fore) . "','" . json_encode($mape) . "')";
                    $simpandata = mysqli_query($koneksi, $sql) or exit("error query : <b>" . $sql . "</b>.");
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>