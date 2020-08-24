<?php
$id = $_POST["id"];
$email = $_POST["email"];
$localhost = "localhost";
$dbId = "hyeon3051";
$pas = "is-ta-non/12";
$db = "myDB";
$conn = new mysqli($localhost, $dbId, $pas, $db);
if ($conn->connect_error) {
    die("connection failed" . $conn->connect_error);
};

$sql = "select * from usermanger where userId='$id' and email='$email'";
if($conn->query($sql)){
    $result= $conn->query($sql);
    $row = mysqli_fetch_array($result);
    if(isset($row['userPw'])){
          $pw=  $row['userPw'];
    }
    else{
        $pw ="";
    }
    if(!($pw)){
        echo "회원정보가 없습니다";
    }
    else{
    echo "당신의 password는: " .$pw;
    }
}else{  
   echo  $conn->error;
}

?>