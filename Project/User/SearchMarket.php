<?php
include("Header.php");
include("../Assets/Connection/Connection.php");
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <!-- Include Bootstrap CSS -->
</head>

<body>
    <div class="container">
        <div class="row justify-content-end ml-3">
            <div class="col-4">
                <div class="form-group">
                    <label for="sel_district">District</label>
                    <select class="form-control" name="sel_district" id="sel_district" onchange="getPlace(this.value)">
                        <option value="">---select---</option>
                        <?php
                        $selqry = "select * from tbl_district";
                        $res = $conn->query($selqry);
                        while ($row = $res->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $row["district_id"] ?>">
                                <?php echo $row["district_name"] ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="sel_place">Place</label>
                    <select class="form-control" name="txt_place" id="txt_place" onchange="Getmarket(this.value)">
                        <option value="">---select---</option>
                    </select>
                </div>
            </div>
        </div>
        <br><br><br><br><br>
        <div class="row" id="result">
            <!-- market List Area -->
            <?php
            $selQry = "SELECT * FROM tbl_market ";
            $res = $conn->query($selQry);

            while ($row = $res->fetch_assoc()) {
                ?>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;padding: 20px; margin-bottom: 30px;">
                        <!-- You should replace this with the appropriate path to market photos -->
                        <img src="../Assets/Files/MarketPhoto/<?php echo $row['market_image']; ?>" class="card-img-top"  alt="market Photo" style="width: 300px;height: 250px;">

                        <div class="card-body" style="width: 300px;height: 200px;">
                            <h5 class="card-title">
                                <?php echo $row['market_name']; ?>
                            </h5>
                            <p class="card-text">
                                <?php echo $row['market_email']; ?>
                            </p>
                            <p class="card-text">
                                <?php echo $row['market_contact']; ?>
                            </p>
                            <p class="card-text">
                                <?php echo $row['market_address']; ?>
                            </p>
                            <p class="card-text">
                                <?php echo $row['market_status']; ?>
                            </p>
                            <a href="SendSalesRequest.php?vid=<?php echo $row['market_id'] ?>" class="btn btn-primary">Request
                                </a>
                            <a href="ViewGallery.php?eid=<?php echo $row['market_id'] ?>"
                                class="btn btn-secondary">View More</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>

</html>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
    function getPlace(did) {

        $.ajax({
            url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
            success: function (html) {
                $("#txt_place").html(html);
            }
        });
    }
    function Getmarket(wid) {

        $.ajax({
            url: "../Assets/AjaxPages/AjaxSearchMarket.php?wid=" + wid,
            success: function (html) {
                $("#result").html(html);
            }
        });
    }
</script>
<?php
include("Footer.php");
?>