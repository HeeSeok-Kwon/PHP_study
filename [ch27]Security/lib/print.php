<?php
  function print_title() {
    if(isset($_GET['id'])) {
      echo htmlspecialchars($_GET['id']);
    } else {
      echo "Welcome";
    }
  }

  function print_list() {
    $list = scandir('./data');
    $i = 0;
    while($i < count($list)) {
      // PHP에서 "" 문자의 시작과 끝을 나타냄
      $title = htmlspecialchars($list[$i]);
      if($list[$i] != '.') {
        if($list[$i] != '..') {
          echo "<li><a href=\"index.php?id=$title\">$title</a></li>\n";
        }
      }
      $i = $i + 1;
    }
  }

  function print_description() {
    if(isset($_GET['id'])){
      // echo $_GET['id'];
      // echo "<br>";
      // echo basename("data/".$_GET['id']);
      // echo "<br>";
      $basename = basename($_GET['id']);
      echo htmlspecialchars(file_get_contents("data/".$basename));
    } else {
      echo "Hello, PHP";
    }
  }
?>
