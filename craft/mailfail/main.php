<?php
echo ""."<br>\n";
echo "さいしょのらいち"."<br>\n";

session_cache_limiter('none');
session_start();
require(dirname(__FILE__).DIRECTORY_SEPARATOR."functions.php");

ini_set('SMTP', 'email-smtp.eu-west-1.amazonaws.com');

$uploadDir = (isset($_POST['onetime'])) ? './files/'.$_POST['onetime'] : null;
if(!$uploadDir || !is_dir($uploadDir)){
  $uploadDir = null;
}

echo "uploadDir→".$uploadDir."<br>\n";


$mail_fname01=null;
$mail_fname02=null;

echo "fname1→".$_POST['fname01']."<br>\n";
echo "fname2→".$_POST['fname02']."<br>\n";

if(isset($_POST['fname01']))
{
  $fname01= $_POST['fname01'];
  $mail_fname01= $_POST['fname01'];
  $out_A = 1 ;
  $out_B = pathinfo($fname01, PATHINFO_EXTENSION);
  echo "あうとB→".$out_B."<br>\n";
  $fname01=$out_A.".".$out_B;
}
else
{
  $fname01="";
};

if(isset($_POST['fname02']))
{
  echo "にかいめのあうと→".$out_A."<br>\n";
  $fname02= $_POST['fname02'];
  $mail_fname02= $_POST['fname02'];
  $out_A = 2 ;
  $out_B = pathinfo($fname02, PATHINFO_EXTENSION);
  echo $out_B."\n";
  $fname02=$out_A.".".$out_B;
}
else
{
  $fname02="";
};

$file01= $uploadDir.DIRECTORY_SEPARATOR.$fname01;
$file02= $uploadDir.DIRECTORY_SEPARATOR.$fname02;

echo "DIRECTORY_SEPARATOR→".DIRECTORY_SEPARATOR."<br>\n";
echo "uploadDir.DIRECTORY_SEPARATOR→".$uploadDir.DIRECTORY_SEPARATOR."<br>\n";
echo "fname01→".$fname01."<br>\n";
echo "file01→".$file01."<br>\n";

echo "mail_fname01→".$mail_fname01."<br>\n";



$to[] = "go";
$from_email= "ka";
$from_name = "naeeem";
$subject = 'subje';
$body = "fairu {$mail_fname01}\n";

foreach( $to as $to_email ) {
  sendmail_jpn(
    $to_email,
    $subject,
    $body,
    $from_email,
    $from_name, 
    $file01,
    $file02,
    $mail_fname01,
    $mail_fname02);
  sleep(1);
}

echo "1"."<br>\n";

function sendmail_jpn(
  $to,
  $subject,
  $message,
  $from_email,
  $from_name, 
  $filepath01, 
  $filepath02, 
  $filename01,
  $filename02)
{
  echo "せんどめーるじゃぱん"."<br>\n";
  $mime_type = "application/octet-stream";
  
  // メールで日本語使用するための設定をします。
  mb_language("ja");
  mb_internal_encoding("UTF-8");
  
  // マルチパートなので、パートの区切り文字列を指定
  $boundary = '----=_Boundary_' . uniqid(rand(1000,9999) . '_') . '_';
  
  // toをエンコード
  $to = "=?ISO-2022-JP?B?" . base64_encode($to) . '?= <' . $to . '>';
  
  // fromをエンコード
  $from_name = mb_convert_encoding($from_name, 'ISO-2022-JP', 'auto');
  $from = "=?ISO-2022-JP?B?" . base64_encode($from_name) . '?= <' . $from_email . '>';
  

  // ヘッダーの指定
  $head = "";
  $head .= "From: {$from}\n";
  $head .= "MIME-Version: 1.0\n";
  $head .= "Content-Type: multipart/mixed; boundary=\"{$boundary}\"\n";
  $head .= "Content-Transfer-Encoding: 7bit";
  
  $body = "";//初期化
  
  // 本文
  $body .= "--{$boundary}\n";
  $body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n";
  $body .= "\n";
  $body .= "{$message}\n";
  $body .= "\n";
  
  // 添付ファイルの処理
  $body = attachFile($body, $boundary, $filename01, $filepath01);
  $body = attachFile($body, $boundary, $filename02, $filepath02);
  /*
  if (mb_send_mail($to, $subject, $body, $head))
  {
    $_SESSION['completion'] = true;
  }
  else
  {
    echo 'sendmail_jpn : FAILURE.';
  }
  */
  echo "じゃぱんおわり"."<br>\n";
}

echo "2"."<br>\n";

function attachFile($body,$boundary,$fileName,$filePath)
{
  echo "しんせんなあたっち"."<br>\n";
  if(!empty($fileName))
  {
    $fileName= mb_convert_encoding($fileName, 'ISO-2022-JP', 'auto');
    $fileName= "=?ISO-2022-JP?B?" . base64_encode($fileName) . "?=";
    
    $body .= "--{$boundary}\n";
    $body .= "Content-Type: application/octet-stream; name=\"{$fileName}\"\n" .
    "Content-Transfer-Encoding: base64\n" .
    "Content-Disposition: attachment; filename=\"{$fileName}\"\n";
    $body .= "\n";
    //ファイルの添付
    $body .= chunk_split(base64_encode(file_get_contents($filePath)))."\n";
    
    $body .= "\n";
  }
  
  echo "あたっちおわり"."<br>\n";
  return $body;
}

echo "3"."<br>\n";

// 自分が送ったファイルを削除する
if (is_dir($uploadDir) && strpos($uploadDir, '/files/TMP') != false) 
{
  echo "4"."<br>\n";
  //削除する対象日を0日にしてしまえば、今になるので、今より古いものは全て削除される。
  echo "realpath(uploadDir)".realpath($uploadDir)."<br>\n";
  
  
  //念のため削除されては困るものを入れておく
  deleteOldFile(realpath($uploadDir),['.gitignore','empty','.htaccess'],0);
  
  rmdir($uploadDir);
}

echo "おわりのらいち"."<br>\n";


?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>了</title>
</head>
<body>
  
  完
  
  
</body>
</html>

