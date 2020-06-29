<?php
$name = $_POST["name"];
$id = $_POST["id"];
$pw = $_POST["pass"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$phone = $_POST["phone"];
///
$localhost = "localhost";
$dbId = "hyeon3051";
$pass = "is-ta-non/12";
$db = "myDB";
$conn = new mysqli($localhost, $dbId, $pass, $db);
if ($conn->connect_error) {
    die("connection failed" . $conn->connect_error);
}
$sql = "INSERT INTO usermanger(userName, userId, userPw, email,gender, phone)
VALUES('$name', '$id','$pw', '$email', '$gender', '$phone')";

if ($conn->query($sql)) {
    session_start();
    $_SESSION['userid'] = $row['userId'];
    $_SESSION['username'] = $row['userName'];
    echo ("<script>
    location.href='main.php';
    </script>
    ");
} else {
    echo $conn->error;
}
