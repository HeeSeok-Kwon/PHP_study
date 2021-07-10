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
  $delete_link = '';

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
    // $delete_link = '<a href="process_delete.php?id='.$_GET['id'].'">delete</a>';
    $delete_link = '
      <form action="process_delete.php" method="post">
        <input type="hidden" name="id" value="'.$_GET['id'].'">
        <input type="submit" value="delete">
      </form>
    ';
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
    <?= $update_link ?>
    <?= $delete_link ?>
    <!-- <h2>Welcome</h2>
    lorem iqsum dolor sit amet, consectetur adipisicing elit, -->
    <h2><?= $article['title'] ?></h2>
    <?= $article['description'] ?>
  </body>
</html>
