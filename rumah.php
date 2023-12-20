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
    $foto = "user.png";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>AloeVera</title>
</head>

<body>
    <header class="headerProfile">
        <nav class="navbar bg-body-primary navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">
                <div class="h1Editable">
                    <a class="navbar-brand"><img class="me-3 mb-1" src="assets/pictures/logoLB.png" alt="Logonya" width="40px" style="object-fit: cover;">Natify AloeVera</a>
                </div>
                <div class="nav-list d-flex justify-content-center align-items-center">
                    <a href="rumah.php" class="navbar-brand active custom-NAVBAR">Home</a>
                    <a href="routes/product.php" class="navbar-brand">Product</a>
                    <a href="routes/cart.php" class="navbar-brand">Cart</a>
                    <a href="routes/about.php" class="navbar-brand">Forum</a>
                    <div class="dropdown">
                        <a href="routes/profile.php" class="navbar-brand"> <img class="profilePhoto rounded-circle" src="assets/uploads/users/<?php echo $foto ?>" alt="Profile Photo" width="30px" height="30px"></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="routes/profile.php">Profil Saya</a>
                            <a class="dropdown-item" href="routes/pesanan_saya.php">Pesanan Saya</a>
                            <a class="dropdown-item" href="handler/logout.php">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="wrapper-mainRumah">
        <div class="carousel-Wrapper">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/pictures/promo1.jpg" class="d-block customCarousel" alt="Carousel">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/pictures/promo2.jpg" class="d-block customCarousel" alt="Carousel">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/pictures/promo3.webp" class="d-block customCarousel" alt="Carousel">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="articleWrapper">
            <div class="mx-auto text-center">
                <h1 class="d-block mb-3">Natify AloeVera</h1>
                <div class="content-Article1">
                    <figure class="d-flex customFigureHome1">
                        <img class="me-5" src="assets/home/lidahbuayaHome1.jpeg" alt="Aloe Vera Image" class="img-fluid">
                        <figcaption style="width: calc(100% - 500px);" class="d-flex figCustom">
                            <h5>Natural Beautify Aloe Vera</h5>
                            <p>Welcome to Natify AloeVera! Aloe vera telah dikenal secara luas karena sifat penyembuhan alaminya yang luar biasa. Kandungan gel dalam daun aloe vera kaya akan nutrisi, vitamin, dan antioksidan yang dapat memberikan kelembapan optimal untuk kulit, membantu mengurangi peradangan, dan mendukung regenerasi sel-sel kulit.
                                <br>Keunggulan produk kami terletak pada pemanfaatan potensi aloe vera ini untuk menciptakan solusi perawatan kulit alami yang menyegarkan dan memberikan kelembutan tahan lama. Temukan manfaat sejati dari keajaiban aloe vera melalui rangkaian produk kami yang inovatif, dirancang untuk memberikan pengalaman perawatan kulit yang istimewa.
                            </p>
                            <h5>Kenapa Aloe Vera?</h5>
                            <p>Aloe vera secara alami mengandung banyak kelembapan, membantu menjaga kulit tetap terhidrasi.
Merupakan agen peremajaan kulit yang membantu mengurangi garis halus dan kerutan, memberikan kulit tampilan yang lebih muda.
                            </p>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="mx-auto text-center">
                <h1 class="d-block mb-3">Manfaat Aloe Vera (Lidah Buaya)</h1>
                <div class="content-Article1">
                    <figure class="d-flex customFigureHome1">
                        <figcaption style="width: calc(100% - 500px);" class="d-flex figCustom">
                            <h5>Keanggunan Alami dan Organik</h5>
                            <a>Natify Aloevera menggunakan aloe vera sebagai bahan dasar, yang dikenal karena sifat alami penyembuhnya.
Tidak mengandung bahan kimia berbahaya atau zat sintetis, sehingga cocok untuk semua jenis kulit, bahkan yang sensitif sekalipun.</a>
                            <hr>
                            <h5>Antiinflamasi dan Menenangkan</h5>
                            <a>Aloe vera terkenal karena sifat antiinflamasi yang dapat membantu meredakan kemerahan dan peradangan pada kulit.
