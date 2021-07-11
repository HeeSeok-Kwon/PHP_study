<?php
  $mysqli = mysqli_connect('localhost', 'root', 'root', 'opentutorials');
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
  $author = '';
  if(isset($_GET['id'])) {
    // Protect code for SQL injection
    $filtered_id = mysqli_real_escape_string($mysqli, $_GET['id']);
    // $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
    $sql = "SELECT * FROM topic LEFT JOIN author ON topic.author_id = author.id WHERE topic.id={$filtered_id}";
    $result = mysqli_query($mysqli, $sql);
    // echo mysqli_error($mysqli);
    $row = mysqli_fetch_array($result);
    // print_r($row);
    // 배열 표현 방식 1
    $article = array(
      'title'=> htmlspecialchars($row['title']),
      'description'=>htmlspecialchars($row['description']),
      'name'=>htmlspecialchars($row['name'])
    );
    // 배열 표현 방식 2
    // $article['title']= htmlspecialchars($row['title']);
    // $article['description']=htmlspecialchars($row['description']);
    // $article['name']=htmlspecialchars($row['name']);

    $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
    $delete_link = '
      <form action="process_delete.php" method="post">
        <input type="hidden" name="id" value="'.$_GET['id'].'">
        <input type="submit" value="delete">
      </form>
    ';
    $author = "<p>by <?= {$article['name']} ?></p>";
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1><a href="index.php">WEB</a></h1>
    <a href="author.php">author</a>
    <ol><?= $list ?></ol>
    <!-- <?php echo $a; ?> -->
    <a href="create.php">create</a>
    <?= $update_link ?>
    <?= $delete_link ?>
    <!-- <h2>Welcome</h2>
    lorem iqsum dolor sit amet, consectetur adipisicing elit, -->
    <h2><?= $article['title'] ?></h2>
    <?= $article['description'] ?>
    <!-- <p>by <?= $article['name'] ?></p> -->
    <?= $author ?>
  </body>
</html>
