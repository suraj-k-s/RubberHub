<?php
session_start();

include("Header.php");
include("../Assets/Connection/Connection.php");
if (isset($_POST['btn_submit'])) {
    
    $requst_type = $_POST['request_type'];
    $requst_details = $_POST['requst_details'];
    $requst_qty = $_POST['requst_qty'];

    $insertQuery = "INSERT INTO tbl_productsale (sale_date, sale_details, market_id, user_id,sale_qty,sale_type) VALUES (curdate(), '$requst_details','".$_GET['vid']."','".$_SESSION['uid']."','$requst_qty','$requst_type')";

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
                <label for="requst_date" class="form-label">Type</label>
                <select name="request_type" class="form-control" required>
                    <option value="">----Select----</option>
                    <option value="Rubber Sheet">Rubber Sheet</option>
                    <option value="Waste Material">Waste Material</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="requst_details" class="form-label">Details</label>
                <textarea class="form-control" name="requst_details" id="requst_details" rows="5"></textarea>
            </div>
            <div class="mb-3">
                <label for="requst_qty" class="form-label">Qty</label>
                <input type="number" class="form-control" name="requst_qty" required />
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



