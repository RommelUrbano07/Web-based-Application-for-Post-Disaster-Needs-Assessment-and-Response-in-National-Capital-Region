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
        $NewsID = htmlspecialchars($_REQUEST['NewsID']);
        
        $News = new NewsSection();
        $News->deleteNews($NewsID);
        
        header ('location:dashboard.php');
        exit();
        ?>
    </body>
</html>
