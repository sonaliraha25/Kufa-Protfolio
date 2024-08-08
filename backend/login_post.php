<?php
session_start();
$email=$_POST['email'];
$password=$_POST['password'];
$db_connect=mysqli_connect('localhost','root','','neptune');
$flag=true;
if($email){
    $_SESSION['old_email']=$email;
  }else{
      $_SESSION['email_error']="Email is Missing";
      $flag=false;
  }
  if($password){
    $_SESSION['old_pass']=$password;
  }else{
      $_SESSION['pass_error']="Password is Missing";
      $flag=false;
  }
  if($flag==false){
    header('location: login.php');
}
else{
    $enc_pass=md5($password);
    $cquery="SELECT COUNT(*) as'check'FROM users WHERE email='$email' AND password='$enc_pass';";
    $final=mysqli_query($db_connect,$cquery);
    $final_fetch=mysqli_fetch_assoc($final)['check'];
    if($final_fetch!=0){
       $id_query="SELECT *FROM users WHERE email='$email';";
       $final_id_query= mysqli_query($db_connect,$id_query);
        $final_id_fetch=mysqli_fetch_assoc($final_id_query);
   $_SESSION['s_id']= $final_id_fetch['Id'];
   $_SESSION['s_name']= $final_id_fetch['name'];
   $_SESSION['s_email']= $final_id_fetch['email'];
 
        header('location: dashboard.php'); 
    }
}

?>