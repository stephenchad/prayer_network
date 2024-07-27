<?php
include("config/db.php");
if (isset($_POST["submit"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
    $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, sha1($_POST["password"]));
    $conf_password = mysqli_real_escape_string($conn, sha1($_POST["email"]));
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $country = mysqli_real_escape_string($conn, $_POST["country"]);
    $language = mysqli_real_escape_string($conn, $_POST["language"]);
    $ministry = mysqli_real_escape_string($conn, $_POST["ministry"]);
    $user_role_id = $_POST["user_role_id"];

    $getUser = mysqli_query($conn, "SELECT * FROM user WHERE phone = '$phone' ");
    if (mysqli_num_rows($getUser) > 0) {
        $message[] = "User already exists!";
    } else {
        if ($password != $conf_password) {
            $message[] = "Password and confirm password do not match!";
        } else {
            $sql = "INSERT INTO user (title, firstname, lastname, email, password, phone, country, language, ministry, user_role_id)  VALUES ('$title',   '$firstname', '$lastname', '$email',  '$password', '$phone',  '$country',  '$language',  '$ministry', '$user_role_id')";
            mysqli_query($conn, $sql);
            header("Location: login.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>,
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ISM Ministers' Prayer Network - ">

    <!-- ========== Page Title ========== -->
    <title>ISM Ministers' Prayer Network - Register</title>

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

    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->



    <!-- Start Login
    ============================================= -->
    <div class="login-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0">
                    <form action="#" method="post" id="login-form" class="white-popup-block">
                        <div class="login-custom">
                            <div class="heading">
                                <h4><i class="fas fa-edit"></i> Register Now</h4>
                            </div>

                            <div class="col-md-4">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" name="title" placeholder="Title*" type="Title">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input class="form-control" name="firstname" placeholder="First Name*" type="text">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input class="form-control" name="lastname" placeholder="Last Name*" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input class="form-control" name="email" placeholder="Email*" type="email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input class="form-control" name="phone" placeholder="Phone Number*" type="phone">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input class="form-control" name="password" placeholder="Password*" type="password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input class="form-control" name="conf_password" placeholder="Confirm Password*" type="password">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input class="form-control" name="country" placeholder="Country*" type="text">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input class="form-control" name="language" placeholder="Language*" type="language">
                                    </div>
                                </div>
                            </div>


                            <!-- <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input class="form-control" name="username" placeholder="Create Username*" type="text">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input class="form-control" name="password" placeholder="Create Password*" type="text">
                                    </div>
                                </div>
                            </div> -->


                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" name="ministry" placeholder="Name Of Ministry" type="text">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <select type="text" name="user_role_id" class="form-control">
                                            <option value="Admin">Admin</option>
                                            <option value="Coordinator">Coordinator</option>
                                            <option value="User">User</option>
                                            <?php
                                            $getRoles = mysqli_query($conn, "SELECT user_role_id FROM user WHERE user_role_id = '1'");
                                            if (mysqli_num_rows($getRoles) > 0) { ?>
                                                <option value="2">Coordinator</option>
                                                <option value="3">User</option>
                                            <?php } else { ?>
                                                <option value="1">Admin</option>
                                                <option value="2">Coordinator</option>
                                                <option value="3">User</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="row">
                                    <button type="submit" name="submit">Sign up</button>
                                </div>
                            </div>
                            <p class="link-bottom">Are you a member? <a href="#">Login now</a></p>
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