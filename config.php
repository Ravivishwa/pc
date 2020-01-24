<?Php

//$Server = 'localhost';
//$username = 'pancard_dtc';
//$password = 'dQ}G!K=-;7W;';
//Vs9627409889
//fastprin_1
$Server = 'localhost';
$username = 'root';
$password = '';

//$database = 'pancard_dtc';
$database = 'pancard';


//$database = 'print_aadhaar_rishav';

//echo $Server;
$connection = mysqli_connect($Server,$username,$password);

if($connection)
{
    mysqli_select_db($connection,$database);
}
//else
// {
//     echo "Could not connect to server";
// }

?>
