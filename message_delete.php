<?php
$title = $_GET["title"];
$localhost = "localhost";
$dbId = "hyeon3051";
$pass = "is-ta-non/12";
$db = "myDB";
$conn = new mysqli($localhost, $dbId, $pass, $db);
$sql_delete = "DELETE FROM user_massage_send where title='$title' ";
if ($conn->query($sql_delete)) {
    echo  "<script>
        alert('메세지가 삭제 되었습니다');
        history.go(-2);
        </script>";
} else {
    echo "에러 발생" . $conn->error;
}
?>
..