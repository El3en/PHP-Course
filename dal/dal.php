<?php
use LDAP\Result;

define('db_server', 'localhost:3360');
define('db_username', 'root');
define('db_password', '');
define('db_dbname', 'shop');
function get_rows($q)
{
    $rows = [];
    $con = new mysqli(db_server, db_username, db_password, db_dbname);
    if ($con->connect_error) {
        return [];
    }
    $q = $con->query($q);
    while ($row = $q->fetch_assoc()) {
        array_push($rows, $row);
    }
    $con->close();
    return $rows;
}

function get_row($q){
    $row = null;
    $con = new mysqli(db_server, db_username, db_password, db_dbname);
    if ($con->connect_error) {
        return null;
    }
    $q = $con->query($q);
    $row = $q->fetch_assoc();
    $con->close();
    return $row;
}
function execute($q)
{
    $result = false;
    $con = new mysqli(db_server, db_username, db_password, db_dbname);
    if ($con->connect_error) {
        return $result;
    }
    $result = $con->query($q);
    $con->close();
    return $result;
}


function get_user($q){
    $row = null;
    $con = new mysqli(db_server, db_username, db_password, db_dbname);
    if ($con->connect_error) {
        return null;
    }

    //prepare statment to avoid sql injection
    $stmt = $con->prepare("SELECT * FROM users WHERE username =? AND password =?");
    $stmt->bind_param("ss",$username,$password);
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();
    $con->close();
    return $row;

}


// function prepareStmt(){
//     $con = new mysqli(db_server,db_username,db_password,db_dbname);
//     if(!$con->connect_error)
//     {
//         $stmt = $con->prepare("SELECT * FROM users WHERE username =? AND password =?");
//         $stmt->bind_param("ss",$username,$password);
//         $stmt->execute();
//     }

// }