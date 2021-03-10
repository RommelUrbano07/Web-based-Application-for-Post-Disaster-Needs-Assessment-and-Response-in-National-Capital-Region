<html>
    <head>
        <title>Post Disaster Management | Disaster Report</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel='stylesheet' href='../lib/bootstrap/css/bootstrap.css'>
        <link rel='stylesheet' href='../lib/bootstrap/css/bootstrap.min.css'>

        <script src='../lib/jquery/jquery-3.4.1.min.js'></script>
        <script src='../lib/popper.js/popper.min.js'></script>
        <script src='../lib/bootstrap/js/bootstrap.min.js'></script>

        <style>
            .tbodyDT:hover {
                background-color: rgba(0, 0, 0, 0.5) !important;
                color: #fff;
                transition: 0.25s;
            }
            .tbodyDT {
                transition: 0.25s;
            }

            .tbodyDT_selected {
                background-color: rgba(0, 0, 0, 0.5) !important;
                color: #fff;
                transition: 0.25s;
            }

            .disabled {
                cursor: not-allowed !important;
            }
        </style>
    </head>

    <body>
        <?php
        $username = "";
        $password = "";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $username = htmlspecialchars($_REQUEST['AdminUsername']);
            $password = htmlspecialchars($_REQUEST['AdminPassword']);
        }
        ?>
        <!-- DATA TABLE -->
        <div class='card'>
            <div class='card-body'>
                <table class='table table-striped'>
                    <!-- TABLE HEADER -->
                    <thead>
                        <tr>
                            <td colspan='11'><h1 align='center'>Disaster Report</h1></td>
                        </tr>
                        <tr>
                            <td scope='col'>Disaster Type</td>
                            <td scope='col'>Person/s Affected</td>
                            <td scope='col'>Needs and Quantity</td>
                            <td scope='col'>Date Reported</td>
                            <td scope='col'>Time Reported</td>
                            <td scope='col'>Region</td>
                            <td scope='col'>City</td>
                            <td scope='col'>Barangay</td>
                            <td scope='col'>Subdivision</td>
                            <td scope='col'>Street</td>
                            <td scope='col'>House No.</td>
                        </tr>
                    </thead>

                    <!-- TABLE BODY -->
                    <tbody>
                        <?php
                        include '../_COMMANDS/DamageReport.php';

                        $DamageReport = new DamageReport();
                        $DisasterID = new ArrayObject();
                        $result = $DamageReport->getAllDisasterID();
                        while ($rows = mysqli_fetch_assoc($result)) {
                            if ($rows['disaster'] == null) {
                                $DisasterID->append('0');
                            } else {
                                $DisasterID->append($rows["disaster"]);
                            }
                        }

                        $Region = "";
                        $City = "";
                        $Barangay = "";
                        $Subdivision = "";
                        $HouseNo = "";
                        $StreetName = "";
                        $DisasterCount = (int) $DisasterID->count();
                        for ($i = 0; $i < $DisasterCount; $i++) {
                            ?>
                            <tr class='tbodyDT' onclick='setActive(this);'>
                                <?php
                                for ($j = 0; $j < 11; $j++) {
                                    $result = $DamageReport->returnRCB($DisasterID->offsetGet($i) . "");
                                    while ($rows = mysqli_fetch_assoc($result)) {
                                        $Region = $rows['region'];
                                        $City = $rows['city'];
                                        $Barangay = $rows['barangay'];
                                    }

                                    $result = $DamageReport->returnSubd_HouseNo_St($DisasterID->offsetGet($i) . "");
                                    while ($rows = mysqli_fetch_assoc($result)) {
                                        $Subdivision = $rows['subdivision'];
                                        $HouseNo = $rows['houseno'];
                                        $StreetName = $rows['streetname'];
                                    }
                                    ?>
                                    <td scope='row' align='center'>
                                        <?php
                                        // HERE GOES THE VALUES
                                        if ($j == 0) {
                                            echo("<span>" . $DamageReport->getDisasterType($DisasterID->offsetGet($i)) . "</span>");
                                        } else if ($j == 1) {
                                            $result = $DamageReport->returnVictims($DisasterID->offsetGet($i) . "");
                                            $tmp = "";
                                            $tmp1 = "";
                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                $tmp .= $rows['fname'] . " " . $rows['mname'] . " " . $rows['lname'] . " " . $rows['suffix'] . " " . "<br>";
                                                $tmp1 .= "<span fn='true'>" . $rows['fname'] . "</span> <span mn='true'>" . $rows['mname'] . "</span> <span ln='true'>" . $rows['lname'] . "</span> <span sf='true'>" . $rows['suffix'] . "</span> " . ",";
                                            }
                                            echo($tmp . "<span data-holder='true' style='display:none;'>" . $tmp1 . "</span>");
                                        } else if ($j == 2) {
                                            $result = $DamageReport->returnNeedsInfo($DisasterID->offsetGet($i) . "");
                                            $tmp = "";
                                            $tmp1 = "";
                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                $tmp .= $rows['type'] . ":" . $rows['quantity'] . "<br>";
                                                $tmp1 .= $rows['type'] . ":" . $rows['quantity'] . ",";
                                            }
                                            echo($tmp . "<span style='display:none;'>" . $tmp1 . "</span>");
                                        } else if ($j == 3) {
                                            $DisasterDate = $DamageReport->returnDisasterDate($DisasterID->offsetGet($i));
                                            echo("<span>" . $DisasterDate . "</span>");
                                        } else if ($j == 4) {
                                            $DisasterTime = $DamageReport->returnDisasterTime($DisasterID->offsetGet($i));
                                            echo("<span>" . $DisasterTime . "</span>");
                                        } else if ($j == 5) {
                                            echo("<span>" . $Region . "</span>");
                                        } else if ($j == 6) {
                                            echo("<span>" . $City . "</span>");
                                        } else if ($j == 7) {
                                            echo("<span>" . $Barangay . "</span>");
                                        } else if ($j == 8) {
                                            echo("<span>" . $Subdivision . "</span>");
                                        } else if ($j == 9) {
                                            echo("<span>" . $HouseNo . "</span>");
                                        } else if ($j == 10) {
                                            echo("<span>" . $StreetName . "</span>");
                                        } else {
                                            echo("<span>" . $i . "_" . $j . "</span>");
                                        }
                                        ?>
                                    </td>
                                    <?php
                                }
                                ?>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>

                    <!-- TABLE FOOTER -->
                    <tfoot>
                    <td colspan='11' class='text-center'>
                        <button id='retriever' onclick='retrieveRow();' class='btn btn-primary'>RESOLVE REPORT</button>
                        <br><br><br>

                        <form action="adminMenu.php" method="POST">
                            <input type="hidden" name="AdminUsername" value="<?php echo $username; ?>"/>
                            <input type="hidden" name="AdminPassword" value="<?php echo $password; ?>"/>
                            <button type="submit" class='btn btn-primary'>Go back to main menu</button>
                        </form>
                    </td>
                    </tfoot>
                </table>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                // Disables the button if there's nothing selected.
                if (!$("[name='selected']").length) {
                    $("#retriever").attr("disabled", "disabled");
                    $("#retriever").addClass("disabled");
                } else {
                    $("#retriever").removeAttr("disabled");
                    $("#retriever").removeClass("disabled");
                }
            });

            // CUSTOM METHODS
            function setActive(obj) {
                $(obj).addClass("tbodyDT_selected");
                $(obj).attr({
                    "onclick": "setInactive(this);",
                    "name": "selected"
                });
                $('[onclick="setActive(this);"]').attr("onclick", "replaceActive(this);");

                if (!$("[name='selected']").length) {
                    $("#retriever").attr("disabled", "disabled");
                    $("#retriever").addClass("disabled");
                } else {
                    $("#retriever").removeAttr("disabled");
                    $("#retriever").removeClass("disabled");
                }
            }

            function setInactive(obj) {
                $(obj).removeClass("tbodyDT_selected");
                $(obj).attr("onclick", "setActive(this);");
                $(obj).removeAttr("name");
                $('[onclick="replaceActive(this);"]').attr("onclick", "setActive(this);");

                if (!$("[name='selected']").length) {
                    $("#retriever").attr("disabled", "disabled");
                    $("#retriever").addClass("disabled");
                } else {
                    $("#retriever").removeAttr("disabled");
                    $("#retriever").removeClass("disabled");
                }
            }

            function replaceActive(obj) {
                setInactive($('[onclick="setInactive(this);"]'))
                setActive(obj);
            }

            function retrieveRow() {
                let data = $("[name='selected']").children();
                let reporterO = $(data[1]).find("[data-holder=true]").html().split(",")[0].trim();
                let reporter = [
                    $($(reporterO)[0]).text(),
                    $($(reporterO)[2]).text(),
                    $($(reporterO)[4]).text(),
                    $($(reporterO)[6]).text()
                ];

                console.log(reporter);

                for (let i = 0; i < data.length; i++) {

                    if (i == 1 || i == 2) {
                        data[i] = $(data[i]).children().text().trim();
                    } else {
                        data[i] = $(data[i]).children().text().trim();
                    }
                }

                $.ajax({
                    type: "POST",
                    url: "DisasterReportCONTROLLER.php",
                    data: {
                        disasterID: data[0],
                        persons: data[1],
                        reporterF: reporter[0],
                        reporterM: reporter[1],
                        reporterL: reporter[2],
                        reporterS: reporter[3],
                        needs: data[2],
                        dateReported: data[3],
                        timeReported: data[4],
                        region: data[5],
                        city: data[6],
                        barangay: data[7],
                        subdivision: data[8],
                        street: data[9],
                        houseNo: data[10],
                        UN: '<?php echo $username; ?>',
                        PS: '<?php echo $password; ?>'
                    },
                    success: function (data) {
                        // JUST CHECKING
                        document.write(data);
                    },
                    error: function (data) {
                        alert("Something went wrong...");
                    }
                });
            }
        </script>
    </body>
</html>