Cocok untuk kulit yang teriritasi atau terbakar sinar matahari, memberikan efek menenangkan.</a>
                            <hr>
                            <h5>Aroma Alami dan Aroma Terapi</h5>
                            <a>memberikan pengalaman relaksasi dan aroma terapi untuk setiap tetes Natify AloeVera.</a>
                            <hr>
                        </figcaption>
                        <img class="ms-5" src="assets/home/lidahbuayaHome2.jpg" alt="Aloe Vera Image" class="img-fluid">
                    </figure>
                </div>
            </div>
        </div>
        <section class="containerHome" id="home">
            <div class="contentHome">
                <article class="trendContent">
                    <figure class="topPicture">
                        <img src="assets/home/news.png" alt="Picture">
                        <figcaption> <a href="">Ungkap Keajaiban Aloe Vera dalam Setiap Tetes Produk Natify!</a>
                        </figcaption>
                    </figure>
                    <ul class="datatopPic">
                        <li>AloeVista Vignettes</li>
                        <li>18 September 2023</li>
                        <li><img src="assets/icons/eye.png" alt="View" width="10px" height="10px">28445 Viewers</li>
                        <li><img src="assets/icons/share.png" alt="Shares" width="10px" height="10px">Shares</li>
                    </ul>
                </article>
                <article class="newsContent">
                    <ul class="recentTop">
                        <li>Recent News</li>
                        <li><a id="allrecentnews" href="">All Recent News</a></li>
                    </ul>
                    <ul class="recentNewsSmall">
                        <li>
                            <img src="assets/home/news2.jpg" alt="Sepak Bola">
                            <div>
                                <a class="konteks sports" href="">Lotion</a>
                                <a href="">Perawatan Kulit Revolusioner: Aloe Vera Murni untuk Tampil Cantik Alami</a>
                                <span>By NatureNectar<figure class="figureNewsKecil"><img id="mataRecentTop" src="assets/icons/eye.png" alt="Mata">27743
                                        Viewers</figure></span>
                            </div>
                        </li>
                        <li>
                            <img src="assets/home/news3.jpg" alt="Bisnis">
                            <div>
                                <a class="konteks business" href="">Gel</a>
                                <a href="">"Perawatan Kulit Revolusioner: Aloe Vera Murni untuk Tampil Cantik Alami"</a>
                                <span>By ZenBotanics<figure class="figureNewsKecil"><img id="mataRecentTop" src="assets/icons/eye.png" alt="Mata">13281
                                        Viewers</figure></span>
                            </div>
                        </li>
                        <li>
                            <img src="assets/home/news4.jpg" alt="clothes">
                            <div>
                                <a class="konteks lifestyle" href="">Sampoo</a>
                                <a href="">Rahasia Kecantikan Terungkap: Aloe Vera, Keajaiban alami untuk Rambut</a>
                                <span>By Galang<figure class="figureNewsKecil"><img id="mataRecentTop" src="assets/icons/eye.png" alt="Mata">9425
                                        Viewers</figure></span>
                            </div>
                        </li>
                        <li>
                            <img src="assets/home/news5.jpg" alt="matrics">
                            <div>
                                <a class="konteks technology" href="">Lip Balm</a>
                                <a href="">Merayakan Tahun Pertama: Perjalanan Sukses Produk Natify Aloe Vera </a>
                                <span>By CelestialSap <figure class="figureNewsKecil"><img id="mataRecentTop" src="assets/icons/eye.png" alt="Mata">7340
                                        Viewers</figure></span>
                            </div>
                        </li>
                    </ul>
                </article>
            </div>
        </section>
    </main>
    <footer class="d-flex justify-content-center customFooter">
        <a>&copy; By Kelompok 2. All Rights Reserved.</a>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(document).ready(function() {
            setInterval(function() {
                $('.carousel').carousel('next');
            }, 3000);
        });
    </script>
</body>

</html>
