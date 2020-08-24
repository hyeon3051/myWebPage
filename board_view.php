<?php
$title = $_GET['title'];
$title_2 = $_GET['page'];
$localhost = "localhost";
$dbId = "hyeon3051";
$pass = "is-ta-non/12";
$db = "myDB";
$conn = new mysqli($localhost, $dbId, $pass, $db);
$sql1 = "SELECT * from datadb where title = '$title'";
$result = $conn->query($sql1);
$row = mysqli_fetch_assoc($result);
if (!$row) {
    printf($conn->error);
}
$content = $row['content'];
$file_name = $row['file_name'];
$file_type = $row['file_type'];
$file_copied = $row['file_copied'];
echo ("
 $title 
 <hr>
 <div class='col-md-4' >
 $content
 </div>
 <hr>
 $title_2 
 <hr>
 ");
?>
<?php
if ($file_name) {
    $real_name = $file_copied;
    $file_path = "./data/" . $real_name;
    $file_size = filesize($file_path);
    echo ("$real_name ($file_size Byte)");
    echo ("
    <a href= 'board_download.php?title=$title&
    real_name=$real_name&file_name=$file_name&
    file_type=$file_type'>[다운로드]</a>
    ");
}
?>
<a href="board_edit.php?title=<?= $title ?>">수정</a>
<a href="board_delete.php?title=<?= $title ?>"> 삭제 </a>