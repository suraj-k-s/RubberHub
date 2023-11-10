<?php
session_start();

include("Header.php");
include("../Assets/Connection/Connection.php");
if (isset($_GET['aid'])) {
    $upAccept = "update tbl_requst set requst_status=1 where requst_id='" . $_GET['aid'] . "'";
    if ($conn->query($upAccept)) {
header('location:ViewRequest.php');
    } else {
        echo "Failed";
    }
}
if(isset($_GET['rid']))
{
  $upReject="update tbl_requst set requst_status=2 where requst_id='".$_GET['rid']."'";
  if($conn->query($upReject))
  {
    header('location:ViewRequest.php');
}
  else
  {
    echo "failed";
  }
}
if(isset($_GET['sid']))
{
  $upReject="update tbl_requst set requst_status=5 where requst_id='".$_GET['sid']."'";
  if($conn->query($upReject))
  {
    header('location:ViewRequest.php');
}
  else
  {
    echo "failed";
  }
}
if(isset($_GET['stid']))
{
  $upReject="update tbl_requst set requst_status=6 where requst_id='".$_GET['stid']."'";
  if($conn->query($upReject))
  {
    header('location:ViewRequest.php');
}
  else
  {
    echo "failed";
  }
}	
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <link rel="stylesheet" href="../Assets/Template/Form.css">
</head>
<body>
<div class="container col-md-6">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Sl.no</th>
                        <th>Date</th>
                        <th>Details</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Replay</th>
                        <th width="200">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $slqry = "select * from tbl_requst r inner join tbl_user u on r.user_id = u.user_id where r.worker_id = " . $_SESSION['wid'];
                    $i = 0;
                    $result = $conn->query($slqry);
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['requst_date']; ?></td>
                            <td><?php echo $row['requst_details']; ?></td>
                            <td><?php echo $row['user_name']; ?></td>
                            <td><?php echo $row['requst_amount']; ?></td>
                            <td><?php echo $row['requst_replay']; ?></td>
                            <td>
                            <?php
                            if ($row['requst_status'] == 0) {
                                ?>
                                <a href="ViewRequest.php?aid=<?php echo $row['requst_id'] ?>">Accept</a>
                                <a href="ViewRequest.php?rid=<?php echo $row['requst_id'] ?>">Reject</a>
                                <?php
                            }
                            if ($row['requst_status'] == 1) {
                                ?>
                                <a href="AddRequestData.php?aid=<?php echo $row['requst_id'] ?>">Reply</a>
                                <?php
                            }
                            if ($row['requst_status'] == 2) {
                                ?>
                                Rejected
                                <?php
                            }
                            if ($row['requst_status'] == 3) {
                                ?>
                                Waiting for Payment
                                <?php
                            }
                            if ($row['requst_status'] == 4) {
                                ?>
                                <a href="ViewRequest.php?sid=<?php echo $row['requst_id'] ?>">Start Work</a>
                                <?php
                            }
                            if ($row['requst_status'] == 5) {
                                ?>
                                <a href="ViewRequest.php?stid=<?php echo $row['requst_id'] ?>">Finish</a>
                                <?php
                            }
                            if ($row['requst_status'] == 6) {
                                ?>
                                Finished
                                <?php
                            }
                            ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
<?php
include("Footer.php")
    ?>