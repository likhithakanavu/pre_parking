<?php include 'config.php';
$admin = new Admin();

$mid = $_GET['mid'];


$stmt2 = $admin->ret("SELECT * FROM  `mall_owner` INNER JOIN `mall` ON mall_owner.m_id = mall.m_id WHERE mall_owner.m_id = $mid ");

$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);



if(isset($_GET['type'])){

   $type = $_GET['type'];
   
$stmt = $admin->ret("SELECT * FROM `parking_slot` WHERE `m_id`='$mid' AND `slot_type`='$type'  ");



}else{

   $stmt = $admin->ret("SELECT * FROM `parking_slot` WHERE `m_id`='$mid'  ");

}





?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>lighten</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">


      <!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">

<!-- Bootstrap -->
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

<!-- Custom stlylesheet -->
<link type="text/css" rel="stylesheet" href="css/style.css" />

      <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.1/mdb.min.css"
  rel="stylesheet"
/>
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout product_page">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader --> 
      <!-- header -->
  
<?php include 'header.php'; ?>


      <!-- end header -->
       <div class="brand_color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2> <?php echo $row2['mall_name'] ; ?> </h2>
                    </div>
                </div>
            </div>
        </div>

    </div>
      <!-- our product -->
      <div class="product">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     
                     <span>We package the products with best services to make you a happy customer.</span>
                  </div>
               </div>
            </div>
         </div>
      </div>

     <select name="type" onchange="Filter(this.value,<?php echo $mid  ?>)" >
      <option>SELECT OPTION</option>
      <option value="Two-Wheeler">
      Two-Wheeler
      </option>
      <option value="Four-Wheeler">
      Four-Wheeler
      </option>
     </select>

     <script>
      function Filter(type,mid){

         window.location.href='slot.php?mid='+mid+'&type='+type;

      }
     </script>


      <div class="product-bg">
         <div class="product-bg-white">
         <div class="container">
            <div class="row">

            <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ 

                $idd = $stmt->rowCount();
            
             
                ?>

              
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="product-box">
                    <?php if($row['slot_type']=='Two-Wheeler'){ ?>
                        <i><img src="bikec.jfif"/></i>
                  <?php  }else{ ?>
                    <i><img src="car.jfif"/></i>

                 <?php } ?>
               
                  <span >  <h3><?php echo $row['slot_available'] ; ?> &nbsp; ( <?php echo $row['slot_no'] ; ?> )</h3> </span>

                     <span>₹. <?php echo $row['slot_price'] ; ?></span>
                  </div>
               </div>

               <?php } ?>

            
               </div>
            </div>
         </div>


        

         <div id="booking" class="section" style="padding:20px">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="booking-bg"></div>
						<form action="controller/records.php" method="post">
							<div class="form-header">
								<h2>Check Availability</h2>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Check In</span>
										<select name="slot" class="form-control" required>
                                            <option>
                                                SELECT Slot id
                                            </option>
                                            <?php $stmt3 = $admin->ret("SELECT * FROM `parking_slot` WHERE `m_id` = '$mid' ");
                                            while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){ ?>
                                            <option value="<?php echo $row3['slot_id'] ; ?>" >
                                                <?php echo $row3['slot_no'] ; ?>
                                            </option>
                                            <?php } ?>
                  </select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Date</span>
										<input class="form-control" type="date" min="<?php echo date('Y-m-d') ; ?>" name="date" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label"> From Time</span>
										<input class="form-control" type="time" name="ftime" required>
									</div>
								</div>
								<div class="col-md-6">
                                <div class="form-group">
										<span class="form-label"> To Time</span>
										<input class="form-control" type="time" name="ttime" required>
									</div>
								</div>
							</div>
						
							<div class="form-btn">
								<button type="submit" name="available" class="submit-btn">Book Now</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

    <br/><br/>

         
      <!--  footer --> 
    
<?php include 'footer.php'; ?>

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.1/mdb.umd.min.js"
></script>
      <!-- end footer -->
      <!-- Javascript files--> 
      <script src="js/jquery.min.js"></script> 
      <script src="js/popper.min.js"></script> 
      <script src="js/bootstrap.bundle.min.js"></script> 
      <script src="js/jquery-3.0.0.min.js"></script> 
      <script src="js/plugin.js"></script> 
      <!-- sidebar --> 
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script> 
      <script src="js/custom.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });
         
         $(".zoom").hover(function(){
         
         $(this).addClass('transition');
         }, function(){
         
         $(this).removeClass('transition');
         });
         });
         
      </script> 
   </body>
</html>