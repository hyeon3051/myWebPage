<?php
$real_name = $_GET['real_name'];
$file_naame = $_GET['file_name'];
$file_type = $_GET['file_type'];
$file_path = "./data/" . $real_name;

$ie = preg_match('~MSIE|internet Explorer~i', $_SERVER['HTTP_USER_AGENT'])
    || (strpos($_SERVER['HTTP_USER_AGENT'], 'Tradiant/7.0') !== false
        && strpos($_SERVER['HTTP_USER_AGENT'], 'rv:11.0') !== false);

if ($ie) {
    $file_naame = iconv('utf-8', 'euc-kr', $file_naame);
}

if (file_exists($file_path)) {
    $fp = fopen($file_path, "rb");
    Header("content-type:application/x-msdownload");
    Header("contnet-length: " . filesize($file_path));
    Header('content-Disposition:attachment; filename=' . $file_naame);
    Header("content-Transfer-Encoding:binary");
    Header("content-Description: File Transfer");
    Header("Expires:0");
}
if (!fpassthru($fp)) {
    fclose($fp);
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>