<?php include("config/db.php"); ?>
<?php session_start(); ?>
<?php
$admin_user_id =  $_SESSION["admin_user_id"];
if (!isset($admin_user_id)) {
    header("location:login.php");
}
if (isset(($_POST["submitPrayerSession"]))) {
    $prayer_host = mysqli_real_escape_string($conn, $_POST['prayer_host']);
    $prayer_focus = mysqli_real_escape_string($conn, $_POST['prayer_focus']);
    $prayer_language = mysqli_real_escape_string($conn, $_POST['prayer_language']);
    $prayer_description = mysqli_real_escape_string($conn, $_POST['prayer_description']);
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['name']['tmp_name'];
    $img_path = 'uploads/prayerSession/' . $image;

    if (!empty($image)) {
        if ($image_size > 2000000) {
            $message[] = 'image file size is too large';
        } else {
            $insertPrayerSession = "INSERT INTO prayer_session (prayer_host, prayer_focus, prayer_language, prayer_description, image) VALUES ('$prayer_host', '$prayer_focus', '$prayer_language', '$prayer_description', '$image')";
            mysqli_query($conn, $insertPrayerSession);
            move_uploaded_file($tmp_name, $image);
            header('Location: prayer_session.ph');
        }
    }
}
if (isset($_POST['updatePrayerSession'])) {
    $prayer_host = mysqli_real_escape_string($conn, $_POST['prayer_host']);
    $prayer_focus = mysqli_real_escape_string($conn, $_POST['prayer_focus']);
    $prayer_language = mysqli_real_escape_string($conn, $_POST['prayer_language']);
    $prayer_description = mysqli_real_escape_string($conn, $_POST['prayer_description']);
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['name']['tmp_name'];
    $img_path = 'uploads/prayerSession/' . $image;
    if (!empty($image)) {
        if ($image_size > 2000000) {
            $message[] = 'image file size is too large';
        } else {
            $updatePrayerSession = "UPDATE prayer_session SET prayer_host = '$prayer_host', prayer_focus = '$prayer_focus', prayer_language = '$prayer_language', prayer_description = '$prayer_description', image = '$image' WHERE id = '$id' ";
            mysqli_query($conn, $updatePrayerSession);
            move_uploaded_file($tmp_name, $image);
            header('Location: prayer_session.ph');
        }
    }
}
?>
<?php include("../admin-panel/partials/admin_header.php"); ?>
<!--start main wrapper-->
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
                        <li class="breadcrumb-item active" aria-current="page">Starter Page</li>
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
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form class="" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id">
                            <div class="mb-4">
                                <h5 class="mb-3">Prayer Host</h5>
                                <input type="text" name="prayer_host" class="form-control" id="prayer_host" placeholder="Stephen Chad Ethan">
                            </div>
                            <div class="mb-4">
                                <h5 class="mb-3">Prayer Focus</h5>
                                <input type="text" name="prayer_focus" class="form-control" id="prayer_focus" placeholder="Salvation">
                            </div>


                            <div class="mb-4">
                                <h5 class="mb-3">Prayer Language</h5>
                                <select class="form-select" id="prayer_language" name="prayer_language">
                                    <option selected="selected"></option>
                                    <option value="English">English</option>
                                    <option value="French">French</option>
                                    <option value="Spanish">Spanish</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <h5 class="mb-3">Prayer Description</h5>
                                <textarea class="form-control" id="prayer_description" cols="4" rows="6" name="prayer_description" placeholder="write a description here.."></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="" class="form-label">Select Prayer Banner</label>
                                <input type="file" name="image" accept="image/*" class="form-control" id="image" required>
                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" name="submitPrayerSession" class="btn btn-primary">Add Prayer Session</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </div>
</main>
<!--end main wrapper-->
<!--end main wrapper-->
<?php include("../admin-panel/partials/admin_footer.php");   ?>
