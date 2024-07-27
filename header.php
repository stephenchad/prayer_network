<header id="home">

    <!-- Start Navigation -->
    <nav class="navbar navbar-default attr-border-none navbar-fixed navbar-transparent white bootsnav">

        <!-- Start Top Search -->
        <div class="container-full">
            <div class="row">
                <div class="top-search">
                    <div class="input-group">
                        <form action="#">
                            <input type="text" name="text" class="form-control" placeholder="Search">
                            <button type="submit">
                                <i class="ti-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Top Search -->

        <div class="container-full">

            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <li class="search"><a href="#"><i class="ti-search"></i></a></li>
                </ul>
            </div>
            <!-- End Atribute Navigation -->

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="assets/img/ism-logo-light.png" class="logo logo-display" alt="Logo">
                    <img src="assets/img/ism-logo-dark.png" class="logo logo-scrolled" alt="Logo">
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="dropdown">
                        <a href="index.php" class="">HOME</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us</a>
                        <ul class="dropdown-menu">
                            <li><a href="about-us.php">About Prayer Network</a></li>
                            <li><a href="http://christembassy-ism.org/about.php" target="_blank">About ISM</a></li>
                        </ul>
                    </li>
                    <!--
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Courses</a>
                            <ul class="dropdown-menu">
                                <li><a href="courses-grid.html">Course Grid</a></li>
                                <li><a href="courses-carousel.html">Course Carousel</a></li>
                                <li><a href="course-details.html">Course Details</a></li>
                            </ul>
                        </li>-->
                    <li class="dropdown">
                        <a href="prayer-coordinators.php"> Coordinators</a>

                    </li>
                    <!--
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" > Event</a>
                            <ul class="dropdown-menu">
                                <li><a href="event-1.html">Event Version One</a></li>
                                <li><a href="event-2.html">Event Version Two</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Blog</a>
                            <ul class="dropdown-menu">
                                <li><a href="blog-standard.html">Blog Standard</a></li>
                                <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                <li><a href="blog-single.html">Blog Single Standard</a></li>
                                <li><a href="blog-single-left-sidebar.html">Single Left Sidebar</a></li>
                                <li><a href="blog-single-right-sidebar.html">Single Right Sidebar</a></li>
                            </ul>
                        </li>-->
                    <li>
                        <a href="contact-us.php">contact</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Courses</a>
                        <ul class="dropdown-menu">
                            <?php $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>
                            <?php if (isset($_SESSION['minister_user_id'])) { ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="minister_dashboard.php">Minister</a></li>
                                        <li><a href="logout.php">Logout</a></li>
                                    </ul>
                                </li>

                            <?php } else if (isset($_SESSION["coordinator_user_id"])) { ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="coordinator_dashboard.php">Coordinator</a></li>
                                        <li><a href="logout.php">Logout</a></li>
                                    </ul>
                                </li>

                            <?php } else if (isset($_SESSION["admin_user_id"])) { ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="coordinator_dashboard.php">Admin</a></li>
                                        <li><a href="logout.php">Logout</a></li>
                                    </ul>
                                </li>

                            <?php } else if ((!isset($_SESSION["admin_user_id"])
                                    || !isset($_SESSION['coordinator_user_id'])
                                    || !isset($_SESSION['minister_user_id']))
                                && ($url == "http://localhost/cell-ministry/prayernetwork/login.php")
                            ) { ?>
                                <li><a href="register.php">Register</a></li>

                            <?php } else if ((!isset($_SESSION["admin_user_id"])
                                    || !isset($_SESSION['coordinator_user_id'])
                                    || !isset($_SESSION['minister_user_id']))
                                && ($url == "http://localhost/cell-ministry/prayernetwork/register.php")
                            ) { ?>
                                <li><a href="login.php">Login</a></li>
                            <?php } ?>
                            <?php
                            $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                            if ($url == "http://localhost/cell-ministry/prayernetwork/login") { ?>
                                <li><a href="register.php">Register</a></li>
                            <?php } else if ($url == "http://localhost/cell-ministry/prayernetwork/register") { ?>
                                <li><a href="login.php">Login</a></li>
                            <?php } else if (
                                $url == "http://localhost/cell-ministry/prayernetwork/index.php"
                                && (!isset($_SESSION['$admin_user_id'])
                                    || !isset($_SESSION['$coordinator_user_id'])
                                    || !isset($_SESSION['$minister_user_id']))
                            ) {  ?>
                                <li><a href="register.php">Register</a></li>
                                <li><a href="login.php">Login</a></li>
                            <?php  } ?>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
    <!-- End Navigation -->
</header>