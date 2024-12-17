<?php 
        include("Connect.php");

        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $id = $_POST["id"];
            $count = $_POST["quantity"];
            $count = $count + 1;
            
            
            $sql= "UPDATE greenland.cart set count=$count WHERE id=$id;";
            // $result = mysqli_query($conn, $sql); //4-execute query
            
            if ($conn->query($sql) === TRUE) {
                echo "
                <script>
                    alert('update the cart done!');
                </script>";
            } 
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            mysqli_close($conn); //5- close DB connection

            // refresh the page
            header( "Location: " . $_SERVER["PHP_SELF"]);
            exit();
        }

        else if ($_SERVER["REQUEST_METHOD"] == 'GET' && isset($_GET["check"]) == "decrement") {
            $id = $_GET["id"];
            $count = $_GET["quantity"];
            
            // check if the count is equal to one --> not possiable
            if ($count == 1) {
                mysqli_close($conn); //5- close DB connection
                header( "Location: " . $_SERVER["PHP_SELF"]);
                exit();
            }

            $count = $count - 1;
            
            

            $sql= "UPDATE greenland.cart set count=$count WHERE id=$id;";
            // $result = mysqli_query($conn, $sql); //4-execute query
            
            if ($conn->query($sql) === TRUE) {
                echo "<script> alert('update the cart done!'); </script>";
            } 
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            mysqli_close($conn); //5- close DB connection
            
            // refresh the page
            header( "Location: " . $_SERVER["PHP_SELF"]);
            exit();
        }

        
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Calculate $ Cart</title>
    
    <!-- this for bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- for the style sheet-->
    <link rel="stylesheet" href="style.css">
    
    <style>
        .cart_element {
           background-color: white; 
        }
        .cart_element:hover {
            background-color: rgba(0, 128, 0, 0.2);
        }

        .parting{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .container_buttons{
            width: 320px;
            height: 120px;
             display: flex;
             align-items: center;
             justify-content: center;
             gap: 7px;
             border-radius: 5px;
        }

        .parting button{
            padding: 4px 18px ;
            font-size: 20px;
            background: #2a4a46;
            color: #fff;
            border: 1px solid #2a4a46;
            border-radius: 5px;
            cursor: pointer;


        }

        .parting button:hover{
            background: #212121;
        }

        #results_buttons  {
            width: 120px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'poppins', sans-serif;
            font-weight: 700;
            font-size: 25px;

        }

        #results_buttons_1  {
            width: 120px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'poppins', sans-serif;
            font-weight: 700;
            font-size: 25px;

        }


        #results_buttons_2  {
            width: 120px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'poppins', sans-serif;
            font-weight: 700;
            font-size: 25px;

        }
    </style>

    
</head>
<body>
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


    <div class="container-fluid text-center p-4" style="background-color: rgba(42,74,70,1);">
        <h1 style="color: white;">Your Cart</h1>
    </div>


    <div class="container-fluid  p-2 " style="text-align: center;">
        <h3 style="color: rgba(42,74,70,1);">Items</h3>
    </div>

    <?php 
    // connet to the database
    include("Connect.php");
    
    // create items
    $Price_Total = 0;
    $sql= "select * from greenland.cart;";
    $result = mysqli_query($conn, $sql); //4-execute query
    mysqli_close($conn); //5- close DB connection


    //Check if there is a result (1 or more rows)
    if (mysqli_num_rows($result) > 0) {
        
        // output data of each row using loop        
        $cartData = array();

        while($row = mysqli_fetch_assoc($result)) {        
            $Price_Total += $row['count'] * $row['price'];
            echo "
                <div class='row p-3 mt-1 cart_element'>
                <img class='col-4' src='{$row['src']}' style='width: 20%; object-fit: cover; border-radius: 30px;'>
                <div class='col' >
                    <h3 style='color: rgba(42,74,70,1);'> {$row['item']} </h3>
                    <h6>price:{$row['price']} R.O</h6>  
                </div>
                <div class='col text-center mt-5'>
                    <span style='font-size: large;'>
                        <div class='parting'>
                            <div class='container_buttons'>
                               <form method='GET' action= '" .htmlspecialchars($_SERVER['PHP_SELF']) ."' class='d-flex justify-content-center align-items-center'>
                                    <input hidden type='text' name='id' value={$row['id']}>
                                    <input hidden type='number' name='quantity' value={$row['count']}>
                                    <input hidden type='text' name='check' value='decrement'>
                                    <button  type='submit'>-</button>
                                </form>    
                            
                                <span id='results_buttons_1'>{$row['count']}</span>

                                <form method='POST' action='" .htmlspecialchars($_SERVER['PHP_SELF']) ."' class='d-flex justify-content-center align-items-center'>
                                    <input hidden type='text' name='id' value={$row['id']}>
                                    <input hidden type='number' name='quantity' value={$row['count']}>
                                    <button  type='submit'>+</button>
                                </form>
                            </div>
                        </div>
                    </span>
                </div>
                </div>
            ";
        }
    } 
    else
    {
        echo "No data were found";
    }
    ?>
    

    <!-- total price -->
    <div class="row mt-3 p-3" style=" background-color: rgba(42,74,70,1); color: rgba(196,210,202,1);">
        <h3 class="col-8">Total price: <span id="total"> <?php echo "$Price_Total"; ?> </span> R.O</h3>
        
        <form action="pay.php" method="get" class="col-4">
            <input hidden name="tot" value='<?php echo "$Price_Total"; ?>'>
            <button type="submit" class="btn btn-outline-light" style="width: 80%;">
                pay
            </button>
        </form>
    </div>
    
    <!-- this is the footer-->
    <footer class="backgroundings foot">
        [123 Main Street, apt 4B SAMAIL ]   [99231455]   [greenlands@gmail.com]
    </footer>
    

    <script src="cart_buttons.js"></script>

</body>
</html>



