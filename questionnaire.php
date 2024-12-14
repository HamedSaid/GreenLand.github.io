<!DOCTYPE html>
<html>
<head>

    <title>Questionnaire</title>
    <!-- this for bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- for the style sheet-->
    <link rel="stylesheet" href="style.css">
   
    <?php
// Creating a class to store the questionnaire information
class Questionnaire{
    public $username;
    public $email;
    public $password;
    public $phoneNum;
    public $sugges;
    public $gender;
    public $trees;
    // Constructor for the class
    public function __construct($username, $email, $password, $phoneNumber, $suggestions, $gender, $trees) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->phoneNum = $phoneNum;
        $this->sugges = $sugges;
        $this->gender = $gender;
        $this->trees = $trees;
    }

    // Function to display the stored data in a table
    public function display() {
        echo "<h2 class='text-center mt-5'>Submitted Questionnaire Data</h2>";
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead class='table-dark'>";
        echo "<tr><th>Username</th><th>Email</th><th>Password</th><th>Phone</th><th>Gender</th><th>Suggestions</th><th>Favorite Trees</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        echo "<tr>";
        echo "<td>{$this->username}</td>";
        echo "<td>{$this->email}</td>";
        echo "<td>{$this->password}</td>";
        echo "<td>{$this->phoneNum}</td>";
        echo "<td>{$this->gender}</td>";
        echo "<td>{$this->sugges}</td>";
        echo "<td>";
        // check the checked boxed and then display it inside the table
        if (!empty($this->trees)) {
            echo implode(", ", $this->trees);
        } else {
            echo "No trees selected";
        }
        echo "</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = isset($_POST['user_name']) ? htmlspecialchars($_POST['user_name']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
    $phoneNum = isset($_POST['Phone_Number']) ? htmlspecialchars($_POST['Phone_Number']) : '';
    $sugges = isset($_POST['suggestions']) ? htmlspecialchars($_POST['suggestions']) : '';
    $gender = isset($_POST['choices']) ? htmlspecialchars($_POST['choices']) : '';
    $trees = isset($_POST['trees']) ? $_POST['trees'] : [];

    if (empty($username) || empty($email) || empty($password) || empty($phoneNumber) || empty($gender)) {
        echo "<p style='color:red; text-align:center;'>Please fill in all required fields.</p>";
    } else {
        $ques = new Questionnaire($username, $email, $password, $phoneNumber, $suggestions, $gender, $trees);
    }
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
    if (isset($ques)) {
        $ques->display();
    }
    ?>
    <!--This is the footer-->
<footer class="backgroundings foot">
[123 Main Street, apt 4B SAMAIL ]   [99231455]   [greenlands@gmail.com]
</footer>

</body>
</html>