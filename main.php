<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php

    session_start();
    if (isset($_SESSION['userid'])) $userid = $_SESSION['userid'];
    else $userid = "";
    if (isset($_SESSION['username'])) $username = $_SESSION['username'];
    else $username = "";
     if (isset($_GET['page'])) $page = $_GET['page'];
    else $page = "0";
    ?>
    <nav>
        <ul class="icon row">
            <?php
            if (!$userid) {
            ?>
                <li> <a class="col-md-4 " href="login.html"> 로그인</a></li>
                <li><a class="col-md-4 " href="enrollIndex.html">회원가입</a></li>
                <li><a class="col-md-4 " href="logout.php"></a></li>
            <?php
            } else {
                $logged = $username . "(" . $userid . ")" . "님";
            ?>
                <li class="col-md-4"><?= $logged ?></li>
                <li class="col-md-4"><a href="./userinfo.php?id=<?= $userid ?>">나의 사이트</a></li>
                <li class="col-md-4"> <a href="logout.php">로그아웃</a></li>
            <?php
            }
            ?>
    </nav>

    <main>
        <div class="searchBar">
            <h1>게시판</h1>
        </div>
        <table class="table table-condensed">
            <tr>
                <td>목록</td>
                <td>title</td>
                <td>description</td>
                <td>data</td>
            </tr>
            <?php
            $local = "localhost";
            $id = "hyeon3051";
            $pw = "is-ta-non/12";
            $db = "mydb";
            $conn = new mysqli($local, $id, $pw, $db);
            if ($conn->connect_error) {
                die("connection failed" . $conn->connect_error);
            }
            $sql = "SELECT * FROM datadb ";
            $result = $conn->query($sql);
            $total_page = mysqli_num_rows($result) / 5 - ((mysqli_num_rows($result) % 5) / 5);
            $length = mysqli_num_rows($result);
            for ($i = $page * 5; $i < $page * 5 + 5; $i++) {
                if ($i >= $length) {
                    break;
                }
                $array =  mysqli_data_seek($result, $i);
                $row = mysqli_fetch_array($result);
                $title = $row["title"];
                $author = $row["userid"];
                $content = $row["content"];
                $char_array = substr($content, 0, 20);
                $day = $row["reg_date"];
            ?>
                <tr>
                    <td><?= $day ?> </td>
                    <td><a href="board_view.php?title=<?= $title ?>&page=<?= $day ?>"><?= $title ?></a> </td>
                    <td><?= $author ?></td>
                    <td> <?= $char_array ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </main>
    <?php
    if ($length >= 2 && $page >= 1) {
        $new_page = $page - 1;
        echo "<li><a href='main.php?page=$new_page'>◀이전</a></li>";
    }
    if ($page != $total_page) {
        $new_page = $page + 1;
        echo "<li><a href='main.php?page=$new_page'>다음▶</a></li>";
    }
    ?>
    <a class="enroll" href="./datadbEnroll.php">등록</a>
    <footer>
        <p>Velit culpa do adipisicing do. Consectetur do deserunt enim cupidatat fugiat non aliquip. Veniam aute aliqua
            ut dolor. Aliqua ex excepteur Lorem commodo officia eiusmod proident ex. Magna duis ad do sunt nulla mollit
            consectetur veniam non commodo duis. Quis adipisicing in officia commodo ullamco mollit veniam sit.
            Reprehenderit labore commodo consectetur ipsum eu pariatur.

        </p>
    </footer>
</body>

</html>