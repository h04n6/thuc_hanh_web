<?php
try{
	$conn = new PDO('mysql:host=localhost;dbname=shopbanhang;charset=utf8', 'root', '');
}catch(PDOException $e){
	throw new Exception("No connent to database");
}
?>