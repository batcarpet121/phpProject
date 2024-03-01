<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/default.css">
    <link rel="stylesheet" href="/CSS/registrationStyles.css">
    <script src="/JAVASCRIPT/passValidator.js" defer></script>
    <title>Aaron's Diner - Registration</title>
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
        <div class="formCreator">
            <form action="" method="post">
                <label for="fname" class="acctLabel">First Name:</label>
                <input type="text" id="fname" name="fname" required> <br>
                <label for="lname" class="acctLabel">Last Name:</label>
                <input type="text" id="lname" name="lname" required> <br>
                <label for="email" class="acctLabel">Email:</label>
                <input type="text" id="email" name="email" required><br>
                <label for="passwd" class="acctLabel">Password:</label>
                <input type="password" id="passwd" name="passwd" required> <br>

                <input type="submit" value="Submit" id="submitButton">
            </form>

            <div class="acctRegCode">
                <?php
                include "dbConnection.php";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $fname = isset($_POST['fname']) ? trim($_POST['fname']) : '';
                    $lname = isset($_POST['lname']) ? trim($_POST['lname']) : '';
                    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
                    $passwd = isset($_POST['passwd']) ? trim($_POST['passwd']) : '';

                    if (empty($fname) || empty($lname) || empty($email) || empty($passwd)) {
                        echo "Error: All fields are required.";
                    } else {
                        // Check if email already exists, prepare statement to prevent sql injection
                        $checkEmailQuery = $myConn->prepare("SELECT cust_id FROM customer WHERE cust_email = ?");
                        $checkEmailQuery->bind_param("s", $email);
                        $checkEmailQuery->execute();
                        $checkEmailQuery->store_result();

                        if ($checkEmailQuery->num_rows > 0) {
                            echo "Error: Email address already exists.";
                        } else {
                            // prepare statement to prevent sql injection when adding acct to database
                            $hashed_passwrd = password_hash($passwd, PASSWORD_DEFAULT);
                            $acctSql = $myConn->prepare("INSERT INTO customer (cust_id, cust_fname, cust_lname, cust_email, cust_passwd_hash) VALUES (null, ?, ?, ?, ?)");
                            $acctSql->bind_param("ssss", $fname, $lname, $email, $hashed_passwrd);

                            if ($acctSql->execute() == true) {
                                echo "Account successfully created!";
                                header("Location: /PHP/breakfast.php");
                                exit();
                            } else {
                                echo "Error: " . $acctSql->error;
                            }

                            $acctSql->close();
                        }

                        $checkEmailQuery->close();
                    }

                    $myConn->close();
                }
                ?>
            </div>
        </div>

        <div id="listWrapper">
            <div class="wrapper">
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