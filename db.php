<?php
function db_connect(){
	$db_user = "dnjstjq25";
	$db_pass = "tjq475869";
	$db_host = "localhost";
	$db_name = "dnjstjq25";
	$db_type = "mysql";
	$dsn = "$db_type:host=$db_host;db_name=$db_name;charset=utf8";

	try{
	$pdo=new PDO($dsn,$db_user,$db_pass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,FALSE);
	$pdo->exec("set names utf8");
	}catch(PDOException $Exception){
	die('오류'.$Exception->getMessage());
	}
	return $pdo; }
?>