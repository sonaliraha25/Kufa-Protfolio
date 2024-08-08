<?php 
session_start();
$db_connect=mysqli_connect('localhost','root','','neptune');
$id=$_SESSION['s_id'];
if(isset($_POST['namechange'])){
    $new_name=$_POST['newname'];
    $name_change_query="UPDATE users SET name='$new_name' WHERE Id='$id';";
    $implement=mysqli_query($db_connect,$name_change_query);
 $_SESSION['s_name']=$new_name;
 header('location: profile.php');
}
// email change 
if(isset($_POST['emailchange'])){
    $new_email=$_POST['newemail'];
    $email_change_query="UPDATE users SET email='$new_email' WHERE Id='$id';";
    mysqli_query($db_connect,$email_change_query);
 $_SESSION['s_email']=$new_email;
 header('location: profile.php');
}
// Password Change


if(isset($_POST['passchange'])){
    $newpass=md5($_POST['newpass']);
$cpass=md5($_POST['newconpass']);
    if($newpass==$cpass){
        $pass_query= "UPDATE users SET password='$newpass' WHERE Id='$id';";
        mysqli_query($db_connect,$pass_query);
        header('location: profile.php');
    }else{
        echo "Password and Confirm Password does not match";
    }
}
// profile image 
if(isset($_POST['pic_change'])){
    $newpic=$_FILES['newpic']['name'];
     $exp=explode(".",$newpic);
     $extension=end($exp);
     $new_name_pic=$id. "." .$extension;
     $old_location=$_FILES['newpic']['tmp_name'];
     $new_location=("..\assets\backend\image/".$new_name_pic);
     move_uploaded_file($old_location,$new_location);
   $image_insert_query="UPDATE users SET profile_photo='$new_name_pic' WHERE Id='$id';";
   mysqli_query($db_connect, $image_insert_query);
    header('location: profile.php');
}


?>