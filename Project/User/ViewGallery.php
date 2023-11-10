<?php

include("../Assets/Connection/Connection.php");
session_start();
ob_start();
include("Header.php");
?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
    
</head>

<body>

<div class="container">
  <div class="row">
    <?php
    $photoid = $_GET['eid'];
    $selQry = "select * from  tbl_gallery where worker_id = " . $photoid;
    $res = $conn->query($selQry);
    while ($row = $res->fetch_assoc()) {
      ?>
      <div class="col-12 col-sm-6 col-lg-4 mb-4">
        <div class="card">
          <img src="../Assets/Files/WorkerGallery/<?php echo $row['gallery_image']; ?>" class="card-img-top" alt="">
          <!-- <div class="card-body">
          </div> -->
        </div>
      </div>
      <?php
    }
    ?>
  </div>
</div>
</body>
<?php
ob_end_flush();
include('Footer.php');
?>

</html>