<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./user_findProcess_id.php" method="post">
    가입할때 쓴 이름과 이메일을 알려주세요
    이름: <input type="text" name="name">
    이메일: <input type="text" name="email">
    <input type="submit" value="제출">
</form>
    <form action="./user_findProcess_pw.php" method="post">
    가입할때 쓴 이메일과 아이디를 알려주세요
    아이디: <input type="text" name="id">
    이메일: <input type="text" name="email">
    <input type="submit" value="제출">
</form>
</body>

</html>