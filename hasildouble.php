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
            <span class="menu-collapse">Prediksi Stock Darah</span>
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
                    <a href="prediksi_double.php" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
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

        use Phpml\Preprocessing\Imputer;
        use Phpml\Preprocessing\Imputer\Strategy\MeanStrategy;

        $nourut = 1;
        $panjang = 4;
        $rows = array();
        $alfa = $_POST['alpha'];
        $beta = $_POST['beta'];
        $periode = $_POST['periode'];

        if (isset($_POST['golongan'])) {
            $golongan = trim($_POST['golongan']);
            $sql = "SELECT * from tb_data where id_kategori=$golongan";
        } else {
            $sql = "SELECT * from tb_data where id_kategori=1";
        }

        $hasil = mysqli_query($koneksi, $sql) or exit("error query: <b>" . $sql . "</b>.");
        while ($data = mysqli_fetch_array($hasil)) {
            $rows[] = $data['unit'];
            $waktu[] = $data['waktu'];
        }
        $saja = [$rows];

        $imputer = new Imputer('', new MeanStrategy(), Imputer::AXIS_ROW);
        $imputer->fit($saja);
        $imputer->transform($saja);

        /*-------------------------------------------------------------------inisial_level-------------------------------------------------------------------*/
        $level = array();
        $jumlah = 0;
        for ($i = 0; $i < $panjang; $i++) {
            $jumlah += $saja[0][$i];
            $level[] = null;
        }
        $level[$panjang - 1] = $jumlah / $panjang;

        /*-------------------------------------------------------------------inisial_trend-------------------------------------------------------------------*/
        $trend = array();
        $trend1 = 0;
        for ($i = 0; $i < $panjang; $i++) {
            $trend1 += $saja[0][$i];
            $trend[] = null;
        }
        $trend1 /= $panjang;

        $trend2 = 0;
        for ($i = $panjang; $i < 2 * $panjang; $i++) {
            $trend2 += $saja[0][$i];
        }
        $trend2 /= $panjang;

        $trend[$panjang - 1] = abs($trend2 - $trend1) / $panjang;

        /*-------------------------------------------------------------------model-------------------------------------------------------------------*/
        $prediksi = $periode + count($rows);
        for ($i = $panjang; $i < count($rows); $i++) {
            $x = $saja[0][$i];

            $level_simpan = $level[$i - 1];
            $l0 = $level_simpan;

            $trend_simpan = $trend[$i - 1];
            $t0 = $trend_simpan;

            $l = $alfa * $x + (1 - $alfa) * ($l0 + $t0);
            $t = $beta * ($l - $l0) + (1 - $beta) * $t0;
            $level[$i] = $l;
            $trend[$i] = $t;
        }

        /*-------------------------------------------------------------------forecast-------------------------------------------------------------------*/
        for ($i = 0; $i < $panjang; $i++) {
            $fore[] = 0;
        }
        for ($i = $panjang; $i < count($rows); $i++) {
            $fore[$i] = round($level[$i - 1] + $trend[$i - 1]);
        }

        /*-------------------------------------------------------------------mape-------------------------------------------------------------------*/
        for ($i = 0; $i < count($rows); $i++) {
            $jumlah = abs(($saja[0][$i] - $fore[$i]) / $saja[0][$i]) / count($rows);
            $tampung[] = $jumlah;
            $mape[] = round($jumlah * 100, 1) . "%";
        }

        /*-------------------------------------------------------------------mae-------------------------------------------------------------------*/
        $total_mae = 0;
        for ($i = 0; $i < count($rows); $i++) {
            $mae[$i] = abs($saja[0][$i] - $fore[$i]);
            $total_mae += $mae[$i];
        }

        /*-------------------------------------------------------------------standar deviasi----------------------------------------------------------------*/
        $jumape = 0;
        $jumkua = 0;
        for ($i = 0; $i < count($rows); $i++) {
            $kuadrat[$i] = pow($tampung[$i], 2);
            $jumkua += $tampung[$i];
            $jumape += $kuadrat[$i];
        }
        $std = sqrt((count($rows) * $jumape - pow($jumkua, 2)) / (count($rows) * (count($rows) - 1)));

        /*-------------------------------------------------------------------prediksi-------------------------------------------------------------------*/
        for ($i = count($rows); $i < $prediksi; $i++) {
            $m = $i - count($rows) + 1;
            $fore[$i] = round($level[count($rows) - 1] + $m * $trend[count($rows) - 1]);
        }

        $average_mape = array_sum($tampung) / count($tampung) * 100;
        $average_mae = $total_mae / count($mae);
        ?>

        <!--row isi-->
        <div class="col-md-10 p-4" style="background-color: #F2F3F4">
            <div class="card border-0">
                <h2 class="text-center">Hasil Prediksi Stok Darah Double Exponential</h4>
                    <div class="card-body">
                        <div class="geser">
                            <table class="table table-hover table-bordered table-sm mt-3">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Date</th>
                                        <th>Unit</th>
                                        <th>Level</th>
                                        <th>Trend</th>
                                        <th>Forecast</th>
                                        <th>MAPE</th>
                                        <th>MAE</th>
                                    </tr>
                                </thead>

                                <?php
                                for ($i = 0; $i < count($rows); $i++) {
                                ?>
                                    <tr>
                                        <td><?php echo $nourut++; ?></td>
                                        <td><?php echo $waktu[$i]; ?></td>
                                        <td><?php echo $saja[0][$i]; ?></td>
                                        <td><?php echo round($level[$i], 2); ?></td>
                                        <td><?php echo round($trend[$i], 2); ?></td>
                                        <td><?php echo $fore[$i]; ?></td>
                                        <td><?php echo $mape[$i]; ?></td>
                                        <td><?php echo round($mae[$i], 2); ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <div class="card border mt-3">
                            <div class="card-body">
                                <p><b>Rata-rata MAPE: </b><span><?php echo round($average_mape, 2) . "%"; ?></span></p>
                                <p><b>Rata-rata MAE: </b><span><?php echo round($average_mae, 2); ?></span></p>
                            </div>
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
                                <?php echo "<b>Hasil Prediksi Double Exponential Smoothing dari stok darah untuk <span style='color:red'>" . $periode . "</span> bulan kedepan adalah <span style='color:red'>" . $fore[$prediksi - 1] . "</span></b>" ?>
                            </div>
                            <div class="card-footer">
                                <a href="simpan.php" class="btn btn-primary btn-sm" role="button"><i class="fas fa-plus"></i>simpan</a>
                            </div>
                        </div>

                        <?php
                        $sql = "INSERT INTO tb_grafik (waktu, aktual, prediksi, mape, level, trend, mae, avg_mae, avg_mape,future_forecast)";
                        $sql .= " VALUES (
                                    '" . json_encode($waktu) . "',
                                    '" . json_encode($saja[0]) . "',
                                    '" . json_encode($fore) . "',
                                    '" . json_encode($mape) . "',
                                    '" . json_encode(array_map(function ($value) {
                            return round($value, 2);
                        }, $level)) . "',
                                    '" . json_encode(array_map(function ($value) {
                            return round($value, 2);
                        }, $trend)) . "',
                                    '" . json_encode(array_map(function ($value) {
                            return round($value, 2);
                        }, $mae)) . "',
                                    '" . round($average_mae, 2) . "',
                                    '" . round($average_mape, 2) . "', '" . json_encode(array_slice($fore, count($rows))) . "'
                                )";
                        $simpandata = mysqli_query($koneksi, $sql) or exit("error query : <b>" . $sql . "</b>.");
                        ?>
                    </div>
            </div>
        </div>
</body>

</html>