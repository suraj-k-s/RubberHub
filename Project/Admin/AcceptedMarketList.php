<?php
include("../Assets/Connection/Connection.php");
include("Header.php");
if (isset($_GET['aid'])) {
  $upAccept = "update tbl_market set market_status=1 where market_id='" . $_GET['aid'] . "'";
  if ($conn->query($upAccept)) {
    echo "Accepted";
  } else {
    echo "Failed";
  }
}
if (isset($_GET['rid'])) {
  $upReject = "update tbl_market set market_status=2 where market_id='" . $_GET['rid'] . "'";
  if ($conn->query($upReject)) {
    echo "Rejected";
  } else {
    echo "failed";
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>District</title>
</head>

<body>

  <table width="200" border="1" align="center" cellpadding="10">
    <tr>
      <td>Sl.no</td>
      <td>Name</td>
      <td>Contact</td>
      <td>Email</td>
      <td>Place</td>
      <td>Address</td>
      <td>Photo</td>
      <td>Proof</td>
      <td>Action</td>
    </tr>
    <?php
    $slqry = "select * from tbl_market m inner join tbl_place p on p.place_id=m.place_id where market_status=1";
    $i = 0;
    $result = $conn->query($slqry);
    while ($row = $result->fetch_assoc()) {
      $i++;
    ?>

      <tr>
        <td>
          <?php
          echo $i;
          ?></td>
        <td>
          <?php
          echo $row['market_name']
          ?>
        </td>
        <td>
          <?php
          echo $row['market_contact']
          ?>
        </td>
        <td>
          <?php
          echo $row['market_email']
          ?>
        </td>
        <td>
          <?php
          echo $row['place_name']
          ?>
        </td>
        <td>
          <?php
          echo $row['market_address']
          ?>
        </td>

        <td>
          <img src="../Assets/Files/MarketPhoto/<?php echo $row['market_image'] ?>" alt="<?php echo $row['market_image'] ?>" width="120" height="120" />
        </td>
        <td>
          <img src="../Assets/Files/MarketProof/<?php echo $row['market_proof'] ?>" alt="<?php echo $row['market_proof'] ?>" width="120" height="120" />

        </td>
        <td>
          <a href="NewMarketList.php?rid=<?php echo $row['market_id'] ?>">Reject</a>
        </td>
      </tr>
    <?php
    }
    ?>
  </table>
</body>
</form>

</html>
<?php
include("Footer.php");
?>