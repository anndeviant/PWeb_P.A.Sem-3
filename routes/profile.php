<?php
session_start();
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
            min-height: calc(100vh - 60px);
            padding-top: 60px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .headerProfile {
            min-height: 60px;
        }

        .contentProfile {
            display: flex;
            justify-content: space-between;
            padding: 30px 50px 30px 50px;
            width: calc(100vw - 200px);
            height: calc(100vh - 150px);
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

        .editedProfileOn {
            width: 600px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .edit-Gambar {
            width: 225px;
            flex-direction: column;
        }

        .custom-chosen {
            width: 105px;
        }

        .profileKiri img.rounded-circle,
        .edit-Gambar img.rounded-circle,
        .profilePhoto {
            object-fit: cover;
        }

        .customContainerKanan {
            justify-content: space-between;
        }

        .customFooter {
            background-color: #006900;
            color: white;
            padding: 2px 0;
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
                        <a class="d-flex align-items-center" href="profile.php"><img class="me-1" src="../assets/pictures/edit.png" alt="gambar" width=15px">Edit Profile</a>
                    </div>
                </div>
                <div class="">
                    <div>
                        <a href="profile.php" class="d-flex align-items-center custom-link mt-3 mb-0"><img class="me-1" src="../assets/pictures/userhitam.png" alt="Gambar" width="15px">Profile saya</a>
                        <a href="pesanan_saya.php" class="d-flex align-items-center custom-link "><img class="me-1" src="../assets/pictures/file.png" alt="Gambar" width="15px">Pesanan saya</a>
                    </div>
                    <a href="../handler/logout.php">Log Out</a>
                </div>
            </div>
            <div class="profileKanan">
                <h3>Profil Saya</h3>
                <a>Kelola informasi profil Anda untuk mengontrol, melindungi, dan mengamankan akun.</a>
                <hr>
                <div class="d-flex customContainerKanan">
                    <form action="../handler/updateProfile.php" method="POST" enctype="multipart/form-data" class="d-flex customFormKanan">
                        <div class="editedProfileOn">
                            <table>
                                <tr>
                                    <td style="width: 20%;">Username</td>
                                    <td style="width: 25px"></td>
                                    <td>
                                        <input class="form-control" style="width: 100%;" type="text" name="username" value="<?php echo $username; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td></td>
                                    <td>
                                        <input class="form-control" type="password" name="password" value="<?php echo $password; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td></td>
                                    <td>
                                        <input class="form-control" type="text" name="email" value="<?php echo $emailUser; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nomor Telefon</td>
                                    <td></td>
                                    <td>
                                        <input class="form-control" type="text" name="telephone" value="<?php echo $nomorHp; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td></td>
                                    <td>
                                        <input class="form-control" type="text" name="address" value="<?php echo $alamat; ?>">
                                    </td>
                                </tr>
                            </table>
                            <?php
                            if (isset($_GET["pesan"])) {
                                if ($_GET["pesan"] == "berhasilUpdate") {
                                    echo '<div class="alert alert-success mb-1" role="alert">Anda berhasil Update Profile!</div>';
                                } else if ($_GET["pesan"] == "notUpdated") {
                                    echo '<div class="alert alert-warning mb-1" role="alert">Anda tidak Update Profile!</div>';
                                }
                            }
                            ?>
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                        <div class="d-flex justify-content-center align-items-center edit-Gambar">
                            <img class="rounded-circle" id="profileImage" src="../assets/uploads/users/<?php echo $foto ?>" alt="Profile Photo" width="200px" height="200px">
                            <div class="mb-3 text-center mt-2">
                                <label for="user_image" class="form-label">Change Profile Image</label>
                                <input type="file" class="form-control custom-chosen mx-auto d-flex align-items-center" name="photo" id="photoInput" onchange="previewImage()">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer class="d-flex justify-content-center customFooter">
        <a>&copy; By Kelompok 2. All Rights Reserved.</a>
    </footer>
    <script>
        function previewImage() {
            var input = document.getElementById('photoInput');
            var image = document.getElementById('profileImage');

            var reader = new FileReader();

            reader.onload = function(e) {
                image.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>