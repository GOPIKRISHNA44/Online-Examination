<?php
session_start();
unset($_SESSION['reload']);
require "quesopt.php";
$ans=array("Pranab Mukharjee","Manikyala Rao","Urjith Patel","Banking","Uttar Pradesh","Chirapunji","Telangana","Oscillate","Xaomi","Sindhu","Kabadia");
$r=98;
$quescount=1;
$unanswered=0;
$marks=0;
$answered=0;
$corans=0;
$wronans=0;
/*echo $_COOKIE[chr(97)];
if(isset($_POST[strval(1)]))
echo $_POST[strval(1)];
else*/


$answerarray=$_SESSION['options'];

for($r=1;$r<=count($answerarray);$r++)
{
if(empty($_POST["s".strval($r)]))
$unanswered+=1;
else
{//echo $ans[$answerarray[$r-1]]." ".$_POST[strval($r)];
	/*correct*/
	
	if($_POST["s".strval($r)]==$ans[$answerarray[$r-1]])
		$corans+=1;
	else
		$wronans+=1;
		
	
	/*wrong*/
	$answered+=1;
}
	
}

?>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style type="text/css">
	#chartContainer2{
		position: absolute;
		top: 350px;
		left: 760px;
	}
	#chartContainer1{
		position: absolute;
		top: 350px;
		left: 30px;
	}
		div.result{
		position: absolute;
		top: 80px;
		left: 450px;
		width: 500px;
	}
	th{
		font-size: 20px;
	}
</style>
<script type="text/javascript" src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
function fun() {
	var chart = new CanvasJS.Chart("chartContainer1",
	{
		title:{
			text: "Performance Measure"
		},     
                animationEnabled: true,     
		data: [
		{        
			type: "doughnut",
			startAngle: 60,                          
			toolTipContent: "{legendText}: {y} - <strong>#percent% </strong>", 					
			showInLegend: true,
			dataPoints: [
				{y: <?php echo $unanswered;?>, indexLabel: "unanswered #percent%", legendText: "unanswered" },
				{y: <?php echo $corans;?>, indexLabel: "correct #percent%", legendText: "correct" },
				{y: <?php echo $wronans;?>,  indexLabel: "incorrect #percent%", legendText: "incorrect" }			
			]
		}
		]
	});
	chart.render();
	}
</script>
<script type="text/javascript">
function fun1() {
	var chart = new CanvasJS.Chart("chartContainer2", {
		theme: "theme2",
		title:{
			text: "analysis chart"              
		},
		animationEnabled: true,
		data: [              
		{
			// Change type to "bar", "area", "spline", "pie",etc.
			type: "column",
			dataPoints: [
				{ label: "unanswered",  y: <?php echo $unanswered;?>  },
				{ label: "correct", y: <?php echo $corans;?>  },
				{ label: "incorrect", y: <?php echo $wronans;?>  }
			]
		}
		]
	});
	chart.render();
}
</script>
</head>
<body onload="fun();fun1();">
<div class="result">
<table class="table" border="0" width="550" height="270" bgcolor="white">
	<tr><th>total</th><td><?php echo $unanswered+$answered;?></td></tr>
	<tr><th>unanswered</th><td><?php echo $unanswered;?></td></tr>
	<tr><th>correct</th><td><?php echo $corans;?></td></tr>
	<tr><th>incorrect</th><td><?php echo $wronans;?></td></tr>
	<tr class="danger"><th>percentage</th><td><?php echo ($corans/($unanswered+$answered))*100;?></td></tr>
	<!--<tr class="info"><th>accuracy</th><td>62.5%</td></tr>-->
</table>
</div>
<div id="chartContainer1" style="height: 300px; width: 40%;">
</div>
<div id="chartContainer2" style="height: 300px; width: 40%;">
</div>
</body>

</html>