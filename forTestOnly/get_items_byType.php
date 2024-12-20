<?php
// for connection with sql database
include("Connect.php");

$sql= "select * from if0_37953349_greenland.trees where Type='$type';";
$result = mysqli_query($conn, $sql); //4-execute query
mysqli_close($conn); //5- close DB connection


//Check if there is a result (1 or more rows)
if (mysqli_num_rows($result) > 0) {
    
    // output data of each row using loop
    $i = 0;
    
    $treesData = array();
    while($row = mysqli_fetch_assoc($result)) {
    $treesData[$i] = [
        'id' => $row["ID"],
        'treeName' => $row["Item"],
        'price' => $row["Price (OMR)"],
        'src' => $row["Src"]
    ];  
    $i = $i + 1;
    }
} 
else
{
    echo "No data were found";
}

?>