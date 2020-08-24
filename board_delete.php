 <?php
    session_start();
    if (isset($_SESSION["userid"])) {
        $userid = $_SESSION["userid"];
    } else {
        $userid = "";
    }
    printf($userid);
    $title = $_GET['title'];
    $localhost = "localhost";
    $dbId = "hyeon3051";
    $pass = "is-ta-non/12";
    $db = "mydb";
    $conn = new mysqli($localhost, $dbId, $pass, $db);
    $sql1 = "SELECT * from datadb where title = '$title' and userid='$userid'";
    $result1 = $conn->query($sql1);
    $row = mysqli_fetch_assoc($result1);
    $id = $row['userid'];
    printf($id);
    if ($userid != $id) {
        echo ("
        <script>
        alert('이 글을 올린 유저, 관리자 만이 이 글을 삭제할 수 있습니다.')
        history.go(-1);
        </script>");
    } else {
        if ($conn->connect_error) {
            die("connection failed" . $conn->connect_error);
        }
        $sql = "DELETE from  datadb where title='$title'";
        if ($conn->query($sql)) {
            echo
                "<script>
        alert('파일삭제 되었습니다');
        location.href='main.php';
        </script>";
        } else {
            echo $conn->error;
        }
    }
    ?>
 sd