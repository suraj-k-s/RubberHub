<?php
include("../Assets/Connection/Connection.php");
include("Header.php");
if(isset($_POST['btn_submit']))
{
	$district=$_POST['txt_district'];
	$insQry="insert into tbl_district(district_name)values('".$district."')";
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
 $delqry="delete from tbl_district where district_id='".$_GET['did']."'";
 if($conn->query($delqry))
 {
	 ?>
			<script>
            alert("Deleted");
          window.location="district.php";
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
<title>District</title>
</head>
<body>
<form method="post">
<table width="200" border="1" align="center" cellpadding="10">
  <tr>
    <td>District</td>
    <td><label for="txt_district"></label>
    <input type="text" name="txt_district" id="txt_district" /></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
    </div></td>
  </tr>
</table> 
</form>
<?php
$i=0;
$selqry='select * from tbl_district';
$result=$conn->query($selqry);
if($result->num_rows>0)
{
?>
<br><br><br>
<table width="300" border="1" align="center" cellpadding="10">
  <tr>
    <td>SLNO</td>
    <td>District</td>
    <td>Action</td>
  </tr>
  <?php
  while($data=$result->fetch_assoc())
  {
	  $i++;
  ?>
  
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $data['district_name']?></td>
    <td><a href="District.php?did=<?php echo $data['district_id']?>">Delete</a></td>
  </tr>
  <?php
  }
  ?>
  </table>
  <?php
}
?>
</body>
</form>
</html>
<?php
include("Footer.php");
?>