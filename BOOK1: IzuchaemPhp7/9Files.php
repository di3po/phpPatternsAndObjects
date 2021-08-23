<?php

//  *** 9   Files


//  *** HTML
//  file_get_cotents()
/* $page = file_get_contents("template.html");

$page = str_replace('{page_title}', 'Testing file', $page);

if(date('H'>12)) {
    $page = str_replace('{color}', 'green', $page);
} else {
    $page = str_replace('{color}', 'blue', $page);
}

$page = str_replace('{name}', $_SESSION['username'], $page);

//  file_put_contents()
file_put_contents('template.html', $page);

print $page; */


//  *** TXT 
//  Reading people.txt: Variant 1 (file())
/* foreach(file('people.txt') as $line) {
    $line = trim($line);
    $info = explode(':', $line);
    print "Name: $info[0];    Phone: $info[1]<br>";
} */

//  Reading people.txt: Variant 2 (fopen())
/* $fh = fopen('people.txt', 'rb');
while( (!feof($fh)) && ($line = fgets($fh)) ) {
    $line = trim($line);
    $info = explode(':', $line);
    print "Name: $info[0];    Phone: $info[1]<br>";
} 
fclose($fh); */

//  *** Writing from: database - to: .txt file
/* try{
    $db = new PDO('pgsql:host=localhost;dbname=test', 'someuser', '123456');
} catch (PDOException $e) {
    print $e->getMessage();
}
$fh = fopen('dishes.txt', 'wb');
$q = $db->query("SELECT * FROM dishes");
while($row=$q->fetch()) {
    $str = ($row[3]) ? 'yes' : 'no';
    fwrite($fh, "dish: $row[1] - price: $row[2] - spicy: $str\n");
}
fclose($fh); */


//  *** CSV
//  *** Writing from: .csv file - to: database
/* try{
    $db = new PDO('pgsql:host=localhost;dbname=test', 'someuser', '123456');
} catch (PDOException $e) {
    print $e->getMessage();
}
$fh = fopen('dishes.csv', 'rb');
$stmt = $db->prepare("INSERT INTO dishes (dish_name, price, is_spicy) VALUES (?,?,?)");
while((!feof($fh))&&($info = fgetcsv($fh))) {
    $stmt->execute($info); // insert $info as separate row to db
    print "Inserted $info[0]<br>";
}
fclose($fh); */

//  *** Writing from: database - to: .csv file
/* try{
    $db = new PDO('pgsql:host=localhost;dbname=test', 'someuser', '123456');
} catch (PDOException $e) {
    print $e->getMessage();
}
$fh = fopen('dishes2.csv', 'wb');
$q = $db->query("SELECT dish_name,price,is_spicy FROM dishes");
while($row = $q->fetch(PDO::FETCH_NUM)) {
    fputcsv($fh, $row);
}
fclose($fh); */


//  *** Sending .csv to browser
/* try{
    $db = new PDO('pgsql:host=localhost;dbname=test', 'someuser', '123456');
} catch (PDOException $e) {
    print $e->getMessage();
}

// saying to web-client about our csv sending
header('Content-type: text/csv');
header('Content-disposition: attachment; filename: dishes.csv');

// open file with output thread descriptor
$fh = fopen('php://output','wb');

$q = $db->query("SELECT dish_name,price,is_spicy FROM dishes");

while($row = $q->fetch(PDO::FETCH_NUM)) {
    fputcsv($fh, $row);
} */