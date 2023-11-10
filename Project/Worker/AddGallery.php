<?php
session_start();
ob_start();
include("Header.php");
include("../Assets/Connection/Connection.php");

// Handle deletion
if (isset($_POST['delete']) && isset($_POST['gallery_id'])) {
    $deleteQry = "DELETE FROM tbl_gallery WHERE gallery_id = " . $_POST['gallery_id'];
    if ($conn->query($deleteQry)) {
        $message = "Record deleted...";
    } else {
        $message = "Deletion failed...";
    }
}

// Handle form submission
if (isset($_POST["btnsave"])) {
    $photo = $_FILES["file_photo"]["name"];
    $temp1 = $_FILES["file_photo"]["tmp_name"];
    move_uploaded_file($temp1, "../Assets/Files/WorkerGallery/" . $photo);
    $insQry = "INSERT INTO tbl_gallery(gallery_image, worker_id) VALUES('" . $photo . "','" . $_SESSION['wid'] . "')";
    if ($conn->query($insQry)) {
        $message = "Record inserted...";
    } else {
        $message = "Insertion failed...";
    }
}

// Fetch data for display
$selectQry = "SELECT * FROM tbl_gallery WHERE worker_id = " . $_SESSION['wid'];
$result = $conn->query($selectQry);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Bootstrap Form</title>

    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="file">Work Image</label>
                        <input type="file" class="form-control" name="file_photo" id="file_photo" />
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary" name="btnsave" id="btnsave" value="Save" />
                        <input type="reset" class="btn btn-secondary" name="btncancel" id="btncancel" value="Cancel" />
                    </div>
                </div>
            </div>
        </form>

        <!-- Display inserted data -->
        <?php if ($result->num_rows > 0) : ?>
            <div class="row justify-content-center mt-5">
                <div class="col-md-8">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <td>
                                        <img src="../Assets/Files/WorkerGallery/<?php echo $row['gallery_image']; ?>" alt="Work Image" style="max-width: 100px; max-height: 100px;">
                                    </td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="gallery_id" value="<?php echo $row['gallery_id']; ?>">
                                            <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>

<?php
ob_end_flush();
include('Footer.php');
?>

</html>
