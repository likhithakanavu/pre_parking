
<?php include 'config.php';
$admin = new Admin();


if(!isset($_SESSION['u_id'])){

    echo "<script>alert('please login');window.location.href='login.php'</script>";

}

$uid = $_SESSION['u_id'];

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
      <title>user</title>
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
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
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
                        <h2>Status</h2>
                    </div>
                </div>
            </div>
        </div>

    </div>



<br/><br/><br/>
<!-- CHOOSE  -->
    
<!-- end CHOOSE -->

      <!-- service --> 
      <table class="table align-middle mb-0 bg-white" style="padding: 20px; margin-right:20px; margin-left:20px  ">
  <thead class="bg-light">
    <tr>
      <th>SI/NO</th>
      <th>Slot No </th>
      <th>Slot Date </th>
      <th>Time</th>
      <th>Price</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>

  <?php $stmt = $admin->ret("SELECT * FROM `booking` INNER JOIN `parking_slot` ON booking.slot_id = parking_slot.slot_id WHERE booking.u_id = '$uid' ");
  $i = 1;
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>

    <tr>

    <td><?php echo $i ; ?></td>

      <td>
        <div class="d-flex align-items-center">
         
          <div class="ms-3">
            <p class="badge badge-info rounded-pill d-inline"><?php echo $row['slot_no'] ; ?></p>
           
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1"> <?php echo $row['slot_date'] ; ?> </p>
      
      </td>
      <td>
        <span class="fw-normal mb-1"> <?php echo $row['f_time'] ; ?> -  <?php echo $row['t_time'] ; ?>   </span>
      </td>
      <td> <?php echo $row['t_price'] ; ?> </td>
      <td>
        <?php  if($row['b_status']=='paid'){ ?>
          <button type="button" class="btn btn-success btn-rounded" data-mdb-ripple-init>Payment is Done</button>

          <?php }else{ ?>
      <a href="payment.php?bid=<?php echo $row['b_id'] ; ?>" ><button type="button" class="btn btn-success btn-rounded" data-mdb-ripple-init>Payment</button></a>
      <a href="controller/records.php?bid=<?php echo $row['b_id'] ; ?>"><button type="button" class="btn btn-danger btn-rounded" data-mdb-ripple-init>Cancel</button></a>
    <?php } ?>  
    </td>
    </tr>
  
    <?php } ?>

  </tbody>
</table>
      <!-- end service -->

      <br/><br/><br/>
      <!--  footer --> 
 
<?php include 'footer.php'; ?>


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