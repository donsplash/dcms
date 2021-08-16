<?php
session_start();
include '../inc/db.php';
include 'classad.php';
include 'in.php'; 
if (!isset($_SESSION['Logged_admin'])|| $_SESSION['Logged_admin']!==true && !isset($_SESSION['md_id'])) {
header('Location: access.php');
}
?>