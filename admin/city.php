<?php include('config.php'); 

$state = $_REQUEST['state'];
if($state !='')
{
 $result = mysqli_query($connection,"SELECT DISTINCT city FROM tblcities where state = '$state'"); 
 echo '<option value="" > SELECT CITY </option>';
 while($row = mysqli_fetch_array($result))
     
 {
	 echo '<option value="'.$row['city'].'" >'.$row['city'].'</option>' ; 
 } 
	
}

 ?>