<?php
include("config/db.php");
session_start();
if (isset($_POST["submit"])) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, sha1($_POST["password"]));
    $query = "SELECT * FROM user WHERE email = '$email'  AND password = '$password' ";

    $getUser = mysqli_query($conn, $query);

    if (mysqli_num_rows($getUser) > 0) {
        $row = mysqli_fetch_assoc($getUser);
        if ($row["user_role_id"] == '1') {
            $_SESSION["username"] = $row["username"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["admin_user_id"] = $row["user_id"];
            $_SESSION["admin_role_id"] = $row["user_role_id"];
            header("Location: admin-panel/dashboard.php");
        } elseif ($row["user_role_id"] == '2') {
            $_SESSION["username"] = $row["username"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["coordinator_user_id"] = $row["user_id"];
            $_SESSION["coordinator_role_id"] = $row["user_role_id"];
            header("Location: c_dashboard.php");
        } elseif ($row["user_role_id"] == '3') {
            $_SESSION["username"] = $row["username"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["minister_user_id"] = $row["user_id"];
            $_SESSION["minister_role_id"] = $row["user_role_id"];
            header("Location: u_dashboard.php");
        }
    } else {
        $message[] = "Incorrect email or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ISM Ministers' Prayer Network - Login">

    <!-- ========== Page Title ========== -->
    <title>The ISM Prayer Network - Login</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/flaticon-set.css" rel="stylesheet" />
    <link href="assets/css/themify-icons.css" rel="stylesheet" />
    <link href="assets/css/magnific-popup.css" rel="stylesheet" />
    <link href="assets/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/animate.css" rel="stylesheet" />
    <link href="assets/css/bootsnav.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5/html5shiv.min.js"></script>
      <script src="assets/js/html5/respond.min.js"></script>
    <![endif]-->

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">

</head>

<body>

    <!-- Start Login 
    ============================================= -->
    <div class="login-area default-padding">
        <div class="container">
            <?php
            if (isset($message)) {
                foreach ($message as $msg) {
                    echo '
                    <div class="message">
                      
                        <span>' . $msg . '</span>
                        <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                    </div>
                    ';
                }
            }


            ?>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">

                    <form action="#" id="login-form" class="white-popup-block">
                        <div class="login-custom">
                            <div class="heading">
                                <h4><i class="fas fa-sign-in-alt"></i> login Now</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Email*" type="email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password*" type="password">
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-md-12">
                                <div class="row">
                                    <label for="login-remember"><input type="checkbox" id="login-remember">Remember Me</label>
                                    <a title="Lost Password" href="#" class="lost-pass-link">Lost your password?</a>
                                </div>
                            </div> -->


                            <div class="col-md-12">
                                <div class="row">
                                    <button type="submit" name="submit">Login</button>
                                </div>
                            </div>
                            <p class="link-bottom">Not a member yet? <a href="register.php">Register now</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login Area -->

    <!-- Start Footer 
    ============================================= -->
    <footer class="bg-dark text-light">

        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy; 2024. All Rights Reserved by &nbsp;<a href="https://christembassy-ism.org" target="_blank"> The International School Of Ministry</a></p>
                    </div>
                    <div class="col-md-6 text-right link">
                        <ul>
                            <li>
                                <a href="#">Terms of user</a>
                            </li>
                            <li>
                                <a href="#">License</a>
                            </li>
                            <li>
                                <a href="#">Support</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/equal-height.min.js"></script>
    <script src="assets/js/jquery.appear.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/modernizr.custom.13711.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/progress-bar.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/count-to.js"></script>
    <script src="assets/js/YTPlayer.min.js"></script>
    <script src="assets/js/loopcounter.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/bootsnav.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>