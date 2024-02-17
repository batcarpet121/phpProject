<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h3>Test Cafe Menu Data Store -> Aaron</h3>
    <br>
    <br>
    <?php
    include "CafeMenuDataStore.php";
    $cafeDS = new CafeMenuDataStore("Menu/aaronMenu.csv");

    while ((($menuItem = $cafeDS->getNext()) != NULL)) {
        echo "Name: ", $menuItem->getItemName(), "<br>";
        echo "Price: $", $menuItem->getItemPrice(), "<br>";
        echo "Type: ", $menuItem->getItemType(), "<br>";
        echo "Type: ", $menuItem->getItemImg(), "<br>";
    }

    match ($menuItem->getItemType()) {
        1 => include "breakfast.php",
        2 => include "lunch.php",
        3 => include "dinner.php",
    };

    ?>
</body>

</html>