<?php

  // select 사용법 1
  // $mysqli = mysqli_connect('localhost', 'root', 'root', 'opentutorials');
  // $sql = "SELECT * FROM topic";
  // $result = mysqli_query($mysqli, $sql);
  // // var_dump($result);
  // // var_dump($result->num_rows);
  // $row = print_r(mysqli_fetch_array($result));

  // select 사용법 2
  // $mysqli = mysqli_connect('localhost', 'root', 'root', 'opentutorials');
  // echo "<h1>single row</h1>";
  // $sql = "SELECT * FROM topic WHERE id = 2";
  // $result = mysqli_query($mysqli, $sql);
  // $row = mysqli_fetch_array($result);
  // echo '<h2>'.$row['title'].'</h2>';
  // echo $row['description'];

  // select 사용법 3-1
  // $mysqli = mysqli_connect('localhost', 'root', 'root', 'opentutorials');
  // echo "<h1>multi rows</h1>";
  // $sql = "SELECT * FROM topic";
  // $result = mysqli_query($mysqli, $sql);
  //
  // $row = mysqli_fetch_array($result);
  // echo '<h2>'.$row['title'].'</h2>';
  // echo $row['description'];
  //
  // $row = mysqli_fetch_array($result);
  // echo '<h2>'.$row['title'].'</h2>';
  // echo $row['description'];
  //
  // $row = mysqli_fetch_array($result);
  // echo '<h2>'.$row['title'].'</h2>';
  // echo $row['description'];
  //
  // $row = mysqli_fetch_array($result);
  // echo '<h2>'.$row['title'].'</h2>';
  // echo $row['description'];
  //
  // $row = mysqli_fetch_array($result);
  // echo '<h2>'.$row['title'].'</h2>';
  // echo $row['description'];
  // var_dump($row)

  // select 사용법 3-2
  $mysqli = mysqli_connect('localhost', 'root', 'root', 'opentutorials');
  echo "<h1>single row</h1>";
  $sql = "SELECT * FROM topic WHERE id = 2";
  $result = mysqli_query($mysqli, $sql);
  $row = mysqli_fetch_array($result);
  echo '<h2>'.$row['title'].'</h2>';
  echo $row['description'];

  echo "<h1>multi rows</h1>";
  $sql = "SELECT * FROM topic";
  $result = mysqli_query($mysqli, $sql);

  while($row = mysqli_fetch_array($result)) {
    echo '<h2>'.$row['title'].'</h2>';
    echo $row['description'];
  }
?>
