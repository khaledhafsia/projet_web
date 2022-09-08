<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Post - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../Assets/img/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../Assets/css/styles.css" rel="stylesheet" />
    </head>
    <?php
    session_start();
    require_once "../Controller/CoursC.php";
    require_once  "../Controller/QuizzC.php";
    if (!isset($_SESSION["id"]))
        header("Location: login.php");
    if (isset ($_GET["id"]))
    {
        $Note=9;
        $Q=get_quizz_info ($_GET["id"]);
        if (! $Q)
        {
            header("Location: Register_Sccuess.html");
        }

        if (!get_quizz_passage ($_GET["id"],$_SESSION["id"]))
        {
            header("Location: Quizz.php?id=".$Q->getId());
        }
        $A=get_quizz_passage ($_GET["id"],$_SESSION["id"]);
    }


    else
        header("Location: Register_Sccuess.html");

    ?>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="home.php">Online Learning</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="ui_List_Cours.php">Espace Etudiants</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>
                                    Quizz <?php echo $Q->getTitre();?>
                                </h2>

                                <div class="col-lg-8">
                                    <!-- Post content-->
                                    <article>
                                        <form role="form">
                                            <div class="form-group">
                                            <?php $QS=$Q->getQuestions();
                                            foreach ($QS as $q) {?>
                                                <br>
                                                <label for="exampleInputEmail1">
                                                    <h4>Question <?php echo $q->getNumber();?> :</h4>
                                                    <p><?php echo $q->getQuestion(); ?></p>
                                                </label>
                                                <input disabled type="text" class="form-control" value="<?php echo $q->getAnswer();?>" id="Question_<?php echo $q->getNumber();?>" name="Question_<?php echo $q->getNumber();?>">
                                            <?php } ?>
                                            </div>
                                            <br>
                                            <?php if ($A->getNote()<10) {?>
                                            <h2 style="color: red">
                                                Note : <?php echo $A->getNote()." Echoué";?>
                                            </h2>
                                            <?php } else {?>
                                            <h2 style="color: green">
                                                Note : <?php echo $A->getNote()." Reussi";?>
                                            </h2>
                                            <?php } ?>
                                            <p>Passé le <?php echo $A->getTime(); ?></p>

                                        </form>
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
