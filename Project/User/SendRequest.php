<?php
session_start();

include("Header.php");
include("../Assets/Connection/Connection.php");
if (isset($_POST['btn_submit'])) {
    
    $requst_date = $_POST['requst_date'];
    $requst_details = $_POST['requst_details'];

    $insertQuery = "INSERT INTO tbl_requst (requst_date, requst_details, worker_id, user_id) VALUES ('$requst_date', '$requst_details','".$_GET['vid']."','".$_SESSION['uid']."')";

    if ($conn->query($insertQuery)) {
        echo "Request inserted successfully!";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
  .container-box {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Customize the shadow values as needed */
    padding: 20px; /* Optional: Add padding to create some space between the shadow and content */
  }
</style>
</head>
<body>


<div class="container col-md-6 container-box">    
        <h2 class="text-center">Request Form</h2>
        <form method="post">
            <div class="mb-3">
                <label for="requst_date" class="form-label">Date</label>
                <input type="date" class="form-control" name="requst_date" required />
            </div>
            <div class="mb-3">
                <label for="requst_details" class="form-label">Details</label>
                <textarea class="form-control" name="requst_details" id="requst_details" rows="5"></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="btn_submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
<?php
include("Footer.php");
?>



