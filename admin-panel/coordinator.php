<?php include("config/db.php"); ?>
<?php session_start(); ?>
<?php
$admin_user_id =  $_SESSION["admin_user_id"];
if (!isset($admin_user_id)) {
    header("location:login.php");
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
                                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#addTestimonySession">Add Testimony Session</a>
                            </div>
                            <div class="table-responsive white-space-nowrap">
                                <table class="table align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>
                                                <input class="form-check-input" type="checkbox">
                                            </th>
                                            <th>ID</th>
                                            <th>Coordinator Image</th>
                                            <th>Cordinator Title</th>
                                            <th>Coordinator Name</th>
                                            <th>Coordinator Church</th>
                                            <th>Coordinator Country</th>
                                            <th colspan="3">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM coordinator";
                                        $coordinator = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($coordinator) > 0) {
                                            while ($row = mysqli_fetch_assoc($coordinator)) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $row["id"]; ?></td>

                                                    <td style="width: 10%;" class="image">
                                                        <?php
                                                        if ($row["image"] == null) {
                                                        ?>
                                                            <p style="text-align: center; border-radius: 50%">
                                                                <img src="assets/img/avatar.jpg" style="width: 50%;">
                                                            </p>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <p style="text-align: center;">
                                                                <img src="<?php echo $row["image"]; ?>" style="width: 50%; border-radius: 50%">
                                                            </p>

                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $row["coordinator_title"]; ?></td>
                                                    <td><?php echo $row["coordinator_name"]; ?></td>
                                                    <td><?php echo $row["coordinator_church"]; ?></td>
                                                    <td><?php echo $row["coordinator_country"]; ?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-primary editTestimonySession" data-val=<?php echo $row['id']; ?> data-toggle="modal" data-target="#editTestimonySession"><i class="fa fa-edit"></i>Edit</a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-primary deleteTestimonySession" data-val=<?php echo $row['id']; ?> data-toggle="modal" data-target="#deleteTestimonySession"><i class="fa fa-edit"></i>Delete</a>
                                                    </td>
                                                </tr>
                                            <?php     }
                                        } else {
                                            ?>
                                            <tr>
                                                <td>No Coordinator Added Yet!</td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </div>
</main>


<?php include("../admin-panel/partials/admin_footer.php"); ?>
<script>
    $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active');
</script>