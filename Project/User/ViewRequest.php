<?php
session_start();

include("Header.php");
include("../Assets/Connection/Connection.php");
// echo $_SESSION['uid'];
// if (isset($_GET['aid'])) {
//     $upAccept = "update tbl_requst set requst_status=1 where requst_id='" . $_GET['aid'] . "'";
//     if ($conn->query($upAccept)) {
//         echo "Accepted";
//     } else {
//         echo "Failed";
//     }
// }
	
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<body>

<div class="container mt-5 col-md-6">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Sl.no</th>
                        <th>Date</th>
                        <th>Details</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Replay</th>
                        <th width="220">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $slqry = "select * from tbl_requst r inner join tbl_worker u on r.worker_id = u.worker_id where r.user_id = " . $_SESSION['uid'];
                    $i = 0;
                    $result = $conn->query($slqry);
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['requst_date']; ?></td>
                            <td><?php echo $row['requst_details']; ?></td>
                            <td><?php echo $row['worker_name']; ?></td>
                            <td><?php echo $row['requst_amount']; ?></td>
                            <td><?php echo $row['requst_replay']; ?></td>
                            <td>
                            <?php
                            if ($row['requst_status'] == 0) {
                                ?>
                                <span class="text-warning">Waiting...</span>
                                <?php
                            }
                            if ($row['requst_status'] == 1) {
                                ?>
                                <span class="text-success">Accepted</span>
                                <?php
                            }
                            if ($row['requst_status'] == 2) {
                                ?>
                                <span class="text-danger">Rejected</span>
                                <?php
                            }
                            if ($row['requst_status'] == 3) {
                                ?>
                                <span class="text-info">Replied</span>
                                <a href="Payment.php?sid=<?php echo $row['requst_id']; ?>" class="btn btn-primary btn-sm">Payment</a>
                                <?php
                            }
                            if ($row['requst_status'] == 4) {
                                ?>
                                <span class="text-success">Payment Completed</span>
                                <?php
                            }
                            if ($row['requst_status'] == 5) {
                                ?>
                                <span class="text-success">Work Started</span>
                                <?php
                            }
                            if ($row['requst_status'] == 6) {
                                ?>
                                <span class="text-success">Finished</span>/
                                <a href="Rating.php?pid=<?php echo $row['worker_id']; ?>">Review</a>
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