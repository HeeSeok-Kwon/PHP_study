<?php
  // 예제
  // $mysqli = mysqli_connect("example.com", "user", "password", "database");
  // $result = mysqli_query($mysqli, "SELECT 'Please do not use the deprecated mysql extension for new development. ' AS _msg FROM DUAL");
  // $row = mysqli_fetch_assoc($result);
  // echo $row['_msg'];

  // 연결 및 쿼리문 전송 mysqli_connect & mysqli_query
  // $mysqli = mysqli_connect("localhost", "user", "******", "opentutorials");
  // mysqli_query($mysqli, "
  //   INSERT INTO topic (
  //     title,
  //     description,
  //     created
  //     ) VALUES (
  //       'MySQL',
  //       'MySQL is ...',
  //       NOW()
  //   )");

  // SQL 출력 mysqli_error
  // $mysqli = mysqli_connect("localhost", "user", "******", "opentutorials");
  // $sql = "
  //   INSERT INTO topic (
  //     title,
  //     description,
  //     created
  //     ) VALUES (
  //       'MySQL',
  //       'MySQL is ...',
  //       NOW()
  //   )";
  //   echo $sql;
  //   $result = mysqli_query($mysqli, $sql);

  // 오류 출력 mysqli_error
  // $mysqli = mysqli_connect("localhost", "user", "******", "opentutorials");
  // $sql = "
  //   INSERT INTO topic (
  //     title,
  //     description,
  //     created
  //     ) VALUES (
  //       'MySQL',
  //       'MySQL is ...',
  //       NOW()
  //   )";
  //   mysqli_query($mysqli, $sql);
  //   echo mysqli_error($mysqli);

  // 오류 출력 mysqli_error
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
