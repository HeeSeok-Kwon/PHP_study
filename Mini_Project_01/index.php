<?php
  require("lib/connect.php");
  require("lib/music_change_form.php");
  require("view/top.php");
?>


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
            <td>
              <form action="process_delete_music.php" method="post" onsubmit="if(!confirm('sure')){return false;}">
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
      <p><input type="text" name="title" placeholder="Title" value="<?= $escaped['title'] ?>"></p>
      <p><input type="text" name="album" placeholder="Album" value="<?= $escaped['album'] ?>"></p>
      <p><input type="text" name="likes" placeholder="Likes" value="<?= $escaped['likes'] ?>"></p>
      <?= $select_form ?>
      <p><input type="submit" value="<?= $label_submit ?>"></p>
    </form>

    <p><a href="singer.php">Go to Singer</a></p>
  <?
    require("view/bottom.php");
  ?>
