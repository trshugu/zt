<?php
session_cache_limiter('none');
session_start();
ini_set('display_errors', 0);

if(isset($_SESSION['count_error']))
{
  $other = $_SESSION['other'];
  $uploadDir = (isset($_SESSION['onetime'])) ? './files'.$_SESSION['onetime'] : tempnam("./files", "TMP");
  
  if(isset($_SESSION['onetime']))
  {
    $uploadDir = './files'.$_SESSION['onetime'];
  }
  else
  {
    $uploadDir = tempnam("./files", "TMP");
  }
  
  unset( $_SESSION['count_error']);
}else{
  $_SESSION = array();
  $uploadDir = tempnam("./files", "TMP");
}

echo "uploadDir→".$uploadDir."<br>\n"

// ファイルの削除処理
// 作成から一日以上経過していたら、削除してしまう。
// deleteOldFile(realpath('./files'),['.gitignore','empty','.htaccess']);


?>




<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>index</title>
</head>
<body id="mailEntry">
  <section class="wrap">
    <form method="post" id="mail-check" action="./confirm.php" enctype="multipart/form-data">
      <input type="hidden" name="onetime" value="<?php echo basename($uploadDir);?>">
      <section class="mb40 mt40">
        <?php if(isset($errorDir)){ ?>
          <label class="error" >
            <span class="font-alert" style="font-size: 20px;"><?php echo $errorDir ?></span>
          </label>
        <?php } ?>
      </section>
      
      <input type="text" class="form-fileup" placeholder="ファイルが選択されていません" name="fname01" />
      <button class="btn-fileup" type="button">参照</button>
      <input type="file" name="upload01" class="js_file hide" />
      
      <input type="text" class="form-fileup" placeholder="ファイルが選択されていません" name="fname02" />
      <button class="btn-fileup" type="button">参照</button>
      <input type="file" name="upload02" class="js_file hide" />
    <button id="btn-check-submit" type="submit">確認</button>
    </form>
  </section>
</body>
</html>



