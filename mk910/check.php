<?php
//
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "jlmkcj";
    $mysqli = new mysqli($host,$user,$password ,$dbname);
    if ( mysqli_connect_errno ()) {
        printf ( "Connect failed: %s\n" ,  mysqli_connect_error ());
        exit();
    }
    //$mysqli->query("SET NAMES gbk");
    $telephone = $_GET['telephone'];
    $sql = "select DISTINCT * from jlmkcj where telephone='".$telephone."'";
    
    $result = $mysqli->query($sql);
    
    if($rowInfo = $result->fetch_assoc()){
        $rowInfo['username']=iconv('gb2312','utf-8',$rowInfo['username']);
    $paiming=$rowInfo['id']-1232;
    $row = " 姓名：".$rowInfo['username']."\n 手机号：".$rowInfo['telephone']." \n 行测：".$rowInfo['xingce']." \n 申论：".$rowInfo['shenlun']." \n 总成绩：".$rowInfo['score'];
    /*$row=array('username'=>$rowInfo['username'],'telephone'=>$rowInfo['telephone'],'xingce'=>$rowInfo['fscore'],'shenlun'=>$rowInfo['shenlun'],'sum'=>$rowInfo['zscore']);*/
    echo $row;
    }else{
        echo '未参加考试';
    }
