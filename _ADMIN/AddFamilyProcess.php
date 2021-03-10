<?php session_start(); ?>
@<html>

    <script type='text/javascript' onload="showAlert()">
        function showAlert() {
            alert("Form submitted.");
        }
    </script>

    <?php
    
    $username = "";
    $password = "";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = htmlspecialchars($_SESSION['AdminUsername']);
        $password = htmlspecialchars($_SESSION['AdminPassword']);
        $initialFName = htmlspecialchars($_REQUEST['FirstName']);
        $initialMName = htmlspecialchars($_REQUEST['MiddleName']);
        $initialLName = htmlspecialchars($_REQUEST['LastName']);
        $initialSuffix = htmlspecialchars($_REQUEST['Suffix']);
    }
    // Place holder for the user inputs
    $FirstName = "";
    $MiddleName = "";
    $LastName = "";
    $Suffix = "";
    $BirthDate = "";
    $ContactNo = "";
    $HouseNo = "";
    $StreetName = "";
    $Barangay = "";
    $City = "";
    $Region = "";
    $Subdivision = "";

    $FirstName = htmlspecialchars($_REQUEST["firstName"]);
    $MiddleName = htmlspecialchars($_REQUEST["middleName"]);
    $LastName = htmlspecialchars($_REQUEST["lastName"]);
    $Suffix = htmlspecialchars($_REQUEST["suffix"]);
    $BirthDate = htmlspecialchars($_REQUEST["birthDate"]);
    $ContactNo = htmlspecialchars($_REQUEST["contactNo"]);
    $HouseNo = htmlspecialchars($_REQUEST["houseNo"]);
    $StreetName = htmlspecialchars($_REQUEST["streetName"]);
    $Barangay = htmlspecialchars($_REQUEST["barangay"]);
    $City = htmlspecialchars($_REQUEST["city"]);
    $Region = htmlspecialchars($_REQUEST["region"]);
    $Subdivision = htmlspecialchars($_REQUEST["subdivision"]);
    $Gender = htmlspecialchars($_REQUEST["gender"]);
    $FamilyID = htmlspecialchars($_REQUEST["FamilyID"]);
    $HeadStatus = 0;
    try {
        include '../_COMMANDS/FamilyEdit.php';
        include '../_COMMANDS/Client_Commands.php';
        $ClientCommands = new Client_Commands();
        include '../_COMMANDS/Admin_Commands.php';
        $AdminCommands = new Admin_Commands();
        include '../_COMMANDS/Inventory.php';
        $Inventory = new Inventory();
        
        if ($ClientCommands->CheckPersonExist($FirstName, $MiddleName, $LastName, $Suffix) == FALSE) {
            
            if ($ClientCommands->AddPerson($Barangay, $Region, $City, $FirstName, $MiddleName, $LastName, $BirthDate, $ContactNo, $Suffix, $Gender, $HouseNo, $StreetName, $Subdivision, $HeadStatus, $FamilyID) == TRUE) {
                $logmsg="Admin Added Citizen: '".$FirstName."' '".$MiddleName."' '".$LastName."' '".$Suffix."' "
                        . "to FamilyID:'".$FamilyID."' ";
                $Inventory->createTransactionLog($_SESSION['AdminUsername'], $logmsg);
                echo '<script>alert("Returning to Family Table....");</script>';
                header("location: EditFamily.php");
                exit();
                echo "<script type='text/javascript'>alert('REGISTRY SUCCESSFUL, Return in 1 Second');</script>";
                ?>
                <script>
                    time = 1;
                    interval = setInterval(function () {
                        time--;
                        if (time == 0) {
                            // stop timer
                            clearInterval(interval);
                            // click
                            document.getElementById('thebutton').click();
                        }
                    }, 1000)
                </script>
                <form action="SearchFamilyHead.php" method="POST">
                    <input type="hidden" name="AdminUsername" value="<?php echo $username; ?>"/>
                    <input type="hidden" name="AdminPassword" value="<?php echo $password; ?>"/>
                    <input type="hidden" name="FirstName" value="<?php echo $FirstName; ?>"/>
                    <input type="hidden" name="MiddleName" value="<?php echo $MiddleName; ?>"/>
                    <input type="hidden" name="LastName" value="<?php echo $LastName; ?>"/>
                    <input type="hidden" name="suffix" value="<?php echo $Suffix; ?>"/>
                    <input type='submit' id='thebutton' value='RETURN TO MENU IN 1 SECOND' onclick="document.getElementById()">RETURN TO SEARCH FAMILY HEAD </input>
                </form>
                <?php
            } else {
                echo('<script>alert("Error, contact administrator");</script>');
            }
        } else {
            echo('<script>alert("$FirstName , $MiddleName , $LastName , $Suffix is already registered.");</script>');
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }

    echo("'" . $FirstName . "','" . $MiddleName . "','" . $LastName . "','" . $Suffix . "','" . $BirthDate . "','" . $ContactNo . "','" . $HouseNo . "','" . $StreetName . "','" . $Barangay . "','" . $City . "','" . $Region . "'<br>");
    ?>
    <form action="SearchFamilyHead.php" method="POST">
        <input type="hidden" name="AdminUsername" value="<?php echo $username; ?>"/>
        <input type="hidden" name="AdminPassword" value="<?php echo $password; ?>"/>
        <input type="submit" value="RETURN TO SEARCH FAMILY HEAD" />
    </form>
</body>
</html>
