<?php
/*
*/





/*
# �N���[�W��
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
# �����_
$lam = function ()
{
  print "lamddd";
};

$lam();
*/


/*
# �Q�Ɠn��
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
# �N���X
class ccc
{
  # �v���p�e�B
  public $vv = "asdf\n";
  
  # ���\�b�h
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
# �T�u���[�`��
function fun($x, $y)
{
  return $x + $y;
}

print fun(2,3);
*/


/*
# if��
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
# print��
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
# �z��(php�ɂ͘A�z�z�񂵂��Ȃ�)
$arra = array("one"=>"iti", "two"=>"nini", "three"=>"sansan");
var_dump($arra);

# ����ł�OK
$arrra = ["une"=>"hitot", "dos"=>"hutat", "trees"=>"miti"];
var_dump($arrra);
*/

/*
// �Ă���
echo("test�Ă���");
*/

# �I���^�O�͉��s�Ȃ�html�����̂��̂��o�͂�����header��
# �����Ȃ��Ȃ铙�s����������邽�ߏȂ��B�������R��BOM�t��UTF�����ցB
