<?php
/*
*/









/*
// 月初
//echo date("Ym01", time());

// 来月初
//echo date("Ym01", strtotime(-1 * -1 . " month"));

// 先月初
//echo date("Ym01", strtotime(-1 * 1 . " month"));

*/




/*
$arr = Array();
$arr["a"] = "b";

echo is_string(json_encode($arr));
echo is_string(json_encode(TRUE));
*/




/*
$xml = new DOMDocument( "1.0", "ISO-8859-15" );

$xml_note = $xml->createElement( "Note", html_entity_decode("<11Th&lt;e last symphony composed by Ludwig van Beethoven.") );
$xml->appendChild($xml_note);

$tn = $xml->createTextNode(html_entity_decode("<222The&lt; las&t symphony composed by Ludwig van Beethoven."));
$xml_note2 = $xml->createElement( "Note2", $tn);
$xml->appendChild($tn);

print $xml->saveXML();
echo "ee";

// htmlspecialchars_decode
*/


/*
# implode valueが返却される
$arr = array();
$arr["a"] = "b";
$arr["c"] = "d";
print_r($arr);
echo implode(',', $arr);
*/


/*
# FALSEはゼロか？
if (FALSE == 0)
{
  echo "true";
}

if (FALSE != 0)
{
  echo "true";
}
else
{
  echo "false";
}
*/

/*
# ラムダ式ソートワンライナー
$c=[2,4,1,6,4];uasort($c,function($a,$b){return $a-$b;});echo var_dump($c);
*/

/*
# 引数1で同じだった場合もう一つの引数でソート
function cmp($a,$b){
  echo "$a[0] and $b[0]\n";
  if($a[0]>$b[0]){
    return 1;
  }
  
  if($a[0]<$b[0]){
    return -1;
  }
  
  if ($a[0]==$b[0]){
    echo "zero!\n";
    return $a[2] - $b[2];
  } 
  #echo "$a-$b=";
  #echo $a - $b."\n";
}

# ソート
$arr = [];
array_push($arr, [12, "asdf", 0]);
array_push($arr, [12, "vbf", 1]);
array_push($arr, [23, "abedf", 2]);
array_push($arr, [23, "as33f", 3]);
array_push($arr, [23, "tow", 4]);
array_push($arr, [23, "oeer", 5]);
array_push($arr, [0, "asdf", 6]);
array_push($arr, [0, "vbf", 7]);
array_push($arr, [12, "abedf", 8]);
array_push($arr, [12, "as33f", 9]);
array_push($arr, [12, "tow", 10]);
array_push($arr, [12, "oeer", 11]);

uasort($arr, "cmp");
echo print_r($arr);
*/


/*
# コンペアソート基本
function cmp($a,$b){
  echo "$a-$b=";
  echo $a - $b."\n";
  return($a - $b);
}

$arr = [];
array_push($arr, 1);
array_push($arr, 3);
array_push($arr, 4);
array_push($arr, 1);
array_push($arr, 2);
array_push($arr, 1);
array_push($arr, 0);

# クイックソートされる
uasort($arr, "cmp");
echo print_r($arr);
*/


