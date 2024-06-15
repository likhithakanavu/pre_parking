<?php include '../config.php';
$admin = new Admin(); 
session_start();
if(!isset($_SESSION['aid'])){
echo "<script>alert('please login');window.location.href='login.php';</script>";
}
$aid = $_SESSION['aid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> Admin  </title>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content="CodedThemes">
    <meta name="keywords"
    content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="CodedThemes">
    <!-- Favicon icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
<?php include 'header.php' ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                

                <?php include 'sidebar.php' ?>

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                    <div class="page-header card">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    <i class="icofont icofont-file-code bg-c-blue"></i>
                                                    <div class="d-inline">
                                                        <h4>Resort</h4>
                                                        <!-- <span>Lorem ipsum dolor sit <code>amet</code>, consectetur adipisicing elit</span> -->
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!-- Page-header end -->

                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    
                                                       

                                                                             
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        
                                                
     
        
 <br><br/><br/>
                                                                                  


<div class="card">
    <div class="card-header">
                                           
                                           
 <div class="card-header-right">    
    <ul class="list-unstyled card-option">       
         <li><i class="icofont icofont-simple-left "></i></li>        
         <li><i class="icofont icofont-maximize full-card"></i></li>        
         <li><i class="icofont icofont-minus minimize-card"></i></li>        
         <li><i class="icofont icofont-refresh reload-card"></i></li>       
        <li><i class="icofont icofont-error close-card"></i></li>    
    </ul></div>
</div>
<div class="card-block table-border-style">
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>#</th>
                <th> User Name</th>
                <th> User Contact Number</th>

                <th> Resort name </th>
                <th>Paid Amount  </th>
                <th>paid date</th>
               
                <!-- <th>Action</th> -->
            </tr>
        </thead>
        <tbody>
        <?php 
        $i = 1;
        $stmtrr = $admin->ret("SELECT * FROM `payment` INNER JOIN `customer` ON payment.c_id = customer.c_id INNER JOIN `resort` ON payment.r_id = resort.r_id "); 
        // $count  = $stmtrr->rowCount();
        // echo $count ;
        while( $rowrr = $stmtrr->fetch(PDO::FETCH_ASSOC)){ ?>
            <tr>
                <td></td>
                <td> <?php echo $i++ ; ?></td>
                <td><?php echo $rowrr['c_name'] ; ?></td>
                <td><?php echo $rowrr['c_phone'] ; ?></td>

                <td><?php echo $rowrr['r_name'] ; ?></td>
               
                <td><?php echo $rowrr['p_price'] ; ?></td>
                <td><?php echo $rowrr['p_date'] ; ?></td>

                
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

                                        </div>
                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Page body end -->
                                                                    </div>
                                                                </div>
                                                                <!-- Main-body end -->
                                                                <div id="styleSelector">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

<div class="fixed-button">
	<a href="https://codedthemes.com/item/guru-able-admin-template/" target="_blank" class="btn btn-md btn-primary">
	  <i class="fa fa-shopping-cart" aria-hidden="true"></i> Upgrade To Pro
	</a>
</div>
                                        <!-- Warning Section Starts -->
                                        <!-- Older IE warning message -->

<!-- Required Jquery -->
<script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
<script type="text/javascript" src="assets/js/modernizr/css-scrollbars.js"></script>
<!-- classie js -->
<script type="text/javascript" src="assets/js/classie/classie.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="assets/js/script.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/demo-12.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
</body>

</html>
