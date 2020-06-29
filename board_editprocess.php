<?php
$content = $_POST["content"];
$files_name = $_FILES["upfile"]['name'];
$files_tmp_name = $_FILES["upfile"]['tmp_name'];
$files_type = $_FILES["upfile"]['type'];
$files_size = $_FILES["upfile"]['size'];
$files_error = $_FILES["upfile"]['error'];
$upload_day = date("y-m-d (H:i)");
$upload_dir = './data/';
///
if ($files_name && !$files_error) {
    $file = explode(".", $files_name);
    $file_name = $file['0'];
    $file_ext = $file['1'];
    $new_file_name = date("y_m_d_h_i_s");
    $new_file_name = $new_file_name;
    $copied_file_name = $new_file_name . "." . $file_ext;
    $upload_file = $upload_dir . $copied_file_name;
    if ($files_size > 1000000) {
        echo ("
    <script>
    alert('파일 사이즈가 10mb이상을 넘어갑니다');
    </script>
    ");
        exit;
    }

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
$sql = " UPDATE datadb set content='$content', 
file_name ='$files_name', file_type='$files_type',
file_copied='$copied_file_name', reg_date";
?>
..