<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include '../_COMMANDS/NewsSection.php';
        $NewsContent = htmlspecialchars($_REQUEST['NewsContent']);
        $NewsAuthorFName = htmlspecialchars($_REQUEST['NewsAuthorFName']);
        $NewsAuthorMName = htmlspecialchars($_REQUEST['NewsAuthorMName']);
        $NewsAuthorLName = htmlspecialchars($_REQUEST['NewsAuthorLName']);
        $NewsAuthorSuffix = htmlspecialchars($_REQUEST['NewsSuffix']);
        $NewsID = htmlspecialchars($_REQUEST['NewsID']);
        
        
  //      echo ($NewsContent.'<br>');
  //      echo ($NewsAuthorFName.'<br>');
   //     echo ($NewsAuthorMName.'<br>');
   //     echo ($NewsAuthorLName.'<br>');
    //    echo ($NewsAuthorSuffix.'<br>');
        
       $News= new NewsSection();
        $News->editNews($NewsID,$NewsContent, $NewsAuthorFName, $NewsAuthorMName, $NewsAuthorLName, $NewsAuthorSuffix);
        
        header ('location:dashboard.php');
        exit();
        ?>
    </body>
</html>
