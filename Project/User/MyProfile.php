<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My profile</title>
</head>

<body>
<?php
  session_start();
  include("../Assets/Connection/Connection.php");
  include("Header.php");
   $selqry="select * from tbl_user where user_id='".$_SESSION["uid"]."'";
   $row=$conn->query($selqry);
   $data=$row->fetch_assoc();
  
 ?>
<br><br><br><br><br>
<form method="post">
  <table  border="1"  cellpadding="10" align="center">
  <tr>
      <td colspan="2" align="center">
        <img src="../Assets/Files/UserPhoto/<?php echo $data["user_photo"]?>" width="120" height="120"/>
      </td>
    </tr>
    <tr>
      <td>Name</td>
      <td><?php echo $data["user_name"]?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data["user_contact"]?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data["user_email"]?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $data["user_address"]?></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><a href="EditProfile.php">Edit Profile</a>&nbsp;&nbsp;&nbsp;<a href="ChangePassword.php">Change Password</a></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
include("Footer.php");
?>