<?php
  $mysqli = mysqli_connect("localhost", "user", "******", "opentutorials");
  $sql = "
    INSERT INTO topic (
      title,
      description,
      created
      ) VALUES (
        'MySQL',
        'MySQL is ...',
        NOW()
    )";
    $result = mysqli_query($mysqli, $sql);
    if($result === false) {
      echo mysqli_error($mysqli);
    }
?>
