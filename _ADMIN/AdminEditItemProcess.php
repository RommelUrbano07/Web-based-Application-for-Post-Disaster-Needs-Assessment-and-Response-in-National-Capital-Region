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
$_SESSION['ItemQuantity']=$ItemQuantity;
echo $ItemName;
echo $ItemQuantity;

include '../_COMMANDS/Inventory.php';
$Inventory = new Inventory();

$cond=$Inventory->EditDonationQuantity($ItemName, $ItemQuantity);

if($cond){
    $logmsg="Admin Edited Quantity for Item:$ItemName to Quantity:$ItemQuantity";
    $Inventory->createTransactionLog($_SESSION['AdminUsername'], $logmsg);
    echo '<script>alert("Item Successfully Edited!");</script>';
}else{
    echo '<script>alert("Error in Editing Item");</script>';
}
header("location: AdminEditItem.php");
exit();
?>
    </body>
</html>