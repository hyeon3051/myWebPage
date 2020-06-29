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

    if (!$userid) {
        echo ("
        <script>
        alert('회원만 등록이 가능합니다');
        history.go(-1);
        </script>
        ");
    }
    ?>
    <form action="./datadbEnrollIndex.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td> 제목</td>
                <td><input type="text" class="title" name="title" id="" placeholder="id입력하세요" /></td>
            </tr>
            <tr>
                <td>작성자</td>
                <td> <?= $userid ?></td>
            </tr>
            <tr>
                <td>내용</td>
                <td>
                    <textarea class="description" name="content" id="" cols="" rows=""></textarea>
                </td>
            </tr>
            <tr>
                <td> 첨부파일 </td>
                <td>
                    <input type="file" name="files" />
                </td>
            <tr>
                <td>
                    <input type="submit" onclick="checkNull(event)" value="완료">
                </td>
                <td>
                    <a href="./main.php">목록</a>
                </td>
            </tr>
        </table>
    </form>
    <script>
        var title = document.querySelector('.title');
        var description = document.querySelector('.description')
        console.log(title);

        function checkNull(event) {
            if (title.value == "") {
                event.preventDefault()
                alert("제목을 비워둘 수 없습니다");
            } else {
                if (description.value.length <= 20) {
                    event.preventDefault();
                    alert("내용은 최소한 20글자 이상 넘어야 합니다.")
                }
            }
        }
    </script>
</body>

</html>