<?php
session_start();
unset($_SESSION['reload']);
header("Location:exam.html");
?>