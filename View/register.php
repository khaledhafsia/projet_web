<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="../Assets/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <?php
    $error="";
    $id=0;
    include "../Controller/UserC.php";
    require_once "../Model/User.php";
    if (isset($_POST["Username"]) && isset($_POST["Password"]) && isset($_POST["Email"]) && isset($_POST["Password_Confirm"]))
    {
        $New_User=new User(0,$_POST["Username"],$_POST["Password"],$_POST["Email"],"User",[]);
        if ($_POST["Password"]!=$_POST["Password_Confirm"])
            $error= "Les deux mot de passes sont differents";
        else
        {

            if (Check_Info ($New_User->getEmail(),$New_User->getUsername(),$id))
            {
                Create_User($New_User);

                header("Location: Register_Sccuess.html");
            }
            else
            {
                $error="Les informations appartiennent à un autre utilisateur !";
            }

        }
    }
    ?>
    <body class="body-asuka">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form action="register.php" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="Username" name="Username" type="input" placeholder="name@example.com" />
                                                <label for="Username">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="Email" name="Email" type="email" placeholder="name@example.com" />
                                                <label for="Email">Email address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="Password" name="Password" type="password" placeholder="Create a password" />
                                                        <label for="Password">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="Password_Confirm" name="Password_Confirm" type="password" placeholder="Confirm password" />
                                                        <label for="Password_Confirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                                <p style="color:#FF0000">
                                                <?php
                                                    echo $error;
                                                ?>
                                                </p>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input class="btn btn-primary btn-block" type="submit" value="Create Account"></input></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
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
        <script src="./Assets/js/scripts.js"></script>
    </body>
</html>
