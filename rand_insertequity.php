<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "mysql", "rand");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$equity_code = mysqli_real_escape_string($link, $_REQUEST['equity_code']);
$category = mysqli_real_escape_string($link, $_REQUEST['category']);
$description = mysqli_real_escape_string($link, $_REQUEST['description']);
$currency = mysqli_real_escape_string($link, $_REQUEST['currency']);
$balance = 0;
 
// attempt insert query execution
$sql = "INSERT INTO equity (equity_code, category, description, currency, balance) VALUES ('$equity_code', '$category', '$description', '$currency', '$balance')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully. <br>";
    echo $equity_code . " " . $description . " is added. <br>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>
