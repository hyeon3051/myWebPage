<?php
session_start();
$userid = $_SESSION['userid'];
$title = $_POST["title"];
$content = $_POST["content"];
$files_name = $_FILES["files"]["name"];
$files_tmp_name = $_FILES["files"]["tmp_name"];
$files_type = $_FILES["files"]["type"];
$files_size = $_FILES["files"]["size"];
$files_error = $_FILES["files"]["error"];

$upload_day = date("y-m-d (H:i)");
$upload_dir = './data/';
///
if ($files_name && !$files_error) {
    $files = explode(".", $files_name);
    $files_name = $files['0'];
    $files_ext = $files['1'];
    $new_file_name = date("y_m_d_h_i_s");
    $new_file_name = $new_file_name;
    $copied_file_name = $new_file_name . "." . $files_ext;
    $upload_file = $upload_dir . $copied_file_name;
    if ($files_size > 10000000) {
        echo ("
    <script>
    alert('파일 사이즈가 10mb이상을 넘어갑니다');
    </script>
    ");
        exit;
    };

    if (!move_uploaded_file($files_tmp_name, $upload_file)) {
        echo "
    <script>
    alert('파일을 지정한 디렉터리에 저장하는데 실패했습니다.');
    </script>";
        exit;
    }
} else {
    $files_name = "";
    $files_type = "";
    $copied_file_name = "";
}

$localhost = "localhost";
$dbId = "hyeon3051";
$pass = "is-ta-non/12";
$db = "myDB";
$conn = new mysqli($localhost, $dbId, $pass, $db);
if ($conn->connect_error) {
    die("connection failed" . $conn->connect_error);
}
$sql = "INSERT INTO datadb(title,userid,content, file_name, file_type, file_copied)
VALUES('$title', '$userid','$content', '$files_name','$files_type', '$copied_file_name')";

if ($conn->query($sql)) {
    echo ("<script>
    alert('저장 완료');
    location.href='main.php?id=$id';
    </script>
    ");
} else {
    echo $conn->error;
}
