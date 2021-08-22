<?php
print<<<_HTML_
<h1>To Do List</h1>
_HTML_;

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

if ($_SERVER['REQUEST_METHOD']=='POST') {
    if(validate_form()) {
        update_list();
    } else {
        show_list();
        print "Error: blank field";
    }
} else {
    show_form();
}

function validate_form() {
    if(strlen($_POST['newTask'])!=0) {
        return true;
    };
}

function show_form() {
    print<<<_HTML_
            <form method="POST" action="$_SERVER[PHP_SELF]">
            <input type="text" name="newTask" placeholder="Add new task">
            <input type="submit" value="Add">
            </form>
            _HTML_;
}

function show_list() {
    $db = new PDO('pgsql:host=localhost;dbname=test', 'someuser', '123456');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $db->query("SELECT todo_name FROM todos WHERE todo_status=false");
        show_form();
        while($row = $q->fetch()) {
        print<<< _HTML_
                <table>
                    <tr>
                        <td>Task:</td>
                        <td>$row[todo_name]</td>
                    </tr>
                </table>
                _HTML_;
        }
}

function update_list() {
    try{
        $db = new PDO('pgsql:host=localhost;dbname=test', 'someuser', '123456');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $db->prepare("INSERT INTO todos (todo_name, todo_status) VALUES (?, ?)");
        $stmt->execute(array($_POST['newTask'], 0));
        $q = $db->query("SELECT todo_name FROM todos WHERE todo_status=false");
        show_form();
        while($row = $q->fetch()) {
        print<<< _HTML_
                <table>
                    <tr>
                        <td>Task:</td>
                        <td>$row[todo_name]</td>
                    </tr>
                </table>
                _HTML_;
        }
        /* print<<<_HTML_
                <table>
                    <tr>
                    <td>Task:</td>
                    <td><?=$?></td>
                    </tr>
                </table>
                _HTML_; */
    } catch (PDOException $e) {
        print $e->getMessage();
    }
}

/* try {
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
/*
    $q = $db->query("SELECT dish_name, price FROM dishes ");
    while($row = $q->fetch()) {
        print "$row[dish_name], $row[price]";
    }
} catch (PDOException $e) {
    print $e->getMessage();
}
 */



