<?php
$title = $_GET['title'];
$localhost = "localhost";
$dbId = "hyeon3051";
$pass = "is-ta-non/12";
$db = "myDB";
$content = "content";
$conn = new mysqli($localhost, $dbId, $pass, $db);
if ($conn->connect_error) {
    die("connection failed" . $conn->connect_error);
}
$sql = "select * from user_massage_send where title = '$title'";
$result = $conn->query($sql);
$length = $result->fetch_assoc();
$content = $length[$content];
$time = $length['time'];
$send_id = $length['send_id'];
$take_id = $length['take_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <p> <?= $title ?></p>
        </tr>
        <tr>
            보내는 사람 <?= $send_id ?> <br> 받는 사람 <?= $take_id ?>
        </tr>
        <tr>
            시간 <?= $time ?>
        </tr>
        <p>
            <tr>
                <?= $content ?>
            </tr>
    </table>
    <a style="color:blue;" type="button" onclick="history.go(-1)">돌아가기</a>
    <a href="message_delete.php?title=<?= $title ?>">삭제</a>
</body>

</html>