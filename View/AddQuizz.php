<?php
require "../Controller/QuizzC.php";
require "../Controller/CoursC.php";
require_once "../Model/Quizz.php";
require_once "../Model/Quizz_Question.php";
require_once "../Model/Cours.php";

session_start();
if (!isset ($_GET["id"]))
    header("Location: List_Cours_Back.php");
if (!Get_Cours ($_GET["id"]))
    header("Location: List_Cours_Back.php");


$c=new Cours ($_GET["id"],"","","","","");
    if (isset ($_SESSION["id"])) {
        if ($_SESSION["Role"] == "user")
            header("Home.php");
        $Post_Exists=true;
        for ($i=1;$i<11;$i++) {
            if (!isset($_POST["Question_".$i]))
                $Post_Exists=false;
            if (!isset($_POST["Answer_".$i]))
                $Post_Exists=false;
        }
        if (isset($_POST["Titre"]) && $Post_Exists==true) {
            $A=[];
            for ($i=1;$i<11;$i++) {
                $Q = new Quizz_Question($_POST["Question_" . $i], $_POST["Answer_" . $i], $i);
                array_push($A,$Q);
            }
            $q= new Quizz(0,$_POST["Titre"],20,$c,$A);
            add_quizz($q);
            header("Location: List_Quizz_Back.php");
        }
    } else
        header("Location: login.php");


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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h3>
                            Add Quizz

                        </h3>
                        <form role="form" action="AddQuizz.php?id=<?php echo $c->getId(); ?>" method="POST">
                            <div class="form-group">
                                <label for="Titre">
                                    <h4>Titre  :</h4>
                                </label>
                                <input type="text" class="form-control" id="Titre" name="Titre">
                                <?php
                                for($i=1;$i<11;$i++) {?>
                                    <label for="Question_<?php echo $i;?>">
                                        <h4>Question <?php echo $i;?> :</h4>
                                    </label>
                                    <input type="text" class="form-control" id="Question_<?php echo $i;?>" name="Question_<?php echo $i;?>">
                                    <label for="Answer_<?php echo $i;?>">
                                        <h4>Answer <?php echo $i;?>  :</h4>
                                    </label>
                                    <input type="text" class="form-control" id="Answer_<?php echo $i;?>" name="Answer_<?php echo $i;?>">
                                <?php } ?>
                            </div>
                            <br>

                            <input type="submit" class="btn btn-success" value="Submit">
                        </form>

                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2022</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../Assets/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="../Assets/assets/demo/chart-area-demo.js"></script>
<script src="../Assets/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="../Assets/js/datatables-simple-demo.js"></script>
</body>
</html>
