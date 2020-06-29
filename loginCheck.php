<?php
$id = $_POST["id"];
$pw = $_POST["pw"];
$conn = new mysqli("localhost", "hyeon3051", "is-ta-non/12", "mydb");
if ($conn->error) {
    echo "오류";
}
$sql = "select * from usermanger where userId='$id' ";
$result = $conn->query($sql);


$num_match = mysqli_num_rows($result);
if (!$num_match) {
    echo ("
        <script>
        window.alert('등록되어 있지 않은 아아디입니다');
        history.go(-1);
        </script>
        ");
} else {
    $row = mysqli_fetch_array($result);
    $db_pass = $row['userPw'];
    if ($pw != $db_pass) {
        echo ("
        <script>
        window.alert('비밀번호가 틀립니다');
        history.go(-1);
        </script>
        ");
    } else {
        session_start();
        $_SESSION['userid'] = $row['userId'];
        $_SESSION['username'] = $row['userName'];
        echo ("<script>
    location.href='main.php';
    </script>
    ");
    }
}
