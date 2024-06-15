<?php include '../../config.php';
$a = new Admin();


if(isset($_POST['login'])){


   
    $email = $_POST['email'];
    $p = $_POST['pass'];
    
    $stmt = $a->ret("SELECT * FROM `admin` WHERE `a_email`='$email' AND `a_pass`='$p'");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

   

    $num = $stmt->rowCount();
    if($num>0){
        $aid=$row['a_id'];
        $_SESSION['aid']=$aid;
        echo "<script>alert('Successfully logged in.');window.location.href='../index.php'</script>";
    }
    echo "<script>alert('Unsuccessful');window.location.href='../login.php'</script>";
}
echo "<script>alert('something went wrong');window.location.href='../login.php'</script>";


?>