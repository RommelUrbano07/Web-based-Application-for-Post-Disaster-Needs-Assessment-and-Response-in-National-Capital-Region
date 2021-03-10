<html>
</body>
<?php
session_start();

$FirstName = htmlspecialchars($_REQUEST['FirstName']);
$MiddleName = htmlspecialchars($_REQUEST['MiddleName']);
$LastName = htmlspecialchars($_REQUEST['LastName']);
$Suffix = htmlspecialchars($_REQUEST['Suffix']);
$BirthDate = htmlspecialchars($_REQUEST['BirthDate']);
$ContactNo = htmlspecialchars($_REQUEST['ContactNo']);
$HouseNo = htmlspecialchars($_REQUEST['HouseNo']);
$StreetName = htmlspecialchars($_REQUEST['StreetName']);
$Subdivision = htmlspecialchars($_REQUEST['Subdivision']);
echo
"<table>"
 . "<tr>"
 . "<td>FirstName</td>"
 . "<td>MiddleName</td>"
 . "<td>LastName</td>"
 . "<td>Suffix</td>"
 . "<td>BirthDate</td>"
 . "<td>ContactNo</td>"
 . "<td>HouseNo</td>"
 . "<td>StreetName</td>"
 . "<td>Subdivision</td>"
 . "</tr>"
 . "<tr>"
 . "<td>" . $FirstName . "</td>"
 . "<td>" . $MiddleName . "</td>"
 . "<td>" . $LastName . "</td>"
 . "<td>" . $Suffix . "</td>"
 . "<td>" . $BirthDate . "</td>"
 . "<td>" . $ContactNo . "</td>"
 . "<td>" . $HouseNo . "</td>"
 . "<td>" . $StreetName . "</td>"
 . "<td>" . $Subdivision . "</td>"
 . "</tr>"
 . "</table>" .
 "<p>'" . $_SESSION['HeadSuffix'] . "' </p>"
;

include '../_COMMANDS/FamilyEdit.php';
$FamilyEdit = new FamilyEdit();
include '../_COMMANDS/Inventory.php';
$Inventory = new Inventory();

$PersonID = $FamilyEdit->getPersonID($FirstName, $MiddleName, $LastName, $Suffix);
$DeleteCond = $FamilyEdit->deleteFamilyMember($PersonID);
if ($DeleteCond == TRUE) {
    echo ('<script>alert("DELETE SUCESSFUL");</script></body></html>');
    $logmsg = "Admin Deleted Citizen Record with credentials: " . $FirstName . " " . $MiddleName . " " . $LastName . " " . $Suffix . " ";
    echo '</p>' . $logmsg . '</p>';
    $Inventory->createTransactionLog($_SESSION['AdminUsername'], $logmsg);
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
    <form action="EditFamily.php" method="POST">
        <input type='submit' id='thebutton' value='RETURN TO MENU IN 1 SECOND'></input> 
    </form>
    <?php
} else {
    echo ('<script>alert("DELETION ERROR");</script>');
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
    <form action="EditFamily.php" method="POST">
        <input type='submit' id='thebutton' value='RETURN TO MENU IN 1 SECOND'></input> 
    </form>
    <?php
}
?>
</body>
</html>
