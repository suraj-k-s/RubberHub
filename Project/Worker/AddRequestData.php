<?php
session_start();

include("Header.php");
include("../Assets/Connection/Connection.php");
if (isset($_POST['btn_submit'])) {
    
    $requst_amount = $_POST['requst_amount'];
    $requst_reply = $_POST['requst_Reply'];

    $updateQuery = "update tbl_requst set requst_amount =$requst_amount,requst_replay='$requst_reply',requst_status=3 where requst_id = ".$_GET['aid'];

    if ($conn->query($updateQuery)) {
        header('location:ViewRequest.php');

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
                <label for="requst_amount" class="form-label">Amount</label>
                <input type="text" class="form-control" name="requst_amount" required />
            </div>
            <div class="mb-3">
                <label for="requst_details" class="form-label">Reply</label>
                <textarea class="form-control" name="requst_Reply" id="requst_Reply" rows="5"></textarea>
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



