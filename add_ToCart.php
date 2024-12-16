<?php 
include("Connect.php");


if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $type = $_POST["type"];
    $price = $_POST["price"];
    $src = $_POST["src"];
    

    $sql= "INSERT INTO greenland.cart (item_id, item, type, price, count , src) VALUES ($id, '$name', '$type', $price, 1 , '$src');";
    // $result = mysqli_query($conn, $sql); //4-execute query
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } 
      else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

    mysqli_close($conn); //5- close DB connection

}
else {
    echo'error Try again!';
}

?>