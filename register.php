<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body,
        .containerLogin {
            background-image: url(assets/pictures/bgLogin.jpg);
            background-size: cover;
            width: 100%;
            height: 100vh;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
        }

        .login-container {
            background-image: url(assets/pictures/loginPicture1.png);
            background-size: cover;
            max-width: 400px;
            margin-left: 300px;
            padding: 20px 20px 5px 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .custom-btn {
            width: 100px;
        }

        .container {
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="containerLogin">
        <div class="col">
            <div class="login-container">
                <div class="mx-auto text-center">
                    <img src="assets/pictures/logoLB.png" alt="Logo UPNYK" width="100px" class="mb-2">
                    <h2 class="text-center editableJudul">Natify AloeVera</h2>
                    <p class="text-center mb-4">Natural Beautify Product</p>
                </div>
                <div class="mt-3 text-center">
                    <?php
                    if (isset($_GET["pesan"])) {
                        if ($_GET["pesan"] == "confirmgagal") {
                            echo '<div class="alert alert-warning mb-4" role="alert">Error! Konfirmasi password salah.</div>';
                        } else if ($_GET["pesan"] == "terdaftar") {
                            echo '<div class="alert alert-warning mb-4" role="alert">Error! Username sudah terdaftar.</div>';
                        } else {
                            echo '<div class="alert alert-danger mb-4" role="alert">Error!</div>';
                        }
                    }
                    ?>

                </div>
                <form action="handler/check_register.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter your username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="mb-3">
                        <label for="user_image" class="form-label">Upload Profile Image</label>
                        <input type="file" class="form-control" name="photo" required>
                    </div>
                    <button type="submit" class="btn btn-primary d-block mx-auto custom-btn">Register</button>
                </form>
                <p class="text-center">Already have an account? <a href="login.php">Login</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>