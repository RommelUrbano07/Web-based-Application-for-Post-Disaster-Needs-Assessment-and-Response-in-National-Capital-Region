<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Area | Dashboard</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-light" style="background-color:#56baed;"></nav>
        <?php
        include '../_COMMANDS/SummaryReport.php';
        $SummaryReport = new SummaryReport();
        ?>
        <header id="header">
            <div class="container">
                <div class="row">
                    <h1>Summary Report</h1>
                </div>
            </div>
        </header>
        <section id="main">
            <div class="container">
                <div class="row">

                    <div class="panel panel-default">
                        <div class="panel-heading main-color-bg">
                        </div>
                        <div class="panel-body">
                            <div class="col-md-3">
                                <div class="well dash-box">
                                    <h2><span class="glyphicon glyphicon-Alert-triangle-box" aria-hidden="true"></span> 
                                        <?php
                                        #No of Disasters
                                        $NoOfDisasters = $SummaryReport->NoOfDisasters();
                                        echo $NoOfDisasters;
                                        ?></h2>
                                    <h4>No. Of Disasters</h4>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="well dash-box">
                                    <h2><span class="glyphicon glyphicon-eye" aria-hidden="true"></span> 
                                        <?php
                                        #Regions Affected
                                        $RegionAffected = new ArrayObject();
                                        $result = $SummaryReport->RegionsAffected();
                                        if ($result !=null) {
                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                $RegionAffected->append($rows["region"]);
                                            }
                                            #getting per value in ArrayObject
                                            for ($i = 0; $i < $RegionAffected->count(); $i++) {
                                                $RegionAffected->offsetGet($i);
                                            }
                                            echo $RegionAffected->count();
                                        } else {
                                            echo 0;
                                        }
                                        ?>
                                    </h2>
                                    <h4>Regions Affected</h4>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="well dash-box">
                                    <h2><span class="glyphicon glyphicon-compass" aria-hidden="true"></span> 
                                        <?php
                                        #Cities Affected
                                        $CitiesAffected = new ArrayObject();
                                        $result = $SummaryReport->CitiesAffected();
                                        if ($result != null) {
                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                $CitiesAffected->append($rows["City"]);
                                            }
                                            #getting per value in ArrayObject
                                            for ($i = 0; $i < $CitiesAffected->count(); $i++) {
                                                $CitiesAffected->offsetGet($i);
                                            }
                                            echo $CitiesAffected->count();
                                        } else {
                                            echo 0;
                                        }
                                        ?></h2>
                                    <h4>Cities Affected</h4>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="well dash-box">
                                    <h2><span class="glyphicon glyphicon-building" aria-hidden="true"></span> 
                                        <?php
                                        #Barangay Affected
                                        $BarangayAffected = new ArrayObject();
                                        $result = $SummaryReport->BarangayAffected();
                                        if ($result != null) {
                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                $BarangayAffected->append($rows["BarangayName"]);
                                            }
                                            #getting per value in ArrayObject
                                            for ($i = 0; $i < $BarangayAffected->count(); $i++) {
                                                $BarangayAffected->offsetGet($i);
                                            }
                                            echo $BarangayAffected->count();
                                        } else {
                                            echo 0;
                                        }
                                        ?>
                                    </h2>
                                    <h4>Barangays Affected</h4>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="well dash-box">
                                    <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 
                                        <?php
                                        #Needs Per Quantity
                                        $NeedsType = new ArrayObject();
                                        $NeedsQuantity = new ArrayObject();
                                        $result = $SummaryReport->NeedsPerQuantity();
                                        if ($result != null) {
                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                $NeedsType->append($rows["needs"]);
                                                $NeedsQuantity->append($rows["sum"]);
                                            }

