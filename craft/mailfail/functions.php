<?php

  /**
   * 指定日数以上経過しているファイルを、
   * 引数ディレクトリ配下にある分全部捜索し、削除します。
   * 
   * @param unknown $targetDir  対象のパス。/ とかすると、全て削除し始めるので危険なので気をつけて。
   * @param array   $ignore     対象外にしたいファイル・ディレクトリ名。配列で複数設定可能
   * @param number  $passageDay 単位：日 何日前のファイルを削除するのか指定する デフォルト１
   */
  function deleteOldFile(
    $targetDir,
    array $ignore = [],
    $passageDay = 1)
  {
    echo ""."<br>\n";
    echo "=== this is deleteOldFile ===="."<br>\n";
    echo "targetDir".$targetDir."<br>\n";
    echo "ignore".$ignore."<br>\n";
    echo "passageDay".$passageDay."<br>\n";
    
    $timestamp = strtotime($passageDay.'day ago');
    echo "timestamp".$timestamp."<br>\n";
    
    $iterator = new RecursiveIteratorIterator(
      new RecursiveDirectoryIterator(
        $targetDir,
        FilesystemIterator::CURRENT_AS_FILEINFO //current()メソッドでSplFileInfoのインスタンスを返す
        | FilesystemIterator::SKIP_DOTS // .(カレントディレクトリ)および..(親ディレクトリ)をスキップ
        | FilesystemIterator::KEY_AS_PATHNAME // key()メソッドでパスを返す
      ), RecursiveIteratorIterator::CHILD_FIRST //子要素から先に取得。
    );
    
    echo "pathname".$pathname."<br>\n";
    
    
    foreach($iterator as $pathname => $info){
      //ignoreリストは削除対象外
      if(in_array($info->getFilename(),$ignore)){ continue; }
      
      $mtime = $info->getMTime() ;//最終更新日時
      echo "mtime".$mtime."<br>\n";
      
      
      if($mtime < $timestamp)
      {
        if($info->isDir())
        {
          @rmdir($pathname);
        }
        else
        {
          @unlink($pathname);
        }
      }
      
      
    }
  }