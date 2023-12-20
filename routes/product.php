<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "project_akhir_web");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if (isset($_SESSION['userUpdate'])) {
    $user_data = $_SESSION['userUpdate'];

    $password = $user_data['password'];
    $username = $user_data['username'];
    $alamat = $user_data['alamat_user'];
    $nomorHp = $user_data['no_hp'];
    $emailUser = $user_data['email'];
    $foto = $user_data['gambar'];
} else if (isset($_SESSION['userData'])) {
    $user_data = $_SESSION['userData'];

    $password = $user_data['password'];
    $username = $user_data['username'];
    $alamat = $user_data['alamat_user'];
    $nomorHp = $user_data['no_hp'];
    $emailUser = $user_data['email'];
    $foto = $user_data['gambar'];
} else {
    header("location: ../login.php?pesan=belum_login");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>AloeVera</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat:wght@500&family=Poppins:wght@200;300&family=Salsa&display=swap');

        :root {
            --hijauGelap: #006900;
            --hijauMuda: #00FF00;
        }

        body {
            width: 100%;
            height: 100vh;
            background-color: #F5F5F5;
        }

        /* Home Page */
        .navbar {
            font-family: "Poppins";
            box-shadow: 0px 1px 2px rgb(47, 46, 46);
        }

        .navbar-brand:hover {
            color: white;
        }

        .nav-list a:hover {

            color: var(--hijauMuda);
        }

        .bg-body-primary {
            background-color: var(--hijauGelap);
        }

        .bg-body-primary a {
            color: white;
        }

        .bg-body-primary button {
            color: white;
            padding: 0px !important;
            padding-right: 10px !important;
            padding-left: 10px !important;
        }

        .form-control {
            height: 30px;
        }

        .btn.btn-outline-secondary {
            height: 30px;
        }

        .wrapperProfile {
            min-height: 100vh;
            padding-top: 80px;
        }

        .customFooter {
            background-color: #006900;
            color: white;
            padding: 2px 0;
        }

        .profilePhoto {
            object-fit: cover;
        }

        .containerSearch {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .containerSearch form {
            width: 80vw;
        }

        .wrapperKategori {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .stylingWidth {
            width: 80vw;
        }

        .customInputSearch {
            height: 38px;
        }

        .card {
            height: 100%;
            display: flex;
            flex-direction: column;
            box-shadow: 2px 2px 5px #888888;
        }

        .card img {
            object-fit: cover;
            height: 300px;
        }

        .card-body {
            flex: 1;
        }

        .containerProduct {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .wrapperProduct {
            width: 80vw;
        }

        .kategori-buttons a {
            width: max-content;
            height: max-content;
        }

        .customLetakKategori {
            position: absolute;
            background-color: #00FF00;
            color: black;
            padding: 0px 10px 0px 10px;
            border-radius: 20px;
            font-size: 14px;
            top: 270px;
            left: 10px;
        }

        .customImgCart a img {
            width: 22px;
            height: 22px;
        }

        .customButtonDark {
            padding: initial;
            padding: 5px;
        }

        .popupCart {
            background-color: rgba(0, 0, 0, 0.3);
            width: 100%;
            height: 100%;
            position: fixed;
            display: grid;
            place-items: center;
            z-index: 999;
        }

        .flexxPopup {
            display: flex;
            flex-direction: column;
        }

        .confirmBuying {
            width: 80vw;
            padding: 20px;
            background-color: white;
        }

        .pembayaran {
            width: calc(80vw - 40px);
            display: flex;
        }

        .dropdown-menu {
            margin-top: 0;
            display: none;
            position: absolute;
        }

        .dropdown-menu a {
            color: black;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
            top: 27px;
            left: calc(100% - 180px);
        }
    </style>
</head>

<body>
    <header class="headerProfile">
        <nav class="navbar bg-body-primary navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">
                <div class="h1Editable">
                    <a class="navbar-brand"><img class="me-3 mb-1" src="../assets/pictures/logoLB.png" alt="Logonya" width="40px">Natify AloeVera</a>
                </div>
                <div class="nav-list d-flex justify-content-center align-items-center">
                    <a href="../rumah.php" class="navbar-brand">Home</a>
                    <a href="product.php" class="navbar-brand">Product</a>
                    <a href="cart.php" class="navbar-brand">Cart</a>
                    <a href="about.php" class="navbar-brand">Forum</a>
                    <div class="dropdown">
                        <a href="profile.php" class="navbar-brand"> <img class="profilePhoto rounded-circle" src="../assets/uploads/users/<?php echo $foto ?>" alt="Profile Photo" width="30px" height="30px"></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="profile.php">Profil Saya</a>
                            <a class="dropdown-item" href="pesanan_saya.php">Pesanan Saya</a>
                            <a class="dropdown-item" href="../handler/logout.php">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <?php
    if (isset($_SESSION['data_produk'])) {
        $data_produk = $_SESSION['data_produk'];

        $id_produk = $data_produk['id_produk'];
        $nama_produk = $data_produk['nama_produk'];
        $id_kategori = $data_produk['id_kategori'];

        $kategori_query = "SELECT nama_kategori FROM kategori WHERE id_kategori = '$id_kategori'";
        $kategori_result = $koneksi->query($kategori_query);

        if ($kategori_result->num_rows > 0) {
            $kategori_data = $kategori_result->fetch_assoc();
            $nama_kategori = $kategori_data['nama_kategori'];
        } else {
            $nama_kategori = "Tidak ada dalam database!";
        }

        $deskripsi_produk = $data_produk['deskripsi_produk'];
        $harga_produk = $data_produk['harga_produk'];
        $gambar_produk = $data_produk['gambar_produk'];
    }

    if (isset($_GET["pesan"])) {
        if ($_GET["pesan"] == "addCart") {
            echo '
            <div class="popupCart">
                <div class="alert alert-success mb-4 flexxPopup" role="alert">
                    <p class="mb-3">Produk berhasil masuk keranjang!</p>
                    <a href="product.php" class="btn btn-success">Oke</a>
                </div>
            </div>';
        } else if ($_GET["pesan"] == "berhasilBeli") {
            echo '
            <div class="popupCart">
                <div class="alert alert-success mb-4 flexxPopup" role="alert">
                    <p class="mb-3 mx-auto">Produk berhasil dibeli!</p>
                    <div class="d-flex mx-auto">
                        <a href="product.php" class="btn btn-success me-3">Oke</a>
                        <a href="pesanan_saya.php" class="btn btn-primary">Pesanan Saya</a>
                    </div>
                </div>
            </div>';
        } else if ($_GET["pesan"] == "buying") {
            echo '
                <div class="popupCart">
                    <div class="confirmBuying">
                        <div class="d-flex justify-content-between">
                            <h2 class="mb-3">Detail Produk</h2>
                            <a href="product.php" class="btn btn-danger mb-3 pe-3 ps-3">X</a>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <td><img src="../assets/uploads/product/' . $gambar_produk . '" alt="' . $nama_produk . '" style="max-width: 300px;"></td>
                                <td>
                                    <h4>' . $nama_produk . '</h4>
                                    <a>Kategori: ' . $nama_kategori . '</a> <br>
                                    <a>Deskripsi: ' . $deskripsi_produk . '</a>
                                </td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>Rp' . $harga_produk . '</td>
                            </tr>
                        </table>
                        <div class="pembayaran">
                            <form action="../handler/check_toHistori.php?id=' . $id_produk . '" class="d-flex ms-auto align-items-center" method="post">
                                <label for="bayar" class="form-label m-0 me-2">Pembayaran</label>
                                <input type="text" class="form-control me-3" name="pembayaran" placeholder="Nominal" required>
                                <input type="number" class="form-control me-3" name="jumlahProduk" placeholder="Jumlah Produk" required >
                                <button type="submit" class="btn btn-success">Buy</button>
                            </form>
                        </div>
                    </div>
                </div>';
        }
    }
    ?>
    <main class="wrapperProfile">
        <div class="containerSearch">
            <form method="GET" class="d-flex align-items-center" role="search" action="">
                <input class="form-control customInputSearch" type="search" placeholder="Search" aria-label="Search" id="search" name="search">
                <button class="btn btn-dark" type="submit"><img src="../assets/pictures/search.png" alt="SearchLogo" width="15px"></button>
            </form>
        </div>
        <div class="wrapperKategori mb-3 mt-3">
            <div class="stylingWidth ">
                <div class="kategori-buttons mx-auto text-center">
                    <a href="product.php" class="btn btn-success me-1">All</a>
                    <a href="?kategori=1" class="btn btn-success me-1">Lotion</a>
                    <a href="?kategori=2" class="btn btn-success me-1">Gel</a>
                    <a href="?kategori=3" class="btn btn-success me-1">Shampoo</a>
                    <a href="?kategori=4" class="btn btn-success">Lip Balm</a>
                </div>
            </div>
        </div>
        <div class="containerProduct">
            <div class="wrapperProduct">
                <div class="row m-0">
                    <?php
                    // Cek apakah ada query pencarian atau kategori yang diberikan
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    $kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';

                    if (!empty($kategori)) {
                        $query = "SELECT * FROM produk WHERE id_kategori='$kategori' order by nama_produk";
                    } elseif (!empty($search)) {
                        $query = "SELECT * FROM produk WHERE nama_produk LIKE '%$search%' order by nama_produk";
                    } else {
                        $query = "SELECT * FROM produk order by nama_produk";
                    }

                    $result = $koneksi->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id_kategori = $row['id_kategori'];

                            // Query untuk mengambil nama kategori berdasarkan id_kategori
                            $kategori_query = "SELECT nama_kategori FROM kategori WHERE id_kategori = '$id_kategori'";
                            $kategori_result = $koneksi->query($kategori_query);

                            if ($kategori_result->num_rows > 0) {
                                $kategori_data = $kategori_result->fetch_assoc();
                                $nama_kategori = $kategori_data['nama_kategori'];
                            } else {
                                $nama_kategori = "Tidak ada dalam database!";
                            }
                    ?>
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <img src="../assets/uploads/product/<?php echo $row['gambar_produk']; ?>" class="card-img-top" alt="<?php echo $row['nama_produk']; ?>">
                                    <p class="customLetakKategori"><?php echo $nama_kategori; ?></p>
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title"><?php echo $row['nama_produk']; ?></h5>
                                        <p class="card-text">Harga: Rp<?php echo $row['harga_produk']; ?></p>
                                        <div class="mt-auto d-flex justify-content-between customImgCart">
                                            <a href="../handler/check_buying.php?id=<?php echo $row['id_produk'] ?>" class="btn btn-primary">Details & Buy</a>
                                            <a href="../handler/check_toCart.php?id=<?php echo $row['id_produk'] ?>" class="btn btn-dark customButtonDark"><img src="../assets/pictures/cartplus.png" alt="CartPlus"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo '<div style="height: 75vh; display: flex; align-items: center; padding: 0 !important; margin: 0 !important"><div class="alert alert-warning" role="alert" style="width: 80vw; margin-bottom: 0 !important">Tidak ada produk yang ditemukan!</div></div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <footer class="d-flex justify-content-center customFooter">
        <a>&copy; By Kelompok 2. All Rights Reserved.</a>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>