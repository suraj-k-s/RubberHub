<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ChangePassword</title>
</head>

<body>
<?php
session_start();
  include("../Assets/Connection/Connection.php");
  include("Header.php");
  if(isset($_POST["btn_change"]))
  {  
   $selqry="select * from tbl_user where user_id='".$_SESSION["uid"]."' and user_password='".$_POST['txt_current']."'";
   $row=$conn->query($selqry);
   $data=$row->fetch_assoc();
   $password=$data["user_password"];
  
   {
	   if($_POST["txt_new"]==$_POST["txt_confirm"])
	   {
		   $upquery="update tbl_user set user_password='".$_POST["txt_new"]."' where user_id='".$_SESSION["uid"]."'";
		   if($conn->query($upquery))
       {
        ?>
          <script>
            alert("Password Updated");
            </script>
        <?php
       }
	   }
   }
  }
  ?>
<form id="form1" name="form1" method="post" action="">
  <table width="400" border="1" cellpadding="10" align="center">
    <tr>
      <td width="122">Current Password</td>
      <td width="90"><label for="txt_current "></label>
      <input type="text" name="txt_current" id="txt_current " /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txt_new"></label>
      <input type="text" name="txt_new" id="txt_new" /></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txt_confirm"></label>
      <input type="text" name="txt_confirm" id="txt_confirm" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_change" id="btn_change" value="change" />  
        <input type="submit" name="btn_cancel" id="btn_cancel" value="cancel" />
      </div></td>
    </tr>
  </table>
</form>

</body>
</html>
<?php
include("Footer.php");
?>