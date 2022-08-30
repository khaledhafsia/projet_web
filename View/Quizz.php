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
                                    Quizz
                                </h2>

                                <div class="col-lg-8">
                                    <!-- Post content-->
                                    <article>
                                        <form role="form">
                                            <div class="form-group">

                                                <label for="exampleInputEmail1">
                                                    <h4>Question 1 :</h4>
                                                </label>
                                                <input type="email" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group">

                                                <label for="exampleInputEmail1">
                                                    <h4>Question 2 :</h4>
                                                </label>
                                                <input type="email" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group">

                                                <label for="exampleInputEmail1">
                                                    <h4>Question 3 :</h4>
                                                </label>
                                                <input type="email" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group">

                                                <label for="exampleInputEmail1">
                                                    <h4>Question 4 :</h4>
                                                </label>
                                                <input type="email" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group">

                                                <label for="exampleInputEmail1">
                                                    <h4>Question 5 :</h4>
                                                </label>
                                                <input type="email" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group">

                                                <label for="exampleInputEmail1">
                                                    <h4>Question 6 :</h4>
                                                </label>
                                                <input type="email" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group">

                                                <label for="exampleInputEmail1">
                                                    <h4>Question 7 :</h4>
                                                </label>
                                                <input type="email" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group">

                                                <label for="exampleInputEmail1">
                                                    <h4>Question 8 :</h4>
                                                </label>
                                                <input type="email" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group">

                                                <label for="exampleInputEmail1">
                                                    <h4>Question 9 :</h4>
                                                </label>
                                                <input type="email" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group">

                                                <label for="exampleInputEmail1">
                                                    <h4>Question 10 :</h4>
                                                </label>
                                                <input type="email" class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-success">
                                                Submit
                                            </button>
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
