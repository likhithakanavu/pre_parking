<?php include '../../config.php';
$admin = new Admin();

if(isset($_POST['profile'])){

    $name= $_POST['name'];
    $email=$_POST['email'];
    $n = $_POST['no'];
    $image_path="uploader/".basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'],$image_path);
    $d= $_POST['desc'];
    $sid= $_POST['id'];

    if($image_path=='uploader'){

        $stmt = $admin->cud("UPDATE `saller` SET `sr_name`='$name',`sr_email`='$email',`sr_phone`='$n',`sr_about`='$d',`sr_date`=now() WHERE  `sr_id`='$sid'","updated");
    }else{

    $stmt = $admin->cud("UPDATE `saller` SET `sr_name`='$name',`sr_email`='$email',`sr_phone`='$n',`sr_about`='$d',`sr_image`='$image_path',`sr_date`=now() WHERE  `sr_id`='$sid'","updated");
    }

    echo "<script>alert('profile updated successfully');window.location.href='../profile.php'</script>";

}elseif(isset($_GET['dcid'])){
    $id = $_GET['dcid'];
    $stmt = $admin->cud("DELETE FROM `category` WHERE `cat_id`='$id'","deleted");
    echo "<script>alert('Deleted successfully');window.location.href='../category.php'</script>";

}elseif(isset($_POST['upresort'])){
    $id = $_POST['id'];
    $cat = $_POST['select'];
    $lname= $_POST['loc'];
    $name = $_POST['name'];

    $price = $_POST['price'];
    $parking=$_POST['parking'];
    $room = $_POST['room'];
    $facilities = $_POST['facilities'];
    $desc = $_POST['desc'];
    $image = "uploader/".basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'],$image);

    if($image == 'uploader/'){
        $stmt = $admin->cud("UPDATE `resort` SET `cat_id`='$cat',`l_id`='$lname',`r_name`='$name',`r_price`='$price',`r_desc`='$desc',`r_facilities`='$facilities',`r_rooms`='$room',`r_parking`='$parking',`r_date`=now() WHERE `r_id`='$id'","updated");
    }else{
        $stmt = $admin->cud("UPDATE `resort` SET `cat_id`='$cat',`l_id`='$lname',`r_name`='$name',`r_price`='$price',`r_desc`='$desc',`r_facilities`='$facilities',`r_rooms`='$room',`r_parking`='$parking',`r_image`='$image',`r_date`=now() WHERE `r_id`='$id'","updated");
    }
    echo "<script>alert('updated successfully');window.location.href='../resort.php'</script>";

}if(isset($_GET['drid'])){
    $id = $_GET['drid'];
    $s = $admin->cud("DELETE FROM `resort` WHERE `r_id`='$id'","deleted");
    echo "<script>alert('deleted successfully');window.location.href='../resort.php'</script>";

}elseif(isset($_GET['abid'])){
    $bid = $_GET['abid'];
    $stmt = $admin->cud("UPDATE `booking` SET `b_status`='accept' WHERE `b _id`='$bid'","update");
    echo "<script>alert('accepted');window.location.href='../booking.php';</script>";
}elseif(isset($_GET['rbid'])){
    $bid = $_GET['rbid'];
    $stmt = $admin->cud("UPDATE `booking` SET `b_status`='reject' WHERE `b _id`='$bid'","update");
    echo "<script>alert('accepted');window.location.href='../booking.php';</script>";
}elseif(isset($_POST['upbl'])){
    $bid = $_POST['id'];
    $bname = $_POST['name'];
    $des = $_POST['des'];
    $image = "uploader/".basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'],$image);

    
    if($image == 'uploader/'){
        $stmt = $admin->ret("UPDATE `blog` SET `bl_name`='$bname',`bl_des`='$des' WHERE `bl_id`='$bid'","updated");
    }else{

    $stmt = $admin->ret("UPDATE `blog` SET `bl_name`='$bname',`bl_des`='$des',`bl_img`='$image' WHERE `bl_id`='$bid'","updated");

    }
    echo "<script>alert('blog uploaded successfully');window.location.href='../blog.php';</script>";
}elseif(isset($_GET['blid'])){
    $bid = $_GET['blid'];
    $stmt  = $admin->cud(" DELETE FROM `blog` WHERE `bl_id`='$bid' ","deleted");
    echo "<script>alert('blog deleted successfully');window.location.href='../blog.php';</script>";
}elseif(isset($_GET['accept'])){

    $mid = $_GET['accept'];

    $stmt = $admin->cud("UPDATE `mall_owner` SET `m_status`='Accept' WHERE `m_id`='$mid'","delete");
    echo "<script>('Accepted');window.location.href='../mall.php'</script>";


}elseif(isset($_GET['reject'])){

    $mid = $_GET['reject'];

    $stmt = $admin->cud("UPDATE `mall_owner` SET `m_status`='Reject' WHERE `m_id`='$mid'","delete");
    echo "<script>('Rejected');window.location.href='../mall.php'</script>";


}



?>