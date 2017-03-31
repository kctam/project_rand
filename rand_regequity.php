<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Record Form</title>
</head>
<body>
<form action="rand_insertequity.php" method="post">
    <p>
        <label for="equityCode">Equity Code:</label>
        <input type="text" name="equity_code" id="equityCode">
    </p>
    <p>
        <label for="category">Category:</label>
        <input type="text" name="category" id="category">
    </p>
    <p>
        <label for="description">Description:</label>
        <input type="text" name="description" id="description">
    </p>
    <p>
        <label for="currency">Currency:</label>
        <input type="radio" name="currency" value="HKD" id="currenty">HKD
        <input type="radio" name="currency" value="USD" id="currenty">USD
        <input type="radio" name="currency" value="GBP" id="currenty">GBP 
<!--        <input type="text" name="currency" id="currency"> -->
    </p>


    <input type="submit" value="Submit"> <input type="reset" value="Reset">
</form>
</body>
</html>
