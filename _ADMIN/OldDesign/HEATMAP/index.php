<!DOCTYPE php>

<html>
    <head>
        <title>Heat map</title>
    </head>
    <?php
    $username = "";
    $password = "";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = htmlspecialchars($_REQUEST['AdminUsername']);
        $password = htmlspecialchars($_REQUEST['AdminPassword']);
    }
    ?>
    <body align='center'>
        <form action="../../_ADMIN/adminMenu.php" method="POST">
            <input type="hidden" name="AdminUsername" value="<?php echo $username ?>"/>
            <input type="hidden" name="AdminPassword" value="<?php echo $password ?>"/>
            <a class="list-group-item"><button type="submit" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Back <span class="badge"></span></button></a>
        </form>
        <iframe src="../../heatmap.php" width="35%" height="100%" style='border: none;overflow: visible;'></iframe>
    </body>
</html>