<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php

    session_start();
    if (isset($_SESSION['userid'])) $userid = $_SESSION['userid'];
    else $userid = "";
    if (isset($_SESSION['username'])) $username = $_SESSION['username'];
    else $username = "";
    ?>
    <nav>
        <img src="./lime.png" alt="오로라" class="picture" width="100px" height="100px">
        <ul class="icon">
            <?php
            if (!$userid) {
            ?>
                <li> <a href="login.html"> 로그인</a></li>
                <li><a href="enrollIndex.html">회원가입</a></li>
                <li><a href="logout.php"></a></li>
            <?php
            } else {
                $logged = $username . $userid . "님";
            ?>
                <li><?= $logged ?></li>
                <li><a href="./userinfo.php?id=<?= $userid ?>">나의 사이트</a></li>
                <li><a href="logout.php">로그아웃</a></li>
            <?php
            }
            ?>
    </nav>

    <header class="bgImage"></header>
    <div class="sideBar">
        <ul class="sideMenuBar">
            <li><a href="">menu2</a></li>
            <li><a href="">menu1</a></li>
            <li><a href="">menu3</a></li>
        </ul>
    </div>
    <main>
        <div class="searchBar">
            <h1>게시판</h1>
            <form action="./main.php" method="get">
                <label for="ice-cream-choice">검색:</label>
                <input list="searchInfo" id="ice-cream-choice" name="search" />

                <datalist id="searchInfo">
                    <option value="날짜">
                    <option value="작성자">
                    <option value="이메일">
                    <option value="담당자">
                    <option value="과거순">
                </datalist>
                <input type="search" name="value" id="">
                <input type="submit" value="제출">
            </form>
        </div>
        <table>
            <tr>

                <td>목록</td>
                <td>title</td>
                <td>description</td>
                <td>data</td>
                <td>5</td>
                <td>6</td>
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
            $length = mysqli_num_rows($result);
            echo $length;
            for ($i = 0; $i < $length; $i++) {
                $array =  mysqli_data_seek($result, $i);
                $row = mysqli_fetch_array($result);
                $title = $row["title"];
                $author = $row["userid"];
                $files = $row["content"];
                $day = $row["reg_date"];
            ?>
                <tr>
                    <td><?= $day ?> </td>;
                    <td><?= $author ?></td>
                    <td></td>
                    <td><a href="board_view.php?title=<?= $title ?>&page=<?= $day ?>"><?= $title ?></a> </td>
                    <td></td>
                    <td> <?= $files ?></td>
                </tr>
            <?php
            } ?>
        </table>
    </main>
    <a href="./datadbEnroll.php">등록</a>
    <footer>
        <p>Velit culpa do adipisicing do. Consectetur do deserunt enim cupidatat fugiat non aliquip. Veniam aute aliqua
            ut dolor. Aliqua ex excepteur Lorem commodo officia eiusmod proident ex. Magna duis ad do sunt nulla mollit
            consectetur veniam non commodo duis. Quis adipisicing in officia commodo ullamco mollit veniam sit.
            Reprehenderit labore commodo consectetur ipsum eu pariatur.

            Cillum est sint quis exercitation sint eu ea occaecat nisi. Aliquip qui ipsum velit sunt sunt in duis
            nostrud fugiat ad. Officia dolore deserunt reprehenderit amet mollit voluptate id sit eu irure tempor duis
            enim quis. Pariatur sit sit magna labore ea minim fugiat tempor. Ut sunt et pariatur labore aute incididunt
            reprehenderit commodo adipisicing et aliquip veniam esse commodo. Sint aliquip deserunt amet dolore anim
            tempor nisi pariatur. Magna voluptate dolore eu deserunt esse nostrud consectetur esse magna ipsum labore
            voluptate.

            Laboris aliquip cillum sit cillum mollit sunt consequat laboris. Est do eu proident occaecat consectetur.
            Mollit aliquip do ad do voluptate quis id tempor magna. Qui adipisicing proident eu mollit excepteur aute ex
            incididunt ex minim commodo nostrud id. Veniam adipisicing esse dolore sunt fugiat proident occaecat laborum
            quis tempor aliqua. Sunt duis quis sunt et magna culpa eu laborum cupidatat anim aute Lorem magna.
            Reprehenderit ipsum dolor ullamco reprehenderit.

            Eiusmod ad consequat veniam enim ut aliqua eu cupidatat nisi ea ea dolor. Ipsum occaecat amet quis esse
            labore voluptate eu ad laboris sunt incididunt pariatur ipsum et. Cupidatat voluptate in consequat
            consectetur sunt consequat non reprehenderit laborum officia eiusmod ad. Mollit aliqua in magna sit sit
            dolor reprehenderit nisi eu non pariatur ad duis. Incididunt adipisicing deserunt ullamco nostrud.</p>
    </footer>
</body>

</html>