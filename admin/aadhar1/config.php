<?Php

//$Server = 'localhost';
//$username = 'fastprin_1';
//$password = 'Vs9627409889';

$Server = 'localhost';
$username = 'root';
$password = '';

$database = 'pancard';


//$database = 'print_aadhaar_rishav';

//echo $Server;
$connection = mysqli_connect($Server,$username,$password);

if($connection)
{
    mysqli_select_db($connection,$database);
}
else
{
    echo "Could not connect to server";
}

?>
