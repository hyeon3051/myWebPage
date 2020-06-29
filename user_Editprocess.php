<?php
$pw = $_POST["pass"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$id = $_POST['id'];
///
$localhost = "localhost";
$dbId = "hyeon3051";
$pas = "is-ta-non/12";
$db = "myDB";
$conn = new mysqli($localhost, $dbId, $pas, $db);
if ($conn->connect_error) {
    die("connection failed" . $conn->connect_error);
}
$sql = " UPDATE usermanger set userpw='$pw', email='$email' ,phone='$phone'  where userid='$id'";

if ($conn->query($sql)) {
    echo ("
    <script>
    location.href='userinfo.php?id=$id';
    </script>
    ");
} else {
    echo $conn->error;
}
?>
d