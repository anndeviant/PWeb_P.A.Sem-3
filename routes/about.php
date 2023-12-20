<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "project_akhir_web");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if (isset($_SESSION['userUpdate'])) {
    $user_data = $_SESSION['userUpdate'];

    $id_user = $user_data['id_user'];
    $password = $user_data['password'];
    $username = $user_data['username'];
    $alamat = $user_data['alamat_user'];
    $nomorHp = $user_data['no_hp'];
    $emailUser = $user_data['email'];
    $foto = $user_data['gambar'];
} else if (isset($_SESSION['userData'])) {
    $user_data = $_SESSION['userData'];

    $id_user = $user_data['id_user'];
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
            padding-bottom: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .customFooter {
            background-color: #006900;
            color: white;
            padding: 2px 0;
        }

        .profilePhoto {
            object-fit: cover;
        }

        .containerKomentar {
            width: 80vw;

            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .containerKomentar .contentKomentar {
            width: 80vw;
        }

        .isiKomentar {
            max-width: 850px;
            min-width: 850px;
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

        .colominSimpan {
            flex-direction: column;
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
    if (isset($_SESSION['data_komentar'])) {
        $data_komentar = $_SESSION['data_komentar'];

        $id_komentar = $data_komentar['id_komentar'];
        $isi_komentar = $data_komentar['isi_komentar'];

        $kategori_query = "SELECT * FROM komentar WHERE id_komentar = '$id_komentar'";
        $kategori_result = $koneksi->query($kategori_query);

        if ($kategori_result->num_rows > 0) {
            $kategori_data = $kategori_result->fetch_assoc();
            $isi_komentar = $kategori_data['isi_komentar'];
            $id_komentar = $kategori_data['id_komentar'];
        } else {
            $isi_komentar = "Tidak ada dalam database!";
        }
    }

    if (isset($_GET["pesan"])) {
        if ($_GET["pesan"] == "hapus") {
            echo '
            <div class="popupCart">
                <div class="alert alert-success mb-4 flexxPopup" role="alert">
                    <p class="mb-3">Komentar berhasil dihapus!</p>
                    <a href="about.php" class="btn btn-success">Oke</a>
                </div>
            </div>';
        } else if ($_GET["pesan"] == "updateBerhasil") {
            echo '
            <div class="popupCart">
                <div class="alert alert-success mb-4 flexxPopup" role="alert">
                    <p class="mb-3">Komentar berhasil diperbarui!</p>
                    <a href="about.php" class="btn btn-success">Oke</a>
                </div>
            </div>';
        } else if ($_GET["pesan"] == "editBerhasil") {
            echo '
            <div class="popupCart">
                <div class="confirmBuying">
                    <div class="d-flex justify-content-between">
                        <h2 class="mb-3">Edit Komentar</h2>
                        <a href="about.php" class="btn btn-danger mb-3 pe-3 ps-3">X</a>
                    </div>
                    <div class="pembayaran">
                        <label for="bayar" class="form-label m-0 me-2">Tulis Komentar: </label>
                        <form action="../handler/check_updateKomen.php?id=' . $id_komentar . '" class="d-flex colominSimpan" method="post">
                            <textarea style="height: 100px;" class="form-control" name="komentarBaru" required>' . $isi_komentar . '</textarea>
                            <button type="submit" class="btn btn-success mt-2">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>';
        }
    }
    ?>
    <main class="wrapperProfile">
        <div class="containerKomentar">
            <h2>Forum Natifiers</h2>
            <hr>
            <?php
            // Koneksi ke database
            $query = "SELECT * FROM komentar";
            $result = $koneksi->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $iduser = $row['id_user'];
                    $id_komen = $row['id_komentar'];
                    $tanggal = $row['tanggal'];
                    $isi = $row['isi_komentar'];

                    $dataKomenUser = "SELECT * FROM data_user WHERE id_user= '$iduser'";
                    $hasilKomenUser = $koneksi->query($dataKomenUser);

                    if ($hasilKomenUser->num_rows > 0) {
                        $dataNama = $hasilKomenUser->fetch_assoc();
                        $username = $dataNama['username'];
                        $foto = $dataNama['gambar'];
                    } else {
                        $username = "Tidak ada dalam database!";
                    }

                    echo '
                    <table class="table table-bordered">
                        <tr>
                            <td><img class="rounded-circle" src="../assets/uploads/users/' . $foto . '" alt="' . $foto . '" style="width: 75px; height: 75px; object-fit: cover;"></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <h4 class="me-2">' . $username . '</h4>
                                    <p class="m-0">Posted on ' . $tanggal . '</p>
                                </div>
                                <p class="isiKomentar">' . $isi . '</p>';

                    if ($id_user == $row['id_user']) {
                        echo '
                                <div class="d-flex justify-content-end">
                                    <a href="../handler/check_editKomen.php?id=' . $id_komen . '" type="button" class="btn btn-warning me-2" >Edit</a>
                                    <a href="../handler/check_hapusKomen.php?id=' . $id_komen . '" type="button" class="btn btn-danger" >Delete</a>
                                </div>';
                    }
                    echo '
                            </td>
                        </tr>
                    </table>
                    ';
                }
            } else {
                echo '<div class="alert alert-info" role="alert">Belum ada komentar.</div>';
            }

            ?>
            <div class="contentKomentar">
                <form action="../handler/check_postKomen.php?id=<?php echo $id_user ?>" method="POST">
                    <div class="mb-3">
                        <label for="komentar" class="form-label">Tulis Komentar:</label>
                        <textarea style="height: 100px;" class="form-control" name="komentar" placeholder="Enter your comment" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary d-block ms-auto custom-btn">Post Komentar</button>
                </form>
            </div>
        </div>
    </main>
    <footer class="d-flex justify-content-center customFooter">
        <a>&copy; By Kelompok 2. All Rights Reserved.</a>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>