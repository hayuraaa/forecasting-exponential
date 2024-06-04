<!DOCTYPE html>
<html>

<head>
    <title>Hasil Prediksi</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="fontawesome/css/all.css" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #42a5f5">
        <a class="navbar-brand" href="index.php">
            <span class="menu-collapse"> Prediksi Stok Darah</span>
        </a>
    </nav>

    <div class="row" id="body-row">
        <div id="sidebar-container" class="sidebar-expanded d-none d-md-block col-2">
            <ul class="list-group sticky-top sticky-offset">
                <a href="index.php" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <i class="fas fa-home fa-fw mr-3"></i>
                        <span class="menu-collapse">Beranda</span>
                    </div>
                </a>
                <a href="data.php" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <i class="fas fa-database fa-fw mr-3"></i>
                        <span class="menu-collapse">Data</span>
                    </div>
                </a>
                <a href="prediksi.php" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <i class="fas fa-table fa-fw mr-3"></i>
                        <span class="menu-collapse">Prediksi</span>
                    </div>
                </a>
                <a href="grafik.php" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <i class="fas fa-chart-line fa-fw mr-3"></i>
                        <span class="menu-collapse">Grafik</span>
                    </div>
                </a>
            </ul>
        </div>

        <div class="col mt-5">
            <h2 class="text-center">Hasil Prediksi Stok Darah Double Exponential</h2>
            <div class="container mt-3">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="card border">
                            <div class="card-body">
                                <?php
                                include "koneksi.php";

                                $nourut = 1; // Inisialisasi variabel $nourut

                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    $alpha = $_POST['alpha'];
                                    $beta = $_POST['beta'];
                                    $provinsi = $_POST['kota'];
                                    $periode = $_POST['periode'];

                                    function double_exponential_smoothing($data, $alpha, $beta, $n_forecast)
                                    {
                                        $n = count($data);
                                        $result = array();
                                        $level_values = array();
                                        $trend_values = array();

                                        if ($n > 1) {
                                            $level = $data[0];
                                            $trend = $data[1] - $data[0];
                                            $level_values[] = $level;
                                            $trend_values[] = $trend;
                                            $result[0] = 0; // Set the first prediction value to 0

                                            for ($i = 1; $i < $n; $i++) {
                                                $last_level = $level;
                                                $level = $alpha * $data[$i] + (1 - $alpha) * ($level + $trend);
                                                $trend = $beta * ($level - $last_level) + (1 - $beta) * $trend;
                                                $result[$i] = $level + $trend;
                                                $level_values[] = $level;
                                                $trend_values[] = $trend;
                                            }

                                            for ($i = 0; $i < $n_forecast; $i++) {
                                                $result[] = $level + ($i + 1) * $trend;
                                                $level_values[] = $level; // Add level for forecast period
                                                $trend_values[] = $trend; // Add trend for forecast period
                                            }
                                        }

                                        return array($result, $level_values, $trend_values);
                                    }


                                    // Mengambil data dari database
                                    $sql = "SELECT * FROM tb_data WHERE id_kategori = '$provinsi'";
                                    $result = mysqli_query($koneksi, $sql);
                                    $rows = array();
                                    $waktu = array();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $rows[] = $row['unit'];
                                        $waktu[] = $row['waktu'];
                                    }

                                    // Memastikan ada data sebelum melakukan prediksi
                                    if (count($rows) > 1) {
                                        // Prediksi menggunakan Double Exponential Smoothing
                                        list($forecast, $level_values, $trend_values) = double_exponential_smoothing($rows, $alpha, $beta, $periode);

                                        // Menghitung MAPE
                                        $mape = array();
                                        for ($i = 0; $i < count($rows); $i++) {
                                            if (isset($forecast[$i]) && $rows[$i] != 0) {
                                                $mape[$i] = abs(($rows[$i] - $forecast[$i]) / $rows[$i]) * 100;
                                            } else {
                                                $mape[$i] = 0;
                                            }
                                        }

                                        // Menampilkan hasil prediksi dalam tabel
                                        echo "<table class='table table-hover table-bordered table-sm mt-3'>";
                                        echo "<thead class='thead-light'>";
                                        echo "<tr>";
                                        echo "<th>No</th>";
                                        echo "<th>Date</th>";
                                        echo "<th>Unit</th>";
                                        echo "<th>Level</th>";
                                        echo "<th>Trend</th>";
                                        echo "<th>Forecast</th>";
                                        echo "<th>MAPE (%)</th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";

                                        for ($i = 0; $i < count($rows); $i++) {
                                            echo "<tr>";
                                            echo "<td>" . ($nourut++) . "</td>";
                                            echo "<td>" . $waktu[$i] . "</td>";
                                            echo "<td>" . $rows[$i] . "</td>";
                                            echo "<td>" . (isset($level_values[$i]) ? round($level_values[$i], 2) : '') . "</td>";
                                            echo "<td>" . (isset($trend_values[$i]) ? round($trend_values[$i], 2) : '') . "</td>";
                                            echo "<td>" . (isset($forecast[$i]) ? round($forecast[$i], 2) : '') . "</td>";
                                            echo "<td>" . (isset($mape[$i]) ? round($mape[$i], 2) . '%' : '') . "</td>";
                                            echo "</tr>";
                                        }

                                        echo "</tbody>";
                                        echo "</table>";

                                        // Menampilkan forecasting periode ke depan
                                        echo "<br><h2 class='text-center'>Forecasting Priode Kedepan</h2>";
                                        echo "<div class='geser'>";
                                        echo "<table class='table table-hover table-bordered table-sm mt-3'>";
                                        echo "<thead class='thead-light'>";
                                        echo "<tr>";
                                        echo "<th>No</th>";
                                        echo "<th>Level</th>";
                                        echo "<th>Trend</th>";
                                        echo "<th>Forecast</th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";

                                        for ($i = count($rows); $i < count($rows) + $periode; $i++) {
                                            echo "<tr>";
                                            echo "<td>" . ($i - count($rows) + 1) . "</td>";
                                            echo "<td>" . (isset($level_values[$i]) ? round($level_values[$i], 2) : '') . "</td>"; // Tampilkan level untuk periode prediksi
                                            echo "<td>" . (isset($trend_values[$i]) ? round($trend_values[$i], 2) : '') . "</td>"; // Tampilkan trend untuk periode prediksi
                                            echo "<td>" . (isset($forecast[$i]) ? round($forecast[$i], 2) : '') . "</td>";
                                            echo "</tr>";
                                        }

                                        echo "</tbody>";
                                        echo "</table>";
                                        echo "</div>";

                                        // Menyimpan hasil ke database
                                        $sql = "INSERT INTO tb_grafik (waktu, aktual, prediksi, mape) VALUES ('" . json_encode($waktu) . "', '" . json_encode($rows) . "', '" . json_encode(array_slice($forecast, 0, count($rows))) . "', '" . json_encode($mape) . "')";
                                        mysqli_query($koneksi, $sql) or exit("Error query: <b>" . $sql . "</b>.");
                                    } else {
                                        echo "<tr><td colspan='7' class='text-center'>Tidak ada data yang cukup untuk melakukan prediksi.</td></tr>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="card border">
                        <div class="card-body">
                            <?php echo "<b>Hasil Prediksi Double Exponential Smoothing dari stok darah untuk <span style='color:red'>" . $periode . "</span> bulan kedepan adalah <span style='color:red'>" . round($forecast[$i - 1],2) . "</span></b>" ?>
                        </div>
                        <div class="card-footer">
                            <a href="simpan.php" class="btn btn-primary btn-sm" role="button"><i class="fas fa-plus"></i>simpan</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</body>

</html>