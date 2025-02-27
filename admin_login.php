<!-- hello -->
<!-- hello -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <style>
    body{
      font-family: Arial, sans-serif;
      background-color: white;
    }

    .content{
      width: 50%;
      height: 50%;
      padding: 40px;
      margin: auto;
      margin-top: 80px;
      background-color: #f1f1f1;
      text-align: center;
    }

    .content h2{

      color: black;
    }

    .form-group {
      margin-bottom: 25px;
      color: black;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      color: black;
    }

    .form-group input[type="text"],input[type="password"]{
      width: 60%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    .action{
      color: blue;
      text-decoration: none
    }

    .action1{
      color: black;
      text-decoration: none
    }


    .button {
      background-color: #737373;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .button:hover {
      background-color: #808080;
    }

  </style>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>
<body>
  <div class="content">
    <h2>Admin Login!!</h2><br>
    <form method="POST" action="#">
      <div class="form-group">
        <label for="uname" class="form-label">User Name :</label>
        <input type="text" name="uname" id="uname" placeholder="Enter User Name" required>
      </div>
      <div class="form-group">
        <label for="pass" class="form-label">Password :</label>
        <input type="password" name="pass" id="pass" placeholder="Enter Password" maxlength="15" minlength="8" required>
      </div>
      <button type="submit" class="button" name="submit" value="submit">Login</button><br><br/>

      <a href="home.php" class="action1"><i class="fas fa-home"></i>&nbsp;Back Home</a>

    </form>
  </div>
</body>
</html>


<?php      
session_start();

$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "cake_oclock";  

$con = mysqli_connect($host, $user, $password, $db_name);  
if(mysqli_connect_errno()) {  
  die("Failed to connect with MySQL: ". mysqli_connect_error());  
} 

if (isset($_POST['submit'])) 
{
  $username = $_POST['uname'];  
  $password = $_POST['pass'];  

  //to prevent from mysqli injection  
  $username = stripcslashes($username);  
  $password = stripcslashes($password);  
  $username = mysqli_real_escape_string($con, $username);  
  $password = mysqli_real_escape_string($con, $password);  

  $sql = "SELECT * FROM admin_table WHERE adu_name = '$username' and a_pass = '$password'";  
  $result = mysqli_query($con, $sql);  
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
  $count = mysqli_num_rows($result);  
  $aid = $row['admin_id'];
  $_SESSION['aid'] = $aid;

  if($count == 1){  
    echo "<h1><center> Login successful!</center></h1>";
    header('Location:admin_dashboard.php?var=');  
  }  
  else{  
    echo '<script>alert("Login failed. Invalid username or password.")</script>'; 

  }  
}   
?>  
