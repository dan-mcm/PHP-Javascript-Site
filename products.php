<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Products</title>
</head>

<body>

<?php
//the following imports the header file
    include "./nav.php";
?>

<?php
//the following is standard html code specific for this page
echo "<div class=style1><h1>Products</h1></div>";
?>

<?php
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
    
$sql = "SELECT productLine FROM productlines ORDER BY productLine";
$result1 = mysqli_query($conn, $sql);

if (mysqli_num_rows($result1) > 0) {
    //the following is to handle drop down selection box
    echo "<div id=stylesubmit><p>Please select the product line you want more information on:</p>";
    echo "<select id='productLine' name='productLine' onchange='show(this)'>"; //may need to insert form before select here - close in echo below
    echo "<option value='Select'>Select...</option>"; //sets a blank  value in list
    // output data of each row
    while($row = mysqli_fetch_assoc($result1)) {
        echo "<option value='".$row["productLine"]."'>".$row["productLine"]."</option>";
    }
} else {
    echo "0 results";
}

echo "</select></div>"; //ends div the select numbers are based in.
//the below changes URL value on webpage - allows to customize output.
//if($_POST['productLine'] && $_POST['productLine'] != 0){
//   $stylesubmit=$_POST['productLine'];
//}

$cars = "SELECT * FROM products WHERE productLine='Classic Cars'";
$result2 = mysqli_query($conn, $cars);

if (mysqli_num_rows($result2) > 0) {
    echo "<div id=dd1><h2>Classic Cars</h2><table><tr><th>Product Code</th><th>Product Name</th><th>Product Line</th><th>Product Scale</th><th>Product Vendor</th><th>Product Description</th><th>Quantity in Stock</th><th>Buying Price</th><th>Manufacturer Suggested Retail Price</th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result2)) {
        echo "<tr>";
        echo "<td>".$row["productCode"]."</td>";
        echo "<td>".$row["productName"]."</td>";
        echo "<td>".$row["productLine"]."</td>";
        echo "<td>".$row["productScale"]."</td>";
        echo "<td>".$row["productVendor"]."</td>";
        echo "<td>".$row["productDescription"]."</td>";
        echo "<td>".$row["quantityInStock"]."</td>";
        echo "<td>".$row["buyPrice"]."</td>";
        echo "<td>".$row["MSRP"]."</td>";
        echo "</tr>";
    }
} else {
    echo "0 results"; //error handling if no results found from database
}

echo "</table></div>";

$moto = "SELECT * FROM products WHERE productLine='Motorcycles'";
$result3 = mysqli_query($conn, $moto);

if (mysqli_num_rows($result3) > 0) {
    echo "<div id=dd2><h2>Motorcycles</h2><table><tr><th>Product Code</th><th>Product Name</th><th>Product Line</th><th>Product Scale</th><th>Product Vendor</th><th>Product Description</th><th>Quantity in Stock</th><th>Buying Price</th><th>Manufacturer Suggested Retail Price</th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result3)) {
        echo "<tr>";
        echo "<td>".$row["productCode"]."</td>";
        echo "<td>".$row["productName"]."</td>";
        echo "<td>".$row["productLine"]."</td>";
        echo "<td>".$row["productScale"]."</td>";
        echo "<td>".$row["productVendor"]."</td>";
        echo "<td>".$row["productDescription"]."</td>";
        echo "<td>".$row["quantityInStock"]."</td>";
        echo "<td>".$row["buyPrice"]."</td>";
        echo "<td>".$row["MSRP"]."</td>";
        echo "</tr>";
    }
} else {
    echo "0 results"; //error handling if no results found from database
}

echo "</table></div>";
    
$plane = "SELECT * FROM products WHERE productLine='Planes'";
$result4 = mysqli_query($conn, $plane);

if (mysqli_num_rows($result4) > 0) {
    echo "<div id=dd3><h2>Planes</h2><table><tr><th>Product Code</th><th>Product Name</th><th>Product Line</th><th>Product Scale</th><th>Product Vendor</th><th>Product Description</th><th>Quantity in Stock</th><th>Buying Price</th><th>Manufacturer Suggested Retail Price</th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result4)) {
        echo "<tr>";
        echo "<td>".$row["productCode"]."</td>";
        echo "<td>".$row["productName"]."</td>";
        echo "<td>".$row["productLine"]."</td>";
        echo "<td>".$row["productScale"]."</td>";
        echo "<td>".$row["productVendor"]."</td>";
        echo "<td>".$row["productDescription"]."</td>";
        echo "<td>".$row["quantityInStock"]."</td>";
        echo "<td>".$row["buyPrice"]."</td>";
        echo "<td>".$row["MSRP"]."</td>";
        echo "</tr>";
    }
} else {
    echo "0 results"; //error handling if no results found from database
}

