<?php
session_start();
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirm_password=$_POST['confirmpass'];
$submit=$_POST['signup'];
$preg_maa = preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $password);
$flag=true;
$db_connect=mysqli_connect('localhost','root','','neptune');
if(!$db_connect){
    echo"Database connection failed";
}
if($name){
  $_SESSION['old_name']=$name;
}else{
    $_SESSION['name_error']="Name is Missing";
   $flag=false;
}
if($email){
    $_SESSION['old_email']=$email;
  }else{
      $_SESSION['email_error']="Email is Missing";
      $flag=false;
  }
  $ecquery="SELECT COUNT(*) as'emailch'FROM users WHERE email='$email';";
  $finalem=mysqli_query($db_connect,$ecquery);
  $final_fetch_e=mysqli_fetch_assoc($finalem)['emailch'];
  if($final_fetch_e!=0){
    $flag=false;
      $_SESSION['email_same']="This email has already account..Try another email";
  }
  if($password){
    $_SESSION['old_pass']=$password;
  }else{
      $_SESSION['pass_error']="Password is Missing";
      $flag=false;
  }
  if($confirm_password){
    $_SESSION['old_cpass']=$confirm_password;
}else{
    $_SESSION['cpass_error']="Confirm Password is Missing";
    $flag=false;
}
if($preg_maa!=1){
    $_SESSION['cpass_error']="Password should have uppercase,lowercase,contain special charcter";
    $flag=false;
}elseif($password!=$confirm_password){
    $_SESSION['cpass_error']="Confirm Password & Password is not matching";
    $flag=false;
  }
if($flag==false){
    header('location: signup.php');
}
else{
    $enc_password=md5($password);
    $query="INSERT INTO users(name,email,password)VALUES('$name','$email','$enc_password');";
    mysqli_query($db_connect,$query);
    header('location: login.php');
    $_SESSION['login']= $name." You have successfully SignUp...";
}


?>