<?php
session_start();
include("config.php");
if(!isset($_SESSION['admin']))
{
	header("location:index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Home</title>
<link href="scripts/styleASL.css" rel="stylesheet" type="text/css" />
</head>

<body style="background-image: url('Online-Notice-Board-&-Notes-System/images/admin3.png'); background-size: cover;">
<span class="head" style="font-family: sans-serif;float: left; color: black;">Welcome To Admin Panel</span><br />
<span style="font-family: sans-serif;float:right;"><a href="logout.php">Logout</a></span><br />

<hr style="clear:both;box-shadow:0px 0px 2px #000;" color="#FF6600" size="2" width="100%"/><br />
<div align="center">
<table cellpadding="4" cellspacing="4" class="formTable">
<tr><td>
<span class="Subhead">Admin Commands</span><hr size="2" style="color:#00F;" /><br />
<a href="notices.php">Online Notices</a><br />
<a href="manageStudent.php">Manage Student Account</a><br />
<a href="manageFaculty.php">Manage Faculty Account</a><br />
<a href="ChangePassword.php">Change Password</a><br />
<a href="Complaints.php">Manage Notes</a><br />
</td></tr></table>
</div>

</body>
</html>