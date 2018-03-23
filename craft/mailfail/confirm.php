<?php
session_cache_limiter('none');
session_start();

$fname01= $_POST['fname01'];
$fname02= $_POST['fname02'];

$uploadDir = './files'.DIRECTORY_SEPARATOR.$_POST['onetime'];
echo "fname01→".$fname01."<br>\n";
echo "uploadDir→".$uploadDir."<br>\n";

$count = 1;
while ($count < 3)
{
  echo "かうんと：".$count."<br>\n";
  if (is_uploaded_file($_FILES["upload0".$count]["tmp_name"])) 
  {
    // ディレクトリを作る
    if(!file_exists($uploadDir))
    {
      mkdir($uploadDir.DIRECTORY_SEPARATOR,0777,true);
    }
    else if(!is_dir($uploadDir))
    {
      unlink($uploadDir);//ファイル名を作成・取得のため、ファイルを削除
      mkdir($uploadDir.DIRECTORY_SEPARATOR,0777,true);
    }
    
    // クライアントマシンの元のファイル名
    $pathData =  pathinfo($_FILES["upload0".$count]["name"]);
    echo "クライアントマシンの元のファイル名→".$_FILES["upload0".$count]["name"]."<br>\n";
    echo "pathData→".$pathData."<br>\n";
    
    // "/tmp/files"
    $pathData["dirname"];
    echo "pathData[\"dirname\"]→".$pathData["dirname"]."<br>\n";
    
    // "sample.txt"
    $pathData["basename"];
    echo "pathData[\"basename\"]→".$pathData["basename"]."<br>\n";
    
    // ファイル名をナンバリング 1.png 2.txt・・・
    $f01 = $count;
    
    // "txt" が表示されます。
    $f02 = $pathData["extension"];
    
    echo "tmp_name→".$_FILES["upload0".$count]["tmp_name"]."<br>\n";
    echo "次の→".$uploadDir.DIRECTORY_SEPARATOR . $count.".".$f02."<br>\n";
    
    if (move_uploaded_file(
      $_FILES["upload0".$count]["tmp_name"],
      $uploadDir.DIRECTORY_SEPARATOR . $count.".".$f02))
    {
      chmod($uploadDir.DIRECTORY_SEPARATOR .$count.".".$f02, 0644);
      echo $_FILES["upload0".$count]["name"] . "をアップロードしました。\n";
    } 
    else
    {
      echo "ファイルをアップロードできません。\n";
    }
  }
  else
  {
    echo "ファイルが選択されていません。\n";
  }
  $count++;
}




?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>確認</title>
</head>
<body>
  <form method="post" id="mail-check" action="main.php" enctype="multipart/form-data">
    <?php if (!empty($fname01)||$fname01=="0"){?>
      <li>
        <p class="item">1枚目）</p><p class="content">
          <?php echo($fname01); ?>
          <input class="form-control" type="hidden" name="fname01" value="<?php echo($fname01); ?>">
        </p>
      </li>
    <?php } else{} ?>
    
    <?php if (!empty($fname02)||$fname02=="0"){?>
      <li>
        <p class="item">2枚目）</p><p class="content">
          <?php echo($fname02); ?>
          <input class="form-control" type="hidden" name="fname02" value="<?php echo($fname02); ?>">
        </p>
      </li>
    <?php } else{} ?>
    
    <input class="form-control" type="hidden" name="onetime" value="<?php echo basename($uploadDir);?>">
    <button id="btn-back" class="mr20 js_history_back" type="button">修正</button>
    <button id="btn-submit" type="submit">送信</button>
    <input class="form-control" type="hidden" name="consent" value="<?php echo(htmlspecialchars($consent)); ?>">
  </form>
  
  
</body>
</html>



