<?php
$local = "localhost";
$id = "hyeon3051";
$pw = "is-ta-non/12";
$db = "mydb";
$conn = new mysqli($local, $id, $pw, $db);
$contents = "<legend>다음 중 3가지와 성격이 다른 것은</legend>
        <input type='radio' name='sur_10' value='1' id='1' /><label for='1'
          >php</label
        >
        <input type='radio' name='sur_10' value='2' id='2' /><label for='2'
          >asp</label
        >
        <input type='radio' name='sur_10' value='3' id='3' /><label for='3'
          >jsp</label
        >
        <input type='radio' name='sur_1' value='4' id='4' /><label for='4'
          >javascript</label
        >"
        ;
if ($conn->connect_error) {
    die("connection failed" . $conn->connect_error);
}
$sql = "insert into problem (content) value '$contents'";
if ($conn->query($sql)) {
    echo ("hello");
} else {
    echo " $conn->error";
}
?>
