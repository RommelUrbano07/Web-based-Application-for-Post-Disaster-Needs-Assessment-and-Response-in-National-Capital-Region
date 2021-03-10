<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
session_start(); 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$Item= htmlspecialchars($_REQUEST['item']);
$Quantity = htmlspecialchars($_REQUEST['quantity']);

include '../_COMMANDS/Inventory.php';
$Inventory= new Inventory();

$cond=$Inventory->withdrawItem($Item, $Quantity);

$logmsg="Withdrawn Item: $Item ,Quantity: $Quantity ";

$Inventory->createTransactionLog($_SESSION['AdminUsername'], $logmsg);

if($cond){
    echo ('<script>alert("Item Successfully Edited!");</script>');
}else{
    echo ('<script>alert("Error in Editing Item");</script>');
}

header("location: WithdrawItem.php");
exit();
?>
        <form action="WithdrawItem.php" method="POST">
            <input type="submit" value="Go back">
        </form>
    </body>
</html>
