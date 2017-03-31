<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "mysql", "rand");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$date = mysqli_real_escape_string($link, $_REQUEST['date']);
$equity_code = mysqli_real_escape_string($link, $_REQUEST['equity_code']);
$transaction = mysqli_real_escape_string($link, $_REQUEST['transaction']);
$unit = mysqli_real_escape_string($link, $_REQUEST['unit']);
$price = mysqli_real_escape_string($link, $_REQUEST['price']);
$fee = mysqli_real_escape_string($link, $_REQUEST['fee']);
$amount = mysqli_real_escape_string($link, $_REQUEST['amount']);
 
// attempt insert query execution
$sql = "INSERT INTO transaction (date, equity_code, transaction, unit, price, fee, amount) VALUES ('$date', '$equity_code', '$transaction', '$unit', '$price', '$fee', '$amount')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// calculate the balance on equity table
$sql = "SELECT * FROM equity WHERE equity_code=" . $equity_code;
$result = mysqli_query($link, $sql);

$old_bal = mysqli_fetch_array($result)['balance'];

if($transaction === 'B'){
	$new_bal = $old_bal + $unit;
} else {
	$new_bal = $old_bal - $unit;
}

$sql = "UPDATE equity SET balance=" . $new_bal . " WHERE equity_code='" . $equity_code . "'";
if(mysqli_query($link, $sql)){
	echo "Record in equity updated successfully.";
} else {
	echo "ERROR: could not execute $sql. " . mysqli_error($link);
}
// close connection
mysqli_close($link);
?>
