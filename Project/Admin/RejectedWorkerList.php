<?php
include("../Assets/Connection/Connection.php");
include("Header.php");
if(isset($_GET['aid']))
{ 
 $upAccept="update tbl_worker set worker_status=1 where worker_id='".$_GET['aid']."'";
 if($conn->query($upAccept))
 { 
	echo "Accepted";
 }
 else
 {
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

<table width="200" border="1" align="center" cellpadding="10">
  <tr>
  <td>Sl.no</td>
    <td>Name</td>
    <td>Contact</td>
    <td>Email</td>
     <td>Address</td>
     <td>Photo</td>
    <td>Proof</td>
    <td>Action</td>
  </tr>
  <?php
  $slqry="select * from tbl_worker where worker_status=2";
  $i=0;
  $result=$conn->query($slqry);
  while($row=$result->fetch_assoc())
  {
	  $i++;
  ?>
  
  <tr>
   <td>
   <?php
   echo $i;
   ?></td>
   <td>
   <?php
   echo $row['worker_name']
   ?>
   </td>
   <td>
   <?php
   echo $row['worker_contact']
   ?>
   </td>
   <td>
   <?php
   echo $row['worker_email']
   ?>
   </td>
   <td>
   <?php
   echo $row['worker_address']
   ?>
   </td>
   
   <td>
   <img src="../Assets/Files/workerPhoto/<?php echo $row['worker_photo'] ?>"  width="150" height="150"/>
   </td>
   <td>
   <img src="../Assets/Files/workerProof/<?php echo $row['worker_proof']?>"   width="150" height="100"/>  
   </td>
   
    <td>
      <a href="RejectedWorkerList.php?aid=<?php echo $row['worker_id']?>">Accept</a>
  </td>
  </tr>
  <?php
  }
  ?>
 </table>
</body>
</form>
</html>
<?php
include("Footer.php");
?>