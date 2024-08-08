<?php 
$service_name=$_POST['service_name'];
$service_description=$_POST['service_description'];
$service_icon=$_POST['service_icon'];
$status=$_POST['status'];
$service=$_POST['service'];
$db_connect=mysqli_connect('localhost','root','','neptune');
if(isset($service)){
$service_insert_query="INSERT INTO services(Service_Name,Service_Description,Service_Icon,status) VALUES('$service_name','$service_description','$service_icon','$status');";
mysqli_query($db_connect,$service_insert_query);
header('location: viewservice.php');
}

?>