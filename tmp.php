<?php
/*
*/









/*
// ����
//echo date("Ym01", time());

// ������
//echo date("Ym01", strtotime(-1 * -1 . " month"));

// �挎��
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
# implode value���ԋp�����
$arr = array();
$arr["a"] = "b";
$arr["c"] = "d";
print_r($arr);
echo implode(',', $arr);
*/


/*
# FALSE�̓[�����H
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
# �����_���\�[�g�������C�i�[
$c=[2,4,1,6,4];uasort($c,function($a,$b){return $a-$b;});echo var_dump($c);
*/

/*
# ����1�œ����������ꍇ������̈����Ń\�[�g
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

# �\�[�g
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
# �R���y�A�\�[�g��{
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

# �N�C�b�N�\�[�g�����
uasort($arr, "cmp");
echo print_r($arr);
*/


/*
# �}�[�W(�Â�PHP�ł�[]�������Ȃ��̂Œ���)
function  merge($arg1, $arg2)
{
  $result = "";
  
  // �^�O���}�b�`�����ă��X�g�ɂ����I
  $tagList = [];
  
  // �^�O�������ăf�t�H���g������I�ɂǂ��ɓ����Ă����L�������
  preg_match_all('/<.*?>/', $arg1, $matchTags);
  $num = 0;
  foreach ($matchTags[0] as $i)
  {
    // [��������:�^�O]�i[3,<tag>]�j�݂����Ȕz���z��Ŏ����Ă���
    $position = mb_strpos($arg1, $i, 0, "Shift_JIS");
    array_push($tagList, [$position, $i,  $num]);
    $num = $num + 1;
    
    $tmp1 = mb_substr($arg1, $position + mb_strlen($i, "Shift_JIS"), null, "Shift_JIS");
    $tmp1 = mb_substr($arg1, 0, $position, "Shift_JIS").$tmp1;
    $arg1 = $tmp1;
  }
  
  // arg2�ł��������Ƃ������B
  preg_match_all('/<.*?>/', $arg2, $matchTags2);
  foreach ($matchTags2[0] as $i)
  {
    // [��������:�^�O]�i[3,<tag>]�j�݂�����(ry
    $position2 = mb_strpos($arg2, $i, 0, "Shift_JIS");
    
    // �����ł��炩���߂ł��Ă񂭂�
    $dflg = false;
    foreach ($tagList as $j)
    {
      if($j[0] == $position2 && $j[1] == $i)
      {
        // �d��
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
  
  // �f�t�H���g���`�F�b�N����̂����������ˁI������܂���
  $baseString = "";
  if ($arg1 == $arg2)
  {
    $baseString = $arg1;
  }
  else
  {
    // �����ɂ���Ƃ������Ƃ̓^�O�ȊO�̍��ق�����Ƃ�������
    return "�f�t�H���g����v���܂���ł�����";
  }
  
  // ���������傫�����Ƀ\�[�g(���Ȃ��Ƃǂ��ɓ���邩�킩��Ȃ������)
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
  
  // ��ƂȂ镶����𒊏o�ł�����Ń^�O������Ă����܂�
  foreach ($tagList as $i)
  {
    $index = $i[0];
    $baseString = mb_substr($baseString, 0, $index, "Shift_JIS").$i[1].mb_substr($baseString, $index, mb_strlen($baseString, "Shift_JIS"), "Shift_JIS");
    #echo $baseString."\n";
  }
  
  #echo $baseString."\n";
  return $baseString;
}

# �֐��Ăяo��
if($_POST["submit"]){
  $result = merge($_POST["tta"], $_POST["ttb"]);
}

# �e�X�g�p
if($_POST["submittest"]){
  // �e�X�g0
  $test0_arg1 = "abcd";
  $test0_arg2 = "cdef";
  $expect0 = "�f�t�H���g����v���܂���ł�����";
  
  if($expect0 == merge($test0_arg1, $test0_arg2))
  {
    $testresult = $testresult."err:OK<br>";
  }
  else
  {
    $testresult = $testresult."err:NG<br>";
  }
  
  // �e�X�g1
  $test1_arg1 = "����<string>����</string>�Ǝv����";
  $test1_arg2 = "���͏���<string>�v����</string>";
  $expect1 = "����<string>����</string>��<string>�v����</string>";
  
  if($expect1 == merge($test1_arg1, $test1_arg2))
  {
    $testresult = $testresult."test1:OK<br>";
  }
  else
  {
    $testresult = $testresult."test1:NG<br>";
  }
  
  // �e�X�g2
  $test2_arg1 = "����<font type='aiu'><string>��</string>�Ǝv����B�������A<string>��</string>�͈��Ƃ͌���Ȃ�</font>";
  $test2_arg2 = "����<font type='aiu'>����<string>�v����</string>�B�������A����<string>��</string>�Ƃ͌���Ȃ�</font>";
  $expect2 = "����<font type='aiu'><string>��</string>��<string>�v����</string>�B�������A<string>��</string>��<string>��</string>�Ƃ͌���Ȃ�</font>";
  
  if($expect2 == merge($test2_arg1, $test2_arg2))
  {
    $testresult = $testresult."test2:OK<br>";
  }
  else
  {
    $testresult = $testresult."test2:NG<br>";
  }
  
  // �e�X�g3
  $test3_arg1 = "4:�C�V���̊�c�В���2013�NWii U���C���i�b�v�ɂ��āA<anchor><words>�ȉ��̂悤�ɐ����B</words><name></name></anchor>";
  $test3_arg2 = "<anchor><words>4:�C�V���̊�c�В���2013�NWii U���C���i�b�v�ɂ��āA</words><name></name></anchor>�ȉ��̂悤�ɐ����B";
  $expect3 = "<anchor><words>4:�C�V���̊�c�В���2013�NWii U���C���i�b�v�ɂ��āA</words><name></name></anchor><anchor><words>�ȉ��̂悤�ɐ����B</words><name></name></anchor>";
  
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
      <input type="text" name="tta" size="150" value="4:�C�V���̊�c�В���2013�NWii U���C���i�b�v�ɂ��āA<anchor><words>�ȉ��̂悤�ɐ����B</words><name></name></anchor>" />
    </section>
    <section id="arg2">
      <input type="text" name="ttb" size="150" value="<anchor><words>4:�C�V���̊�c�В���2013�NWii U���C���i�b�v�ɂ��āA</words><name></name></anchor>�ȉ��̂悤�ɐ����B" />
    </section>
    <section id="button">
      <input type="submit" name="submit" />
    </section>
  </div>
  
  <section id="ressec">
    <div id="res">����</div>
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
# �q�A�h�L�������g��html + �֐��Ăяo��
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
# �u���E�U�ɏo��
print "testetst";
echo "ttete";
*/



/*
# �L�[�Ń\�[�g
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

$hash = base64_encode(md5("$secret.$targetUri",true)); ###�ύX
print $hash."\n";
$hash = strtr($hash, '+/', '-_');               ###�ύX
print $hash."\n";
$hash = str_replace('=', '', $hash);            ###�ύX
print $hash."\n";

$finalUri = sprintf("%s&h=%s",$targetUri,$hash);
print $finalUri."\n";

$url = $finalUri;
print "$url<br/>\n";
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
