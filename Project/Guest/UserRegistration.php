<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User</title>
</head>
<?php
include("../Assets/Connection/Connection.php");
include("Header.php");
if(isset($_POST['btn_submit']))
{
	$Name=$_POST['txt_name'];
	$Contact=$_POST['txt_contact'];
	$Email=$_POST['txt_email'];
	$Address=$_POST['txt_address'];
	
	$Photo=$_FILES['file_image']['name'];
	$pathphoto=$_FILES['file_image']['tmp_name'];
	move_uploaded_file($pathphoto,"../Assets/Files/UserPhoto/".$Photo);
	
	$Proof=$_FILES['file_proof']['name'];
	$pathproof=$_FILES['file_proof']['tmp_name'];
	move_uploaded_file($pathproof,"../Assets/Files/UserProof/".$Proof);
	
	$Password=$_POST['txt_pass'];
	$District=$_POST['txt_district'];
	$Place=$_POST['txt_place'];

	$insQry="insert into tbl_user(user_name,user_contact,user_email,user_address,user_photo,user_proof,user_password,place_id)values('".$Name."','".$Contact."','".$Email."','".$Address."','".$Photo."','".$Proof."','".$Password."','".$Place."')";
	if($conn->query($insQry))
	{
	   ?>
       <script>
	   alert("inserted");
	   window.location="UserRegistration.php";
	   </script>
	   <?php
	   
	}
	
}
?>
<body> 
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
<h2 align="center">User Registration</h2>
<table >
  <tr>
    <td>Name</td>
    <td><label for="txt_name"></label>
    <input required type="text" name="txt_name" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/>
  </tr>
  <tr>
    <td>Contact</td>
    <td><label for="txt_contact"></label>
    <input type="text" required name="txt_contact" pattern="[6-9]{1}[0-9]{9}" 
                title="Phone number with 6-9 and remaing 9 digit with 0-9"/>
  </tr>
  <tr>
    <td>Email</td>
    <td><label for="txt_email"></label>
    <input type="email" name="txt_email" id="txt_email" required="required" /></td>
  </tr>
  <tr>
    <td>Photo</td>
    <td><label for="file_image"></label>
    <input type="file" name="file_image" id="file_image" required="required" /></td>
  </tr>
  <tr>
    <td>Proof</td>
    <td><label for="file_proof"></label>
    <input type="file" name="file_proof" id="file_proof" required="required" /></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><label for="txt_address"></label>
    <textarea name="txt_address" id="txt_address" cols="45" rows="5" required="required"></textarea></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><label for="txt_password"></label>
    <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="txt_pass" />
  </tr>
  <tr>
    <td>District</td>
    <td><label for="txt_district"></label>
      <select name="txt_district" required id="txt_district" onchange="getPlace(this.value)">
         <option value="">Select District</option>
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
  
    </select></td>
  </tr>
  <tr>
    <td>Place</td>
    <td><label for="txt_place"></label>
      <select name="txt_place"  required id="place_id">
      <option value="">---SELECT---</option>
      <?php
      $selqry='select * from tbl_place';
$result=$conn->query($selqry);
 while($data=$result->fetch_assoc())
  {
	  
	  ?>
      
      <option value="<?php echo $data['place_id']?>"><?php echo $data['place_name']?></option>
      
      <?php
  }
  ?>
    </select></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="submit" />
    </div></td>
  </tr>
</table>
</form>
</body>
</html>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{

	$.ajax({
	  url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
	  success: function(html){
		$("#place_id").html(html);
	  }
	});
}
</script>
<?php
include("Footer.php");
?>