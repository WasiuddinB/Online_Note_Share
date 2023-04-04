<?php
session_start();
include("config.php");
if(!isset($_SESSION['sid']))
{
	header("location:index.php");
}
$id=$_SESSION['sid'];
$a=mysqli_query($techVegan,"SELECT * FROM registration WHERE roll='$id'");
$b=mysqli_fetch_array($a);
$pass=$b['password'];
$old=sha1($_POST['old']);
$p1=sha1($_POST['p1']);
$p2=sha1($_POST['p2']);
if($_POST['p1']==NULL || $_POST['p1']==NULL || $_POST['p2']==NULL)
{
	//ASL Do Nothing
}
else
{
if($old!=$pass)
{
	$info="Incorrect Old Password";
}
elseif($p1!=$p2)
	{
		$info="New Password Didn't Matched";
	}
	else
	{
		mysqli_query($techVegan,"UPDATE registration SET password='$p2' WHERE roll='$id'");
		$info="Successfully Changed your Password";
	}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password Wizard</title>
<link href="scripts/styleASL.css" rel="stylesheet" type="text/css" />
</head>

<body style="background-image: url('Online-Notice-Board-&-Notes-System/images/UIU-Logo.png'); background-size: contain !important; background-position: center center;">
<span class="head" style="float:left; color: black;">Change Password Wizard</span><br />
<span style="float:right;"><a href="logout.php">Logout</a></span><br />
<hr style="clear:both;box-shadow:0px 0px 2px #000;" color="#FF6600" size="2" width="100%"/><br />
<div align="center">
<form method="post" action="">
<table cellpadding="3" cellspacing="3" class="formTable">
<tr><td colspan="2" class="info" align="center"><?php echo $info;?></td></tr>
<tr><td class="labels">Enter Old Password :</td><td><input type="password" name="old" size="25" class="fields" /></td></tr>
<tr><td class="labels">Enter New Password :</td><td><input type="password" name="p1" size="25" class="fields"  /></td></tr>
<tr><td class="labels">Re-Type New Password :</td><td><input type="password" name="p2" size="25"  class="fields" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Change Password" class="button" /></td></tr>
</table>
</form>
<a href="shome.php">Go Back</a>

</div>
</body>

</html>