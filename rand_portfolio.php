<?php
// function for getting quote based on equity_code
// return with last price
function getQuote($symbol) 
{
 
 $symbol  = urlencode( trim( substr(strip_tags($symbol),0,7) ) ); 
 $yahooCSV = "http://finance.yahoo.com/d/quotes.csv?s=$symbol&f=sl1d1t1c1ohgvpnbaejkr&o=t";
 
 $csv = fopen($yahooCSV,"r");

 if($csv) 
 {
  list($quote['symbol'], $quote['last'], $quote['date'], $quote['timestamp'], $quote['change'], $quote['open'],
    $quote['high'], $quote['low'], $quote['volume'], $quote['previousClose'], $quote['name'], $quote['bid'],
    $quote['ask'], $quote['eps'], $quote['YearLow'], $quote['YearHigh'], $quote['PE']) = fgetcsv($csv, ','); 
  
  fclose($csv);
  
  return $quote['last']; 
 } 
 else 
 {
  return false;
 }
}


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "mysql", "rand");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM equity";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>equity_code</th>";
                echo "<th>category</th>";
                echo "<th>description</th>";
                echo "<th>currency</th>";
                echo "<th>balance</th>";
                echo "<th>last price</th>";
                echo "<th>value</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            if ($row['balance'] > 0){
                        $LastPrice = getQuote($row['equity_code']);
                        echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['equity_code'] . "</td>";
                            echo "<td>" . $row['category'] . "</td>";
                            echo "<td>" . $row['description'] . "</td>";
                            echo "<td>" . $row['currency'] . "</td>";
                            echo "<td>" . $row['balance'] . "</td>";
                            echo "<td>" . $LastPrice . "</td>";
                            echo "<td>" . $LastPrice * $row['balance'] . "</td>";
                        echo "</tr>";};
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
