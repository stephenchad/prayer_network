<?php include("config/db.php"); ?>
<?php session_start() ?>
<?php
$minister_user_id =  $_SESSION["minister_user_id"];
if (!isset($minister_user_id)) {
    header("location:login.php");
}
if (isset($_POST["submitMinisterData"])) {
    $minister_id = $_SESSION["minister_user_id"];

    $minister_name = $_SESSION["username"];

    $minister_title = mysqli_real_escape_string($conn, $_POST["minister_title"]);

    $minister_name = mysqli_real_escape_string($conn, $_POST["minister_name"]);

    $email = mysqli_real_escape_string($conn, $_POST["email"]);

    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);

    $country = mysqli_real_escape_string($conn, $_POST["country"]);

    $language = mysqli_real_escape_string($conn, $_POST["language"]);

    $ministry = mysqli_real_escape_string($conn, $_POST["ministry"]);

    $minister_role_id  = $_SESSION["minister_role_id"];

    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['name']['tmp_name'];
    $img_path = 'uploads/ministers/' . $image;

    if (!empty($image)) {
        if ($image_size > 2000000) {
            $message[] = 'image file size is too large';
        } else {
            $ministerProfile = "INSERT INTO minister (minister_title, minister_name, email,password, phone, country, language, ministry, image) VALUES ('$testimony_title', '$minister_title', '$minister_name', '$email','$password', '$phone', '$country', '$language', '$ministry', '$image')";
            mysqli_query($conn, $ministerProfile);
            move_uploaded_file($tmp_name, $image_path);
            header('Location: m_dashboard.php');
        }
    }
}

?>
<?php include("c-panel/partials/c_header.php");   ?>
<!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Components</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Settings</button>
                    <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item" href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->


        <div class="card rounded-4">
            <div class="card-body p-4">
                <div class="position-relative mb-5">
                    <img src="https://placehold.co/1920x500/png" class="img-fluid rounded-4 shadow" alt="">
                    <div class="profile-avatar position-absolute top-100 start-50 translate-middle">
                        <img src="https://placehold.co/110x110/png" class="img-fluid rounded-circle p-1 bg-grd-danger shadow" width="170" height="170" alt="">
                    </div>
                </div>
                <div class="profile-info pt-5 d-flex align-items-center justify-content-between">
                    <div class="">
                        <h3>Jhon Deo</h3>
                        <p class="mb-0">Engineer at BB Agency Industry<br>
                            New York, United States</p>
                    </div>
                    <div class="">
                        <a href="javascript:;" class="btn btn-grd-primary rounded-5 px-4"><i class="bi bi-chat me-2"></i>Send Message</a>
                    </div>
                </div>
                <div class="kewords d-flex align-items-center gap-3 mt-4 overflow-x-auto">
                    <button type="button" class="btn btn-sm btn-light rounded-5 px-4">UX Research</button>
                    <button type="button" class="btn btn-sm btn-light rounded-5 px-4">CX Strategy</button>
                    <button type="button" class="btn btn-sm btn-light rounded-5 px-4">Management</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-8">
                <div class="card rounded-4 border-top border-4 border-primary border-gradient-1">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start justify-content-between mb-3">
                            <div class="">
                                <h5 class="mb-0 fw-bold">Edit Profile</h5>
                            </div>
                            <div class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                                    <span class="material-icons-outlined fs-5">more_vert</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                                </ul>
                            </div>
                        </div>

                        <form method="post" action="uploadMinisterProfile.php" enctype="multipart/form-data" class="row g-4">


                            <div class="col-md-6">
                                <label for="input1" class="form-label">Title</label>
                                <input type="text" name="username" class="form-control" id="input1" placeholder="stephenchad">
                            </div>

                            <div class="col-md-6">
                                <label for="input1" class="form-label">Title</label>
                                <input type="text" name="minister_title" class="form-control" id="input1" placeholder="Pastor">
                            </div>

                            <div class="col-md-6">
                                <label for="input2" class="form-label">Minister Name</label>
                                <input type="text" name="minister_name" class="form-control" id="input2" placeholder="Stephen Chad Ethan">
                            </div>

                            <div class="col-md-6">
                                <label for="input2" class="form-label">Minister Email</label>
                                <input type="email" name="email" class="form-control" id="input2" placeholder="stephethanchad@gmail.com">
                            </div>

                            <div class="col-md-6">
                                <label for="input2" class="form-label">Minister Password</label>
                                <input type="password" name="password" class="form-control" id="input2" placeholder="xxxxxx">
                            </div>

                            <div class="col-md-6">
                                <label for="input2" class="form-label">Minister Phone</label>
                                <input type="tel" name="phone" class="form-control" id="input2" placeholder="+2347066649111">
                            </div>

                            <div class="col-md-12">
                                <label for="input7" class="form-label">Minister Country</label>
                                <select id="input7" name="country" class="form-select">
                                    <option selected="">Choose...</option>
                                    <option value="USA">USA</option>
                                    <option value="UK">UK</option>
                                    <option value="CANADA">CANADA</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="input7" class="form-label">Minister Language</label>
                                <select id="input7" name="language" class="form-select">
                                    <option selected="">Choose...</option>
                                    <option value="English">English</option>
                                    <option value="French">French</option>
                                    <option value="Spanish">Spanish</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="input2" class="form-label">Minister Name</label>
                                <input type="text" name="ministry" class="form-control" id="input2" placeholder="Phenom">
                            </div>

                            <div class="mb-4">
                                <label for="" class="form-label">Upload Image</label>
                                <input type="file" name="image" accept="image/*" class="form-control" id="image" required>
                            </div>

                            <div class="col-md-12">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="button" name="submitMinisterData" class="btn btn-grd-primary px-4">Upload Profile</button>
                                    <button type="button" class="btn btn-light px-4">Reset</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-3">
                            <div class="">
                                <h5 class="mb-0 fw-bold">About</h5>
                            </div>
                            <div class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                                    <span class="material-icons-outlined fs-5">more_vert</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="full-info">
                            <div class="info-list d-flex flex-column gap-3">
                                <div class="info-list-item d-flex align-items-center gap-3"><span class="material-icons-outlined">account_circle</span>
                                    <p class="mb-0">Full Name: Jhon Deo</p>
                                </div>
                                <div class="info-list-item d-flex align-items-center gap-3"><span class="material-icons-outlined">done</span>
                                    <p class="mb-0">Status: active</p>
                                </div>
                                <div class="info-list-item d-flex align-items-center gap-3"><span class="material-icons-outlined">code</span>
                                    <p class="mb-0">Role: Developer</p>
                                </div>
                                <div class="info-list-item d-flex align-items-center gap-3"><span class="material-icons-outlined">flag</span>
                                    <p class="mb-0">Country: USA</p>
                                </div>
                                <div class="info-list-item d-flex align-items-center gap-3"><span class="material-icons-outlined">language</span>
                                    <p class="mb-0">Language: English</p>
                                </div>
                                <div class="info-list-item d-flex align-items-center gap-3"><span class="material-icons-outlined">send</span>
                                    <p class="mb-0">Email: jhon.xyz</p>
                                </div>
                                <div class="info-list-item d-flex align-items-center gap-3"><span class="material-icons-outlined">call</span>
                                    <p class="mb-0">Phone: (124) 895-6724</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div><!--end row-->
    </div>
</main>
<!--end main wrapper-->
<script>
    $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active');
</script>
<?php include("c-panel/partials/c_footer.php");   ?>