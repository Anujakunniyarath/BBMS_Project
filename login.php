<?php
$l="localhost";
$u="root";
$p="root";
$db="PKD23IT018";
$con=mysqli_connect($l,$u,$p,$db);
if(!$con)
{
    die("not connected".mysqli_connect_error());
}
echo "connected";
?>