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
                    <div class="phpDiv">
                        <?php 
                            $date = date("m-d-Y");
                            $today = date("l");
                            echo "Today is: $today, $date";
                        ?>
                    </div>
                <nav>
                    <a href="/PHP/index.php">Home</a>
                    <a href="#">Breakfast</a>
                    <a href="#">Lunch</a>
                    <a href="#">Dinner</a>
                    <a href="#">About</a>
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
                    <div class="textWrapper">
                        <p>Breakfast</p>
                        <ul class="menuList">
                            <li>
                                Eggs
                            </li>
                            <li>
                                Bacon
                            </li>
                            <li>
                                Cheese
                            </li>
                        </ul>
                    </div>
                    <img class="menu" src="/IMG/Breakfast.jpg" alt="Breakfast Menu">

                    <div class="textWrapper" id="lunch">
                        <p>Lunch</p>
                        <ul class="menuList">
                            <li>
                                Steak
                            </li>
                            <li>
                                Lasagna
                            </li>
                            <li>
                                Chicken & Waffles
                            </li>
                        </ul>
                    </div>
                    <img class="menu" src="/IMG/lunch.jpg" alt="Lunch Menu">

                    <div class="textWrapper" id="dinner">
                        <p>Dinner</p>
                        <ul class="menuList">
                            <li>
                                Salad
                            </li>
                            <li>
                                Soup
                            </li>
                            <li>
                                Pasta
                            </li>
                        </ul>
                    </div>
                    <img class="menu" src="/IMG/Dinner.jpg" alt="Dinner Menu">
                </div>
            </section>
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