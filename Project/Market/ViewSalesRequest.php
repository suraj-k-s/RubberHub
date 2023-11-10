<?php
session_start();

include("Header.php");
include("../Assets/Connection/Connection.php");
if (isset($_GET['aid'])) {
    $upAccept = "update tbl_productsale set sale_status=1 where sale_id='" . $_GET['aid'] . "'";
    if ($conn->query($upAccept)) {
        header('location:ViewSalesRequest.php');
    } else {
        // echo "Failed";
    }
}
if(isset($_GET['rid']))
{
  $upReject="update tbl_productsale set sale_status=2 where sale_id='".$_GET['rid']."'";
  if($conn->query($upReject))
  {
    header('location:ViewSalesRequest.php');
}
  else
  {
    // echo "failed";
  }
}	

?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<body>

<div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Sl.no</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Details</th>
                        <th>Qty</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Replay</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $slqry = "select * from tbl_productsale r inner join tbl_user u on r.user_id = u.user_id where r.market_id = " . $_SESSION['mid'];
                    $i = 0;
                    $result = $conn->query($slqry);
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['sale_date']; ?></td>
                            <td><?php echo $row['sale_type']; ?></td>
                            <td><?php echo $row['sale_details']; ?></td>
                            <td><?php echo $row['sale_qty']; ?></td>
                            <td><?php echo $row['user_name']; ?></td>
                            <td><?php echo $row['sale_amount']; ?></td>
                            <td><?php echo $row['sale_replay']; ?></td>
                            <td>
                                <?php
                                if ($row['sale_status'] == 0) {
                                    ?>
                                    <a href="ViewSalesRequest.php?aid=<?php echo $row['sale_id']; ?>">Accept</a>
                                    <a href="ViewSalesRequest.php?rid=<?php echo $row['sale_id']; ?>">Reject</a>
                                    <?php
                                }
                                if ($row['sale_status'] == 1) {
                                    ?>
                                    <a href="AddRequestData.php?aid=<?php echo $row['sale_id']; ?>">Reply</a>
                                    <?php
                                }
                                if ($row['sale_status'] == 2) {
                                    ?>
                                    Rejected
                                    <?php
                                }
                                if ($row['sale_status'] == 3) {
                                    ?>
                                    Replied
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