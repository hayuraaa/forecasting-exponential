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
                <a href="logout.php" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <i class="fas fa-sign-out-alt fa-fw mr-3"></i>
                        <span class="menu-collapse">Logout</span>
                    </div>
                </a>
            </ul>
        </div>

        <div class="col-md-10 p-4" style="background-color: #e3e6e8">
            <div class="card border-0">
                <h3 class="card-header bg-transparent">Prediksi Linear Regression</h3>
                <div class="card-body">
                    <form action="#.php" method="post">
                        <div class="form-row">
                            <div class="col">
                                <label class="mr-sm-2" for="pilih">Pilih Golongan Darah</label>
                                <select class="custom-select" name="kota">
                                    <?php
                                    include("koneksi.php");
                                    $sql = "SELECT * from tb_provinsi";
                                    $hasil = mysqli_query($koneksi, $sql) or exit("error query: <b>" . $sql . "</b>.");
                                    while ($data = mysqli_fetch_array($hasil)) {
                                        $ket = "";
                                        if (isset($_POST['kota'])) {
                                            $kota = trim($_POST['kota']);
                                            if ($kota == $data['id_kategori']) {
                                                $ket = "selected";
                                            }
                                        }
                                    ?>
                                        <option <?php echo $ket; ?> value="<?php echo $data['id_kategori']; ?>"><?php echo $data['kota']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row mt-5">
                            <div class="col-md-4 mb-3">
                                <label class="mr-sm-2" for="isiperiode">Pilih Periode</label>
                                <input type="number" min="0" max="10" class="form-control" name="txtperiode" id="isiperiode" placeholder="Periode" required="required"></input>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" value="Hitung">Hitung</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>