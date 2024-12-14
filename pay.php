<!DOCTYPE html>
<html>
<head>

    <title>Pay</title>
    <!-- this for bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- for the style sheet-->
    <link rel="stylesheet" href="style.css">
   
    <?php
// Creating a class to store the payment information
class Pay {
    public $email;
    public $phoneNum;
    public $address1;
    public $address2;
    public $city;
    public $state;
    public $zipCode;
    public $total;

    // Constructor for the class
    public function __construct($email, $phone, $address1, $address2, $city, $state, $zipCode, $total) {
        $this->email = htmlspecialchars($email);
        $this->phoneNum = htmlspecialchars($phone);
        $this->address1 = htmlspecialchars($address1);
        $this->address2 = htmlspecialchars($address2);
        $this->city = htmlspecialchars($city);
        $this->state = htmlspecialchars($state);
        $this->zipCode = htmlspecialchars($zipCode);
        $this->total = htmlspecialchars($total);
    }

    // Function to display the stored data in a table
    public function display() {
        echo "<h2 class='text-center backgroundings' id='title'>Payment Information</h2>";
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead class='table-dark'>";
        echo "<tr><th>Email</th><th>Phone</th><th>Address</th><th>City</th><th>State</th><th>Zip</th><th>Total</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        echo "<tr>";
        echo "<td>{$this->email}</td>";
        echo "<td>{$this->phoneNum}</td>";
        echo "<td>{$this->address1} {$this->address2}</td>";
        echo "<td>{$this->city}</td>";
        echo "<td>{$this->state}</td>";
        echo "<td>{$this->zipCode}</td>";
        echo "<td>{$this->total} R.O</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
    }
}

// Check if the form is submitted and $_POST has data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Safely retrieve the POST data with isset() checks
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $address1 = isset($_POST['address']) ? $_POST['address'] : '';
    $address2 = isset($_POST['address2']) ? $_POST['address2'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $state = isset($_POST['state']) ? $_POST['state'] : '';
    $zip = isset($_POST['zip']) ? $_POST['zip'] : '';
    $total = isset($_POST['totalPrice']) ? $_POST['totalPrice'] : '';

    // Ensure all fields are available, or show a message
    if (empty($email) || empty($phone) || empty($address1) || empty($city) || empty($state) || empty($total)) {
        echo "<p style='color:red;'>Please fill in all required fields.</p>";
    } else {
        // Create an instance of the Pay class and display the information
        $pay = new Pay($email, $phone, $address1, $address2, $city, $state, $zip, $total);

    }
} else {
    echo "<p style='color:red;'>Form not submitted properly.</p>";
}
?>

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

    <?php
    //Check if the variable is declared or not if it is then display it
    if (isset($pay)) {
        $pay->display(); 
    }
    ?>
    <!--This is the footer-->
<footer class="backgroundings foot">
[123 Main Street, apt 4B SAMAIL ]   [99231455]   [greenlands@gmail.com]
</footer>

</body>
</html>