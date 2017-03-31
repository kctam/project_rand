<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$MYSQLHOST = "localhost";
$MYSQLUSER = "root";
$MYSQLPWD = "mysql";

$link = mysqli_connect($MYSQLHOST, $MYSQLUSER, $MYSQLPWD);
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Create database "rand"
$sql = "CREATE DATABASE rand";
if(mysqli_query($link, $sql)){
    echo "Database created successfully";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Create two tables "equity" and "transaction"

$link = mysqli_connect($MYSQLHOST, $MYSQLUSER, $MYSQLPWD, "rand");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "CREATE TABLE equity (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    equity_code VARCHAR(15) NOT NULL,
    category VARCHAR(8) NOT NULL,
    description VARCHAR(20),
    currency VARCHAR(5),
    balance DECIMAL
)";
if(mysqli_query($link, $sql)){
    echo "Equity table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$link = mysqli_connect($MYSQLHOST, $MYSQLUSER, $MYSQLPWD, "rand");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "CREATE TABLE transaction (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    date DATE,
    equity_code VARCHAR(15) NOT NULL,
    transaction VARCHAR(1) NOT NULL,
    unit DECIMAL NOT NULL,
    price DECIMAL NOT NULL,
    fee DECIMAL NOT NULL,
    amount DECIMAL NOT NULL
)";
if(mysqli_query($link, $sql)){
    echo "Transaction table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>
