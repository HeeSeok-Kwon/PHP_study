<?php
  $mysqli = mysqli_connect('localhost', 'user', '******', 'opentutorials');
  $sql = "SELECT * FROM topic";
  $result = mysqli_query($mysqli, $sql);
  $list = '';
  // Title 목록 코드
  while($row = mysqli_fetch_array($result)) {
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }

  // Description 코드
  $article = array(
    'title'=> 'Welcome',
    'description'=>'Hello, web'
    );
  if(isset($_GET['id'])) {
    // Protect code for SQL injection 
    $filtered_id = mysqli_real_escape_string($mysqli, $_GET['id']);
    $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($result);
    $article = array(
      'title'=> $row['title'],
      'description'=>$row['description']
    );
  }
  // print_r($article)
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1><a href="index.php">WEB</a></h1>
    <ol><?= $list ?></ol>
    <!-- <?php echo $a; ?> -->
    <a href="create.php">create</a>
    <!-- <h2>Welcome</h2>
    lorem iqsum dolor sit amet, consectetur adipisicing elit, -->
    <h2><?= $article['title'] ?></h2>
    <?= $article['description'] ?>
  </body>
</html>
