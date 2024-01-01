<?php
//include connection file
include('connection.php');
include('client.php');

//create in instance of class Connection
$connection = new Connection();


//call the selectDatabase method
$connection->selectDatabase('travel');
$emailValue = "";
$lnameValue = "";
$fnameValue = "";
$passwordValue = "";
$errorMesage = "";
$successMesage = "";

if (isset($_POST["submit"])) {

    $emailValue = $_POST["email"];
    $lnameValue = $_POST["lastName"];
    $fnameValue = $_POST["firstName"];
    $passwordValue = $_POST["password"];
    $idCityValue = $_POST["cities"];

    if (empty($emailValue) || empty($fnameValue) || empty($lnameValue) || empty($passwordValue)) {

        $errorMesage = "all fileds must be filed out!";
    } else if (strlen($passwordValue) < 8) {
        $errorMesage = "password must contains at least 8 char";
    } else if (preg_match("/[A-Z]+/", $passwordValue) == 0) {
        $errorMesage = "password must contains  at least one capital letter!";
    } else {


        //include the client file
        
        //create new instance of client class with the values of the inputs
        $client = new Client($fnameValue, $lnameValue, $emailValue, $passwordValue, $idCityValue);

        //call the insertClient method
        $client->insertClient('Clients', $connection->conn);

        //give the $successMesage the value of the static $successMsg of the class
        $successMesage = Client::$successMsg;

        //give the $errorMesage the value of the static $errorMsg of the class
        $errorMesage = Client::$errorMsg;

        $emailValue = "";
        $lnameValue = "";
        $fnameValue = "";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login_email"]) && isset($_POST["login_password"])) {
  // Your login form processing code
  $email = $_POST["login_email"];
  $password = $_POST["login_password"];

  // Call the static method to check login credentials
  $loggedInUser = Client::checkLoginCredentials($email, $password, 'Clients', $connection->conn);

  if ($loggedInUser) {
      // Redirect after successful login
      header("Location: site.php");
      exit(); // Make sure to exit after header redirect
  } else {
      // Display login error message
      echo "Invalid login credentials.";
  }
}


?>
<style>
body{
    background-color: #A8A8A8;
    font-family: 'Roboto', sans-serif;
    background-image: url('pexels-asad-photo-maldives-1266831.jpg'); 
    background-size: cover; 
    font-family: 'Roboto', sans-serif;
}
  
  
  .container{
    /*border:1px solid white;*/
    width: 600px;
    height: 400px;
    position: absolute;
    top:50%;
    left:50%;
    transform: translate(-50%, -50%);
    display: inline-flex; 
  }
  .backbox{  
    background-color: 		#87cefa;
    width: 100%;
    height: 80%;
    position: absolute;
    transform: translate(0,-50%);
    top:50%;
    display: inline-flex;
  }
  
  .frontbox{
    background-color: white;
    border-radius: 20px;
    height: 113%;
    width: 50%;
    z-index: 10;
    position: absolute;
    right:0;
    margin-right: 3%;
    margin-left: 3%;
    transition: right .8s ease-in-out;
    
  }
  
  .moving{
    right:45%;
  }
  .login{
    margin-top: 20%;
  }
  .loginMsg, .signupMsg{
    width: 50%;
    height: 100%;
    font-size: 15px;
    box-sizing: border-box;
  }
  
  .loginMsg .title,
  .signupMsg .title{
    font-weight: 300;
    font-size: 23px;
  }
  
  .loginMsg p,
  .signupMsg p {
    font-weight: 100;
  }
  
  .textcontent{
    color:white;
    margin-top:65px;
    margin-left: 12%;
  }
  
  .loginMsg button,
  .signupMsg button {
    background-color: #87cefa;
    border: 2px solid white;
    border-radius: 10px;
    color:white;
    font-size: 12px;
    box-sizing: content-box;
    font-weight: 300;
    padding:10px;
    margin-top: 20px;
  }
  
  /* front box content*/
  .login, .signup{
    padding: 20px;
    text-align: center;
    
  }
  
  .login h2,
  .signup h2 {
    color:#87cefa;
    font-size:22px;
  }
  
  .inputbox{
    margin-top:30px; 
 
  }
  .login input, 
  .signup input {
    display: block;
    width: 100%;
    height: 40px;
    background-color: #f2f2f2;
    border: none;
    margin-bottom:20px;
    font-size: 12px;
    
  }
  
  .login button,
  .signup button{
    background-color: #87cefa;
    border: none;
    color:white;
    font-size: 12px;
    font-weight: 300;
    box-sizing: content-box;
    padding:10px;
    border-radius: 10px;
    width: 60px;
    position: absolute;
    right:30px;
    bottom: 30px;
    cursor: pointer;
  }
  
  /* Fade In & Out*/
  .login p {
    cursor: pointer;
    color:#404040;
    font-size:15px;
  }
  
  .loginMsg, .signupMsg{
    /*opacity: 1;*/
    transition: opacity .8s ease-in-out;
  }
  
  .visibility{
    opacity: 0;
  }
  
  .hide{
    display: none;
  }
  .cities-input {
    display: flex;
    margin-bottom: 20px;
    align-items: center;
  }

  .cities-input label {
    margin-right: 10px;
    color: white;
  }

  .cities-input select {
    flex: 1;
    height: 40px;
    background-color: #f2f2f2;
    border: none;
    font-size: 12px;
  }

  
  </style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="jj.js"></script>
    <title>Document</title>
</head>
<body>
    
    <?php

if(!empty($errorMesage)){
echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
<strong>$errorMesage</strong>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
</button>
</div>";
}
   ?>
        <div class="container">
          <div class="backbox">
            <div class="loginMsg">
              <div class="textcontent">
                <p class="title">Don't have an account?</p>
                <p>Sign up to save all your graph.</p>
                <button id="switch1">Sign Up</button>
              </div>
            </div>
            <div class="signupMsg visibility">
              <div class="textcontent">
                <p class="title">Have an account?</p>
                <p>Log in to see all your collection.</p>
                <button id="switch2">LOG IN</button>
              </div>
            </div>
          </div>
          <!-- backbox -->
      
 <div class="frontbox">
      <div class="login">
        <h2>LOG IN</h2>
        <form method="post">
          <div class="inputbox">
            <input type="text" name="login_email" placeholder="  EMAIL">
            <input type="password" name="login_password" placeholder="  PASSWORD">
          </div>
          <p>FORGET PASSWORD?</p>
          <button>LOG IN</button>
        </form>
      </div>

      <div class="signup hide">
        <h2>SIGN UP</h2>
        <form method="post">
          <div class="inputbox">
            <input value="<?php echo $fnameValue ?>" type="text" name="firstName" placeholder="  First Name">
            <input value="<?php echo $lnameValue ?>" type="text" name="lastName" placeholder=" Last Name">
            <input value=" <?php echo $emailValue ?>" type="email" name="email" placeholder="  EMAIL">
          </div>
          <div class="cities-input">
            <label  for="cities">Cities:</label>
            <div>
              <select name='cities'>
                <option selected>Select your city</option>
                <?php
                include('city.php');
                $cities = City::selectAllcities('Cities', $connection->conn);
                foreach ($cities as $city) {
                  echo "<option value='$city[id]' >$city[name]</option>";
                }
                ?>
              </select>
            </div>
          </div>
          <input type="password" name="password" placeholder="  PASSWORD">
          <?php
          if (!empty($successMesage)) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$successMesage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
          }
          ?>
          <button name="submit">SIGN UP</button>
        </form>
      </div>

    </div>
    <!-- frontbox -->
</div>

</body>

</html>