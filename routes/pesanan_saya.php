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

        /* Login */
        .containerLogin {
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .tableProfile {
            width: auto;
        }

        .wrapperProfile {
            margin-top: 60px;
            min-height: calc(100vh - 60px);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .contentProfile {
            display: flex;
            justify-content: space-between;
            padding: 30px 50px 30px 50px;
            width: calc(100vw - 200px);
        }

        .headerProfile {
            min-height: 60px;
        }


        .profileKiri {
            width: 250px;
            padding: 20px 20px 20px 0px;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .profileKanan {
            padding: 20px;
            background-color: white;
            min-width: 63vw;
            max-width: 63vw;
            box-shadow: 1px 1px 2px rgb(47, 46, 46);
            border-radius: 5px;
        }

        .userWelcome {
            display: flex;
        }

        .custom-link {
            text-decoration: none;
            color: black;
        }

        .customContainerKanan {
            justify-content: space-between;
        }

        .customFooter {
            background-color: #006900;
            color: white;
            padding: 2px 0;
        }

        .profileKiri img.rounded-circle,
        .edit-Gambar img.rounded-circle,
        .profilePhoto {
            object-fit: cover;
        }

        .card {
            height: 100%;
            display: flex;
            flex-direction: row;
        }

        .card img {
            object-fit: cover;
            width: 150px;
            height: 150px;
        }

        .card-body {
            flex: 1;
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
    <main class="wrapperProfile">
        <div class="contentProfile">
            <div class="profileKiri">
                <div class="userWelcome align-items-center">
                    <img class="rounded-circle me-3" src="../assets/uploads/users/<?php echo $foto ?>" alt="Profile Photo" width="50px" height="50px">
                    <div class="d-flex flex-column">
                        <a><?php echo "$username"; ?></a>
                        <a class="d-flex align-items-center" href="profile.php"><img class="me-1" src="../assets/pictures/edit.png" alt="gambar" width="15px">Edit Profile</a>
                    </div>
                </div>
                <div>
                    <div>
                        <a href="profile.php" class="d-flex align-items-center custom-link mt-3 mb-0"><img class="me-1" src="../assets/pictures/userhitam.png" alt="Gambar" width="15px">Profile saya</a>
                        <a href="pesanan_saya.php" class="d-flex align-items-center custom-link "><img class="me-1" src="../assets/pictures/file.png" alt="Gambar" width="15px">Pesanan saya</a>
                    </div>
                    <a href="../handler/logout.php">Log Out</a>
                </div>
            </div>
            <div class="profileKanan">
                <h3>Pesanan saya</h3>
                <hr>
                <div class="containerProduct">
                    <div class="wrapperProduct">
                        <div class="m-0">
                            <?php

                            $id_user = $user_data['id_user'];

                            $historikueri = "SELECT * FROM histori where id_user = '$id_user'";
                            $keranjang_result = $koneksi->query($historikueri);

                            if ($keranjang_result->num_rows > 0) {
                                while ($pesananrow = $keranjang_result->fetch_assoc()) {
                                    $id_produk_in_keranjang = $pesananrow['id_produk'];

                                    $produk_query = "SELECT * FROM produk WHERE id_produk = '$id_produk_in_keranjang'";
                                    $produk_result = $koneksi->query($produk_query);

                                    if ($produk_result->num_rows > 0) {
                                        while ($produk_row = $produk_result->fetch_assoc()) {
                                            $id_kategori = $produk_row['id_kategori'];

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
                                            <div class="row-md-3 mb-3">
                                                <div class="card">
                                                    <img src="../assets/uploads/product/<?php echo $produk_row['gambar_produk']; ?>" class="card-img-top" alt="<?php echo $produk_row['nama_produk']; ?>">
                                                    <div class="card-body d-flex flex-column">
                                                        <?php
                                                        $jumlahBeli = $pesananrow['jumlah_produk'];
                                                        $hargaProduk = $produk_row['harga_produk'];
                                                        $totalHarga = $jumlahBeli * $hargaProduk;
                                                        ?>
                                                        <h5 class="card-title"><?php echo $produk_row['nama_produk']; ?></h5>
                                                        <div class="d-flex justify-content-between">
                                                            <p class="card-text m-0">Tanggal Pembelian: <?php echo $pesananrow['tanggal']; ?></p>
                                                            <p class="card-text m-0">Jumlah Pembelian: <?php echo $pesananrow['jumlah_produk']; ?></p>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <p class="card-text m-0">Harga: Rp<?php echo $produk_row['harga_produk']; ?></p>
                                                            <p class="card-text m-0">Total: Rp<?php echo $totalHarga; ?></p>
                                                        </div>
                                                        <p class="card-text m-0">Kategori: <?php echo $nama_kategori; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                            <?php
                                        }
                                    }
                                }
                            } else {
                                echo '<div style="height: 75vh; display: flex; align-items: center; padding: 0 !important; margin: 0 !important"><div class="alert alert-warning" role="alert" style="width: 80vw; margin-bottom: 0 !important">Keranjang kosong!</div></div>';
                            }
                            ?>
                        </div>
                    </div>
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