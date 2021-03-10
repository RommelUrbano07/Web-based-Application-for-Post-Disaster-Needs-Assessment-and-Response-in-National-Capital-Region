<?php
include '../../_COMMANDS/Admin_Commands.php';

$AdminCommands = new Admin_Commands();

if($AdminCommands->checkAdminTableContent()==TRUE){
    header("Location: ../_REPORT/registerAdmin.php");
}   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Admin Log In Page</title> 
        <link rel ="stylesheet" type="text/css" href ="../lib/css/style.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    </head>
    <body>
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <div class="fadeIn first">
                    <img src="../resources/images/image/im2.jpg" class= "image">
                    <h4>Welcome Back Admin</h4>
                </div>
                <form action='adminMenu.php' name='master LogInForm' method='post'>             
                    <input type='text' id="login" class="fadeIn second" placeholder="Username" name="AdminUsername" required/>
                    <input type='password'  id="password" class="fadeIn third" placeholder="Password" name="AdminPassword" required/>
                    <input type='submit' value='Log In' name='dminSubmitButton' class="fadeIn fourth"/>
                </form>
            </div>
        </div>
    </body>
</html>
