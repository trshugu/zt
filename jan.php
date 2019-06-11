<?php
//コンピュータ側の手の用意　
$comp_hand = ['グー', 'チョキ', 'パー'];
$a = mt_rand(0, 2);
$comp = $comp_hand[$a];
if (isset($_POST['hand']) === TRUE) {
  $hand = htmlspecialchars($_POST['hand'], ENT_QUOTES, 'utf-8');
}
$comp = htmlspecialchars($comp, ENT_QUOTES, 'utf-8');

$str = "";
for ($j = 1; $j <= 10; $j++) {
  $str = $str.mt_rand(0,2);
}

print_r($str."\n");
foreach($_POST as $k => $val)
{
  echo($k .":".$val."\n");
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>課題</title>
</head>
<body>
  <h1>じゃんけん勝負</h1>
  <?php if (isset($hand) === TRUE) { 
    // 重み付けとかしていい感じにできたらとても素敵
    ?>
    <p><?php print '自分：'. $hand; ?></p>
    <p><?php print '相手：'. $comp; ?></p>
    
    <?php if ($hand === $comp) { ?>
      <p><?php print '結果：あいこです'; ?></p>
    <?php } elseif (($hand === 'グー' && $comp === 'チョキ') || ($hand === 'チョキ' && $comp === 'パー') || ($hand === 'パー' && $comp === 'グー')) { ?>
      <p><?php print '結果：勝ちです！'; ?></p>
    <?php } else { ?>
      <p><?php print '結果：負けです...'; ?></p> 
    <?php } ?>

  <?php } ?>
  <form method = "post">
    <input type = "radio" name = "hand" value = "グー">グー<br>
    <input type = "radio" name = "hand" value = "チョキ">チョキ<br> 
    <input type = "radio" name = "hand" value = "パー">パー<br>
    <input type = "submit" value = "勝負！"><br>
  </form>
</body>
</html>