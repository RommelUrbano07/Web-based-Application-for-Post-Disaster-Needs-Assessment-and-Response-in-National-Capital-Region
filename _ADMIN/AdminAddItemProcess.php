<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
session_start();
$ItemName= htmlspecialchars($_REQUEST['ItemName']);
$ItemQuantity= htmlspecialchars($_REQUEST['ItemQuantity']);

include '../_COMMANDS/Inventory.php';
$Inventory = new Inventory();

$cond=$Inventory->AddDonation($ItemName, $ItemQuantity);

if($cond){
    $logmsg="Admin Added New Item: $ItemName Quantity: $ItemQuantity.";
    $Inventory->createTransactionLog($_SESSION['AdminUsername'], $logmsg);
    echo '<script>alert("Item Successfully Added!");</script>';
}else{
    echo '<script>alert("Error in Adding Item");</script>';
}
header("location: AdminAddItem.php");
exit();
?>

        <form action="AdminAddItem.php" method="POST">
            <input type="submit" value="Go back">
        </form>
    </body>
</html>
