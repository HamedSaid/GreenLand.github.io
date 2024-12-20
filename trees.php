<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include("Connect.php");

// Define the type variable to match the database
$type = "tree";

// SQL query to fetch data
$sql = "SELECT * FROM if0_37953349_greenland.trees WHERE Type='$type'";
$result = mysqli_query($conn, $sql);

// Check for errors in the query
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Fetch data
$treesData = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $treesData[] = [
            'id' => $row["ID"],
            'treeName' => $row["Item"],
            'price' => $row["Price (OMR)"],
            'src' => $row["Src"]
        ];
    }
}

// Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trees Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <style>

    /* Style for table images */ 

  .productImg {
    width: 250px;
    height: auto;
    border-radius: 8px;
    transition: transform 0.3s;
}
/* table img styling with hover*/
  .productImg:hover {
    transform: scale(1.1);
}

/* Table styling with hover*/
  .tableHover tbody tr:hover {
    background-color: rgba(0, 128, 0, 0.2);
}



</style>
</head>
<body>
    <!-- this is the header-->
     <!-- this is the header-->
     <nav class="navbar navbar-expand-sm  navbar-dark backgroundings">
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="index.html"><img src="statics/logo.jpg" width="30px" class="rounded-circle"></a>
        </li>
        <li class="nav-item">
          <a href="#" class= "dropdown-toggle nav-link" data-bs-toggle="dropdown">
            Shop 
          </a> 
          <ul class="dropdown-menu m-3 mt-0">
            <li><a class="dropdown-item" href="shop.html">Main Shop</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="flowers.php">Flowers</a></li>
            <li><a class="dropdown-item" href="seeds.php">Seeds</a></li>
            <li><a class="dropdown-item" href="trees.php">Trees</a></li>
          </ul>  
        </li>
  
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="calculate.php">Cart</a>
        </li>
          
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="contactUs.html">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"data-toggle="tab" href="AboutUs.html">About Us</a>
        </li>
  
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="Questionnaire_page.html">Questionnaire</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="funpage.html">Fun</a>
        </li>
  
      </ul>
    </nav>
    <h1 class="text-center backgroundings" id="title">Trees</h1>
    <div class="container mt-5">
        <!-- Search Form -->
        <div class="search">
            <h3 style="color: rgba(11, 100, 90, 1);">Search for specific tree:</h3>
            <form method="GET" class="d-flex justify-content-center align-items-center">
            <input type="text" name="search" placeholder="Enter tree name" class="form-control searchInput" style="width: 400px; padding: 10px; font-size: 16px; border-radius: 8px; border: 1px solid #ccc; margin: 0 auto;">
                <button type="submit" class="btn btnBackground m-2">Search</button>
            </form>
        </div>
        <?php
        // Filter the data based on search query
        $filteredTrees = $treesData;
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $searchQuery = strtolower($_GET['search']);
            $filteredTrees = array_filter($treesData, function ($tree) use ($searchQuery) {
                return strpos(strtolower($tree['treeName']), $searchQuery) !== false;
            });
        }

        echo "<div class='mt-4'>";
        echo "<table class='table table-hover table-bordered'>";
        echo "<thead class='table-dark'>";
        echo "<tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Price (OMR)</th>
                <th>Action</th>
              </tr>";
        echo "</thead>";
        echo "<tbody>";

        if (count($filteredTrees) > 0) {
            foreach ($filteredTrees as $tree) {
                echo "<tr>
                        <td><img src='{$tree['src']}' class='productImg'></td>
                        <td>{$tree['treeName']}</td>
                        <td>{$tree['price']}</td>
                        <td>
                            <form method='POST' action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "'>
                                <input type='hidden' name='id' value='{$tree['id']}'>
                                <input type='hidden' name='name' value='{$tree['treeName']}'>
                                <input type='hidden' name='type' value='tree'>
                                <input type='hidden' name='price' value='{$tree['price']}'>
                                <input type='hidden' name='src' value='{$tree['src']}'>
                                <button type='submit' class='btn btnBackground'>Add to Cart</button>
                            </form>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4' class='text-center'>No trees found.</td></tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        ?>
    </div>
  <script>
    function addToCartDone() {
      alert("Item Added Successfully");
    }
  </script>

  <?php 
  include("Connect.php");


  if ($_SERVER["REQUEST_METHOD"] == 'POST') {
      $id = $_POST["id"];
      $name = $_POST["name"];
      $type = $_POST["type"];
      $price = $_POST["price"];
      $src = $_POST["src"];


      // check if the item is order in the cart 
      $sql= "select * FROM if0_37953349_greenland.cart WHERE item_id = $id;";
      $result = mysqli_query($conn, $sql); //4-execute query

      if (mysqli_num_rows($result) > 0) {
          echo "
          <script>
            alert('ITEM is ALREADY EXISTS IN The CART!');
          </script>
          ";
          exit();
      }

      $sql= "INSERT INTO if0_37953349_greenland.cart (item_id, item, type, price, count , src) VALUES ($id, '$name', '$type', $price, 1 , '$src');";
      // $result = mysqli_query($conn, $sql); //4-execute query

      if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
        } 
        else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }

      mysqli_close($conn); //5- close DB connection
      echo"<script>addToCartDone();</script>";
  }
?>
<!--This is the footer-->
<footer class="backgroundings foot">
[123 Main Street, apt 4B SAMAIL ]   [99231455]   [greenlands@gmail.com]
</footer>
</body>
</html>
