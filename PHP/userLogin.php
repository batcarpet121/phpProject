<?php
    include "dbConnection.php";
    // include "loginForm.php";
    $myConn = connectDB();
    if ($myConn == null) {
        die("DB connection failed");
    }

    $login_fname = $_POST['login_fname'];
    $login_passwd = $_POST['login_passwd'];
    $login_passwd_hash = password_hash($login_passwd, PASSWORD_DEFAULT);

    $loginQuery = $myConn->query("SELECT * FROM customer WHERE cust_fname = '$login_fname'");

    if ($loginQuery->num_rows > 0) {
        $row = $loginQuery->fetch_assoc();
        $db_passwd = $row['cust_passwd_hash'];

        if (password_verify($login_passwd, $db_passwd)) {

            echo '<p class="welcomeMsg">Welcome ' . $login_fname . '!';
        } else {
            echo "Invalid password";
        }
    } else {
        echo "Invalid name";
    }
?>