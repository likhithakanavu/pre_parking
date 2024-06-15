<?php  
include '../config.php';
$admin = new Admin();

if (isset($_POST['available'])) {

    $sid = $_POST['slot'];
    $date = $_POST['date'];
    $ft = $_POST['ftime'];
    $tt = $_POST['ttime'];

    $stmt1 = $admin->ret("SELECT * FROM `parking_slot` WHERE `slot_id`='$sid'");
    $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

    $startTime = new DateTime($ft);
    $endTime = new DateTime($tt);
    $interval = $startTime->diff($endTime);
    $hours = $interval->h + ($interval->days * 24);
    $minutes = $interval->i;
    $totalHours = $hours + ($minutes / 60);

    $price = $row1['slot_price'];
    $amt = $totalHours * $price;

    // echo "$amt";

    $stmt = $admin->ret("SELECT * FROM `booking` 
          WHERE `slot_id`='$sid' 
          AND `slot_date`='$date' 
          AND (
              TIME_FORMAT('$ft', '%H:%i') BETWEEN TIME_FORMAT(`f_time`, '%H:%i') AND TIME_FORMAT(`t_time`, '%H:%i')
              OR TIME_FORMAT('$tt', '%H:%i') BETWEEN TIME_FORMAT(`f_time`, '%H:%i') AND TIME_FORMAT(`t_time`, '%H:%i')
              OR TIME_FORMAT(`f_time`, '%H:%i') BETWEEN TIME_FORMAT('$ft', '%H:%i') AND TIME_FORMAT('$tt', '%H:%i')
              OR TIME_FORMAT(`t_time`, '%H:%i') BETWEEN TIME_FORMAT('$ft', '%H:%i') AND TIME_FORMAT('$tt', '%H:%i')
          )");

    $count = $stmt->rowCount();
    echo $count;

    if ($count > 0) {
        $mid = $row1['m_id'];
        echo "<script>alert('Not Available');window.location.href='../slot.php?mid=$mid';</script>";
    } else {
        echo "<script>alert('Available');window.location.href='../booking/index.php?slotid=$sid&&date=$date&&ft=$ft&&tt=$tt&&price=$amt';</script>";
    }
}elseif(isset($_POST['booking'])){


    $uid = $_POST['uid'];
    $sid = $_POST['sid'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $ft = $_POST['ft'];
    $tt = $_POST['tt'];
    $price = $_POST['price'];

    $stmt = $admin->ret(" INSERT INTO `booking`( `u_id`, `slot_id`, `slot_date`, `f_time`, `t_time`,  `t_price`) VALUES ('$uid','$sid','$date','$ft','$tt','$price') ","insert");


        echo "<script>alert('Booking successfully');window.location.href='../index.php';</script>";


}elseif(isset($_POST['payment'])){

    $tp = $_POST['tprice'];
    $uid = $_POST['uid'];
    $bid = $_POST['boid'];
    $pay = $_POST['pay'];

    $stmt = $admin->cud("INSERT INTO `payment`( `b_id`, `u_id`, `pay_method`, `pay_amount`) VALUES ('$bid','$uid','$pay','$tp')","insert");

    $stmt2 = $admin->cud("UPDATE `booking` SET `b_status`='paid' WHERE `b_id`='$bid'","update");

    echo "<script>alert('payment is done');window.location.href='../status.php'</script>";

}elseif(isset($_GET['bid'])){

    $bid = $_GET['bid'];

    $stmt = $admin->cud("DELETE FROM `booking` WHERE `b_id`='$bid' ","delete");

    echo "<script>alert('Canceld ');window.location.href='../index.php';</script>" ;

}
?>
