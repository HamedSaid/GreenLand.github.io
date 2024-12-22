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
    <h1 class="text-center">Trees</h1>
    <div class="container mt-5">
        <div class="search">
            <h3>Search for specific tree:</h3>
            <form method="GET" class="d-flex">
                <input type="text" name="search" placeholder="Enter tree name" class="form-control" style="margin-right: 10px;">
                <button type="submit" class="btn btn-success">Search</button>
            </form>
        </div>
         <!--connect sql-->
         <?php  
          $type = "tree";
          include("get_items_byType.php");
        ?>

        <!-- Table -->
        <?php
        // Creating class product
        class Product {
            public $id;
            public $name;
            public $price;
            public $image;
            //the constructor of class product
            public function __construct($id, $name, $price, $image) {
                $this->id = $id;                
                $this->name = $name;
                $this->price = $price;
                $this->image = $image;
            }
        }

        // Creating array of seeds
        // get data from sql
        $trees = array();
        foreach($treesData as $data) {
          array_push($trees, new Product($data['id'] ,$data['treeName'], $data['price'], $data['src']));
        }


        //function to search 
        $filteredtrees = $trees;
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $searchQuery = strtolower($_GET['search']);
            $filteredtrees = array_filter($trees, callback: function ($seed) use ($searchQuery) {
                return strpos(strtolower($seed->name), $searchQuery) !== false;
            });
        }

        //Displaying the table
        echo "<div class='container mt-4'>";
        echo "<table class='table table-hover table-bordered tableHover'>";
        echo "<thead class='table-dark'>";
        echo "<tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Price (OMR)</th>
                <th>Action</th>
              </tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($filteredtrees as $seed) {
          $Treetype = 'tree';  
          echo "<tr>
                    <td><img src='{$seed->image}' class='productImg' alt='{$seed->name}'></td>
                    <td>{$seed->name}</td>
                    <td>{$seed->price}</td>
                    <td>
                      <form method='POST' action='" .htmlspecialchars($_SERVER['PHP_SELF']) ."' class='d-flex justify-content-center align-items-center'>
                        <input hidden type='text' name='id' value='{$seed->id}'>
                        <input hidden type='text' name='name' value='{$seed->name}'>
                        <input hidden type='text' name='type' value={$Treetype}>
                        <input hidden type='text' name='price' value='{$seed->price}'>
                        <input hidden type='text' name='src' value='{$seed->image}'>
                        <button type='submit' class='btn btnBackground'>Add to Cart</button>
                      </form>                    
                    </td>
                  </tr>";
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
      $sql= "select * FROM greenland.cart WHERE item_id = $id;";
      $result = mysqli_query($conn, $sql); //4-execute query
      

      if (mysqli_num_rows($result) > 0) {
          echo "
          <script>
            alert('ITEM is ALREADY EXISTS IN The CART!');
          </script>
          ";
          exit();
      }


      $sql= "INSERT INTO greenland.cart (item_id, item, type, price, count , src) VALUES ($id, '$name', '$type', $price, 1 , '$src');";
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
