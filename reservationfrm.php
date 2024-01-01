<style>
    .section {
	position: relative;
	height: 100vh;
}

.section .section-center {
	position: absolute;
	top: 50%;
	left: 0;
	right: 0;
	-webkit-transform: translateY(-50%);
	transform: translateY(-50%);
}

#booking {
	font-family: 'Montserrat', sans-serif;
	background-image: url('background.jpg');
	background-size: cover;
	background-position: center;
}

#booking::before {
	content: '';
	position: absolute;
	left: 0;
	right: 0;
	bottom: 0;
	top: 0;
	background: rgba(47, 103, 177, 0.6);
}

.booking-form {
	background-color: #fff;
	padding: 50px 20px;
	-webkit-box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
	box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
	border-radius: 4px;
}

.booking-form .form-group {
	position: relative;
	margin-bottom: 30px;
}

.booking-form .form-control {
	background-color: #ebecee;
	border-radius: 4px;
	border: none;
	height: 40px;
	-webkit-box-shadow: none;
	box-shadow: none;
	color: #3e485c;
	font-size: 14px;
}

.booking-form .form-control::-webkit-input-placeholder {
	color: rgba(62, 72, 92, 0.3);
}

.booking-form .form-control:-ms-input-placeholder {
	color: rgba(62, 72, 92, 0.3);
}

.booking-form .form-control::placeholder {
	color: rgba(62, 72, 92, 0.3);
}

.booking-form input[type="date"].form-control:invalid {
	color: rgba(62, 72, 92, 0.3);
}

.booking-form select.form-control {
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
}

.booking-form select.form-control+.select-arrow {
	position: absolute;
	right: 0px;
	bottom: 4px;
	width: 32px;
	line-height: 32px;
	height: 32px;
	text-align: center;
	pointer-events: none;
	color: rgba(62, 72, 92, 0.3);
	font-size: 14px;
}

.booking-form select.form-control+.select-arrow:after {
	content: '\279C';
	display: block;
	-webkit-transform: rotate(90deg);
	transform: rotate(90deg);
}

.booking-form .form-label {
	display: inline-block;
	color: #3e485c;
	font-weight: 700;
	margin-bottom: 6px;
	margin-left: 7px;
}

.booking-form .submit-btn {
	display: inline-block;
	color: #fff;
	background-color: #1e62d8;
	font-weight: 700;
	padding: 14px 30px;
	border-radius: 4px;
	border: none;
	-webkit-transition: 0.2s all;
	transition: 0.2s all;
}

.booking-form .submit-btn:hover,
.booking-form .submit-btn:focus {
	opacity: 0.9;
}

.booking-cta {
	margin-top: 80px;
	margin-bottom: 30px;
}

.booking-cta h1 {
	font-size: 52px;
	text-transform: uppercase;
	color: #fff;
	font-weight: 700;
}

.booking-cta p {
	font-size: 16px;
	color: rgba(255, 255, 255, 0.8);
}
.custom-alert {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1000;
        width: 300px;
        padding: 15px;
        border-radius: 4px;
        text-align: center;
        font-size: 16px;
        font-weight: bold;
    }

    .alert-success {
        background-color: #1e62d8;
        color: #1e62d8;
    }

    .alert-danger {
        background-color: #dc3545;
        color: #fff;
    }
</style>
<?php
include 'Connection.php';
include 'reservation.php';


$connection = new Connection();
$connection->selectDatabase('travel');
$location = "";
$checkIn = "";
$checkOut = ""; 
$guests = "";
$email = ""; 
$phone = ""; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = $_POST["location"];
    $checkIn = $_POST["check_in"];
    $checkOut = $_POST["check_out"];
    $guests = $_POST["guests"];
    $email = $_POST["email"]; 
    $phone = $_POST["phone"]; 

    $reservation = new Reservation($location, $checkIn, $checkOut, $guests, $email, $phone);

    
if ($reservation->saveReservation($connection->conn)) {
    echo "<div class='custom-alert alert-success' role='alert'>
            Reservation added successfully.
        </div>";
} else {
    echo "<div class='custom-alert alert-danger' role='alert'>
            Error adding reservation.
        </div>";
}


}

?>




<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="bootstrap.min.css" />

	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-push-5">
						<div class="booking-cta">
							<h1>Make your reservation</h1>
							<p>
							</p>
						</div>
					</div>
					<div class="col-md-4 col-md-pull-7">
						<div class="booking-form">
							<form   method="POST">
								<div class="form-group">
									<span class="form-label">Your Destination</span>
									<input value="<?php echo  $location ?>" name="location" class="form-control" type="text" placeholder="Enter a destination or hotel name">
								</div>
								<div class="form-group">
									<span class="form-label">Your Email</span>
									<input value="<?php echo  $email ?>" name="email" class="form-control" type="email" placeholder="Enter your email">
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Check In</span>
											<input value="<?php echo  $checkIn ?>" name="check_in"  class="form-control" type="date" required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Check out</span>
											<input value="<?php echo   $checkOut ?>" name="check_out" class="form-control" type="date" required>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<span class="form-label">Guests</span>
											<select value="<?php echo  $guests ?>" name="guests" class="form-control">
												<option>1</option>
												<option>2</option>
												<option>3</option>
                                                <option>4</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
							
									<div class="col-sm-6">
								      <div class="form-group">
									<span class="form-label">Your Phone</span>
									<input value="<?php echo  $phone ?>" name="phone" class="form-control" type="tel" placeholder="Enter your phone number">
								      </div>
								   
								</div>
									
								</div>
								<div class="form-btn">
									<button type="submit" class="submit-btn">Book now</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>