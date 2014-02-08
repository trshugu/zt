private function _toNestArray($rows)
{
  $result  = array();
  
  foreach($rows as $row)
  {
    $path = $row["path"];
    $temp = explode(".",$path);
    $temps = array_filter($temp);
    
    $prev["row"] = $row;//配列最初のキー取得
    
    foreach(array_reverse ($temps)  as $temp)
    {
      $res[$temp] = $prev;
      $prev = array();
      $prev["ID".$temp] =$res[$temp];//IDだけだと数値が再割り振りされてしまう仕様除け
    }
    
    if(count($result) != 0)
    {
      $result = array_merge_recursive($result,$prev);
    }
    else
    {
      $result = $prev;
    }
    
    $prev = array();
  }
  
  return $result;
}


function pathToArray()
{
  $path = ".1.2.5.";
  
  $rows = array(
    array("id" => 1 , "path" => ".1.","name"=>"name1"),
    array("id" => 2 , "path" => ".1.2.","name"=>"name2"),
    array("id" => 5 , "path" => ".1.2.5.","name"=>"name5"),
    array("id" => 6 , "path" => ".1.6.","name"=>"name6"),
  );
  
  $result  = array();
  
  foreach($rows as $row)
  {
    $path = $row["path"];
    $temp = explode(".",$path);
    $temp = array_filter($temp);
    
    $prev["row"] = $row;//配列最初のキー取得
    
    foreach(array_reverse ($temp)  as $tempS)
    {
      $res["$tempS"] = $prev;
      $prev = array();
      $prev["ID$tempS"] =$res["$tempS"];//array_mergeの仕様で数値型になると再振り分けしちゃうので文字列型に無理矢理w
    }
    
    if(count($result) != 0)
    {
      $result = array_merge_recursive($result,$prev);
    }
    else
    {
      $result = $prev;
    }
    
    $prev = array();
  }
  
  var_dump($result);
}
