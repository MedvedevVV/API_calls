<?php

$postData = file_get_contents('php://input');
$arr = explode("&", $postData);
$x = 0;
  for ($i = 0; $i < count($arr); $i++) {
    $arr_1 = explode("=", $arr[$i]);
    if ($arr_1[0] == "status" && $arr_1[1] == "Success") {
      $x = $x+2;
    }
    if ($arr_1[0] == "link") {
        $link = $arr_1[1];
        $x++;
    }
    if ($arr_1[0] == "diversion") {
        $diversion = $arr_1[1];
        $x++;
     }
    if ($arr_1[0] == "start") {
        $start = $arr_1[1];
        $x++; 
      } 
    }
if ($x == 5) {
    file_create();
    file_string_delete();
    $line = "<p><h3>Тип вызова: Входящий (на номер " . $diversion . ") | Дата/время вызова: " . $call_time . " | <a href='" . $file_name . "'>Ссылка на запись</a></h3></p><hr />" . PHP_EOL;
    $file = file('index.php');
    array_push($file, $line); 
    edit();
} elseif ($x == 4) {
    file_create();
    file_string_delete();
    $line = "<p><h3>Тип вызова: Исходящий | Дата/время вызова: " . $call_time . " | <a href='" . $file_name . "'>Ссылка на запись</a></h3></p><hr />" . PHP_EOL;
    $file = file('index.php');
    array_push($file, $line);
    edit();
} else {
    exit;
}  
  
function edit()
{
  global $file;
  $fileOpen = fopen('index.php',"w");
  fputs($fileOpen, implode("",$file));
  fclose($fileOpen);
}


function file_create() 
{
  
  global $link;
  global $file_name;
  global $start;
  global $call_time;
  $link = str_replace("%2F" ,"/" , $link);
  $link = str_replace("%3A" ,":" , $link);
  $rand = mt_rand(1,10000000);
  $file_name =  "records/$rand.mp3"; 
  $file_get = file_get_contents($link);
  if ($file_get == FALSE) {
    sleep(70);
    $file_get = file_get_contents($link); 
  }
  if ($file_get == FALSE) {
      exit; 
  }
  file_put_contents($file_name  , $file_get);
  $call_timestamp=strtotime($start);
  $call_time=date('j.m.Y H:i', $call_timestamp);
}


function file_string_delete()
{

  global $file;
  $dir    = "records";
  $files = scandir($dir); 
  for ($j = 0; $j < count($files); $j++) {
    if($files[$j] != "." && $files[$j] != "..") {
      $file_name_delete = ("records/" . $files[$j]);
      $time_create = filemtime($file_name_delete);
      $realtime = time();
      if (($realtime - $time_create) > 86400) {
          $file = file('index.php');
          for ($k = 0; $k < count($file); $k++) {
              if (strpos($file[$k], $file_name_delete) !== false) {
                  unset($file[$k]);
                  unlink($file_name_delete);
                  edit();
                }
              } 
            } 
        } 
    } 
}
?>