#                                       #getting per value in ArrayObject
                                            for ($i = 0; $i < $NeedsType->count(); $i++) {
                                                echo $NeedsType->offsetGet($i) . ":" . $NeedsQuantity->offsetGet($i).'<br>';
                                            }
                                        } else {
                                            echo 0;
                                        }
                                        ?>
                                    </h2>
                                    <h4>Needs Per Quantity</h4>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="well dash-box">
                                    <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 
                                        <?php
                                        #No of Vicitims
                                        $NoOfDisasters = (int) $SummaryReport->NoOfVictims();
                                        echo $NoOfDisasters;
                                        ?>
                                    </h2>
                                    <h4>No. Of Victims</h4>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="well dash-box">
                                    <h2><span class="glyphicon glyphicon-house fill" aria-hidden="true"></span> 
                                        <?php
                                        #No of Families
                                        $NoOfDisasters =$SummaryReport->NoOfFamiliesAffected();
                                        echo $NoOfDisasters;
                                        ?>
                                    </h2>
                                    <h4>No Of Families</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:#56baed;">
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>Disaster Type</th>
                                    <th>Disaster Date Reported</th>
                                    <th>Regions Affected</th>
                                    <th>Cities Affected</th>
                                    <th>Barangays Affected</th>
                                    <th>Needs Per Quantity</th>
                                    <th>No. Of Victims</th>
                                    <th>No. Of Families</th>
                                </tr>
                                <?php
                                $DisasterID = new ArrayObject();
                                $result = $SummaryReport->getDisasterID();
                                if ($result != null ) {
                                    while ($rows = mysqli_fetch_assoc($result)) {
                                        $DisasterID->append($rows["DisasterID"]);
                                    }
                                    for ($i = 0; $i < $DisasterID->count(); $i++) {
                                        ?>
                                        <tr>
                                            <th><?php echo  $SummaryReport->getDisasterType($DisasterID->offsetGet($i)); ?></th>
                                            <th><?php echo  $SummaryReport->getDisasterDate($DisasterID->offsetGet($i)); ?></th>
                                            <?php
                                            #Regions Affected
                                            $RegionAffected = new ArrayObject();
                                            $result = $SummaryReport->RegionsAffectedOnDisaster($DisasterID->offsetGet($i));
                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                $RegionAffected->append($rows["RegionName"]);
                                            }

                                            #getting per value in ArrayObject
                                            for ($j = 0; $j < $RegionAffected->count(); $j++) {
                                                ?>
                                                <th><?php echo $RegionAffected->offsetGet($j); ?></th>

                                                <?php
                                            }
                                            #Cities Affected
                                            $CitiesAffected = new ArrayObject();
                                            $result = $SummaryReport->CitiesAffected($DisasterID->offsetGet($i));
                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                $CitiesAffected->append($rows["City"].='<br>');
                                            }

                                            #getting per value in ArrayObject
                                            for ($k = 0; $k < $CitiesAffected->count(); $k++) {
                                                ?>
                                                <th><?php echo $CitiesAffected->offsetGet($k); ?></th>
                                                <?php
                                            }
                                            #Barangay Affected
                                            $BarangayAffected = new ArrayObject();
                                            $result = $SummaryReport->BarangayAffectedOnDisaster($DisasterID->offsetGet($i));
                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                $BarangayAffected->append($rows["BarangayName"]);
                                            }

                                            #getting per value in ArrayObject
                                            for ($a = 0; $a < $BarangayAffected->count(); $a++) {
                                                ?>
                                                <th><?php echo $BarangayAffected->offsetGet($a); ?></th>

                                                <?php
                                            }

                                            #Needs Per Quantity
                                            $NeedsType = new ArrayObject();
                                            $NeedsQuantity = new ArrayObject();
                                            $result = $SummaryReport->NeedsPerQuantityOnDisaster($DisasterID->offsetGet($i));
                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                $NeedsType->append($rows["NeedsType"]);
                                                $NeedsQuantity->append($rows["Quantity"]);
                                            }

                                            #getting per value in ArrayObject
                                            for ($b = 0; $b < $NeedsType->count(); $b++) {
                                                ?>
                                                <th><?php echo $NeedsType->offsetGet($b) . ":" . $NeedsQuantity->offsetGet($b).'<br>'; ?></th>

                                                <?php
                                            }

                                            #No of Vicitims
                                            $NoOfDisasters = (int) $SummaryReport->NoOfVictimsOnDisaster($DisasterID->offsetGet($i));
                                            ?>
                                            <th><?php echo $NoOfDisasters; ?></th>


                                            <?php
                                            #No of Families
                                            $NoOfDisasters = $SummaryReport->NoOfFamiliesAffectedOnDisaster($DisasterID->offsetGet($i));
                                            ?>
                                            <th><?php echo $NoOfDisasters; ?></th>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?> 
                                    <tr>
                                        <th>Disaster Type</th>
                                        <th>Disaster Date Reported</th>
                                        <th>Regions Affected</th>
                                        <th>Cities Affected</th>
                                        <th>Barangays Affected</th>
                                        <th>Needs Per Quantity</th>
                                        <th>No. Of Victims</th>
                                        <th>No. Of Families</th>
                                    </tr>
                                    <?php
                                }
                                ?>
                                <tfoot>
                                <td colspan='11' class='text-center'>
                                    <br><br>
                                    <?php
                                    $username = "";
                                    $password = "";
                                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                        $username = htmlspecialchars($_REQUEST['AdminUsername']);
                                        $password = htmlspecialchars($_REQUEST['AdminPassword']);
                                    }
                                    ?>
                                    <form action="../_ADMIN/adminMenu.php" method="POST">
                                        <input type="hidden" name="AdminUsername" value="<?php echo $username; ?>"/>
                                        <input type="hidden" name="AdminPassword" value="<?php echo $password; ?>"/>
                                        <button type="submit" class='btn btn-primary'>Go back to main menu</button>
                                    </form>
                                </td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
