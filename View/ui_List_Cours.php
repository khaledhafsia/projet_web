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
require_once "../Controller/CoursC.php";
$M=get_all_matieres();
$Posts=Get_All_Cours();

if (isset($_GET["filter"]))
{
    $Posts=filter_mat($_GET["filter"],$Posts);
}
if (isset($_GET["search"]))
{
    if ($_GET["search"]!="")
        $Posts=search_filter($_GET["search"],$Posts);
}


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
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Nested row for non-featured blog posts-->
            <div class="column">
                <?php
                if ($Posts)
                {
                $F=0;
                foreach ($Posts as $post)
                {
                    ?>

                    <!-- Blog post-->
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="../Assets/images_cours/<?php echo $post->getFile() ?>" alt="..." /></a>                        <div class="card-body">
                            <div class="small text-muted"><?php echo $post->getDateUpload(); ?></div>
                            <h2 class="card-title h4"><?php echo $post->getTitre(); ?></h2>
                            <div class="small text-muted"><?php echo $post->getMatiere()->GetTitre(); ?></div>
                            <div class="small text-muted"><?php echo "Uploaded By :".$post->getEnseignat()->getUsername(); ?></div>
                            <p class="card-text"><?php echo substr($post->getContenu(), 0, 50)."..."; ?> </p>
                            <a class="btn btn-primary" href="<?php echo "ui_Post_Cours.php?id=".$post->getId(); ?>">Read more ???</a>
                        </div>
                    </div>
                    <?php
                    $F++;?>
                <?php }} ?>
            </div>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
            <div class="card mb-4">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <div class="input-group">
                        <form method="GET" action="ui_List_Cours.php">
                            <input class="form-control" id="search" name="search" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                            <input class="btn btn-primary" id="button-search" type="submit" value="Search">
                        </form>
                    </div>
                </div>
            </div>
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <?php
                                foreach ($M as $m) {
                                    ?>
                                    <li><a href="ui_List_Cours.php?filter=<?php echo $m->getId(); ?>"><?php echo $m->getTitre(); ?></a></li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widget-->
            <div class="card mb-4">
                <div class="card-header">Side Widget</div>
                <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
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
