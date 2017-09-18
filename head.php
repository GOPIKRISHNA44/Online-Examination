<?php
echo "hi";
session_start();
$_SESSION['a']=array("hi");

$r=array("hi");
header("location:exam.php?f=$r");
session_destroy();
?>