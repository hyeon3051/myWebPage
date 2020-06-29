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
<form action="./user_Editprocess.php" method="post">
    <ul>
        <li>
            이름 :
            <?= $name ?>
        </li>
        <li>
            <input type="text" name="id" value=<?= $userId ?> hidden /> id: <?= $userId ?>
        </li>
        <li>
            비밀번호: <input type="text" name="pass" value=<?= $userPw ?>></input>
        </li>
        <li>
            다시 입력:<input type="text" value=<?= $userPw ?>></input> </li>
        <li>
            이메일: <input type="text" name="email" value=<?= $email ?>></input>
        </li>
        <li>
            폰: <input type="text" name="phone" value=<?= $phone ?> id="">
        </li>
        <li>
            성별: <?= $gender ?>
        </li>
        <li>

            <input type="submit" value="수정 완료" />
</form>