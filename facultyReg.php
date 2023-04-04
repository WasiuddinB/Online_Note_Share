<?php
require("config.php");
$name=$_POST['name'];
$day=$_POST['day'];
$month=$_POST['month'];
$year=$_POST['year'];
$fid=$_POST['fid'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$p1=$_POST['p1'];
$p2=$_POST['p2'];
$date=date('d-M-Y');
$c=mysqli_query($techVegan,"SELECT * FROM faculty WHERE fid='$fid'");
if($name==NULL || $day==NULL || $month==NULL || $year==NULL || $fid==NULL || $email==NULL || $contact==NULL || $p1==NULL || $p2==NULL)
{
		//asl Do Nothing
}
elseif(mysqli_num_rows($c)==1)
		{
			$info="User Already Registered ";
		}
		elseif($p1==$p2)
		{	
			$p3=sha1($p1);
			$sql=mysqli_query($techVegan,"INSERT INTO faculty(name,day,month,year,fid,email,contact,password,date,status) VALUES('$name','$day','$month','$year','$fid','$email','$contact','$p3','$date','0')");
			$info="Successfully Registered User $name";
		}
		else
		{
			$info="Password Didn't Matched ";
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Faculty Registration Panel</title>
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

<body style="background-image: url('../images/backtree.jpg');">
<div align="center">
<span class="head" style="float:left; color:black;">Faculty Registration Panel</span> <br /><br /><br />
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" onsubmit="MM_validateForm('name','','R','fid','','RisNum','email','','RisEmail','contact','','RisNum','p1','','R','p2','','R');return document.MM_returnValue">
<table cellpadding="3" cellspacing="3" class="formTable">
<tr><td colspan="2" align="center" class="Subhead">Please Fill All The Details</td></tr>
<tr><td colspan="2" align="center" class="info"><?php echo $info;?></td></tr>
<tr><td class="labels">Full Name : </td><td><input name="name" type="text" class="fields" id="name" placeholder="Enter Full Name" size="40"/></td></tr>

<tr><td class="labels">Date of Birth : </td><td>
<select name="day" class="fields">
<option value="NA" disabled="disabled" selected="selected">-Day-</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
<select name="month" class="fields">
<option value="NA" disabled="disabled" selected="selected">-Month-</option>
<option value="JAN">JAN</option>
<option value="FEB">FEB</option>
<option value="MAR">MAR</option>
<option value="APR">APR</option>
<option value="MAY">MAY</option>
<option value="JUN">JUN</option>
<option value="JUL">JUL</option>
<option value="AUG">AUG</option>
<option value="SEP">SEP</option>
<option value="OCT">OCT</option>
<option value="NOV">NOV</option>
<option value="DEC">DEC</option>
</select>
<select name="year" class="fields">
<option value="NA" disabled="disabled" selected="selected">-Year-</option>
<option value="1970">1970</option>
<option value="1971">1971</option>
<option value="1972">1972</option>
<option value="1973">1973</option>
<option value="1974">1974</option>
<option value="1975">1975</option>
<option value="1976">1976</option>
<option value="1977">1977</option>
<option value="1978">1978</option>
<option value="1979">1979</option>
<option value="1980">1980</option>
<option value="1981">1981</option>
<option value="1982">1982</option>
<option value="1983">1983</option>
<option value="1984">1984</option>
<option value="1985">1985</option>
<option value="1986">1986</option>
<option value="1987">1987</option>
<option value="1988">1988</option>
<option value="1989">1989</option>
<option value="1990">1990</option>
<option value="1991">1991</option>
<option value="1992">1992</option>
<option value="1993">1993</option>
<option value="1994">1994</option>
<option value="1995">1995</option>
<option value="1996">1996</option>
<option value="1997">1997</option>
<option value="1998">1998</option>
<option value="1999">1999</option>
<option value="2000">2000</option>
<option value="2001">2001</option>
<option value="2002">2002</option>
<option value="2003">2003</option>
<option value="2004">2004</option>
<option value="2005">2005</option>
<option value="2006">2006</option>
<option value="2007">2007</option>
<option value="2008">2008</option>
<option value="2009">2009</option>
<option value="2010">2010</option>
<option value="2011">2011</option>
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option></select></td></tr>
<tr><td class="labels">Faculty ID : </td><td><input name="fid" type="text" class="fields" id="fid" placeholder="Enter Faculty ID" size="15"/></td></tr>
<tr><td class="labels">E-Mail : </td><td><input name="email" type="text" class="fields" id="email" placeholder="Enter E-Mail ID" size="40"/></td></tr>
<tr><td class="labels">Contact No. : </td><td><input name="contact" type="text" class="fields" id="contact" placeholder="Enter Mobile No." size="20" maxlength="10"/></td></tr>
<tr><td class="labels">Password : </td><td><input name="p1" type="password" class="fields" id="p1" placeholder="Enter Password" size="30"/></td></tr>
<tr><td class="labels">Re-Type Password : </td><td><input name="p2" type="password" class="fields" id="p2" placeholder="Re-Type Password" size="30"/></td></tr>
<tr><td align="center" colspan="2"><input type="submit" value="Register" class="button" style="width: 40%; height: 50px;" onclick="return confirm('Please Confirm All Fields Before Submitting');" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Clear"  class="button" style="width: 40%; height: 50px;" onclick="return confirm('Are You Sure...?');"/></td></tr>
</table>
</form><br />
<a href="index.php">Go Back</a>
</div>
</body>

</html>