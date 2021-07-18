<?php
  require("lib/connect.php");
  require("lib/singer_change_form.php");
  require("view/top.php");
?>


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
  <?
    require("view/bottom.php");
  ?>
