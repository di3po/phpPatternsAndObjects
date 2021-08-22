<?php
require "header.php";

try{
    // need session for saving deleted items in array and print them
    /* $arr = [];
    foreach ($_POST['name'] as $a) {
        $arr[] = $a;
    }
    print_r($arr);
    /* $newarr = implode(", ", $arr);
    echo "Deleted ".$newarr; */ 


$db = new PDO('pgsql:host=localhost;dbname=test', 'someuser', '123456');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->query("DELETE FROM todos WHERE todo_name='{$_POST['name']}'");

echo "Deleted: {$_POST['name']}<br>";

print<<<_HTML_
    <br>
    <button><a href="index.php" style="text-decoration:none; color:black;">Add new task</a></button>
    <br>
_HTML_;

$q = $db->query("SELECT todo_name FROM todos WHERE todo_status=false");
while($row = $q->fetch()) {
    print <<< _HTML_
    <form method="POST" action="foo.php">
            <br>
            <input type="text" name="name" value ="$row[todo_name]" readonly>
            <input type="submit" value="Delete">

    </form>
    _HTML_;
}
}
catch(PDOException $e) {
    print $e->getMessage();
}