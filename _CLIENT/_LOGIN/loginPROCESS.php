<?php
session_start();
$username = htmlspecialchars($_REQUEST["username"]);
$password = htmlspecialchars($_REQUEST["password"]);
include '../../_COMMANDS/Client_Commands.php';
$ClientCommands = new Client_Commands();

$_SESSION['Username']=$username;
$_SESSION['Password']=$password;
if ($ClientCommands->checkClientLogIn($username, $password) == true) {
    echo('<script>alert("Log in successful!");</script>');
    header("Location: ../_REPORT/report.php");
    exit();
} else {
    ?>
    <html>
        <body>
            <form action="login.php" method="POST">
                <input type="submit" value="GO BACK TO MAIN PAGE" />
            </form>
        </body>
    </html>
    <?php
    header("Location: ../_LOGIN/login.php");
    exit();
    echo $username;
    echo $password;
    echo('<script>alert("Log in failed, try again!");</script>');
}
?>

