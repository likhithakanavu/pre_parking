<?php  include '../config.php';
$admin = new Admin();

if(isset($_POST['reg'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['con'];
    $pass = $_POST['pass'];
    $add = $_POST['add']; 
   

    $stmt1=$admin->ret("SELECT * FROM `user` WHERE `u_email`='$email'");
    // $row=$stmt1->fetch(PDO::FETCH_ASSOC);
    $no = $stmt1->rowCount();
    if($no>0){
      echo "<script>alert('Email already existed');window.location.href='../reg.php'</script>";
    }
        
      $rstmt=$admin->cud("INSERT INTO  `user`( `u_name`, `u_email`, `u_phone`, `u_pass`, `u_address`) VALUES ('$name','$email','$phone','$pass','$add')","Inserted");  
    
      $stmt2=$admin->ret("SELECT * FROM `user` WHERE `u_email`='$email' AND `u_pass`='$pass' ");
    $row2=$stmt2->fetch(PDO::FETCH_ASSOC);
    
    $num=$stmt2->rowCount();
    if($num>0)
    {
    
    echo "<script>alert('Registered Successfully');window.location.href='../login.php'</script>";
    }
    
    
    echo "<script>alert('Unsuccessful');window.location.href='../reg.php'</script>";
    
    }elseif(isset($_POST['login'])){

        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $stmt = $admin->ret("SELECT * FROM `user` WHERE `u_email`='$email' AND `u_pass`='$pass'");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
       
    
        $num = $stmt->rowCount();
        if($num>0){
            $aid=$row['u_id'];
            $_SESSION['u_id']=$aid;
            echo "<script>alert('Successfully logged in.');window.location.href='../index.php'</script>";
        }
        echo "<script>alert('Unsuccessful');window.location.href='../login.php'</script>";
    }
    echo "<script>alert('something went wrong');window.location.href='../login.php'</script>";
    


    