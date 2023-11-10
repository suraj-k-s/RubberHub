<?php
include("../Connection/Connection.php");
        $selQry = "SELECT * FROM tbl_worker where place_id =". $_GET['wid'] ;
        $res = $conn->query($selQry);

        while ($row = $res->fetch_assoc()) {
            ?>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;padding: 20px; margin-bottom: 30px; ">
                    <!-- You should replace this with the appropriate path to worker photos -->
                    <img src="../Assets/Files/WorkerPhoto/<?php echo $row['worker_photo']; ?>" class="card-img-top"
                        alt="Worker Photo">

                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $row['worker_name']; ?>
                        </h5>
                        <p class="card-text">
                            <?php echo $row['worker_email']; ?>
                        </p>
                        <p class="card-text">
                            <?php echo $row['worker_contact']; ?>
                        </p>
                        <p class="card-text">
                            <?php echo $row['worker_address']; ?>
                        </p>
                        <p class="card-text">
                            <?php echo $row['worker_status']; ?>
                        </p>
                        <a href="SendRequest.php?vid=<?php echo $row['worker_id'] ?>" class="btn btn-primary">Book
                                Works</a>
                            <a href="ViewGallery.php?eid=<?php echo $row['worker_id'] ?>"
                                class="btn btn-secondary">Gallery</a></div>
                </div>
            </div>
            <?php
        }
        ?>