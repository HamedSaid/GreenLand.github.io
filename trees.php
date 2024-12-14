<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trees Page</title>
    
    <!-- this for bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- for the style sheet-->
    <link rel="stylesheet" href="style.css">

    <!-- this for download other fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    
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
          <a class="nav-link" data-toggle="tab" href="Calculate.html">Cart</a>
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

                <button type="submit" class="btn btnBackground">Search</button>
            </form>
        </div>

        <!-- Table -->
        <?php
        // Creating class product
        class Product {
            public $name;
            public $price;
            public $image;
            //the constructor of class product
            public function __construct($name, $price, $image) {
                $this->name = $name;
                $this->price = $price;
                $this->image = $image;
            }
        }

        // Creating array of trees
        $trees = [
          new Product("Lemon Tree", 3.5, "statics/lemon.jpg"),
          new Product("Celeste Fig Tree", 0.5, "statics/fig.jpg"),
          new Product("Omani Palm Tree", 10, "statics/palm.webp"),
          new Product("Mint", 0.6, "statics/mingt.jpg"),
          new Product("Orange Tree", 4, "statics/orange.jpg"),
          new Product("Elberta Peach Tree", 6.5, "statics/fruit.jpg")
        ];

        //function to search 
        $filteredTrees = $trees;
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $searchQuery = strtolower($_GET['search']);
            $filteredTrees = array_filter($trees, function ($tree) use ($searchQuery) {
                return strpos(strtolower($tree->name), $searchQuery) !== false;
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

        foreach ($filteredTrees as $tree) {
            echo "<tr>
                    <td><img src='{$tree->image}' class='productImg' alt='{$tree->name}'></td>
                    <td>{$tree->name}</td>
                    <td>{$tree->price}</td>
                    <td><button class='btn btnBackground'>Add to Cart</button></td>
                  </tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        ?>
    </div>

<!--This is the footer-->
<footer class="backgroundings foot">
[123 Main Street, apt 4B SAMAIL ]   [99231455]   [greenlands@gmail.com]
</footer>
</body>
</html>
