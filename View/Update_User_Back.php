<?php
require_once "../Controller/UserC.php";
session_start();
$error="";
$X=Get_one_User_Info($_GET["id"]);
if (!$X)
    header("Location: List_Users_Back.php");
$U=new User ($X["ID"],$X["Username"],$X["Password"],$X["Email"],$X["Role"],[]);
if (isset($_POST["Username"]) && isset($_POST["Email"]) && isset($_POST["Password"]) && isset($_POST["Role"]))
{

    if (!Check_Info1 ($_POST["Email"],$_POST["Username"],$_GET["id"]))
        $error="Username or Email is already Used";
    else {
        $U->setUsername($_POST["Username"]);
        $U->setEmail($_POST["Email"]);
        $U->setPassword($_POST["Password"]);
        $U->setRole($_POST["Role"]);
        Update_User($U);
        if ($U->getId()==$_SESSION["id"]) {
            $_SESSION["Username"] = $_POST["Username"];
            $_SESSION["Email"] = $_POST["Email"];
            $_SESSION["Password"] = $_POST["Password"];
            $_SESSION["Role"] = $_POST["Role"];
            header("Location: List_Users_Back.php");
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../Assets/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="Dashboard.php">Online Learning</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="#!">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="Dashboard.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Quizzes
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="List_Quizz_Back.php">Gestion Quizzes</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Cours
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="Add_Cours.php">Ajouter Cours</a>
                            <a class="nav-link" href="List_Cours_Back.php">Gestion Cours</a>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Addons</div>
                    <a class="nav-link" href="List_Users_Back.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Gestion  Users
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?php echo $_SESSION["Username"]; ?>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>




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
                                <form role="form" action="Update_User_Back.php?id=<?php echo $U->getId(); ?>" method="POST">
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
                                    <label for="Role">Role :</label>

                                    <select name="Role" id="Role">
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                            <option value="teacher">Teacher</option>
                                    </select>
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
