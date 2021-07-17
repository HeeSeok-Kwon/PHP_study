<?php
  $mysqli = mysqli_connect('localhost', 'user', '******', 'opentutorials');
?>

<?php
  // update
  $escaped = array(
    'id'=>'',
    'name'=>'',
    'company'=>'',
  );
  $header2 = "Register Form";
  $label_submit = 'Register singer';
  $form_action = "process_register_singer.php";
  $form_id = '<input type="text" name="id" placeholder="ID">';
  if(isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($mysqli, $_GET['id']);
    // echo $filtered_id;
    settype($filtered_id, 'integer');
    $sql = "SELECT * FROM singer WHERE id={$filtered_id}";
    // query
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($result);
    $escaped['id'] = htmlspecialchars($row['id']);
    $escaped['name'] = htmlspecialchars($row['name']);
    $escaped['company'] = htmlspecialchars($row['company']);
    // 보이는 제목 바꾸기
    $header2 = "Update Form";
    $label_submit = 'Update singer';
    $form_action = "process_update_singer.php";
    $form_id = '<input type="text" readonly name="id" value="'.$escaped['id'].'">';
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1><a href="singer.php">Singer</a></h1>
    <table border=1>
      <tr>
        <th>ID</th><th>Name</th><th>Company</th>
      </tr>
      <?php
        $sql = "SELECT * FROM singer;";
        // die($sql);
        $result = mysqli_query($mysqli, $sql);
        while($row = mysqli_fetch_array($result)) {
          $filtered = array(
            'id'=>htmlspecialchars($row['id']),
            'name'=>htmlspecialchars($row['name']),
            'company'=>htmlspecialchars($row['company'])
          );
          ?>
          <tr>
            <td><?= $filtered['id'] ?></td>
            <td><?= $filtered['name'] ?></td>
            <td><?= $filtered['company'] ?></td>
            <td><a href="singer.php?id=<?= $filtered['id']?>">update</a></td>
            <td>
              <form action="process_delete_singer.php" method="post" onsubmit="if(!confirm('sure')){return false;}">
                <input type="hidden" name="id" value=<?= $filtered['id'] ?>>
                <input type="submit" value="delete">
              </form>
            </td>
          </tr>
          <?php
        }
      ?>
    </table>

    <h2><?= $header2 ?></h2>
    <form action="<?= $form_action ?>" method="post">
      <!-- <p><input type="text" name="id" placeholder="ID"></p> -->
      <p><?= $form_id ?></p>
      <p><input type="text" name="name" placeholder="Name" value="<?= $escaped['name'] ?>"></p>
      <p><input type="text" name="company" placeholder="Company" value="<?= $escaped['company'] ?>"></p>
      <p><input type="submit" value="<?= $label_submit ?>"></p>
    </form>

    <p><a href="index.php">Go to Music</a></p>
  </body>
</html>
