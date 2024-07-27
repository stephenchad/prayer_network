<?php
include("config/db.php");
session_start();
$id = $_POST["id"];
$sql = "SELECT * FROM prayer_session WHERE id = '$id'";
$getPrayerSession = mysqli_query($conn, $sql);
if (mysqli_num_rows($getPrayerSession) > 0) {
    while ($row = mysqli_fetch_assoc($getPrayerSession)) {
        $data = array(
            'id' => $row['id'],
            'prayer_host' => $row['prayer_host'],
            'prayer_focus' => $row['prayer_focus'],
            'prayer_language' => $row['prayer_language'],
            'prayer_description' => $row['prayer_description'],
            'image' => $row['image'],
        );
    }
    echo json_encode($data);
}
