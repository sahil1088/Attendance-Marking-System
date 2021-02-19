<?php
session_start();
require_once "pdo.php";
$_SESSION['Time2']=date("H:i:s");
$to_time=strtotime($_SESSION['Time1']);
$from_time=strtotime($_SESSION['Time2']);
//echo $to_time;
$Diff=strval(round(abs($to_time - $from_time) / 60,2));
//echo $Diff;
if( (int)$Diff < 1 )
	$Mark=false;
else
	$Mark=true;
$sql="INSERT INTO ATTENDS (Entry,ext,name,Active_Time,Mark) VALUES(:Entry,:ext,:name,:dif,:m)";
$stmt=$pdo->prepare($sql);
$stmt->execute(array(':Entry'=>strval($to_time),
                    ':ext'=>strval($from_time),
		    ':name'=>$_SESSION['user'],
		    ':dif'=>$Diff,
		    ':m'=>$Mark
));
unset($_SESSION['user']);
session_destroy();
header('Location:index.php');
 ?>
