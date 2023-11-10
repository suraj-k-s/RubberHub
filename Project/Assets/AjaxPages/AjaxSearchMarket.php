<?php
include("../Connection/Connection.php");
        $selQry = "SELECT * FROM tbl_market where place_id =". $_GET['wid'] ;
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
                            <a href="ViewWorks.php?vid=<?php echo $row['market_id'] ?>" class="btn btn-primary">Request
                                </a>
                            <a href="ViewGallery.php?eid=<?php echo $row['market_id'] ?>"
                                class="btn btn-secondary">View More</a>
                        </div>
                    </div>
                </div>
            <?php
        }
        ?>