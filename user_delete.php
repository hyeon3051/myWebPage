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
    $sql = "DELETE from usermanger where userId='$id'";
    $sql2 = "SELECT * FROM datadb where userid='$id'";
    $result = $conn->query($sql2);
    $content  = mysqli_num_rows($result);
    printf($content);
    if ($content != 0) {
        echo "<script>
        alert('모든 게시판의 정보를 삭제 하셔야 합니다. <?=$content?>');
        history.go(-1)

        </script>";
        return;
    } else {
        if ($conn->query($sql)) {
            session_start();
            unset($_SESSION['username']);
            unset($_SESSION['userid']);
            echo
                "<script>
        alert('회원탈퇴 되었습니다');
        location.href='main.php';
        </script>";
        } else {
            printf($conn->err);
        }
    }
    ?>
  d