/*
# マージ(古いPHPでは[]が効かないので注意)
function  merge($arg1, $arg2)
{
  $result = "";
  
  // タグをマッチさせてリストにするよ！
  $tagList = [];
  
  // タグを消してデフォルト文字列的にどこに入ってたか記憶するよ
  preg_match_all('/<.*?>/', $arg1, $matchTags);
  $num = 0;
  foreach ($matchTags[0] as $i)
  {
    // [何文字目:タグ]（[3,<tag>]）みたいな配列を配列で持っておく
    $position = mb_strpos($arg1, $i, 0, "Shift_JIS");
    array_push($tagList, [$position, $i,  $num]);
    $num = $num + 1;
    
    $tmp1 = mb_substr($arg1, $position + mb_strlen($i, "Shift_JIS"), null, "Shift_JIS");
    $tmp1 = mb_substr($arg1, 0, $position, "Shift_JIS").$tmp1;
    $arg1 = $tmp1;
  }
  
  // arg2でも同じことをするよ。
  preg_match_all('/<.*?>/', $arg2, $matchTags2);
  foreach ($matchTags2[0] as $i)
  {
    // [何文字目:タグ]（[3,<tag>]）みたいな(ry
    $position2 = mb_strpos($arg2, $i, 0, "Shift_JIS");
    
    // ここであらかじめですてんくと
    $dflg = false;
    foreach ($tagList as $j)
    {
      if($j[0] == $position2 && $j[1] == $i)
      {
        // 重複
        $dflg = true;
        break;
      }
    }
    
    if($dflg == false)
    {
      array_push($tagList, [$position2, $i, $num]);
      $num = $num + 1;
    }
    
    $tmp2 = mb_substr($arg2, $position2 + mb_strlen($i, "Shift_JIS"), null, "Shift_JIS");
    $tmp2 = mb_substr($arg2, 0, $position2, "Shift_JIS").$tmp2;
    $arg2 = $tmp2;
  }
  
  // デフォルトをチェックするのもいいかもね！→いれました
  $baseString = "";
  if ($arg1 == $arg2)
  {
    $baseString = $arg1;
  }
  else
  {
    // ここにくるということはタグ以外の差異があるということ
    return "デフォルトが一致しませんです＞＜";
  }
  
  // 入れる個所が大きい順にソート(しないとどこに入れるかわかんないからね)
  #echo var_dump($tagList);
  #$tagList = array_reverse($tagList, true);
  #ksort($tagList);
  #function sor($a,$b){
  #  return($a[0] - $b[0]);
  #}
  
  #function sor2($a,$b){
  #  return($a - $b);
  #}
  
  #uksort($tagList, "sor2");
  #uasort($tagList, "sor");
  
  foreach($tagList as $key => $row)
  {
    $arrpos[$key] = $row[0];
    $number[$key] = $row[2];
  }
  #echo var_dump($arrpos)."\n";
  array_multisort($arrpos, SORT_DESC, $number, SORT_DESC, $tagList);
  #array_multisort($num,SORT_DESC,$tagList);
  #$tagList = array_reverse($tagList, true);
  echo var_dump($tagList);
  #tagList.sort( function(a,b){return(a[0]-b[0])} ).reverse();
  
  // 基準となる文字列を抽出できたんでタグをいれていきます
  foreach ($tagList as $i)
  {
    $index = $i[0];
    $baseString = mb_substr($baseString, 0, $index, "Shift_JIS").$i[1].mb_substr($baseString, $index, mb_strlen($baseString, "Shift_JIS"), "Shift_JIS");
    #echo $baseString."\n";
  }
  
  #echo $baseString."\n";
  return $baseString;
}

# 関数呼び出し
if($_POST["submit"]){
  $result = merge($_POST["tta"], $_POST["ttb"]);
}

# テスト用
if($_POST["submittest"]){
  // テスト0
  $test0_arg1 = "abcd";
  $test0_arg2 = "cdef";
  $expect0 = "デフォルトが一致しませんです＞＜";
  
  if($expect0 == merge($test0_arg1, $test0_arg2))
  {
    $testresult = $testresult."err:OK<br>";
  }
  else
  {
    $testresult = $testresult."err:NG<br>";
  }
  
  // テスト1
  $test1_arg1 = "愛は<string>勝つ</string>と思われる";
  $test1_arg2 = "愛は勝つと<string>思われる</string>";
  $expect1 = "愛は<string>勝つ</string>と<string>思われる</string>";
  
  if($expect1 == merge($test1_arg1, $test1_arg2))
  {
    $testresult = $testresult."test1:OK<br>";
  }
  else
  {
    $testresult = $testresult."test1:NG<br>";
  }
  
  // テスト2
  $test2_arg1 = "愛は<font type='aiu'><string>愛</string>と思われる。しかし、<string>愛</string>は愛とは限らない</font>";
  $test2_arg2 = "愛は<font type='aiu'>愛と<string>思われる</string>。しかし、愛は<string>愛</string>とは限らない</font>";
  $expect2 = "愛は<font type='aiu'><string>愛</string>と<string>思われる</string>。しかし、<string>愛</string>は<string>愛</string>とは限らない</font>";
  
  if($expect2 == merge($test2_arg1, $test2_arg2))
  {
    $testresult = $testresult."test2:OK<br>";
  }
  else
  {
    $testresult = $testresult."test2:NG<br>";
  }
  
  // テスト3
  $test3_arg1 = "4:任天堂の岩田社長は2013年Wii Uラインナップについて、<anchor><words>以下のように説明。</words><name></name></anchor>";
  $test3_arg2 = "<anchor><words>4:任天堂の岩田社長は2013年Wii Uラインナップについて、</words><name></name></anchor>以下のように説明。";
  $expect3 = "<anchor><words>4:任天堂の岩田社長は2013年Wii Uラインナップについて、</words><name></name></anchor><anchor><words>以下のように説明。</words><name></name></anchor>";
  
  if($expect3 == merge($test3_arg1, $test3_arg2))
  {
    $testresult = $testresult."test3:OK<br>";
  }
  else
  {
    $testresult = $testresult."test3:NG<br>";
    echo $expect3."\n";
    echo merge($test3_arg1, $test3_arg2)."\n";
  }
}

echo <<< EOM
<div id="main"><form id="form1" method="POST">
  <div id="form">
    <section id="arg1">
      <input type="text" name="tta" size="150" value="4:任天堂の岩田社長は2013年Wii Uラインナップについて、<anchor><words>以下のように説明。</words><name></name></anchor>" />
    </section>
    <section id="arg2">
      <input type="text" name="ttb" size="150" value="<anchor><words>4:任天堂の岩田社長は2013年Wii Uラインナップについて、</words><name></name></anchor>以下のように説明。" />
    </section>
    <section id="button">
      <input type="submit" name="submit" />
    </section>
  </div>
  
  <section id="ressec">
    <div id="res">結果</div>
    <input type="text" id="result" value="{$result}" />
  </section>
  
  <section id="ut">
    <input type="submit" name="submittest" value="test"/>
    <div id="testresult">{$testresult}</div>
  </section>
</form></div>
EOM;
*/


