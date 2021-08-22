<?php

// *** 7 Creating web forms (Изучаем PHP7)
/* if('POST' == $_SERVER['REQUEST_METHOD']) {
    print "Hello, ".$_POST['your_name']."!";
} else {
    print<<<_HTML_
    <form method="POST" action="$_SERVER[PHP_SELF]">
     <input type="text" name="your_name" placeholder="Enter Your Name, please">
     <br>
     <br>
     <input type="submit" value="Greet">
     </form>
    _HTML_;
} */

//  *** Simple validation
/*
if($_SERVER['REQUEST_METHOD']=='POST') {
    if(validate_form()) {
        process_form();
    } else {
        print "Name must contain more than 3 characters.";
    }
} else {
    show_form();
}

function validate_form() {
    if(strlen($_POST['name'])>3) {
        return true;
    } else {
        return false;
    }
}

function process_form() {
    print "Hello, {$_POST['name']}";
}

function show_form() {
print<<<_HTML_
        <form method="POST" action="$_SERVER[PHP_SELF]">
        <input type="text" name="name" placeholder="Enter Your Name, please">
        <br>
        <br>
        <input type="submit" value="Greet">
        </form>
        _HTML_;
} */