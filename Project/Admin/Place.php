<?php
include("../Assets/Connection/Connection.php");
include("Header.php");
if(isset($_POST['btn_submit']))
{
	$district=$_POST['txt_district'];
	$place=$_POST['txt_place'];
	$insQry="insert into tbl_Place(Place_name,district_id)values('".$place."','".$district."')";
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
 $delqry="delete from tbl_place where place_id=".$_GET['did'];
 if($conn->query($delqry))
 {
	 ?>
			<script>
            alert("Deleted");
          window.location="Place.php";
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
<title>Place</title>
</head>

<body>
<form method="post">
<table width="200" border="1" align="center" cellpadding="10">
  <tr>
    <td>District</td>
    <td><label for="txt_district"></label>
      <select name="txt_district" id="txt_district">
      <option value="">Select</option>
      <?php

$selqry='select * from tbl_district';
$result=$conn->query($selqry);
 while($data=$result->fetch_assoc())
  {
	  
	  ?>
      
      <option value="<?php echo $data['district_id']?>"><?php echo $data['district_name']?></option>
      
      <?php
  }
  ?>
  
  
    </select>
    
    
    
    
    
    </td>
  </tr>


  <tr>
    <td>Place</td>
    <td><label for="txt_place"></label>
    <input type="text" name="txt_place" id="txt_place" /></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
    </div></td>
  </tr>
</table>
</form>
<br><br><br>
<table width="400" border="1" align="center" cellpadding="10">
  <tr>
    <td>SLNO</td>
    
    <td>Place</td>
    <td>District</td>
    <td>Action</td>
  </tr>
  <?php
$i=0;
$selqry="select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
$result=$conn->query($selqry);
 while($data=$result->fetch_assoc())
  {
	   $i++;
   ?>
  
  <tr>
    <td><?php echo $i ?>
    </td>
    <td><?php echo $data['place_name']?></td>
    <td><?php echo $data['district_name']?></td>
    <td><a href="Place.php?did=<?php echo $data['place_id']?>">delect</a></td>
  </tr>
  <?php
  }
   ?>
   </table>
 
</body>
</html>
<?php
include("Footer.php");
?>