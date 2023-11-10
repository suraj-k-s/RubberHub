<?php
session_start();

include("Header.php");
include("../Assets/Connection/Connection.php");
// if (isset($_GET['aid'])) {
//     $upAccept = "update tbl_requst set sale_status=1 where requst_id='" . $_GET['aid'] . "'";
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
                        <th>Reply</th>
                        <th width="260">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $slqry = "select * from tbl_productsale r inner join tbl_market u on r.market_id = u.market_id where r.user_id = " . $_SESSION['uid'];
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
                            <td><?php echo $row['market_name']; ?></td>
                            <td><?php echo $row['sale_amount']; ?></td>
                            <td><?php echo $row['sale_replay']; ?></td>
                            <td>
                                <?php
                                if ($row['sale_status'] == 0) {
                                    ?>
                                    <span class="text-warning">Waiting...</span>
                                    <?php
                                }
                                if ($row['sale_status'] == 1) {
                                    ?>
                                    <span class="text-success">Accepted</span>
                                    <?php
                                }
                                if ($row['sale_status'] == 2) {
                                    ?>
                                    <span class="text-danger">Rejected</span>
                                    <?php
                                }
                                if ($row['sale_status'] == 3) {
                                    ?>
                                    <span class="text-info">Replied</span>
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