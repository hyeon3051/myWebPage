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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <table class=" table userinfo">
        <tr><td>
            이름:
        </td> <td>
            <?= $name ?>
        </td></tr>
        <tr><td>
            id:
        </td> <td>
            <?= $userId ?>
        </td></tr>
        <tr><td>
            비밀번호:
        </td> <td>
            <?= $userPw ?>
        </td></tr>
        <tr><td>
            이메일:
        </td> <td>
            <?= $email ?>
        </td></tr>
        <tr><td>
            성별:
        </td> <td>
            <?= $gender ?>
        </td></tr>
        <tr><td>
            전화번호:
        </td> <td>
            <?= $phone ?>
        </td></tr>
        <tr><td>
            등록일:
        </td> <td>
            <?= $reg_date ?>
        </td></tr>
</table>
    <a class="button" href="./user_Edit.php?id=<?= $userId ?>">수정</a>
    <a class="button" href="./main.php">정보 </a>
    <a class="button" href="./user_messanger.php?mode=send"> 쪽지함 </a>
    <a class="button" href="./user_delete.php?id=<?= $userId ?>"> 탈퇴</a>
</body>

</html>