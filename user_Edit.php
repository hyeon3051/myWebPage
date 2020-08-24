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

    <form action="./user_Editprocess.php" method="post">
        <table class=" table userinfo">
            <tr>
                <td>
                    이름
                </td> <td>
                    <?= $name ?>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="id" value=<?= $userId ?> hidden /> id: <?= $userId ?>
                </td>
            </tr>
            <tr>
                <td>
                    비밀번호
                </td> <td>
                    <input type="text" name="pass" value=<?= $userPw ?>>
                </td>
            </tr>
            <tr>
                <td>
                    다시 입력
                </td><td>
                    <input type="text">
                </td>
            <tr>
                <td>
                    이메일
                </td> <td>
                    <input type="text" name="email" value=<?= $email ?>></input>
                </td>
            </tr>
            <tr>
                <td>
                    폰
                </td> <td>
                    <input type="text" name="phone" value=<?= $phone ?> id="">
                </td>
            </tr>
            <tr>
                <td>
                    성별
                </td> <td>
                    <?= $gender ?>
                </td>
            </tr>
            <tr>

                <td>
                    <input type="submit" value="수정 완료" />
                </td>
            </tr>
        </table>
    </form>
</body>

</html>