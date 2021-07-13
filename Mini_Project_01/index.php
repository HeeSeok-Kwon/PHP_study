<?php
  $mysqli = mysqli_connect('localhost', 'user', '******', 'opentutorials');
?>

<?php
  // singer code
  $sql = "SELECT * FROM singer";
  $result = mysqli_query($mysqli, $sql);
  $select_form = '<select name="singer_id">';
  while($row = mysqli_fetch_array($result)) {
    $select_form .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
  }
  $select_form .= '</select>';
?>

<?php
  $escaped = array(
    'id'=>'',
    'title'=>'',
    'album'=>'',
    'likes'=>'',
    'singer_id'=>''
  );
  $header2 = "Register Form";
  $label_submit = 'Register music';
  $form_action = "process_register_music.php";
  $form_id = '<input type="text" name="id" placeholder="ID">';
  if(isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($mysqli, $_GET['id']);
    // echo $filtered_id;
    settype($filtered_id, 'integer');
    $sql = "SELECT * FROM music WHERE id={$filtered_id}";
    // query
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($result);
    $escaped['id'] = htmlspecialchars($row['id']);
    $escaped['title'] = htmlspecialchars($row['title']);
    $escaped['album'] = htmlspecialchars($row['album']);
    $escaped['likes'] = htmlspecialchars($row['likes']);
    // echo $escaped['likes'];
    $escaped['singer_id'] = htmlspecialchars($row['singer_id']);
    // 보이는 제목 바꾸기
    $header2 = "Update Form";
    $label_submit = 'Update music';
    $form_action = "process_update_music.php";
    $form_id = '<input type="text" name="id" value="'.$_GET['id'].'">';
    $select_form = '<input type="text" name="id" value="'.$escaped['singer_id'].'">';
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1><a href="index.php">Music</a></h1>
    <table border=1>
      <tr>
        <th>ID</th><th>Title</th><th>Album</th><th>Likes</th><th>singer_ID</th>
      </tr>
      <?php
        $sql = "SELECT * FROM music";
        $result = mysqli_query($mysqli, $sql);
        while($row = mysqli_fetch_array($result)) {
          $filtered = array(
            'id'=>htmlspecialchars($row['id']),
            'title'=>htmlspecialchars($row['title']),
            'album'=>htmlspecialchars($row['album']),
            'likes'=>htmlspecialchars($row['likes']),
            'singer_id'=>htmlspecialchars($row['singer_id'])
          );
          ?>
          <tr>
            <td><?= $filtered['id'] ?></td>
            <td><?= $filtered['title'] ?></td>
            <td><?= $filtered['album'] ?></td>
            <td><?= $filtered['likes'] ?></td>
            <td><?= $filtered['singer_id'] ?></td>
            <td><a href="index.php?id=<?= $filtered['id']?>">update</a></td>
          </tr>
          <?php
        }
      ?>
    </table>

    <h2><?= $header2 ?></h2>
    <form action="<?= $form_action ?>" method="post">
      <!-- <p><input type="text" name="id" placeholder="ID"></p> -->
      <p><?= $form_id ?></p>
      <p><input type="text" name="title" placeholder="Title" value="<?= $escaped['title'] ?>"></p>
      <p><input type="text" name="album" placeholder="Album" value="<?= $escaped['album'] ?>"></p>
      <p><input type="text" name="likes" placeholder="Likes" value="<?= $escaped['likes'] ?>"></p>
      <?= $select_form ?>
      <p><input type="submit" value="<?= $label_submit ?>"></p>
    </form>
  </body>
</html>
