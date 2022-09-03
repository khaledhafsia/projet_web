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
    require_once "../Controller/CoursC.php";
    require_once "../Controller/QuizzC.php";
        if (isset($_GET["id"]))
        {
            $C=Get_Cours($_GET["id"]);
            if ($C===0)
            {
                header("Location: Register_Sccuess.html");
            }
        }
        else
        {
            header("Location: Register_Sccuess.html");
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
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><?php echo $C->getTitre(); ?></h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on <?php echo $C->getDateUpload()?></div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?php echo $C->getMatiere(); ?></a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?php echo $C->getEnseignat()->getUsername(); ?></a>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4"><?php echo $C->getContenu(); ?></p>
                        </section>
                        <section class="mb-5">
                            <?php
                            $Q=get_quizz_info_from_cours ($C->getId());
                            foreach ($Q as $q)
                            {
                                ?>
                                <a href="quizz.php?id=<?php echo $q->getId(); ?>"><?php echo $q->getTitre(); ?></a>
                            <?php } ?>
                        </section>

                    </article>
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
