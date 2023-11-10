<?php
include("../Assets/Connection/Connection.php");
include("Header.php");
if (isset($_GET['aid'])) {
  $upAccept = "update tbl_user set user_status=1 where user_id='" . $_GET['aid'] . "'";
  if ($conn->query($upAccept)) {
    echo "Accepted";
  } else {
    echo "Failed";
  }
}
if (isset($_GET['rid'])) {
  $upReject = "update tbl_user set user_status=2 where user_id='" . $_GET['rid'] . "'";
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
    $slqry = "select * from tbl_user m inner join tbl_place p on p.place_id=m.place_id where user_status=2";
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
          echo $row['user_name']
          ?>
        </td>
        <td>
          <?php
          echo $row['user_contact']
          ?>
        </td>
        <td>
          <?php
          echo $row['user_email']
          ?>
        </td>
        <td>
          <?php
          echo $row['user_name']
          ?>
        </td>
        <td>
          <?php
          echo $row['user_address']
          ?>
        </td>

        <td>
          <img src="../Assets/Files/userPhoto/<?php echo $row['user_photo'] ?>" alt="<?php echo $row['user_photo'] ?>" width="120" height="120" />
        </td>
        <td>
          <img src="../Assets/Files/userProof/<?php echo $row['user_proof'] ?>" alt="<?php echo $row['user_proof'] ?>" width="120" height="120" />

        </td>
        <td>
          <a href="NewuserList.php?aid=<?php echo $row['user_id'] ?>">Accept</a>
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