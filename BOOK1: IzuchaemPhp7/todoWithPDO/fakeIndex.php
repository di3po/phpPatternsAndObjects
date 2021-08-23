<?php
require "header.php";

/* try{
    $db = new PDO('pgsql:host=localhost;dbname=test', 'someuser', '123456');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $db->exec("CREATE TABLE todos (
        todo_id INT,
        todo_name VARCHAR(255),
        todo_status boolean
    )");
    print "Hooray";
} catch (PDOException $e) {
    print $e->getMessage();
} */
show_form();
if ($_SERVER['REQUEST_METHOD']=='POST') {
    if(validate_form()) {
        update_list();
        show_all_todos();
    }
} /* else {
    show_form();
} */

function show_form() {
    print<<<_HTML_
            <form method="POST" action="$_SERVER[PHP_SELF]">
            <input type="text" name="newTask" placeholder="Add new task">
            <input type="submit" value="Add">
            </form>
            _HTML_;
}

function validate_form() {
    if(strlen($_POST['newTask'])!=0) {
        return true;
    } else {
        show_form();
        print "Error: empty field";
    }
}

function update_list() {
    try{
        $db = new PDO('pgsql:host=localhost;dbname=test', 'someuser', '123456');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $db->prepare("INSERT INTO todos (todo_name, todo_status) VALUES (?, ?)");
        $stmt->execute(array($_POST['newTask'], 0));
    } catch (PDOException $e) {
        print $e->getMessage();
    }
}

function show_all_todos() {
    try{
        $db = new PDO('pgsql:host=localhost;dbname=test', 'someuser', '123456');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $db->query("SELECT todo_name FROM todos WHERE todo_status=false");
        while($row = $q->fetch()) {
            print <<< _HTML_
            <form method="POST" action="foo.php">
                    <input type="text" name="name" value ="$row[todo_name]" readonly>
                    <input type="submit" value="Delete">
            
            </form>
            _HTML_;
        }
    } catch (PDOException $e) {
        print $e->getMessage();
    }
}
