<?php
    $no=$_REQUEST["no"];
    $ctg=$_REQUEST["ctg"];

    require_once("db.php");
    require_once("util.php");
    $pdo = db_connect();
        
     try{
       $pdo->beginTransaction();
       $sql = "delete from dnjstjq25.per_up where no = ?";   
       $stmh = $pdo->prepare($sql);
       $stmh->bindValue(1,$no,PDO::PARAM_STR);
       $stmh->execute();   
       $pdo->commit();

        header("Location:http://dnjstjq25.dothome.co.kr/index.html");

       } catch (Exception $ex) {
                $pdo->rollBack();
                print "오류: ".$Exception->getMessage();
       }
  ?>