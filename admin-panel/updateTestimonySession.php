<?php
// To update Testimony Session
include("config/db.php");
session_start();
$id = $_POST['id'];
$sql = "SELECT * FROM testimony WHERE id = '$id' ";
$updateTestimonySession = mysqli_query($conn, $sql);
if (mysqli_num_rows($updateTestimonySession) > 0) {
    while ($row = mysqli_fetch_assoc($updateTestimonySession)) {
        $data = array(
            'id' => $row['id'],
            'testimony_title' => $row['testimony_title'],
            'testifier_name' => $row['testifier_name'],
            'prayer_group' => $row['prayer_group'],
            'country' => $row['country'],
            'testimony' => $row['testimony'],
            'image' => $row['image']
        );
    }
    echo json_encode($data);
}
