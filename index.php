<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Lines</title>
</head>

<body>

<?php
//the following imports the header file
    include "./nav.php";
?>

<?php
//the following is standard html code specific for this page
echo "<div class=style1><h1>Product Lines</h1>";
echo "<p>Welcome to Classic Models!</p>";
echo "<p>Please find below a list of our various product lines.</p>";
echo "</div>"
?>
    
<?php
//the following is desinged to extract relevant data from database for this section - details inclde product line names and descriptions.
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

$sql = "SELECT productLine, textDescription FROM productlines";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div class=style1>";
        echo "<h2>".$row["productLine"]."</h2>";
        echo "<br>";
        echo $row["textDescription"]."<br>";
        echo "<br>";
        echo "</div>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
    
<?php
//the following imports the footer file
    include "./footer.php";
?>
    
</body>
</html>