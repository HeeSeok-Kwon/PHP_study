<html>
  <body>
    <!-- <script>
      alert('hi');
    </script> -->

    <!-- &lt;script&gt;
      alert('hi');
    &lt;/script&gt; -->

    <?php
      echo htmlspecialchars("<script>alert('hi')</script>");
    ?>
  </body>
</html>
