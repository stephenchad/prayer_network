<?php include("config/db.php"); ?>
<?php session_start(); ?>
<?php
$admin_user_id =  $_SESSION["admin_user_id"];
if (!isset($admin_user_id)) {
    header("location:login.php");
}
if (isset(($_POST["addTestimonySession"]))) {

    $testimony_title = mysqli_real_escape_string($conn, $_POST['testimony_title']);

    $testifier_name = mysqli_real_escape_string($conn, $_POST['testifier_name']);

    $prayer_group = mysqli_real_escape_string($conn, $_POST['prayer_group']);

    $country = mysqli_real_escape_string($conn, $_POST['country']);

    $testimony = mysqli_real_escape_string($conn, $_POST['testimony']);

    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['name']['tmp_name'];
    $img_path = 'uploads/testimonySession/' . $image;

    if (!empty($image)) {
        if ($image_size > 2000000) {
            $message[] = 'image file size is too large';
        } else {
            $insertTestimonySession = "INSERT INTO testimony (testimony_title, testifier_name, prayer_group,country, testimony, image) VALUES ('$testimony_title', '$testifier_name', '$prayer_group', '$country', '$testimony', '$image')";
            mysqli_query($conn, $insertTestimonySession);
            move_uploaded_file($tmp_name, $image);
            header('Location: testimonySession.php');
        }
    }
}
if (isset(($_POST["updateTestimonySession"]))) {
    $testimony_title = mysqli_real_escape_string($conn, $_POST['testimony_title']);

    $testifier_name = mysqli_real_escape_string($conn, $_POST['testifier_name']);

    $prayer_group = mysqli_real_escape_string($conn, $_POST['prayer_group']);

    $country = mysqli_real_escape_string($conn, $_POST['country']);

    $testimony = mysqli_real_escape_string($conn, $_POST['testimony']);

    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['name']['tmp_name'];
    $img_path = 'uploads/testimonySession/' . $image;


    if (!empty($image)) {
        if ($image_size > 2000000) {
            $message[] = 'image file size is too large';
        } else {
            $updateTestimonySession = "UPDATE testimony SET testimony_title = '$testimony_title', testifier_name = '$testifier_name', prayer_group = '$prayer_group',country = '$country', testimony = '$testimony', image = '$image' WHERE id = '$id' ";
            mysqli_query($conn, $insertTestimonySession);
            move_uploaded_file($tmp_name, $image);
            header('Location: testimonySession.php');
        }
    }
}
?>
<?php include("../admin-panel/partials/admin_header.php"); ?>
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
                        <div class="testimony-table">
                            <div class="row">
                                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#addTestimonySession">Add Prayer Session</a>
                            </div>
                            <div class="table-responsive white-space-nowrap">
                                <table class="table align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>
                                                <input class="form-check-input" type="checkbox">
                                            </th>
                                            <th>ID</th>
                                            <th>Prayer Banner</th>
                                            <th>Prayer Host</th>
                                            <th>Prayer Focus</th>
                                            <th>Prayer Language</th>
                                            <th>Prayer Description</th>
                                            <th colspan="3">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM prayer_session";
                                        $getPrayerSession = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($getPrayerSession) > 0) {
                                            while ($row = mysqli_fetch_assoc($getPrayerSession)) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $row["id"]; ?></td>
                                                    <td>
                                                        <img src="<?php echo $row["image"]; ?>" alt="">
                                                    </td>
                                                    <td><?php echo $row["prayer_host"]; ?></td>
                                                    <td><?php echo $row["prayer_focus"]; ?></td>
                                                    <td><?php echo $row["prayer_language"]; ?></td>
                                                    <td><?php echo $row["prayer_description"]; ?></td>
                                                    <td><?php echo $row["image"]; ?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-primary editPrayerSession" data-val=<?php echo $row['id']; ?> data-toggle="modal" data-target="#editTestimonySession"><i class="fa fa-edit"></i>Edit</a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-primary deletePrayerSession" data-val=<?php echo $row['id']; ?> data-toggle="modal" data-target="#deleteTestimonySession"><i class="fa fa-edit"></i>Delete</a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td>No Prayer Session Added Yet!</td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <!-- Modal to add Testimony -->
                                <div class="modal fade" id="addPrayerSession" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Prayer Session</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="" action="prayerSession.php" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
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

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <div class="d-grid">
                                                        <button type="submit" name="addPrayerSession" class="btn btn-primary">Add Prayer Session</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal to Update Prayer Session -->
                                <div class="modal fade" id="editPrayerSession" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Prayer Session</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.location.reload();">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="" action="prayerSession.php" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
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
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <div class="d-grid">
                                                            <button type="submit" name="updatePrayerSession" class="btn btn-primary">Update Prayer Session</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </div>
</main>
<script>
    $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active');
</script>
<?php include("../admin-panel/partials/admin_footer.php");   ?>
<script type="text/javascript">
    $('.editTestimonySession').click(function() {
        var id = $(this).attr('data-val');
        $.ajax({
            url: "updateTestimonySession.php",
            type: "POST",
            data: {
                type: 1,
                id: id,
            },
            cache: false,
            success: function(data) {

                var jsonData = $.parseJSON(data);

                $('#id').val(jsonData.id);

                $('#testimony_title').val(jsonData.testimony_title);

                $('#testifier_name').val(jsonData.testifier_name);

                $('#prayer_group').val(jsonData.prayer_group);

                $('#country').val(jsonData.country);

                $('#testimony').val(jsonData.testimony);

                $('#image').append('<img src="' + jsonData.image + '">');

            }
        });
    })
    $('.deleteTestimonySession').click(function() {
        var id = $(this).attr('data-val');
        $.ajax({
            url: "deleteTestimonySession",
            type: "POST",
            data: {
                type: 1,
                id: id,
            },
            cache: false,
            success: function(data) {
                alert(data);
            }
        });
    })
</script>
