<?php
$send_id = $_POST['send_id'];
session_start();
$take_id = $_SESSION['userid'];
$title = $_POST['title'];
$content = $_POST['content'];
$localhost = "localhost";
$dbId = "hyeon3051";
$pass = "is-ta-non/12";
$db = "myDB";
$conn = new mysqli($localhost, $dbId, $pass, $db);
if ($conn->connect_error) {
    die("connection failed" . $conn->connect_error);
}
$sql = "insert into user_massage_send(title,content,send_id,take_id) value('$title', '$content' ,'$send_id','$take_id')";

if ($conn->query($sql)) {
    echo ("
    <script>
    location.href='userinfo.php?id=$take_id';
    </script>
    ");
} else {
    echo $conn->error;
}
?>
f