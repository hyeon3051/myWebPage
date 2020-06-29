<?php
$id = $_REQUEST['q'];
$mysqli = new mysqli("localhost", "hyeon3051", "is-ta-non/12", "mydb");
$sql = "select * from usermanger where userId = '$id'";
$result = $mysqli->query($sql);
$num_match = mysqli_num_rows($result);
if ($num_match) {
    echo "0";
} else {
    echo "1";
}
