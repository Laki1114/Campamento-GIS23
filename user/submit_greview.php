<?php
include('../database/linklinkz.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['booking_id']) && isset($_POST['review']) && isset($_POST['star_rating'])) {
$id = $_POST['booking_id'];
$review = $_POST['review'];
$starRating = $_POST['star_rating'];

$review_timestamp = date("Y-m-d H:i:s");

$sql = "UPDATE booking_guide SET review = '$review', star_rating = '$starRating', review_timestamp = '$review_timestamp' WHERE id = '$id'";
$result = $linkz->query($sql);

if ($result) {
    echo json_encode(array('success' => true));
} else {
    echo json_encode(array('success' => false));
}
    }
}
?>
