<?php
include 'connection.php';
$obj=new con();
$cakes = $obj->ourcake();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cake_oclock";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT cat_id,cat_name FROM cake_category");

if ($result->num_rows > 0) {
    $categories = array();
    while($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
} else {
    echo "0 results";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cake O'Clock</title>
    <link rel="shortcut icon" type="image" href="./image/logo2.1.png">
    <!-- bootstrap links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- bootstrap links -->

    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1c1d22;
            background-image: url(../cake_oclock/image/cake1.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            
        }

        header{
            margin: 0%;
            padding: 0;
        }
        .header-left{
            display: flex;
/*           margin-bottom: 5px;*/

}
.logo-design{
    width: 100px;
    height: 10px;
    border-radius: 50%;
    display: block;
    margin: auto;
    padding-top: 20px;
    position: relative;
/*            padding: 10px;*/

}
.header-right{
    display: flex;
    margin-bottom: 25px;
    align-items:center;
/*        margin:auto;*/
margin-left : 20px;

/*        padding-left: px; */
/*         padding: 0px 0 0 40px;*/

}


nav {
    padding: 0px 0;
    unicode-bidi: isolate;
    margin-top: 5px;
}

/* navbar */
#navbar{
    padding-left: 0px;
    font-weight: bold;
}
#logo{
    font-size: 23px;
    color: white;
    margin-right: 500px;
    margin-top: 3px;
}
#logo img{
    margin-bottom: 15px;

}
.navbar-nav{
    margin-left: 10px;
}
.nav-link{
    color: white;
    font-weight: bold;
    text-shadow: 1px 1px 1px black;
    margin-left: 40px;
    display: flexbox;
    justify-items: center;
    transition: 0.5s ease;
}
.nav-link:hover{
    background-color: rgb(245,168,54);
    color: white;
    border-radius: 5px;
}
.icons{
    margin-left: 30px;
    text-align: end;
}
.icons img{
    margin-left: 10px;
    transition: 0.5s ease;
    cursor: pointer;
}
.icons img:hover{
    transform: translateY(-5px);
}
/* navbar end */

.container {
    width: 30%;
    position: absolute;
    margin: 10px 50px;
    padding: 20px;
    margin-left: 40px;
}

h2{
    color: #ffff;
}

.form-group {
    margin-top: 10px;
    margin-bottom: 20px;
    position: relative;
    color: #ffff;
}
label {
    display: block;
    margin-bottom: 2px;
}
input[type="text"],
input[type="email"],
input[type="password"] {
    width: 90%;
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
}
input[type="submit"] {
    background-color :#ddd;
    color: black;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
input[type="submit"]:hover {
   background-color: rgba(245,168,54);
   color: white;
   border-radius: 5px;
}
p{
    color: #fff;
}
.dropup-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  bottom: 50px;
  z-index: 1;
}

.dropup-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropup-content a:hover {background-color: #ccc}

.footer {
    background-color :#cccc;
    text-align: center;
    color: #fff;
    position: fixed;
    bottom: -10px;
    width: 100%;
}
</style>
</head>
<body>
    <header>

    </header>

    <div class="logo-design" style="margin:auto; ">
        <img src="./image/logo2.jpg" alt="" style="border-radius: 50%; width: 130px; margin-left: -10px; "></a>
    </div>
    <div class="icons">
        <a href="admin_login.php">
            <img src="./image/user.png" alt="" width="20px">
        </a>
        <img src="./image/heart.png" alt="" width="20px">
        <a href="addcart.php">
            <img src="./image/add.png" alt="" width="24px">
        </a>
    </div>
    <nav class="navbar navbar-expand-md" id="navbar">

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span><img src="./image/menu.png" alt="" width="30px"></span>
      </button>

      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <div class="header-left">
                <li class="nav-item">

                  <a class="nav-link" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="our_cake.php">Our cake</a>
              </li>
              <!-- dropdown -->
              <?php

              $page_links = array(
                'Birthday Cake' => 'birthdaycake',
                'Anniversary Cake' => 'anniversarycake',
                'Kids Cake' => 'kidscake',
                'Photo Cake' => 'photocake',
                'Cup Cake' => 'cupcake'
            );

            ?>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                 Cake Category
             </a>
             <div class="dropdown-menu">
                <?php
                foreach ($categories as $category) {
                    echo '<a href="' . $page_links[$category['cat_name']] . '.php?cat_id=' . $category['cat_id'] . '" class="dropdown-item">' . $category['cat_name'] . '</a>';
                }   ?>
            </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutus.php">About Us</a>
      </li>
  </div>
</div>
<div class="header-right">
  <li class="nav-item">
      <a class="nav-link" href="signup.php">Sign Up</a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="login_user.php">Sign In</a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="trackorder.php">Track Order</a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="contactus.php">Contact Us</a>
  </li>
</div>
</ul>
</div>
</nav>
<div class="container">
    <h2>Registration Form</h2>
    <form method="post" action="#" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="mobile-number">Mobile Number</label>
            <input type="text" id="mobile-number" name="mobile-number" required>
        </div>
        <div class="form-group">
            <label for="email-address">Email Address</label>
            <input type="email" id="email-address" name="email-address" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" maxlength="15" minlength="8" required>
        </div>
        <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm-password" required>
        </div>
        <div class="form-group">
            <label for="addresslast-name">Address</label>
            <input type="text" id="addresslast" name="address" required>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" id="city" name="city" required>
        </div>
        <input type="submit" name="submit" value="Submit">
    </form>
    <p>Already have an account? <a href="login_user.php">Login</a></p>
</div>
<!-- 
<footer class="footer">
    <p>&copy; 2023 Cake Bakery</p>
</footer> -->
</body>
</html>

<?php

if (isset($_POST['submit'])) 
{
    $Name = $_POST["name"];
    $mno = $_POST["mobile-number"];
    $email = $_POST["email-address"];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
    } else {
        // Prepare statement to prevent SQL injection
        $query = "SELECT r_email FROM reguser WHERE r_email = ?";
        $stmt = $obj->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0)
        {
            // echo "Email is already in use.";
            echo '<script>alert("Email is already in use.")</script>';
        } 
        else {
            $pass = $_POST["password"];
            $conpass = $_POST["confirm-password"];

            // Validate passwords
            if ($pass !== $conpass) {
                echo '<script>alert("Passwords do not match!")</script>';
            }
            else 
            {
                $Adress = $_POST["address"];
                $City = $_POST["city"];

                $input = array($Name, $mno, $email, $pass, $Adress, $City);
                $out = $obj->studadd($input);

                if ($out) {
                   echo '<script>alert("Inserted successfully")</script>';
                    // echo "Inserted successfully";
                    //header('Location:login_user.php');

               } else {
                echo '<script>alert("Insert Failed")</script>';
            }
        }
    }

    $stmt->close();
}
}
?>
