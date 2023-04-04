<?php
session_start();
include("config.php");
if(!isset($_SESSION['admin']))
{
	header("location:index.php");
}
if($_GET['del']==NULL)
{
	//ASL Do Nothing
}
else
{
	$del=$_GET['del'];
	mysqli_query($techVegan,"DELETE FROM complaints WHERE id='$del'");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>All Complaints</title>
<link href="scripts/styleASL.css" rel="stylesheet" type="text/css" />
</head>

<body style="background-image: url('Online-Notice-Board-&-Notes-System/images/UIU-Logo.png'); background-size: contain !important; background-position: center center;">
<span class="head" style="float:left; color: black;">Notes Management Panel</span><br />
<span style="float:right;"><a href="logout.php">Logout</a></span><br />
<hr style="clear:both;box-shadow:0px 0px 2px #000;" color="#FF6600" size="2" width="100%"/><br />
<div align="center">
<table cellpadding="3" cellspacing="3" class="formTable">
<tr><th>Notes Details</th><th>Notes Uploaded By</th><th>File</th><th>Date</th><th>Action</th></tr>
<?php

$sql=mysqli_query($techVegan,"SELECT * FROM complaints ORDER BY id DESC");
while($a=mysqli_fetch_array($sql))
{
	?>
<tr class="info"><td><?php echo $a['complaint'];?></td><td>
<?php 
if($a['access']==0)
{
	echo "Student";
}
else
{
	echo "Faculty";
}?>

</td><td align="center"><a href="asl_uploads/<?php echo $a['file'];?>"><img src="images/dwd.png" height="30" width="30" /></a></td>


</td><td><?php echo $a['date'];?></td><td>
	<a href="approve.php?approve=<?php echo $b['id'];?>" style="text-shadow:0px 0px 1px #000000;">Approve</a>
	<a href="Complaints.php?del=<?php echo $a['id'];?>" onclick="return confirm('Are You Sure..?');" style="text-shadow:0px 0px 1px #000000;">Delete</a></td></tr>
<?php } ?> 

</table>
<a href="admin.php">Go Back</a>
</div>
</body>

</html>