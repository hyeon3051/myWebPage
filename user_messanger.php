<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="massanger_03.css">
</head>

<body>
    <?php
    session_start();
    $id = $_SESSION['userid'];
    $mode = $_GET['mode'];
    $localhost = "localhost";
    $dbId = "hyeon3051";
    $pass = "is-ta-non/12";
    $db = "myDB";
    $conn = new mysqli($localhost, $dbId, $pass, $db);
    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }

    if ($mode == "send") {
        $sql = "SELECT * from user_massage_send where take_id='$id'";
        $result = $conn->query($sql);
        $length = mysqli_num_rows($result);

    ?>
        <table padding="2">
            <tr>
                <td>제목</td>
                <td>받은이</td>
                <td>보낸이</td>
                <td>보낸시간</td>
            </tr>
            <?php
            $i = 0;
            for ($i = 0; $i < $length; $i++) {
                $array =  mysqli_data_seek($result, $i);
                $row = mysqli_fetch_array($result);

                $title = $row["title"];
                $send_id = $row["send_id"];

                $take_id = $row["take_id"];
                $time = $row['time'];
            ?>
                <tr>
                    <td><a href="massage_view.php?title=<?= $title ?>"><?= $title ?></a></td>
                    <td><?= $send_id ?></td>
                    <td> <?= $take_id ?></td>
                    <td><?= $time ?></td>
                </tr>
            <?php
            }
        } else {
            $sql = "SELECT * from user_massage_send WHERE send_id ='$id' ";
            $result = $conn->query($sql);
            $length = mysqli_num_rows($result);
            ?>
            <table>
                <tr>
                    <td>제목</td>
                    <td>받은이</td>
                    <td>보낸이</td>
                    <td>보낸시간</td>
                </tr>
                <?php
                $i = 0;
                for ($i = 0; $i < $length; $i++) {
                    $array =  mysqli_data_seek($result, $i);
                    $row = mysqli_fetch_array($result);

                    $title = $row["title"];
                    $send_id = $row["send_id"];

                    $take_id = $row["take_id"];
                    $time = $row['time']
                ?>
                    <tr>

                        <td><a href="massage_view.php?title=<?= $title ?>"><?= $title ?></a></td>
                        <td><?= $send_id ?></td>
                        <td> <?= $take_id ?></td>
                        <td><?= $time ?></td>
                    </tr>
            <?php
                }
            }
            ?>
            </table>
            <div class="menu-array">
                <a class="menu-button" href="massenger_send.php">메세지 보내기</a>
                <a class="menu-button" href="user_messanger.php?mode=send">송신함</a>
                <a class="menu-button" href="user_messanger.php?mode=take">수신함</a>
                <a class="menu-button" href="userinfo.php?id=<?= $id ?>">돌아가기</a> </div>
</body>

</html>