<?php
$local = "localhost";
$id = "hyeon3051";
$pw = "is-ta-non/12";
$db = "mydb";
$conn = new mysqli($local, $id, $pw, $db);
if ($conn->connect_error) {
    die("connection failed" . $conn->connect_error);
}
$sql = "create table user_massage_send(
                num int(20) NOT NULL PRIMARY KEY,
                title varchar(100),
                send_id varchar(20),
                take_id varchar(20)
                time current_timestamp() ON UPDATE CURRENT_TIMESTAMP()
            )";
if ($conn->query($sql)) {
    echo ("hello");
} else {
    echo " $conn->errno";
}
?>
d