
<?php 
require "quesopt.php";/*for array of questions and array of options */
$nques=$_POST['get'];//get the number of questions
?>
<?php
session_start();
$randgen=10;
$nu=1;
$generate=array();
while($nques>=$nu)
{/* question generating part*/
	$number=rand(0,$randgen);
array_push($generate,$number);
$randgen=$randgen-1;	
$nu+=1;
}
$timer=$nques*60;
$_SESSION['a']=$generate;
//array elements is the no of qustions
header("location:page.php?timer=".$timer."");
?>




