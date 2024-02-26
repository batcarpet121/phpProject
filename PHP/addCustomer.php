<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h3>Processs Customer Add</h3>

    <?php

    include_once 'dbConnect.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];

    echo "form values $fname $lname $email $passwd<br>";

  //connect to DB
  $conn = connectDB();
  if ($conn == null) {
    die("DB connection failed");
  }


  $hashed_passwrd = password_hash($passwd, PASSWORD_DEFAULT);


  //setup the SQL
  $sql = "INSERT INTO customer (cust_id, cust_fname, cust_lname, cust_email, cust_passwd_hash) VALUES 
  (null, '$fname', '$lname', '$email', '$hashed_passwrd')";

  echo $sql."<br>";


  //execute and check status
   if ($conn -> query($sql) == TRUE){
    echo "New record created successfully<br>";
   } else {
    echo "Error: " . $sql . "<br>" . $conn->$error;
   }


    ?>

</body>

</html>