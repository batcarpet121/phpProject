<?php 

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