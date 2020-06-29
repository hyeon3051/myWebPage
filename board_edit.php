<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["userid"])) {
        $userid = $_SESSION["userid"];
    } else {
        $userid = "";
    }
    $title = $_GET['title'];
    $localhost = "localhost";
    $dbId = "hyeon3051";
    $pass = "is-ta-non/12";
    $db = "myDB";
    $conn = new mysqli($localhost, $dbId, $pass, $db);
    $sql1 = "SELECT * from datadb where title = '$title'";
    $result = $conn->query($sql1);
    $row = mysqli_fetch_assoc($result);
    $id = $row['userid'];
    if ($userid != $id) {
        echo ("
        <script>
        alert('이 글을 올린 유저, 관리자 만이 이 글을 수정할 수 있습니다.')
        history.go(-1);
</script>");
    }
    ?>
    <form action="./board_editprocess.php" method="post">
        <table>
            <tr>
                <td> 제목</td>
                <td> <?= $row['title'] ?></td>
            </tr>
            <tr>
                <td>작성자</td>
                <td> <?= $userid ?></td>
            </tr>
            <tr>
                <td>내용</td>
                <td>
                    <textarea name="content" id="" cols="30" rows="10"><?= $row['content'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td> 첨부파일 </td>
                <td>
                    <input type="file" name="upfile" id="" />
                </td>
            <tr>
                <td>
                    <input type="submit" value="완료">
                </td>
                <td>
                    <a href="./main.php">목록</a>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>