<?php
$approve=$_GET['approve'];
session_start();
include("config.php");
if(!isset($_SESSION['admin']))
{
	header("location:index.php");
}

// $notice=$_POST['notice'];
// $title=$_POST['title'];
$comp=$_POST['comp'];
$by=$_SESSION['sid'];
$date=date('d-M-Y');
$access=$_POST['access'];
$id=$_GET['id'];
if($notice==NULL || $title==NULL || $access==NULL)
{
	//ASLDo Nothing
}
else
{
	mysqli_query($techVegan,"UPDATE complaints SET comp='$comp', byy='$by', date='$date', access='$access' WHERE id='$approve'");
	header("location:Complaints.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Approve Notice</title>
<link href="scripts/styleASL.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-image" style="background-image: url('Online-Notice-Board-&-Notes-System/images/uiu_back2.jpg');">
<span class="head" style="float:left; color:black;">Approve Notice</span><br />
<span style="float:right;"><a href="logout.php">Logout</a></span><br />
<hr style="clear:both;box-shadow:0px 0px 2px #000;" color="#FF6600" size="2" width="100%"/><br />
<div align="center">
<form method="post" action="">
<table cellpadding="3" cellspacing="3" class="formTable">
<tr><th>ID</th><th>Title</th><th>Notice</th><th>Access Type</th><th>Action</th></tr>
<?php 
$a=mysqli_fetch_array(mysqli_query($techVegan,"SELECT * FROM notices WHERE id='$approve'"));
?>
<tr><td><?php echo $a['id'];?></td><td><input type="text" name="title" class="fields" value="<?php echo $a['title'];?>" /></td><td><textarea name="notice" cols="35" class="fields" style="height:70px;font-family:'trebuchet MS';"><?php echo $a['notice'];?></textarea></td><td><select name="access" class="fields"><option disabled="disabled" selected="selected">- Select Access Type - </option><option value="0">Student</option><option value="1">Faculty</option></select></td><td><input type="submit" value="Update" class="button" /><input type="hidden" value="<?php echo $a['id'];?>" name="id" /></td></tr>
</table>
</form>
</div>
</body>

</html>