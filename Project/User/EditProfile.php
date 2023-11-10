<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EditProfile</title>
</head>
<body>
<?php
session_start();
  include("../Assets/Connection/Connection.php");
  include("Header.php");
  if(isset($_POST["btn_submit"]))
  {  
     $upquery="update tbl_user set user_name='".$_POST["txt_name"]."',user_contact='".$_POST["txt_contact"]."',user_email='".$_POST["txt_email"]."'where user_id='".$_SEESSION["uid"]."'";
	 $conn->query($upquery);
	 header("location:MyProfile.php");
  }
  
  
   $selqry="select * from tbl_user where user_id='".$_SESSION["uid"]."'";
   $row=$conn->query($selqry);
   $data=$row->fetch_assoc();
   ?>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1"  cellpadding="10" align="center">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" value="<?php echo $data["user_name"]?>"></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact"value="<?php echo $data["user_contact"]?>"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" value="<?php echo $data["user_email"]?>"></td>
    </tr>
	 <tr>
    <td colspan="2">
      <div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="submit" name="btn_cancel" id="btn_cancel" value="cancel" />
      </div>
    </td>
  </tr>
  </table>
  </form>
  </body>
  </html>
  <?php
include("Footer.php");
?>