<?php

try {
    $db = new PDO('pgsql:host=localhost;dbname=test', 'someuser', '123456');
    //$db = new PDO('pgsql:/tmp/menu.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /* $q = $db->exec("CREATE TABLE dishes (
        dish_id INT,
        dish_name VARCHAR(255),
        price DECIMAL(4,2),
        is_spicy INT
    )"); */

    /* $q = $db->exec("INSERT INTO dishes (dish_name, price, is_spicy) VALUES (
        'Pizza', 1.25, 0
    )"); */

    $q = $db->query("SELECT dish_name, price FROM dishes ");
    while($row = $q->fetch()) {
        print "$row[dish_name], $row[price]";
    }
} catch (PDOException $e) {
    print $e->getMessage();
}




