<?php 

include("Connect.php");

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $id = $_POST["id"];
    $count = $_POST["quantity"];
    $count = $count + 1;
    

    $sql= "UPDATE greenland.cart set count=$count WHERE id=$id;";
    // $result = mysqli_query($conn, $sql); //4-execute query
    
    if ($conn->query($sql) === TRUE) {
        echo "update quantity done";
      } 
      else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

    mysqli_close($conn); //5- close DB connection

    exit();
}
else {
    $id = $_GET["id"];
    $count = $_GET["quantity"];
    $count = $count - 1;
    
    $sql= "UPDATE greenland.cart set count=$count WHERE id=$id;";
    // $result = mysqli_query($conn, $sql); //4-execute query
    
    if ($conn->query($sql) === TRUE) {
        echo "update quantity done";
      } 
      else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

    mysqli_close($conn); //5- close DB connection

    exit();
}

?>