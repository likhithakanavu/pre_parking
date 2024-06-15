<?php 
include 'config.php';
$admin = new Admin();

$search = "";
if (isset($_GET['search'])) {
    $search = htmlspecialchars($_GET['search']);
    $stmt = $admin->ret("SELECT * FROM `mall` WHERE `mall_name` LIKE '%$search%'");
} else {
    $stmt = $admin->ret("SELECT * FROM `mall`");
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

      <!-- Google font -->
      <link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">
      <!-- Bootstrap -->
      <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- Custom stlylesheet -->
      <link type="text/css" rel="stylesheet" href="css/style.css" />
      <!-- Font Awesome -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
      <!-- MDB -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.1/mdb.min.css" rel="stylesheet" />
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
                     <h2>All Mall's</h2>
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
            <!-- Search form -->
            <div class="row">
               <div class="col-md-12">
                  <form method="get" action="">
                     <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search for malls..." value="<?php echo $search; ?>">
                        <span class="input-group-btn">
                           <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div class="product-bg">
         <div class="product-bg-white">
            <div class="container">
               <div class="row">
                  <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                     <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <a href="slot.php?mid=<?php echo $row['m_id']; ?>">
                           <div class="product-box">
                              <i><img src="owner/controller/<?php echo $row['mall_image']; ?>"/></i>
                              <span>
                                 <h3><?php echo $row['mall_name']; ?>&nbsp;</h3>
                              </span>
                              <span><?php echo $row['mall_address']; ?></span>
                           </div>
                        </a>
                     </div>
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
      <br/><br/>
      <!-- footer --> 
      <?php include 'footer.php'; ?>
      <!-- MDB -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.1/mdb.umd.min.js"></script>
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
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
