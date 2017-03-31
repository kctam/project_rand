<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Record Form</title>
</head>
<body>
<form action="rand_inserttransaction.php" method="post">
    <p>
        <label for="date">Date:</label>
        <input type="date" name="date" id="date">
    </p>
    <p>
        <label for="equityCode">Equity Code:</label>
        <?php
        $link = mysqli_connect("localhost", "root", "mysql", "rand");
        // Check connection
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        } 
        // Put it as dropdown menu
        $sql = "SELECT equity_code FROM equity";
        if($result = mysqli_query($link, $sql)){
            echo "<select name='equityCode'>";
            while ($row = mysqli_fetch_array($result)){
                echo "<option value='" . $row['equity_code'] . "'>" . $row['equity_code'] . "</option>";
            }
            echo "</select>";
        }
        ?>

        <!-- <input type="text" name="equity_code" id="equityCode"> -->
    </p>
    <p>
        <label for="transaction">Buy/Sell:</label>
        <input type="radio" name="transaction" id="transaction" value="B">Buy 
        <input type="radio" name="transaction" id="transaction" value="S">Sell 
    </p>
    <p>
        <label for="unit">Unit:</label>
        <input type="decimal-local" name="unit" id="unit">
    </p>
    <p>
        <label for="price">Price:</label>
        <input type="decimal-local" name="price" id="price">
    </p>
    <p>
        <label for="fee">Fee:</label>
        <input type="decimal-local" name="fee" id="fee">
    </p>
    <p>
        <label for="amount">Total Amount:</label>
        <input type="decimal-local" name="amount" id="amount">
    </p>
    <input type="submit" value="Submit"> <input type="reset" value="Reset">
</form>
</body>
</html>
