<!--Asanka -->
<?php
session_start();
error_reporting(0);
include ('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    ?>
    <?php
    include ('includes/header.php'); ?>

    <div class="container-fluid py-4">

        <div class="row min-vh-80 h-100">
            <div class="col-12">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">weekend</i>
                                </div>

                                <?php
                                $sql = "SELECT id from tblusers ";
                                $query = $dbh->prepare($sql);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                $regusers = $query->rowCount();
                                ?>

                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Reg Users</p>
                                    <h4 class="mb-0">
                                        <?php echo htmlentities($regusers); ?>
                                    </h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">View Details <a
                                            href="reg-users.php" <i class="fa fa-arrow-right"></i></a> </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">person</i>
                                </div>
                                <?php
                                $sql1 = "SELECT id from tblvehicles ";
                                $query1 = $dbh->prepare($sql1);
                                ;
                                $query1->execute();
                                $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                                $totalvehicle = $query1->rowCount();
                                ?>


                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize"> Total Vehicles</p>
                                    <h4 class="mb-0">
                                        <?php echo htmlentities($totalvehicle); ?>
                                    </h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">View Details <a
                                            href="manage-vehicles.php" <i class="fa fa-arrow-right"></i></a> </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">person</i>
                                </div>

                                <?php
                                $sql2 = "SELECT id from tblbooking ";
                                $query2 = $dbh->prepare($sql2);
                                $query2->execute();
                                $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
                                $bookings = $query2->rowCount();
                                ?>
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Total Bookings</p>
                                    <h4 class="mb-0">
                                        <?php echo htmlentities($bookings); ?>
                                    </h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">View Details <a
                                            href="manage-bookings.php" <i class="fa fa-arrow-right"></i></a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">weekend</i>
                                </div>


                                <?php
                                $sql3 = "SELECT id from tblbrands ";
                                $query3 = $dbh->prepare($sql3);
                                $query3->execute();
                                $results3 = $query3->fetchAll(PDO::FETCH_OBJ);
                                $brands = $query3->rowCount();
                                ?>
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Listed Brand</p>
                                    <h4 class="mb-0">
                                        <?php echo htmlentities($brands); ?>
                                    </h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">View Details <a
                                            href="manage-brands.php" <i class="fa fa-arrow-right"></i></a></span>
                                </p>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<?php include ('includes/footer.php'); ?>