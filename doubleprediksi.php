<!DOCTYPE html>
<html>

<head>
    <title>Prediksi Stok Darah</title>
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
            <span class="menu-collapse">Prediksi Stok Darah</span>
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
                <a href="#prediksiSubmenu" data-toggle="collapse" aria-expanded="true" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
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
                    <a href="prediksiregresi.php" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
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
            </ul>
        </div>

        <div class="col mt-5">
            <h2 class="text-center">Prediksi Double Exponential</h2>
            <div class="container mt-3">
                <label class="mt-5 font-weight-bold">Masukkan Nilai Parameternya</label>
                <p>Masukkan nilai secara acak dengan ketentuan nilai harus diantara 0 sampai 1</p>
                <form action="hasildouble.php" method="post">
                    <div class="form-group">
                        <label for="alpha">Alpha (α):</label>
                        <input type="text" class="form-control" id="alpha" name="alpha" required>
                    </div>
                    <div class="form-group">
                        <label for="beta">Beta (β):</label>
                        <input type="text" class="form-control" id="beta" name="beta" required>
                    </div>
                    <div class="form-group">
                        <label for="provinsi">Pilih Golongan Darah:</label>
                        <label class="mr-sm-2" for="pilih"></label>
                        <select class="custom-select" name="golongan">

                            <?php
                            include("koneksi.php");
                            $sql = "SELECT * from tb_goldarah";
                            $hasil = mysqli_query($koneksi, $sql) or exit("error query: <b>" . $sql . "</b>.");
                            while ($data = mysqli_fetch_array($hasil)) {
                                $ket = "";
                                if (isset($_POST['golongan'])) {
                                    $golongan = trim($_POST['golongan']);

                                    if ($golongan == $data['id_kategori']) {
                                        $ket = "selected";
                                    }
                                }
                            ?>
                                <option <?php echo $ket; ?> value="<?php echo $data['id_kategori']; ?>"><?php echo $data['golongan']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="periode">Periode ke Depan:</label>
                        <input type="number" class="form-control" id="periode" name="periode" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Prediksi</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>