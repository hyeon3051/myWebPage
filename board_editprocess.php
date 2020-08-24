<?php
$title = $_GET["title"];
$content = $_POST["content"];
$localhost = "localhost";
$dbId = "hyeon3051";
$pass = "is-ta-non/12";
$db = "myDB";
$conn = new mysqli($localhost, $dbId, $pass, $db);
$sql = " UPDATE datadb set content='$content' where title = '$title' ";

if ($conn->query($sql)) {
    echo ("<script>
    alert('저장 완료');
    location.href='main.php?id=$id';
    </script>
    ");
} else {
    echo $conn->error;
}
