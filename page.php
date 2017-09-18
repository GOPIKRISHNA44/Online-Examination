<?php
session_start();
if(isset($_SESSION['reload']))
header('location:session.php');
require "quesopt.php";/*for array of questions and array of options */
?>
<html>
<head>
<link href="bootstrap.min.css" type="text/css" rel="stylesheet" />
</head>
<body onload="window.history.forward()"><!--window.history.forward() used for not coming to the revious page-->
<script src="srcfile.js"></script>
<form action="valid.php" onsubmit="return fun()"  method="post"  name="form2">
<!-- FIXED NAVIGATION BARCODE -- FORMHAS BEE SHIFTED UP DUE TO BUTTON-->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">ONLINE EXAMINATION</a>
   
    
    </div>
  </div>
   <p align="right">
 <span id="demo" class="well" style="color:black;font-size:15px;"  height="5px" width="5px" align="center"></span>
   </p>	
  <div align="right">
   <input type="submit" value="Submit" class="btn btn-success navbar-header" style="width:100px"  name="subt"/> </div>
</nav>

<!--CODE FOR FXN COMPLETES-->
<br />
<br />
<br />
<br />
<br />
<br />





<?php
$quest=$_SESSION['a'];/*questions array in the format of 1 1 11 2 3 for random number ;next it willbe sliced */
$_SESSION['reload']="reload";
$options=array();
for($r=0;$r<count($quest);$r++)
{/* question generating part*/
$o=1;
$nu=1;
	echo "<table class='table table-striped table-bordered table-hover table-condensed'><tr><th>".($r+1)."</th><th colspan='4' align='left'>";/*table satrting*/
	foreach($ques[$quest[$r]] as $q=>$qu)
	{
		echo $qu."</th></tr>";
		array_push($options,$q);
	}
	/*option generating part*/$o=1;/*option numbering*/
	foreach($opt[$quest[$r]] as $q){
	echo "<tr><td colspan='4' align='left'><input type='radio' id='a' name='s".($r+1)."' value='".$q."'/>".$q."</td></tr>";
	$o=$o+1;}
	echo "</table><br />";/*table ending*/
	array_splice($ques,$quest[$r],1);
	array_splice($opt,$quest[$r],1);
$nu=$nu+1;
}
$_SESSION['options']=$options;/*here options mapped to questions are collected*/
//print_r($options);
?>

</form>
<?php
echo "
<script>
function fun()
{var answered=0;
var unanswered=0;";
	for($r=1;$r<=count($quest);$r++){echo "
		if(form2.s".$r.".value)
			answered+=1;
		else
			unanswered+=1;";
	}
	echo "
	if(window.confirm('Your status is answered -'+answered+' and unanswered - '+unanswered+' do you want to continue'))
		return true;
	else
		return false;
}
</script>";
?>
<!-- OLD TIMER CODE
<script src="srcfile.js"></script>
<script>

var m=0;
var s=5;
 var interval=setInterval(function(){ myTimer(); }, 1000);
function myTimer() {
    s=s-1;
	if(s<0&&m==0)
	{clearInterval(interval);
alert("Tim is up bro");
document.
	}
	else if(s<0)
	{
	s=59;
	m=m-1;
	}
	if(s>=0)
	 document.getElementById("demo").innerHTML = m+":"+((s<=9)?("0"+s):(s));
	if(m==1&&s==0)
	{alert("you have 1 min left:"+s);
	$("#demo").css({'color':'red'});
	}
   }
</script>
<!-- END OF TH TIMER CODE-->

<script src="srcfile.js"></script>
<script>
var s=<?php echo $_GET['timer'];?>;
function timer(){
if(s<0)
{alert("Your time is up BRO!!!")
document.forms['form2'].submit();
}
else{
var min=Math.floor(s/60);
var sec=s-(min*60);
document.getElementById("demo").innerHTML=min+":"+(sec<10?sec="0"+sec.toString():sec);
if(min<=1&&sec==0)
$("#demo").css({'color':'red'});	
s--;}
}
setInterval(timer,1000);
</script>
</body>