/*
# ヒアドキュメントでhtml + 関数呼び出し
echo var_dump($_POST);
if($_POST["submit"]){
  $disp = "hello world";
}

echo <<< EOM
<form method="post">
  <input type="text" name="nam">
  <input type="submit" name="submit" />
  {$disp}
</form>
EOM;

echo "asf";
*/

/*
# ブラウザに出力
print "testetst";
echo "ttete";
*/



/*
# キーでソート
$arra = array(1=>"iti", 3=>"nini", 1=>"sansan");
var_dump($arra);
#ksort($arra);
krsort($arra);
var_dump($arra);
*/


/*
$secret = "secret";
$baseUri = "http://customer.vo.xxxx.com/directory/file";
$endTime = time() + 300;

$targetUri = sprintf("%s?e=%d",$baseUri,$endTime);

$hash = base64_encode(md5("$secret.$targetUri",true)); ###変更
print $hash."\n";
$hash = strtr($hash, '+/', '-_');               ###変更
print $hash."\n";
$hash = str_replace('=', '', $hash);            ###変更
print $hash."\n";

$finalUri = sprintf("%s&h=%s",$targetUri,$hash);
print $finalUri."\n";

$url = $finalUri;
print "$url<br/>\n";
*/


/*
# クロージャ
$clo = function ($x)
{
  $val = $x;
  
  return function ($y) use (&$val)
  {
    return $val + $y;
  };
};

$ff = $clo(3);
print $ff(4);
*/


/*
# ラムダ
$lam = function ()
{
  print "lamddd";
};

$lam();
*/


/*
# 参照渡し
$arr = ["1","2","3"];
$bb = $arr;
$cc =& $arr;

print count($arr)."\n";
print count($bb)."\n";
print count($cc)."\n";

array_pop($arr);
array_pop($bb);
array_pop($cc);

print count($arr)."\n";
print count($bb)."\n";
print count($cc)."\n";
*/

/*
# クラス
class ccc
{
  # プロパティ
  public $vv = "asdf\n";
  
  # メソッド
  public function mess()
  {
    return "ret\n";
  }
}

$aaa = new ccc();
print $aaa->vv;
print $aaa->mess();

# print ccc::vv;
print ccc::mess();
*/


/*
# サブルーチン
function fun($x, $y)
{
  return $x + $y;
}

print fun(2,3);
*/


/*
# if文
$vava = "aaa";
if ($vava == "aaa")
{
  print "true";
}
else
{
  print "false";
}
*/

/*
# count
$ha = ["hitot", "hutat", "miti"];
print count($ha);
array_push($ha, "adsfds");
print count($ha);
print array_pop($ha);
print count($ha);
*/

/*
# print文
print "hell";
print("hell");
*/


/*
# foreach
#$ha = ["une"=>"hitot", "dos"=>"hutat", "trees"=>"miti"];
$ha = ["hitot", "hutat", "miti"];
#echo $ha[0];
foreach($ha as $k => $val)
{
  echo($k . $val."\n");
}
*/


/*
# 配列(phpには連想配列しかない)
$arra = array("one"=>"iti", "two"=>"nini", "three"=>"sansan");
var_dump($arra);

# これでもOK
$arrra = ["une"=>"hitot", "dos"=>"hutat", "trees"=>"miti"];
var_dump($arrra);
*/

/*
// てすと
echo("testてすと");
*/

# 終了タグは改行などhtml相当のものが出力されるとheaderが
# 効かなくなる等不具合が発生するため省く。同じ理由でBOM付きUTFも厳禁。
