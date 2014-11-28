<?php 
define('USER', 'root');
define('PASS', '');
define('DSN', 'mysql:host=localhost;dbname=vlambeer');

try 
{
	$db = new PDO(DSN, USER, PASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) 
{
	echo $e->getMessage();	
}?>