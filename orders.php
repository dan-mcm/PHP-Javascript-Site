<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Orders</title>
</head>

<body>

<?php
//the following imports the header file
    include "./nav.php";
    
?>

<?php

echo "<div class=style1><h1>Orders</h1>";
echo "<p>Please find below a set of three tables. The first table represents any orders currently in process, the second table represents all cancelled orders and the third table represents the 20 most recent orders made. When the user clicks on a product ID they will be taken back to the top of this page where an extra table will appear showing details for the order they have selected.</p></div>";
    
?>
    
<?php
//the following is desinged to extract relevant data from database for this section - includes formation of a table to hold data
//code modified from example sqi connection used in class
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "classicmodels";

    

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("<div class=style1>Connection failed: " . mysqli_connect_error()."</div>");
}
    
    
    
//Prints extra data at top of page. As page refreshes at top this makes most sense for positioning.

if (isset($_GET["order"])){
$where = ($_GET["order"]);
$sql = "SELECT orders.orderNumber,orders.orderDate, orders.comments, orders.status, orderdetails.productCode, products.productLine, products.productName FROM orders, orderdetails, products WHERE orders.orderNumber= orderdetails.orderNumber and orderdetails.productCode = products.productCode and orders.orderNumber=".$where.";"; //was ORDER BY orderNumber
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<div class=style1><h2>Details of Order Selected:</h2><table><tr><th>Order Number</th><th>Order Date</th><th>Order Status</th><th>Comments</th><th>Product Code</th><th>Product Line</th><th>Product Name</th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row["orderNumber"]."</td>";
        echo "<td>".$row["orderDate"]."</td>";
        echo "<td>".$row["status"]."</td>";
        echo "<td>".$row["comments"]."</td>";
        echo "<td>".$row["productCode"]."</td>";
        echo "<td>".$row["productLine"]."</td>";
        echo "<td>".$row["productName"]."</td>";
        echo "</tr>";
    }
} else {
    echo "0 results"; //error handling if no results found from database
}
    echo "</table></div>"; //closes table and div
} 
    
    
$sql = "SELECT orderNumber, orderDate, status FROM orders WHERE status = 'In Process'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<div class=style1><h2>Orders in Process:</h2><table><tr><th>Order Number</th><th>Order Date</th><th>Order Status</th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td><a href='orders.php?order=".$row["orderNumber"]."'>".$row["orderNumber"]."</a>"."</td>";
        echo "<td>".$row["orderDate"]."</td>";
        echo "<td>".$row["status"]."</td>";
        echo "</tr>";
        
    }
} else {
    echo "0 results";
}
    
// used for testing purposes
//var_dump($_GET);
    
echo "</table></div>"; //closes table and div
    
$sql = "SELECT orderNumber, orderDate, status FROM orders WHERE status = 'Cancelled'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<div class=style1><h2>Cancelled Orders:</h2><table><tr><th>Order Number</th><th>Order Date</th><th>Order Status</th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td><a href='orders.php?order=".$row["orderNumber"]."'>".$row["orderNumber"]."</a>"."</td>";
        echo "<td>".$row["orderDate"]."</td>";
        echo "<td>".$row["status"]."</td>";
        echo "</tr>";
    }
} else {
    echo "0 results"; //error handling if no results found from database
}
    
echo "</table></div>"; //closes table and div
    
$sql = "SELECT orderNumber, orderDate, status FROM orders ORDER BY orderDate DESC LIMIT 20";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<div class=style1><h2>Last 20 Orders Placed:</h2><table><tr><th>Order Number</th><th>Order Date</th><th>Order Status</th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo"<td><a href='orders.php?order=".$row["orderNumber"]."'>".$row["orderNumber"]."</a>"."</td>";
        echo "<td>".$row["orderDate"]."</td>";
        echo "<td>".$row["status"]."</td>";
        echo "</tr>";
    }
} else {
    echo "0 results"; //error handling if no results found from database
} 
    echo "</table></div>"; //closes table and div

    mysqli_close($conn);
?>

    
<?php
//the following imports the footer file
    include "./footer.php";
?>
    
</body>
</html>