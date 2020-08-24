 <?php
    session_start();
    $id = $_SESSION['userid'];
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="style_03.css">
 </head>

 <body>
     <form action="enroll_massage_process.php" method="POST">
         <table>
             <tr>
                 <td>받는사람</td>
                 <td><input class="id" type="text" name="send_id" /><input type="button" value="아이디  체크" onClick="checkID()"></input>
                 </td>
             </tr>
             <tr>
                 <td>보내는 사람</td>
                 <td> <input type="text" value=" <?= $id ?> " disabled> </td>
             </tr>
             <tr>
                 <td>제목</td>
                 <td><input type="text" name="title" class="title" />
             </tr>
             <tr>
                 <td> 내용</td>
                 <td>
                     <textarea class="content" name="content" id="" cols="20" rows="10"></textarea>
                 </td>
             </tr>
             <tr>
                 <td>
                     <input type="submit" value=" 보내기" onclick="checkNull(event)">
                     <input type="button" value="돌아가기" onclick="history.go(-1)">
                 </td>
             </tr>
         </table>
     </form>
     (이전 제목과 중복되어서는 안됩니다.)
     <script>
         function checkID() {
             const value = document.querySelector('.id').value;
             if (value === "") {
                 alert("보내는 아이디를 비워둘 수는 없습니다");
             } else {

                 const xhr = new XMLHttpRequest();
                 xhr.onreadystatechange = function() {
                     if (xhr.status === 200 && xhr.readyState === 4) {
                         const idExist = xhr.responseText;
                         console.log(idExist);
                         if (idExist == true) {
                             alert("id가 존재하지 않습니다")
                         } else {
                             alert("이 아이디로 보내겠습니까?");
                         }
                     }

                 }
                 xhr.open('GET', './checkid.php?q=' + value, true);
                 xhr.send();
             }
         }

         function checkNull(event) {
             const title = document.querySelector(".title");
             const description = document.querySelector('.content');
             console.dir(title, description);
             if (title.value == "") {
                 console.log(title.value)
                 event.preventDefault()
                 alert("제목을 비워둘 수 없습니다");
             } else {
                 if (description.value.length <= 20) {
                     console.log(description.value);
                     event.preventDefault();
                     alert("내용은 최소한 20글자 이상 넘어야 합니다.")
                 }
             }
         }
     </script>
 </body>

 </html>