
<?php
include("../Assets/Connection/Connection.php");
include("Header.php");
if(isset($_POST['txt_save']))
{
	$Name=$_POST['txt_name'];
	$Email=$_POST['txt_email'];
	$Password=$_POST['txt_pwd'];
	$insQry="insert into tbl_admin(admin_name,admin_email,admin_password)values('".$Name."','".$Email."','".$Password."')";
	if($conn->query($insQry))
	{
		  echo "inserted";
	}
	else{
		echo"Failed";
	}
}


if(isset($_GET['did']))
{ 
 $delqry="delete from tbl_admin where admin_id='".$_GET['did']."'";
 if($conn->query($delqry))
 {
	 ?>
			<script>
            alert("Deleted");
          window.location="AdminRegistration.php";
            </script>
       <?php
 }
 else{
	 echo"Failed";
 }
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AdminRegistration</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<table width="200" border="1">
  <tr>
    <td width="79">Name</td>
    <td width="105">
      <label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" />
  </td>
  </tr>
  <tr>
    <td>Email</td>
    <td>
      <label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" />
   </td>
  </tr>
  <tr>
    <td>Password</td>
    <td>
      <label for="txt_pwd"></label>
      <input type="text" name="txt_pwd" id="txt_pwd" />
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <div align="center">
        <input type="submit" name="txt_save" id="txt_save" value="save" />
        <input type="submit" name="txt_cancel" id="txt_cancel" value="cancel" />
      </div>
    <</td>
  </tr>
</table>
/form>
<p>&nbsp;</p>
<?php
$i=0;
$selqry='select * from tbl_admin';
$result=$conn->query($selqry);
if($result->num_rows>0)
{
?>
<table width="200" border="1">
  <tr>
    <td>SLNO</td>
    <td>NAME</td>
    <td>EMAIL</td>
    <td>PASSWORD</td>
    <td></td>
  </tr>
  <?php
  while($data=$result->fetch_assoc())
  {
	  $i++;
  ?>
  
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $data['admin_name']?></td>
      <td><?php echo $data['admin_email']?></td>
        <td><?php echo $data['admin_password']?></td>
    <td><a href="AdminRegistration.php?did=<?php echo $data['admin_id']?>">Delete</a></td>
  </tr>
  <?php
  }
  ?>
  </table>
  <?php
}
?>
<p>&nbsp;</p>
</body>
</html>
<?php
include("Footer.php");
?>