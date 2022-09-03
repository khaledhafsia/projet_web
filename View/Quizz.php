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
    if (isset ($_GET["id"]))
    {

        $Q=get_quizz_info ($_GET["id"]);
        if (! $Q)
        {
            header("Location: Register_Sccuess.html");
        }
        if (get_quizz_passage ($_GET["id"],$_SESSION["id"]))
        {
            header("Location: Quizz_end.php?id=".$Q->getId());
        }
        if (isset ($_POST["Question_1"])&&isset ($_POST["Question_2"])&&isset ($_POST["Question_3"])&&isset ($_POST["Question_4"])&&isset ($_POST["Question_5"])
            &&isset ($_POST["Question_6"])&&isset ($_POST["Question_7"])&&isset ($_POST["Question_8"])&&isset ($_POST["Question_9"])&&isset ($_POST["Question_10"]))
        {
            $note=0;
            $A=[];
            $responses=[];
            for ($i=1;$i<11;$i++)
            {
                $que=new Quizz_Question("",$_POST["Question_".$i],$i);
                array_push($A,$que);
            }
            foreach ($Q->getQuestions() as $q)
            {
                if ($A[$q->getNumber()-1]->getAnswer()==$q->getAnswer())
                {
                    $note+=2;
                    array_push($responses,"S");
                }
                else
                    array_push($responses,"F");

            }
            add_quizz_passage($Q->getId(),$_SESSION["id"],$note);
            header("Location: Quizz_end.php?id=".$Q->getId());

        }
    }


    else
        header("Location: Register_Sccuess.html");

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
                                        <form role="form" action="Quizz.php?id=<?php echo $Q->getId(); ?>" method="POST">
                                            <div class="form-group">
                                            <?php $QS=$Q->getQuestions();
                                            foreach ($QS as $q) {?>
                                                <br>
                                                <label for="exampleInputEmail1">
                                                    <h4>Question <?php echo $q->getNumber();?> :</h4>
                                                    <p><?php echo $q->getQuestion(); ?></p>
                                                </label>
                                                <input type="text" class="form-control" id="Question_<?php echo $q->getNumber();?>" name="Question_<?php echo $q->getNumber();?>">
                                            <?php } ?>
                                            </div>
                                            <br>

                                            <input type="submit" class="btn btn-success" value="Submit">
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
