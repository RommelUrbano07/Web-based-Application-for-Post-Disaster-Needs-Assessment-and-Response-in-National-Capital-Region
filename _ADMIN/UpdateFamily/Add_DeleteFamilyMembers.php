<?php
$username = "";
$password = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = htmlspecialchars($_REQUEST['AdminUsername']);
    $password = htmlspecialchars($_REQUEST['AdminPassword']);
}
?>
<html>
    <head>
        <title>Post Disaster Management | Family Edit Table</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel='stylesheet' href='../../lib/bootstrap/css/bootstrap.css'>
        <link rel='stylesheet' href='../../lib/bootstrap/css/bootstrap.min.css'>

        <script src='../../lib/jquery/jquery-3.4.1.min.js'></script>
        <script src='../../lib/popper.js/popper.min.js'></script>
        <script src='../../lib/bootstrap/js/bootstrap.min.js'></script>

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
                            <td colspan='11'><h1 align='center'>Family Edit Table</h1></td>
                        </tr>
                        <tr>

                            <td scope='col'>FirstName</td>
                            <td scope='col'>MiddleName</td>
                            <td scope='col'>LastName</td>
                            <td scope='col'>Suffix</td>
                            <td scope='col'>BirthDate</td>
                            <td scope='col'>ContactNo</td>
                            <td scope='col'>Gender</td>
                            <td scope='col'>subdivision</td>
                            <td scope='col'>street</td>
                            <td scope='col'>houseNo</td>
                        </tr>
                    </thead>

                    <!-- TABLE BODY -->
                    <tbody>
                        <?php
                        $HeadFirstName = htmlspecialchars($_REQUEST['FirstName']);
                        $HeadMiddleName = htmlspecialchars($_REQUEST['MiddleName']);
                        $HeadLastName = htmlspecialchars($_REQUEST['LastName']);
                        $HeadSuffix = htmlspecialchars($_REQUEST['suffix']);
                        include '../../_COMMANDS/Admin_Commands.php';
                        $AdminCommands = new Admin_Commands();
                        $FamilyID = $AdminCommands->GetFamilyID($HeadFirstName, $HeadMiddleName, $HeadLastName, $HeadSuffix);
                    
                        if ($FamilyID != "0 results") {
                            include '../../_COMMANDS/FamilyEdit.php';
                            $FamilyEdit = new FamilyEdit();
                            $PersonID = new ArrayObject();
                            $result = $FamilyEdit->getPersonIDfromFamily($FamilyID);
                            if ($result != "") {
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    $PersonID->append($rows["PersonID"]);
                                }
                            }

                            $FirstName = "";
                            $MiddleName = "";
                            $LastName = "";
                            $Suffix = "";
                            $BirthDate = "";
                            $ContactNo = "";
                            $Gender = "";
                            $Subdivision = "";
                            $Street = "";
                            $HouseNo = "";

                            // No need to stor Region,City,Barangay,StreetName,HouseNo,Subd. Will only be viewed, not referenced
                            // Use Name as reference to get PersonID, and use PersonID for Delete 
                            //
                        
                        
                        for ($i = 0; $i < $PersonID->count(); $i++) {
                                $resultsInfo = $FamilyEdit->getPersonInformation($PersonID->offsetGet($i));
                                if (mysqli_num_rows($resultsInfo) > 0) {
                                    while ($rows = mysqli_fetch_assoc($resultsInfo)) {
                                        ?>
                                        <tr class='tbodyDT' onclick='setActive(this);'>
                                            <?php
                                            for ($j = 0; $j < 10; $j++) {
                                                ?>
                                                <td scope='row' align='center'>
                                                    <?php
                                                    // HERE GOES THE VALUES
                                                    if ($j == 0) {
                                                        echo("<span>" . $rows['FirstName'] . "</span>");
                                                    } else if ($j == 1) {
                                                        echo("<span>" . $rows['MiddleName'] . "</span>");
                                                    } else if ($j == 2) {
                                                        echo("<span>" . $rows['LastName'] . "</span>");
                                                    } else if ($j == 3) {
                                                        echo("<span>" . $rows['Suffix'] . "</span>");
                                                    } else if ($j == 4) {
                                                        echo("<span>" . $rows['BirthDate'] . "</span>");
                                                    } else if ($j == 5) {
                                                        echo("<span>" . $rows['ContactNo'] . "</span>");
                                                    } else if ($j == 6) {
                                                        if ($rows['Gender'] == '0') {
                                                            echo("<span>Female</span>");
                                                        } else {
                                                            echo("<span>Male</span>");
                                                        }
                                                    } else if ($j == 7) {
                                                        echo("<span>" . $rows['Subdivision'] . "</span>");
                                                    } else if ($j == 8) {
                                                        echo("<span>" . $rows['StreetName'] . "</span>");
                                                    } else if ($j == 9) {
                                                        echo("<span>" . $rows['HouseNo'] . "</span>");
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
                                }
                            }
                            ?>
                        </tbody>

                        <!-- TABLE FOOTER -->
                        <tfoot>
                        <td colspan='11' class='text-center'>
                            <form action="AddFamilyMember.php" method="POST" >
                                <input type="hidden" value="<?php echo $FamilyID ?>" name="FamilyID"/>
                                <input type="hidden" name="AdminUsername" value="<?php echo $username; ?>"/>
                                <input type="hidden" name="AdminPassword" value="<?php echo $password; ?>"/>
                                <input type="hidden" name="FirstName" value="<?php echo $HeadFirstName; ?>"/>
                                <input type="hidden" name="MiddleName" value="<?php echo $HeadMiddleName; ?>"/>
                                <input type="hidden" name="LastName" value="<?php echo $HeadLastName; ?>"/>
                                <input type="hidden" name="suffix" value="<?php echo $HeadSuffix; ?>"/>
                                <button value="SUBMIT" class='btn btn-primary'>ADD RECORD</button>
                            </form>
                            <button id='retriever' onclick='retrieveRow();'  class='btn btn-primary'>DELETE RECORD</button>
                            <br><br><br><br>
                            <form action="SearchFamilyHead.php" method="POST">
                                <input type="hidden" name="AdminUsername" value="<?php echo $username; ?>"/>
                                <input type="hidden" name="AdminPassword" value="<?php echo $password; ?>"/>
                                <button id='retriever' value="SUBMIT" class='btn btn-primary'>RETURN TO MAIN MENU</button>
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
                    setInactive($('[onclick="setInactive(this);"]'));
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
                        url: "DeletePROCESS.php",
                        data: {
                            FirstName: data[0],
                            MiddleName: data[1],
                            LastName: data[2],
                            Suffix: data[3],
                            BirthDate: data[4],
                            ContactNo: data[5],
                            Gender: data[6],
                            Subdivision: data[7],
                            Street: data[8],
                            HouseNo: data[9],
                            UN:'<?php echo $username ?>',
                            PW:'<?php echo $password?>'
                         
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
        <?php } else { ?>
            <br>
            <form action="SearchFamilyHead.php" method="POST">
                <input type="hidden" name="AdminUsername" value="<?php echo $username; ?>"/>
                <input type="hidden" name="AdminPassword" value="<?php echo $password; ?>"/>
                <button id='retriever' value="SUBMIT" class='btn btn-primary'>RETURN TO SEARCH FAMILY ID</button>
            </form>
        <?php }
        ?>
    </body>

</html>
