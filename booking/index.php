<?php include '../config.php';
$admin = new Admin();


if(!isset($_SESSION['u_id'])){

    echo "<script>alert('please login');window.location.href='../login.php'</script>";

}

$slotid = $_GET['slotid'];
$date = $_GET['date'];
$ft = $_GET['ft'];
$tt = $_GET['tt'];

$uid = $_SESSION['u_id']; 

$price = $_GET['price'];

$stmt = $admin->ret("SELECT * FROM `user` WHERE `u_id`='$uid' ");
$row = $stmt->fetch(PDO::FETCH_ASSOC)

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

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
					<div class="col-md-5">
						<div class="booking-cta">
							<h1>Make your reservation</h1>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate laboriosam numquam at</p>
						</div>
					</div>
					<div class="col-md-6 col-md-offset-1">
						<div class="booking-form">
							<form action="../controller/records.php" method="post" >
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="hidden" name="uid" value="<?php echo $uid ; ?>" >
											<input type="hidden" name="sid" value="<?php echo $slotid ; ?>" >

											<input class="form-control" value="<?php echo $row['u_name'] ; ?>" type="text" readonly name="name">
											<span class="form-label">Name</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input class="form-control" type="tel" value="<?php echo $row['u_phone'] ; ?>" readonly  name="phone" >
											<span class="form-label">Contact Number</span>
										</div>
									</div>
								</div>
							

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control" type="date" value="<?php echo $date ; ?>" readonly name="date" required>
											<span class="form-label">Date</span>
										</div>
									</div>
									
								</div>



								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input class="form-control" type="time" value="<?php echo $ft ; ?>" name="ft" readonly required>
											<span class="form-label">Check In</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input class="form-control" type="time" value="<?php echo $tt ; ?>" name="tt" readonly required>
											<span class="form-label">Check Out</span>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input class="form-control" type="text" value="<?php echo $price ; ?>" readonly name="price" required>
											<span class="form-label">Price</span>
										</div>
									</div>
									
								</div>


								<div class="form-btn">
									<button type="submit" name="booking" class="submit-btn">Book Now</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="js/jquery.min.js"></script>
	<script>
		$('.form-control').each(function () {
			floatedLabel($(this));
		});

		$('.form-control').on('input', function () {
			floatedLabel($(this));
		});

		function floatedLabel(input) {
			var $field = input.closest('.form-group');
			if (input.val()) {
				$field.addClass('input-not-empty');
			} else {
				$field.removeClass('input-not-empty');
			}
		}
	</script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>