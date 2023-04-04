<?php
session_start();
include("config.php");
if(!isset($_SESSION['fid']))
{
	header("location:index.php");
}
$comp=$_POST['comp'];
$by=$_SESSION['fid'];
$date=date('d-M-Y');
if($comp==NULL)
{
	//ASLDO Nothing
}
else
{
	$extension=end(explode(".", $_FILES["file"]["name"]));
	$filename="$comp".".$extension";
	move_uploaded_file($_FILES["file"]["tmp_name"],"asl_uploads/$filename");
	mysqli_query($techVegan,"INSERT INTO complaints(complaint,byy,date,access,file) VALUES('$comp','$by','$date','1','$filename')");
	$info="Successfully Submitted Your Review ";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Review Box</title>
<link href="scripts/styleASL.css" rel="stylesheet" type="text/css" />


<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>
</head>

<body class="bg-image" style="background-image: url('Online-Notice-Board-&-Notes-System/images/uiu_back2.jpg');">
<span class="head" style="float:left; color: black;">Welcome To Review Box</span><br />
<span style="float:right;"><a href="logout.php">Logout</a></span><br />
<hr style="clear:both;box-shadow:0px 0px 2px #000;" color="#FF6600" size="2" width="100%"/><br />
<div align="center">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" onsubmit="MM_validateForm('title','','R','notice','','R');return document.MM_returnValue">
	
<span class="Subhead">Submit Us Your Review</span><br />
<form method="post" action="">
<table cellpadding="3" cellspacing="3" class="formTable">
<tr><td colspan="2" align="center" class="info"><?php echo $info;?></td></tr>
<tr><td class="labels">Review : </td><td><textarea name="comp" rows="5" cols="30" class="fields" style="height:70px;"></textarea></td></tr>

<tr>
  <td class="labels">Reviewed File: </td>
  <td>
    <input type="file" name="file" size="45" class="button" placeholder="Select Document or Image File"/>
  </td>
</tr>


<tr><td align="center" colspan="2"><input type="submit" value="REVIEW" class="button" onclick="return confirm('After Submitting Your review.You will not be able To Delete or Modify it.');" /></td></tr>
</table>
</form>
<a href="fhome.php">Go Back</a>

</div>
</body>

</html>