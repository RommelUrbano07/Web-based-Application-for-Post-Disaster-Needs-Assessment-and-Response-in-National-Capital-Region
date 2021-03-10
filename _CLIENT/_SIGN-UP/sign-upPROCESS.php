
<html>
    <body>
    <?php
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
    $Username = htmlspecialchars($_REQUEST["username"]);
    $Password = htmlspecialchars($_REQUEST["password"]);
    
    
    echo $Barangay.'<br>';
    echo $BirthDate.'<br>';
    echo $City.'<br>';
    echo $ContactNo.'<br>';
    echo $FirstName.'<br>';
    echo $HouseNo.'<br>';
    echo $LastName.'<br>';
    echo $MiddleName.'<br>';
    echo $Password.'<br>';
    echo $Region.'<br>';
    echo $StreetName.'<br>';
    echo $Subdivision.'<br>';
    echo $Suffix.'<br>';
    echo $Username.'<br>';
    
    
    try {
        include '../../_COMMANDS/Client_Commands.php';
        $ClientCommands = new Client_Commands();
        include '../../_COMMANDS/Admin_Commands.php';
        $AdminCommands = new Admin_Commands();
        include '../../_COMMANDS/Notifications.php';
        $Notification = new Notifications();
        
        if ($ClientCommands->CheckPersonExist($FirstName, $MiddleName, $LastName, $Suffix) == TRUE) {
            $PersonID = $ClientCommands->CheckPersonID($FirstName, $MiddleName, $LastName, $Suffix);
            $condition = $ClientCommands->checkIfAddressMatch($PersonID, $Region, $City, $Barangay, $StreetName, $HouseNo, $Subdivision, $ContactNo, $BirthDate);
            if($condition==TRUE){
                $HeadStatus= $ClientCommands->checkHeadStatus($FirstName, $MiddleName, $LastName, $Suffix);
                echo $HeadStatus;
                if ($ClientCommands->AccountExist($PersonID) == FALSE) {
                    if ($ClientCommands->CheckUsernameExist($Username) == FALSE) {
                        if ($PersonID >= 1) {
                            if ($ClientCommands->signUpClient($PersonID, $Username, $Password) == true) {
                                $personID = $ClientCommands->checkPersonID($FirstName, $MiddleName, $LastName, $Suffix);
                                $customerID = $Notification->getSpecificCustomerID($personID);
                                $logmsg="Admin Registered: $FirstName, $MiddleName, $LastName, $Suffix";
                                $Notification->createNotifications($customerID, $logmsg);
                                echo('<script>alert("Sign up complete, proceed to log in.");</script>');
                            } else {
                                echo('<script>alert("Sign up error, please contact administrator.");</script>');
                            }
                        } else {
                                echo('<script>alert("You are not yet officially registered as a resident of the Barangay, Please Proceed to the Registry Office");</script>');
                        }
                    }
                } else {
                    echo '<script>alert("Account for this Person has already been established.");</script>';
                }
            }else{
                echo '<script> alert("RECORDS DO NOT MATCH TRY AGAIN") </script>';
            }
            
        } else {
            echo '<script> alert(" '.$FirstName.' , '.$MiddleName.' , '.$LastName.' is already registered.");</script>';
        }
    } catch (Exception $exc) {
        echo '<script> alert("'.$exc->getTraceAsString().'");</script>';
    }

    echo("'" . $FirstName . "','" . $MiddleName . "','" . $LastName . "','" . $Suffix . "','" . $BirthDate . "','" . $ContactNo . "','" . $HouseNo . "','" . $StreetName . "','" . $Barangay . "','" . $City . "','" . $Region . "'<br>");
    
    header("location: ../_LOGIN/login.php");
    exit();
    ?>
</body>
</html>
