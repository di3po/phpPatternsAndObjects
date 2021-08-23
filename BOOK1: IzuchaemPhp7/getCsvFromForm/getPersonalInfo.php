<?php

session_start();
print "<h1>Download your personal info in file</h1>";

$_SESSION['user'] = $_POST['first_name'];

try {
    $db = new PDO('pgsql:host=localhost;dbname=test', 'someuser', '123456');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    print $e->getMessage();
}
//  create table
/*try {
        $db->exec("CREATE TABLE personalInfo (
            id bigserial primary key,
            first_name VARCHAR(255) NOT NULL,
            last_name VARCHAR(255) NOT NULL,
            email VARCHAR(25) NOT NULL,
            phone VARCHAR(25) NOT NULL
        )");
        print "OK";
} catch(PDOException $e) {
        print $e->getMessage();
}*/

if($_SERVER['REQUEST_METHOD']=='POST') {
    if(validate()) {
        process();
    }
} else {
    show();
}

function validate() {
    $phoneLength = strlen($_POST['phone']);
    if($phoneLength==11) {
            return true;
        } else {
            print "Phone number must contain more than $phoneLength characters.";
        }
}

function process(){
    try{
        // Insert into db
        $db = new PDO('pgsql:host=localhost;dbname=test', 'someuser', '123456');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $db->prepare("INSERT INTO personalInfo (first_name, last_name, email, phone) 
                                VALUES (?,?,?,?)");
        $stmt->execute(array($_POST['first_name'], $_POST['last_name'], 
                            $_POST['email'], $_POST['phone']));
    } catch(PDOException $e) {
        print $e->getMessage();
    }

    /* //  Write to file
    $fh = fopen('info.csv', 'wb');
    $q = $db->query("SELECT * FROM personalInfo");
    while ($row=$q->fetch(PDO::FETCH_NUM)) {
        fputcsv($fh, $row);
    } 
    fclose($fh); */

    // Get file
    header('Content-type: text/csv');
    header('Content-disposition: attachment; filename: info2.csv');

    $fh2 = fopen('php://output', 'wb');
    $q2 = $db->query("SELECT * FROM personalInfo WHERE first_name = '{$_SESSION['user']}' ");
    while ($row2 = $q2->fetch(PDO::FETCH_NUM)) {
        fputcsv($fh2, $row2);
    }
}

function show(){
    print<<<_HTML_
    <form method='POST' action='$_SERVER[PHP_SELF]'>
        <input name='first_name' type='text' placeholder='Your first name' required><br>
        <input name='last_name' type='text' placeholder='Your last name' required><br>
        <input name='email' type='email' placeholder='Your e-mail' required><br>
        <input name='phone' type='number' placeholder='Your phone number' required><br>
        <input type='submit' value='GET'>
    </form>
    _HTML_;
}

