<?php
  function print_title() {
    if(isset($_GET['id'])) {
      echo $_GET['id'];
    } else {
      echo "Welcome";
    }
  }

  function print_list() {
    $list = scandir('./data');
    $i = 0;
    while($i < count($list)) {
      // PHP에서 "" 문자의 시작과 끝을 나타냄
      if($list[$i] != '.') {
        if($list[$i] != '..') {
          echo "<li><a href=\"index.php?id=$list[$i]\">$list[$i]</a></li>\n";
        }
      }
      $i = $i + 1;
    }
  }

  function print_description() {
    if(isset($_GET['id'])){
      echo file_get_contents("data/".$_GET['id']);
    } else {
      echo "Hello, PHP";
    }
  }
?>
