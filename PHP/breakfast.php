<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/default.css">
    <link rel="stylesheet" href="/CSS/breakfastStyles.css">
    <title>Aaron's Diner - Breakfast</title>
</head>

<body>
    <div class="boxArea">
        <header>
            <div class="wrapper">
                <div class="logo">
                    <a href="index.php">Aaron's Diner</a>
                </div>
                <div class="phpDiv">
                    <?php
                    $date = date("m-d-Y");
                    $today = date("l");
                    echo "Today is: $today, $date";
                    ?>
                </div>
                <nav>
                    <a href="http://www.aaron.steverobinett.net/">Home</a>
                    <a href="/PHP/breakfast.php">Breakfast</a>
                    <a href="/PHP/lunch.php">Lunch</a>
                    <a href="/PHP/dinner.php">Dinner</a>
                </nav>
            </div>
        </header>
    </div>

    <div class="bannerArea">
        <h2>Welcome to Aaron's Diner</h2>
    </div>
    <div class="contentArea">
        <div class="wrapper">
            <form action="" method="post">
                <label for="login_fname">First Name:</label>
                <input type="text" id="login_fname" name="login_fname"> <br>

                <label for="login_passwd">Password:</label>
                <input type="password" id="login_passwd" name="login_passwd"> <br>

                <input type="submit" value="Login">
            </form>
            <h2>Breakfast Menu HERE!</h2>

            <?php // PHP TO READ BREAKFAST MENU FROM DB

                function connectDB()
                {
                    $hostname = "localhost";
                    $user = "srobinett_cafe";
                    $passwd = "CSCI213!db";
                    $dbname = "srobinett_cafe";

                    $conn = new mysqli($hostname, $user, $passwd, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    return $conn;
                }

                $myConn = connectDB();
                if ($myConn == null) {
                    die("DB connection failed");
                }

                $result = $myConn->query("SELECT menu_descr, menu_price, menu_image_name from menu_items WHERE cafe_id = 2 AND menu_meal = 1");

                while (($row = $result->fetch_assoc()) != null) {
                    echo '<div class="menuRow">';
                    echo $row['menu_descr'] . ', ' . $row['menu_price'] . ' <img class="menuItem" src="/IMG/' . $row["menu_image_name"] . '"> <br>';
                    echo '</div>';
                }
                echo "DONE";

                // include "CafeMenuDataStore.php";
                // $cafeDS = new CafeMenuDataStore("breakfastMenu.csv");

                // while ($menuItem = $cafeDS->getNext()) {
                //     echo '<div class="menuItems>"';
                //     echo '<p class="php_p">Name: ', $menuItem->getItemName(), '</p>';
                //     echo '<p class="php_p">Price: $', $menuItem->getItemPrice(), '</p>';
                //     echo '<p class="php_p">Type: ', $menuItem->getItemType(), '</p>';
                //     echo '<p class="php_p">Img: ', $menuItem->getItemImg(), '</p>';
                //     echo '</div>';
                // }

            ?>

            
        <div id="listWrapper">
            <div class="listDiv">
                <ul class="listEdit" id="dayList">
                    <li class="listHead">Business Hours</li>
                    <li>MON: 8:00am - 6:00pm</li>
                    <li>TUE: 8:00am - 6:00pm</li>
                    <li>WED: 8:00am - 6:00pm</li>
                    <li>THU: 8:00am - 6:00pm</li>
                    <li>FRI: 8:00am - 6:00pm</li>
                    <li>SAT: 10:00am - 4:00pm</li>
                    <li>SUN: 10:00am - 4:00pm</li>
                </ul>
            </div>
            <div class="listDiv">
                <ul class="listEdit">
                    <li class="listHead">Location</li>
                    <li>1452 7th Ave S</li>
                </ul>
            </div>
            <div class="listDiv">
                <ul class="listEdit">
                    <li class="listHead">Phone Number</li>
                    <li>(406)750-5642</li>
                </ul>
            </div>
        </div>

            <form action="" method="post">
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname"> <br>
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname"> <br>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email"><br>
                <label for="passwd">Password:</label>
                <input type="text" id="passwd" name="passwd"> <br>

                <input type="submit" value="Submit">
            </form>

            <?php // PHP FOR THE CUSTOMER ACCOUNT CREATION TO ADD TO DB
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                $passwd = $_POST['passwd'];

                $hashed_passwrd = password_hash($passwd, PASSWORD_DEFAULT);
                $sql = "INSERT INTO customer (cust_id, cust_fname, cust_lname, cust_email, cust_passwd_hash) VALUES 
                        (null, '$fname', '$lname', '$email', '$hashed_passwrd')";


                if ($conn->query($sql) == TRUE) {
                    echo "Welcome, " . $fname . "!";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

            ?>

        </div>

    </div>

</body>

</html>