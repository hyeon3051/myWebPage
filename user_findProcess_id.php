<?php
$name = $_POST["name"];
$email = $_POST["email"];
///
$localhost = "localhost";
$dbId = "hyeon3051";
$pas = "is-ta-non/12";
$db = "myDB";
$conn = new mysqli($localhost, $dbId, $pas, $db);
if ($conn->connect_error) {
    die("connection failed" . $conn->connect_error);
};

$sql = "select * from usermanger where userName='$name' and email='$email'";
if($conn->query($sql)){
    $result= $conn->query($sql);
    $row = mysqli_fetch_array($result);
    if(isset($row['userId'])){
          $id=  $row['userId'];
    }
    else{
        $id ="";
    }
    if(!($id)){
        echo "회원정보가 없습니다";
    }
    else{
    echo "당신의 id는: " .$id;
    }
}else{  
   echo  $conn->error;
}

?>