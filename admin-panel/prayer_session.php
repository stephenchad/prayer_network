<?php
$admin_user_id =  $_SESSION["admin_user_id"];
if (!isset($admin_user_id)) {
    header("location:login.php");
}
?>
<?php include("../admin-panel/partials/admin_header.php"); ?>
<!--start main wrapper-->
<!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">eCommerce</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Products</li>
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

        <div class="product-count d-flex align-items-center gap-3 gap-lg-4 mb-4 fw-medium flex-wrap font-text1">
            <a href="javascript:;"><span class="me-1">All</span><span class="text-secondary">(88754)</span></a>
            <a href="javascript:;"><span class="me-1">Published</span><span class="text-secondary">(56242)</span></a>
            <a href="javascript:;"><span class="me-1">Drafts</span><span class="text-secondary">(17)</span></a>
            <a href="javascript:;"><span class="me-1">On Discount</span><span class="text-secondary">(88754)</span></a>
        </div>

        <div class="row g-3">
            <div class="col-auto">
                <div class="position-relative">
                    <input class="form-control px-5" type="search" placeholder="Search Products">
                    <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50 fs-5">search</span>
                </div>
            </div>
            <div class="col-auto flex-grow-1 overflow-auto">
                <div class="btn-group position-static">
                    <div class="btn-group position-static">
                        <button type="button" class="btn btn-filter dropdown-toggle px-4" data-bs-toggle="dropdown" aria-expanded="false">
                            Category
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                        </ul>
                    </div>
                    <div class="btn-group position-static">
                        <button type="button" class="btn btn-filter dropdown-toggle px-4" data-bs-toggle="dropdown" aria-expanded="false">
                            Vendor
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                        </ul>
                    </div>
                    <div class="btn-group position-static">
                        <button type="button" class="btn btn-filter dropdown-toggle px-4" data-bs-toggle="dropdown" aria-expanded="false">
                            Collection
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                    <button class="btn btn-filter px-4"><i class="bi bi-box-arrow-right me-2"></i>Export</button>
                    <button class="btn btn-primary px-4"><i class="bi bi-plus-lg me-2"></i>Add Prayer Session</button>
                </div>
            </div>
        </div><!--end row-->

        <div class="card mt-4">
            <div class="card-body">
                <div class="product-table">
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
                                            <td><?php echo $row["prayer_description"]; ?></td>
                                            <td>
                                                <a href="prayer_session_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary editPrayerSession" data-val="<?php echo $row['id']; ?>"><i class="fa fa-edit"></i>Edit</a>
                                            </td>
                                            <td>
                                                <a href="prayer_session_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger deletePrayerSession" data-val="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i>Delete</a>
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
                    </div>
                </div>
            </div>
        </div>


    </div>
</main>

<!--end main wrapper-->
<!--end main wrapper-->
<?php include("../admin-panel/partials/admin_footer.php"); ?>
<script src="text/javascript">
    $('editPrayerSession').click(function() {
        var id = $(this).attr('data-val');
        $.ajax({
            url: "prayer_session_edit.php",
            type: "POST",
            data: {
                type: 1,
                id: id,
            },
            cache: false,
            success: function(data) {
                var jsonData = $.parseJSON(data);
                $('#id').val(jsonData.id);
                $('#prayer_host').val(jsonData.prayer_host);
                $('#prayer_focus').val(jsonData.prayer_focus);
                $('#prayer_language').val(jsonData.prayer_language);
                $('#prayer_description').val(jsonData.prayer_description);
                $('#image').append('<img src="' + jsonData.image + '">');
            }
        });
    })
    $('deletePrayerSession').click(function() {
        var id = $(this).attr('data-val');
        $.ajax({
            url: "prayer_session_delete.php",
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