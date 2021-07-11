<?php
  $mysqli = mysqli_connect('localhost', 'user', '******', 'opentutorials');
  $sql = "SELECT * FROM topic";
  $result = mysqli_query($mysqli, $sql);
  $list = '';
  // Title 목록 코드
  while($row = mysqli_fetch_array($result)) {
    $escaped_title = htmlspecialchars($row['title']);
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
  }

  // Description 코드
  $article = array(
    'title'=> 'Welcome',
    'description'=>'Hello, web'
    );

  $update_link = '';

  if(isset($_GET['id'])) {
    // Protect code for SQL injection
    $filtered_id = mysqli_real_escape_string($mysqli, $_GET['id']);
    $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($result);
    $article = array(
      'title'=> htmlspecialchars($row['title']),
      'description'=>htmlspecialchars($row['description'])
    );
    $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
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
    <ol>
      <!-- <li>HTML</li> -->
      <?= $list ?>
    </ol>
    <form action="process_update.php" method="POST">
      <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
      <p><input type="text" name="title" placeholder="title" value="<?= $article['title']?>"></p>
      <p><textarea name="description" placeholder="description"><?= $article['description'] ?></textarea></p>
      <p><input type="submit"></p>
    </form>
  </body>
</html>
