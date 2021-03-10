<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /*
         * To change this license header, choose License Headers in Project Properties.
         * To change this template file, choose Tools | Templates
         * and open the template in the editor.
         */
        $temp = htmlspecialchars($_REQUEST['ItemName']);
        $temp1 = htmlspecialchars($_REQUEST['ItemQuantity']);
        $_SESSION['ItemName'] = $temp;
        $_SESSION['ItemQuantity'] = $temp1;
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
        <form action="AdminEditItem.php" method="POST">
            <input type="hidden" name="ItemName" value="<?php echo $ItemName;?>"/>
            <input type="hidden" name="ItemName" value="<?php echo $ItemName;?>"/>
            <input type='submit' id='thebutton' value='RETURN TO MENU IN 1 SECOND' onclick="document.getElementById()">RETURN TO Relief Item Inventory </input>
        </form> 
    </body>
</html>