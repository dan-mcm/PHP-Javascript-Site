<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Customers</title>
</head>

<body>

<?php
//the following imports the header file
    include "./nav.php";

    header('Content-type: text/html; charset=ISO-8859-1'); //this code fixes strange characters from database. Sourced from: https://www.w3.org/International/articles/http-charset/index. Placing in nav code so its used across all pages for convenience.
?>

<?php
    
//the following is standard html code specific for this page
echo "<div class=style1><h1>Customers</h1>";
echo "<p>Please find below a list of all customers sorted by country.</p></div>";
    
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

$sql = "SELECT contactFirstName, contactLastName, country, city, phone FROM customers ORDER BY country";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<div class=style1><table><tr><th>First Name</th><th>Last Name</th><th>Country</th><th>City</th><th>Phone</th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row["contactFirstName"]."</td>";
        echo "<td>".$row["contactLastName"]."</td>";
        echo "<td>".$row["country"]."</td>";
        echo "<td>".$row["city"]."</td>";
        echo "<td>".$row["phone"]."</td>";
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