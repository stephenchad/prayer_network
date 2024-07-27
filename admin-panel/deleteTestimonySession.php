<?php
// To update Testimony Session
include("config/db.php");
session_start();
$id = $_POST['id'];
$getUrl = "SELECT image FROM testimony WHERE id = '$id' ";
$result = mysqli_query($conn, $getUrl);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $img = $row['image'];
    }
    $sql = "DELETE FROM testimony WHERE id = '$id' ";
    unlink($img);
    if (mysqli_query($conn, $sql)) {
        echo "Testimony Session Deleted Successfully";
    }
}
