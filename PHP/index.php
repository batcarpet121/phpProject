<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/default.css">
    <link rel="stylesheet" href="/CSS/indexStyles.css">
    <title>Aaron's Diner - Home</title>
</head>

<body>
    <div class="boxArea">
        <header>
            <div class="wrapper">
                <div class="logo">
                    <a href="/PHP/index.php">Aaron's Diner</a>
                </div>
                <nav>
                    <a href="/PHP/index.php">Home</a>
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
            <h2>Breakfast Lunch and Dinner Menus HERE!</h2>

            <section id="imgSec">
                <div class="imgContainer">

                    <a href="/PHP/breakfast.php" class="menuA">
                        <div class="textWrapper" id="breakfast">
                            <p>Breakfast</p>
                            <ul class="menuList">
                                <li>Classic Pancake Stack</li>
                                <li>Avocado Toast Delight</li>
                                <li>Healthy Acai Bowl</li>
                                <li>Egg and Cheese Croissant</li>
                                <li>Greek Yogurt Parfait</li>
                            </ul>
                        </div>
                        <img class="menu" src="/IMG/Breakfast.jpg" alt="Breakfast Menu">
                    </a>

                    <a href="/PHP/lunch.php" class="menuA">
                        <div class="textWrapper" id="lunch">
                            <p>Lunch</p>
                            <ul class="menuList">
                                <li>Classic Caesar Salad</li>
                                <li>Caprese Panini</li>
                                <li>Spicy Chicken Wrap</li>
                                <li>Quinoa and Roasted Vegetable Bowl</li>
                                <li>Mediterranean Falafel Plate</li>
                            </ul>
                        </div>
                        <img class="menu" src="/IMG/lunch.jpg" alt="Lunch Menu">
                    </a>

                    <a href="/PHP/dinner.php" class="menuA">
                        <div class="textWrapper" id="dinner">
                            <p>Dinner</p>
                            <ul class="menuList">
                                <li>Grilled Salmon with Lemon-Dill Sauce</li>
                                <li>Pasta Primavera</li>
                                <li>Steakhouse Filet Mignon</li>
                                <li>Vegetarian Thai Green Curry</li>
                                <li>Lobster Ravioli in Creamy Tomato Sauce</li>
                            </ul>
                        </div>
                        <img class="menu" src="/IMG/breakfast.jpg" alt="Dinner Menu">
                    </a>
                </div>
            </section>
            <div class="phpDiv">
                <?php
                $date = date("m-d-Y");
                $today = date("l");

                $dailySpecial = match ($today) {
                    "Monday" => "Classic Caesar Salad",
                    "Tuesday" => "Caprese Panini",
                    "Wednesday" => "Spicy Chicken Wrap",
                    "Thursday" => "Quinoa and Roasted Vegetable Bowl",
                    "Friday" => "Mediterranean Falafel Plate",
                    "Saturday" => "No Special Today",
                    "Sunday" => "No Special Today",
                    default => null
                };

                echo "Today is: $today, $date ";
                if ($dailySpecial != null) {
                    echo "<br>Special of the day is: <br>$dailySpecial";
                } else {
                    echo "THINGS HAVE GONE WRONG!!";
                }
                ?>
            </div>
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
        </div>



    </div>

</body>

</html>