
<?php

session_start();
session_destroy();
unset($_SESSION['aid']);
// echo $_SESSION['aid'];
echo "<script>alert('Logout');window.location.href='../login.php'</script>";

// header('Location:../signin.php');

?>

