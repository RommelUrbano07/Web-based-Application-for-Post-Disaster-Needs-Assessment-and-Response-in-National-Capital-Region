

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
        <!-- DATA TABLE -->
        <div class='card'>
            <div class='card-body'>
                <table class='table table-striped'>
                    <!-- TABLE HEADER -->
                    <thead>
                        <tr>
                            <td colspan='11'><h1 align='center'>History Logs</h1></td>
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
                        include '../_COMMANDS/Log_Commands.php';
                        $LOGS = new Log_Commands();
                        $HistoryID = new ArrayObject();
                        $result = $LOGS->getHistoryID();
                        while ($rows = mysqli_fetch_assoc($result)) {
                            $HistoryID->append($rows['disasterid']);
                        }
                        $Region = "";
                        $City = "";
                        $Barangay = "";
                        $Subdivision = "";
                        $HouseNo = "";
                        $StreetName = "";
                        $HistoryCount = (int) $LOGS->returnHistoryCount();
                        for ($i = 0; $i < $HistoryCount; $i++) {
                            ?>
                            <tr class='tbodyDT' onclick='setActive(this);'>
                                <?php
                                for ($j = 0; $j < 11; $j++) {
                                    $result = $LOGS->returnRegionCityBarangay($HistoryID->offsetGet($i));
                                    while ($rows = mysqli_fetch_assoc($result)) {
                                        $Region = $rows["region"];
                                        $City = $rows["city"];
                                        $Barangay = $rows["barangay"];
                                    }

                                    $result = $LOGS->returnSubd_HouseNo_St($HistoryID->offsetGet($i));
                                    while ($rows = mysqli_fetch_assoc($result)) {
                                        $Subdivision = $rows["subdivision"];
                                        $HouseNo = $rows["houseno"];
                                        $StreetName = $rows["streetname"];
                                    }
                                    ?>
                                    <td scope='row' align='center'>
                                        <?php
                                        // HERE GOES THE VALUES
                                        if ($j == 0) {
                                            $result = $LOGS->getDisasterType($HistoryID->offsetGet($i));
                                            echo("<span>" . $result . "</span>");
                                        } else if ($j == 1) {
                                            $result = $LOGS->returnVictims($HistoryID->offsetGet($i));
                                            $tmp = "";
                                            $tmp1 = "";
                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                $tmp .= $rows["FirstName"] . " " . $rows["MiddleName"] . " " . $rows["LastName"] . " " . $rows["Suffix"] . " " . "<br>";
                                                $tmp1 .= $rows["FirstName"] . " " . $rows["MiddleName"] . " " . $rows["LastName"] . " " . $rows["Suffix"] . " " . ",";
                                            }
                                            echo($tmp . "<span style='display:none;'>" . $tmp1 . "</span>");
                                        } else if ($j == 2) {
                                            $result = $LOGS->returnNeedsInfo($HistoryID->offsetGet($i));
                                            $tmp = "";
                                            $tmp1 = "";
                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                $tmp .= $rows["type"] . ":" . $rows["quantity"] . "<br>";
                                                $tmp1 .= $rows["type"] . ":" . $rows["quantity"] . ",";
                                            }
                                            echo($tmp . "<span style='display:none;'>" . $tmp1 . "</span>");
                                        } else if ($j == 3) {
                                            $DisasterDate = $LOGS->returnDisasterDate($HistoryID->offsetGet($i));
                                            echo("<span>" . $DisasterDate . "</span>");
                                        } else if ($j == 4) {
                                            $DisasterTime = $LOGS->returnDisasterTime($HistoryID->offsetGet($i));
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
                        
                        <?php
                        $username = "";
                        $password = "";
                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            $username = htmlspecialchars($_REQUEST['AdminUsername']);
                            $password = htmlspecialchars($_REQUEST['AdminPassword']);
                        }
                        ?>
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
                        needs: data[2],
                        dateReported: data[3],
                        timeReported: data[4],
                        region: data[5],
                        city: data[6],
                        barangay: data[7],
                        subdivision: data[8],
                        street: data[9],
                        houseNo: data[10]
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