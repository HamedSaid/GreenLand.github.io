<!DOCTYPE html>
<html lang="en">
<head>
    <title>Calculate & Pay</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="cart_buttons.js"></script>

    <style>
        .calculator-container {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }
        .calculator-container h1 {
            font-size: 1.5em;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            padding: 10px 20px;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background: #0056b3;
        }
        .result {
            margin-top: 20px;
            font-size: 1.2em;
            color: #333;
        }
        .middle_form{
            margin-top: 100px;
            justify-items: center;
        }
    </style>
</head>
<body>

    <?php
    $total = $_GET["tot"];
    ?>

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


    <!-- Bill Prices Section -->
    <div class="middle_form">
        <div class="calculator-container">
            <h1>Bill Calculator</h1>

            <div class="form-group">
                <label for="item-price">Total Price (RO):</label>
                <h6><span><?php echo "$total" ?></span> R.O</h6>
            </div>
        </div>
    </div>

    <!-- Payment Form -->
    <form class="row g-3 m-5" action="done.php" method="POST">
      <div class="col-md-6">
          <label>Email</label>
          <input type="email" name="email" class="form-control" required>
      </div>
      
      <div class="col-md-6">
          <label>Phone Number</label>
          <input type="number" name="phone" class="form-control" required>
      </div>
      
      <div class="col-12">
          <label>Address</label>
          <input type="text" name="address" class="form-control" placeholder="Smail 3293" required>
      </div>
      
      <div class="col-12">
          <label>Address 2</label>
          <input type="text" name="address2" class="form-control" placeholder="Apartment, studio, or floor">
      </div>
      
      <div class="col-md-6">
          <label>City</label>
          <input type="text" name="city" class="form-control" required>
      </div>
      
      <div class="col-md-4">
          <label>State</label>
          <select id="inputState" name="state" class="form-select" required>
              <option selected disabled>State</option>
              <option>Smail</option>
              <option>Nizwe</option>
              <option>Muscat</option>
              <option>Suhar</option>
              <option>Salalah</option>
          </select>
      </div>
      
      <div class="col-md-2">
          <label>Zip</label>
          <input type="text" name="zip" class="form-control">
      </div>

      <input type="hidden" name="totalPrice" value='<?php echo "$total"; ?>'>

      
      <div class="col-12">
          <div class="form-check">
              <input class="form-check-input" type="checkbox" required>
              <label>Agree to terms and conditions</label>
          </div>
      </div>
      
      <div class="col-12">
          <button type="submit" class="btn btn-success">Pay now</button>
      </div>
  </form>
  

    <!-- Footer -->
    <footer class="backgroundings foot">
        [123 Main Street, apt 4B SAMAIL] [99231455] [greenlands@gmail.com]
    </footer>

    <!-- JavaScript to get total price from localStorage and set it in the hidden field -->
    <script>
      document.addEventListener("DOMContentLoaded", () => {
          const totalPrice = localStorage.getItem('total_price');
  
          // Update the total price in the hidden field
          document.getElementById("totalPriceInput").value = totalPrice;
  
          if (totalPrice) {
              // Update an element to show the total price in the calculator
              document.getElementById("display_total_price").innerHTML = totalPrice;
          } else {
              // Handle cases where the total price is not set
              document.getElementById("display_total_price").innerHTML = "0.00";
          }
      });
  </script>
  
</body>
</html>
