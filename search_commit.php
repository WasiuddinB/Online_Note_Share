<?php
session_start();
include("config.php");
if(!isset($_SESSION['sid']))
{
	header("location:index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Notices</title>
<link href="scripts/styleASL.css" rel="stylesheet" type="text/css" />
</head>

<body class="bg-image" style="background-image: url('Online-Notice-Board-&-Notes-System/images/uiu_back2.jpg');">
<span class="head" style="float:left; color: black;">Search Notices</span><br /><br />
<hr style="clear:both;box-shadow:0px 0px 2px #000;" color="#FF6600" size="2" width="100%"/><br />



<div align="center">

	<form method="post">
	<label>Search</label>
	<input type="text" name="search">
	<input type="submit" name="submit">
</form>
<?php   
$coon=new PDO("mysql:host=localhost;dbname=onb",'root','');
if(isset($_POST['submit'])){
	$str=$_POST['search'];
	$sth=$coon->prepare("SELECT * FROM notices WHERE title='$str'");
	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth->execute();

	if($row=$sth->fetch()){
		?>
		<br><br><br>
		<table cellpadding="3" cellspacing="3" class="formTable">
			<tr>
				<th>Title</th>
				<th>Notes</th>
				<th>File</th>
				<th>Date</th>
			</tr>
			<tr>
				<td><?php echo $row->title;  ?></td>
				<td><?php echo $row->notice; ?></td>
				<td><a href="asl_uploads/<?php echo $row->file;?>"><img src="images/dwd.png" height="30" width="30" /></a></td>
				<td><?php echo $row->date; ?></td>
			</tr>
		</table>
	
<?php
	}
	else{
		echo "The given input is wrong. No data matches with the given input data";
	}
}

?>
<a href="shome.php">Go Back</a>
</div>
