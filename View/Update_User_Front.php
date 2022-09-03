<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Home - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../Assets/img/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../Assets/css/styles.css" rel="stylesheet" />
</head>
<?php
require_once "../Controller/UserC.php";

session_start();
$error="";
$U=new User($_SESSION["id"],$_SESSION["Username"],$_SESSION["Password"],$_SESSION["Email"],$_SESSION["Role"],[]);
if (isset($_POST["Username"]) && isset($_POST["Email"]) && isset($_POST["Password"]))
{

    if (!Check_Info1 ($_POST["Email"],$_POST["Username"],$_SESSION["id"]))
        $error="Username or Email is already Used";
    else {
        $U->setUsername($_POST["Username"]);
        $U->setEmail($_POST["Email"]);
        $U->setPassword($_POST["Password"]);
        Update_User($U);
        $_SESSION["Username"]=$_POST["Username"];
        $_SESSION["Email"]=$_POST["Email"];
        $_SESSION["Password"]=$_POST["Password"];
    }
}

?>
<body>
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#!">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Page header with logo and tagline-->
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Welcome to Blog Home!</h1>
            <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
        </div>
    </div>
</header>

<!-- Page content-->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2>
                            Update User
                        </h2>

                        <div class="col-lg-8">
                            <!-- Post content-->
                            <article>
                                <form role="form" action="Update_User_Front.php" method="POST">
                                    <div class="form-group">
                                            <br>
                                            <label for="Username">
                                                <h4>Username :</h4>
                                            </label>
                                            <input type="text" class="form-control" id="Username" name="Username" value="<?php echo $U->getUsername() ?>">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <br>
                                        <label for="Email">
                                            <h4>Email :</h4>
                                        </label>
                                        <input type="Email" class="form-control" id="Email" name="Email" value="<?php echo $U->getEmail() ?>">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <br>
                                        <label for="Password">
                                            <h4>Password :</h4>
                                        </label>
                                        <input type="Password" class="form-control" id="Password" name="Password" value="<?php echo $U->getPassword() ?>">
                                    </div>
                                    <br>
                                    <?php echo $error; ?>
                                    <input type="submit" class="btn btn-success" value="Submit">
                                    <br>
                                </form>
                                <br>

                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="../Assets/js/scripts.js"></script>
</body>
</html>
