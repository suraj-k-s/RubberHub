<?php
include("../Assets/Connection/Connection.php");
include("Header.php");
if(isset($_POST['btn_submit']))
{
	$rate=$_POST['txt_rate'];
	$low=$_POST['txt_low'];
	$high=$_POST['txt_high'];
	$date=$_POST['txt_date'];

    $insQry="insert into tbl_rate(rate_date,rate_amount,rate_low,rate_high) values('".$date."','".$rate."','".$low."','".$high."')";
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
 $delqry="delete from tbl_rate where rate_id='".$_GET['did']."'";
 if($conn->query($delqry))
 {
	 ?>
			<script>
            alert("Deleted");
          window.location="Rate.php";
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
<title>rate</title>
</head>
<body>
<form method="post">
<table width="200" border="1" align="center" cellpadding="10">
  <tr>
    <td>Date</td>
    <td><label for="txt_date"></label>
    <input type="date" name="txt_date" id="txt_date" /></td>
  </tr>
  <tr>
    <td>Low</td>
    <td><label for="txt_low"></label>
    <input type="text" name="txt_low" id="txt_low" /></td>
  </tr>
  <tr>
    <td>High</td>
    <td><label for="txt_high"></label>
    <input type="text" name="txt_high" id="txt_high" /></td>
  </tr>
  <tr>
    <td>Rate</td>
    <td><label for="txt_rate"></label>
    <input type="text" name="txt_rate" id="txt_rate" /></td>
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
$selqry='select * from tbl_rate';
$result=$conn->query($selqry);
if($result->num_rows>0)
{
?>
<br><br><br>
<table width="300" border="1" align="center" cellpadding="10">
  <tr>
    <td>SLNO</td>
    <td>Date</td>
    <td>Low</td>
    <td>Hight</td>
    <td>Rate</td>
    <td>Action</td>
  </tr>
  <?php
  while($data=$result->fetch_assoc())
  {
	  $i++;
  ?>
  
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $data['rate_date']?></td>
    <td><?php echo $data['rate_low']?></td>
    <td><?php echo $data['rate_high']?></td>
    <td><?php echo $data['rate_amount']?></td>

    <td><a href="Rate.php?did=<?php echo $data['rate_id']?>">Delete</a></td>
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