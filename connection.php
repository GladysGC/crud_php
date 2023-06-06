<?php                                                                                                                                                                                                                                                                                               

$databaseHost = 'mysql';
$databaseName = 'crud';
$databaseUsername = 'usuario';
$databasePassword = '1234';


//$mysqli= new PDO("mysql:host=mysql;dbname=crud","usuario","1234");
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
//$mysqli = new PDO($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

?>
