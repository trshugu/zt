<?php
/*
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
