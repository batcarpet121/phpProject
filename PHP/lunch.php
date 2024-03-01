<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/default.css">
    <link rel="stylesheet" href="/CSS/lunchStyles.css">
    <title>Aaron's Diner - Breakfast</title>
</head>

<body>
    <div class="boxArea">
        <header>
            <div class="wrapper">
                <div class="logo">
                    <a href="http://www.aaron.steverobinett.net/">Aaron's Diner</a>
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
                    <a href="/PHP/acctCreateForm.php">Register</a>
                </nav>
            </div>
        </header>
    </div>

    <div class="bannerArea">
        <h2>Welcome to Aaron's Diner</h2>
    </div>
    <div class="contentArea">
        <div class="wrapper">

            <form action="" method="post" id="loginForm">

                <label for="login_email" class="loginLabel">Email:</label>
                <input type="text" id="login_email" name="login_email"> <br>

                <label for="login_passwd" class="loginLabel">Password:</label>
                <input type="password" id="login_passwd" name="login_passwd"> <br>

                <input type="submit" value="Login">

            </form>
            <?php
            include "dbConnection.php";
            $myConn = connectDB();
            if ($myConn == null) {
                die("DB connection failed");
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $login_email = $_POST['login_email'];
                    $login_passwd = $_POST['login_passwd'];
                    $login_passwd_hash = password_hash($login_passwd, PASSWORD_DEFAULT);

                    $loginQuery = $myConn->query("SELECT * FROM customer WHERE cust_email = '$login_email'");

                    if ($loginQuery->num_rows == 1) {
                        $logRow = $loginQuery->fetch_assoc();
                        $login_fname = $logRow['cust_fname'];
                        $db_passwd = $logRow['cust_passwd_hash'];

                        if (password_verify($login_passwd, $db_passwd)) {

                            echo '<h4 class="welcomeMsg">';
                            echo 'Welcome ' . $login_fname . '!';
                            echo '</h4>';
                            
                        } else {
                            echo "Invalid password";
                        }
                    } else {
                        echo "Invalid email";
                    }
                }

            ?>

            <h2>Breakfast Menu HERE!</h2>

            <?php // PHP TO READ BREAKFAST MENU FROM DB
                

            $result = $myConn->query("SELECT menu_descr, menu_price, menu_image_name from menu_items WHERE cafe_id = 2 AND menu_meal = 2");

            while (($row = $result->fetch_assoc()) != null) {
                echo '<div class="menuRow">';
                echo $row['menu_descr'] . ', ' . $row['menu_price'] . ' <img class="menuItem" src="../IMG/' . $row["menu_image_name"] . '"> <br>';
                echo '</div>';
            }

            ?>


            <div id="listWrapper">
                <div class="listDiv">
                    <?php
                        $date = date("m-d-Y");
                        $today = date("l");

                        switch ($today) {
                            case "Monday":
                                $dailySpecial = "Classic Caesar Salad";
                                break;
                            case "Tuesday":
                                $dailySpecial = "Caprese Panini";
                                break;
                            case "Wednesday":
                                $dailySpecial = "Spicy Chicken Wrap";
                                break;
                            case "Thursday":
                                $dailySpecial = "Quinoa and Roasted Vegetable Bowl";
                                break;
                            case "Friday":
                                $dailySpecial = "Mediterranean Falafel Plate";
                                break;
                            case "Saturday":
                                $dailySpecial = "No Special Today";
                                break;
                            case "Sunday":
                                $dailySpecial = "No Special Today";
                                break;
                            default:
                                $dailySpecial = null;
                        }

                        echo '<p id="dateSpecials">Today is: ' . $today . ', ' . $date . '</p>';

                        if ($dailySpecial != null) {
                            echo '<p id="specialMenuDisplay">Special of the day is: <br>' . $dailySpecial . '</p>';
                        } else {
                            echo "THINGS HAVE GONE WRONG!!";
                        }
                    ?>

                </div>
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
                        <li class="listHead" id="pNum">Phone Number</li>
                        <li>(406)750-5642</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</body>

</html>