echo"</table></div>";

$ship = "SELECT * FROM products WHERE productLine='Ships'";
$result5 = mysqli_query($conn, $ship);

if (mysqli_num_rows($result5) > 0) {
    echo "<div id=dd4><h2>Ships</h2><table><tr><th>Product Code</th><th>Product Name</th><th>Product Line</th><th>Product Scale</th><th>Product Vendor</th><th>Product Description</th><th>Quantity in Stock</th><th>Buying Price</th><th>Manufacturer Suggested Retail Price</th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result5)) {
        echo "<tr>";
        echo "<td>".$row["productCode"]."</td>";
        echo "<td>".$row["productName"]."</td>";
        echo "<td>".$row["productLine"]."</td>";
        echo "<td>".$row["productScale"]."</td>";
        echo "<td>".$row["productVendor"]."</td>";
        echo "<td>".$row["productDescription"]."</td>";
        echo "<td>".$row["quantityInStock"]."</td>";
        echo "<td>".$row["buyPrice"]."</td>";
        echo "<td>".$row["MSRP"]."</td>";
        echo "</tr>";
    }
} else {
    echo "0 results"; //error handling if no results found from database
}
    
echo"</table></div>";

$trains = "SELECT * FROM products WHERE productLine='Trains'";
$result6 = mysqli_query($conn, $trains);

if (mysqli_num_rows($result6) > 0) {
    echo "<div id=dd5><h2>Trains</h2><table><tr><th>Product Code</th><th>Product Name</th><th>Product Line</th><th>Product Scale</th><th>Product Vendor</th><th>Product Description</th><th>Quantity in Stock</th><th>Buying Price</th><th>Manufacturer Suggested Retail Price</th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result6)) {
        echo "<tr>";
        echo "<td>".$row["productCode"]."</td>";
        echo "<td>".$row["productName"]."</td>";
        echo "<td>".$row["productLine"]."</td>";
        echo "<td>".$row["productScale"]."</td>";
        echo "<td>".$row["productVendor"]."</td>";
        echo "<td>".$row["productDescription"]."</td>";
        echo "<td>".$row["quantityInStock"]."</td>";
        echo "<td>".$row["buyPrice"]."</td>";
        echo "<td>".$row["MSRP"]."</td>";
        echo "</tr>";
    }
} else {
    echo "0 results"; //error handling if no results found from database
}
    
echo"</table></div>";

$tandb = "SELECT * FROM products WHERE productLine='Trucks and Buses'";
$result7 = mysqli_query($conn, $tandb);

if (mysqli_num_rows($result7) > 0) {
    echo "<div id=dd6><h2>Trucks and Buses</h2><table><tr><th>Product Code</th><th>Product Name</th><th>Product Line</th><th>Product Scale</th><th>Product Vendor</th><th>Product Description</th><th>Quantity in Stock</th><th>Buying Price</th><th>Manufacturer Suggested Retail Price</th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result7)) {
        echo "<tr>";
        echo "<td>".$row["productCode"]."</td>";
        echo "<td>".$row["productName"]."</td>";
        echo "<td>".$row["productLine"]."</td>";
        echo "<td>".$row["productScale"]."</td>";
        echo "<td>".$row["productVendor"]."</td>";
        echo "<td>".$row["productDescription"]."</td>";
        echo "<td>".$row["quantityInStock"]."</td>";
        echo "<td>".$row["buyPrice"]."</td>";
        echo "<td>".$row["MSRP"]."</td>";
        echo "</tr>";
    }
} else {
    echo "0 results"; //error handling if no results found from database
}
    
echo"</table></div>";
    
$vintage = "SELECT * FROM products WHERE productLine='Vintage Cars'";
$result8 = mysqli_query($conn, $vintage);

