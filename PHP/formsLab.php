<!DOCTYPE html>
<html>
  <head>
    <title>Self-Processing PHP Form</title>
  </head>
  <body>
    <?
    echo "Here I am:". $_SERVER["PHP_SELF"]."<br>";

      $name = "";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = clean_input($_POST["name"]);
      }

      function clean_input($data) {
        $data = trim($data);
        // $data = htmlspecialchars($data);
        return $data;
      }
    ?>

    <h2>Self-Processing PHP Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Name: <input type="text" name="name">
      <br><br>
      <input type="submit" name="submit" value="Submit">
    </form>

    <?php
      if ($name != "") {
        echo "<p>Welcome, " . $name . "!</p>";
      }
    ?>
  </body>
</html>