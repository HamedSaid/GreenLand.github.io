<!DOCTYPE html>
<html>
<head>

    <title>Contact Us</title>
    <!-- this for bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- for the style sheet-->
    <link rel="stylesheet" href="style.css">
   
   <?php
// Creating a class to store the contact us information 
class Contact{
    public $name;
    public $email;
    public $phoneNum;
    public $message;

    // A constructor for the  class Contact
    public function __construct($name, $email, $phoneNum, $message) {
        $this->name = htmlspecialchars($name);
        $this->email = htmlspecialchars($email);
        $this->phoneNum = htmlspecialchars($phoneNum);
        $this->message = htmlspecialchars($message);
    }

    // a function to display the stored data in a table
    public function display() {
        echo "<h2 class='text-center backgroundings' id='title'>Submitted Contact Information</h2>";
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead class='table-dark'>";
        echo "<tr><th>Name</th><th>Email</th><th>Phone Number</th><th>Message</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        echo "<tr>";
        echo "<td>{$this->name}</td>";
        echo "<td>{$this->email}</td>";
        echo "<td>{$this->phoneNum}</td>";
        echo "<td>{$this->message}</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
    }
}

// Check if there is information recived from the user and if there is display it
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $contact = new Contact($_POST['name'], $_POST['Email'], $_POST['number'], $_POST['Message']);
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

    <?php
    //Check if the variable is declared or not if it is then display it
    if (isset($contact)) {
        $contact->display(); 
    }
    ?>
    <!--This is the footer-->
<footer class="backgroundings foot">
[123 Main Street, apt 4B SAMAIL ]   [99231455]   [greenlands@gmail.com]
</footer>
</body>
</html>