if (mysqli_num_rows($result8) > 0) {
    echo "<div id=dd7><h2>Vintage Cars</h2><table><tr><th>Product Code</th><th>Product Name</th><th>Product Line</th><th>Product Scale</th><th>Product Vendor</th><th>Product Description</th><th>Quantity in Stock</th><th>Buying Price</th><th>Manufacturer Suggested Retail Price</th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result8)) {
        echo "<tr>";
        echo "<td>".$row["productCode"]."</td>";
        echo "<td>".$row["productName"]."</td>";
        echo "<td>".$row["productLine"]."</td>";
        echo "<td>".$row["productScale"]."</td>";
        echo "<td>".$row["productVendor"]."</td>";
        echo "<td>".$row["productDescription"]."</td>";
        echo "<td>".$row["quantityInStock"]."</td>";
        echo "<td>".$row["buyPrice"]."</td>";
        echo "<td>".$row["MSRP"]."</td>";
        echo "</tr>";
    }
} else {
    echo "0 results"; //error handling if no results found from database
}
    
echo"</table></div>";
mysqli_close($conn);

?>

<script>
    //only appears to work for classic cars and motorcycles.... why?
    function show(elem){
        if(elem.value=='Classic Cars'){
            document.getElementById("dd1").style.display="block";
            document.getElementById("dd2").style.display="none";
            document.getElementById("dd3").style.display="none";
            document.getElementById("dd4").style.display="none";
            document.getElementById("dd5").style.display="none";
            document.getElementById("dd6").style.display="none";
            document.getElementById("dd7").style.display="none";
        }    
            else if (elem.value=='Motorcycles'){
                document.getElementById("dd1").style.display="none";
                document.getElementById("dd2").style.display="block";
                document.getElementById("dd3").style.display="none";
                document.getElementById("dd4").style.display="none";
                document.getElementById("dd5").style.display="none";
                document.getElementById("dd6").style.display="none";
                document.getElementById("dd7").style.display="none";
            }
            else if (elem.value=='Planes'){
                document.getElementById("dd1").style.display="none";
                document.getElementById("dd2").style.display="none";
                document.getElementById("dd3").style.display="block";
                document.getElementById("dd4").style.display="none";
                document.getElementById("dd5").style.display="none";
                document.getElementById("dd6").style.display="none";
                document.getElementById("dd7").style.display="none";
            } 
            else if (elem.value=='Ships'){
                document.getElementById("dd1").style.display="none";
                document.getElementById("dd2").style.display="none";
                document.getElementById("dd3").style.display="none";
                document.getElementById("dd4").style.display="block";
                document.getElementById("dd5").style.display="none";
                document.getElementById("dd6").style.display="none";
                document.getElementById("dd7").style.display="none";
            } 
            else if (elem.value=='Trains'){
                document.getElementById("dd1").style.display="none";
                document.getElementById("dd2").style.display="none";
                document.getElementById("dd3").style.display="none";
                document.getElementById("dd4").style.display="none";
                document.getElementById("dd5").style.display="block";
                document.getElementById("dd6").style.display="none";
                document.getElementById("dd7").style.display="none";
            }
            else if (elem.value=='Trucks and Buses'){
                document.getElementById("dd1").style.display="none";
                document.getElementById("dd2").style.display="none";
                document.getElementById("dd3").style.display="none";
                document.getElementById("dd4").style.display="none";
                document.getElementById("dd5").style.display="none";
                document.getElementById("dd6").style.display="block";
                document.getElementById("dd7").style.display="none";
            } 
            else if (elem.value=='Vintage Cars'){
                document.getElementById("dd1").style.display="none";
                document.getElementById("dd2").style.display="none";
                document.getElementById("dd3").style.display="none";
                document.getElementById("dd4").style.display="none";
                document.getElementById("dd5").style.display="none";
                document.getElementById("dd6").style.display="none";
                document.getElementById("dd7").style.display="block";
            }
            else {
                document.getElementById("dd1").style.display="none";
                document.getElementById("dd2").style.display="none";
                document.getElementById("dd3").style.display="none";
                document.getElementById("dd4").style.display="none";
                document.getElementById("dd5").style.display="none";
                document.getElementById("dd6").style.display="none";
                document.getElementById("dd7").style.display="none";
            }
    }
    
</script>
    
    
<?php
//the following imports the footer file
    include "./footer.php";
?>
    

</body>
</html>