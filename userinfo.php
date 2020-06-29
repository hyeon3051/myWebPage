<?php
$id = $_GET['id'];
$localhost = "localhost";
$dbId = "hyeon3051";
$pass = "is-ta-non/12";
$db = "mydb";
$conn = new mysqli($localhost, $dbId, $pass, $db);
if ($conn->connect_error) {
    die("connection failed" . $conn->connect_error);
}
$sql = "SELECT * FROM usermanger where userId= '$id'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$name = $row['userName'];
$userId = $row['userId'];
$userPw = $row['userPw'];
$email = $row['email'];
$gender = $row['gender'];
$phone = $row['phone'];
$reg_date = $row['reg_date'];

?>
<ul>
    <li><?= $name ?></li>
    <li><?= $userId ?></li>
    <li><?= $userPw ?></li>
    <li><?= $email ?></li>
    <li><?= $gender ?></li>
    <li><?= $phone ?></li>
    <li><?= $reg_date ?></li>
</ul>
<a href="./user_Edit.php?id=<?= $userId ?>">수정</a>
<a href="./main.php">정보 </a>
<a href="./user_messanger.php?mode='send'"> 쪽지함 </a>
<a href="./user_delete.php?id=<?= $userId ?>"> 탈퇴</a>