<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Worker</title>
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
	$District=$_POST['txt_district'];
	$Place=$_POST['txt_place'];
	$Password=$_POST['txt_pass'];
	
	$Photo=$_FILES['file_image']["name"];
	$photopath=$_FILES['file_image']["tmp_name"];
	move_uploaded_file($photopath,"../Assets/Files/WorkerPhoto/".$Photo);
	
	$Proof=$_FILES['file_proof']["name"];
	$proofpath=$_FILES['file_proof']["tmp_name"];
	move_uploaded_file($proofpath,"../Assets/Files/WorkerProof/".$Proof);
	
	$insQry="insert into tbl_worker(worker_name,worker_contact,worker_email,worker_address,worker_photo,worker_proof,worker_password,place_id)values('".$Name."','".$Contact."','".$Email."','".$Address."','".$Photo."','".$Proof."','".$Password."','".$Place."')";
	if($conn->query($insQry))
	     {
				
	

	   ?>
       <script>
	   					alert("inserted");
	   					window.location="WorkerRegistration.php";
	   </script>
       
	   <?php
		}
	
	  else
		{
	?>
       <script>
	   				alert("not inserted");
	   </script>
	   <?php
		}
}
?>

<body>
<form method="post" enctype="multipart/form-data">
  <h2 align="center">Worker Registration</h2>
<table >
  <tr>
    <td width="71">Name</td>
    <td width="113">
      <label for="txt_name"></label>
      <input required type="text" name="txt_name" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/>
    </td>
    </td>
  </tr>
  <tr>
    <td>Contact</td>
    <td>
      <label for="txt_contact"></label>
     <input type="text" required name="txt_contact" pattern="[6-9]{1}[0-9]{9}" 
                title="Phone number with 6-9 and remaing 9 digit with 0-9"/>
     </td>
  </tr>
  <tr>
    <td>Email</td>
    <td>
      <label for="txt_email"></label>
      <input type="email" required name="txt_email" />
    </td>
  </tr>
  <tr>
    <td>Address</td>
    <td>
      <label for="txt_address"></label>
     <textarea name="txt_address" required></textarea>
   </td>
  </tr>
  <tr>
    <td>District</td>
    <td>
      <label for="txt_district"></label>
      <select name="txt_district" required id="txt_district" onchange="getPlace(this.value)" >
       <option value="">---SELECT---</option>
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
    <td>
      <label for="txt_place"></label>
      <select name="txt_place" id="txt_place" required>
       <option value="">---SELECT---</option>
      </select>
   </td>
  </tr>
  <tr>
    <td>Password</td>
    <td>
      <label for="txt_password"></label>
     <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="txt_pass" />
    </td>
  </tr>
  <tr>
    <td>Photo</td>
    <td>
      <label for="file_image"></label>
      <input type="file" name="file_image" id="file_image"required="required"  />
    </td>
  </tr>
  <tr>
    <td>Proof</td>
    <td>
      <label for="file_proof"></label>
      <input type="file" name="file_proof" id="file_proof" required="required" />
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="submit" name="btn_cancel" id="btn_cancel" value="cancel"  required="required" />
      </div>
    </td>
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
		$("#txt_place").html(html);
	  }
	});
}
</script>
<?php
include("Footer.php");
?>