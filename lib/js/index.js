$(document).ready(function() {
    
    // Redirector to client home page.
    $("#clientPortal").click(function() {
        document.location.href = ("_CLIENT/index.php");
    });
    
    // Redirector to admin login page.
    $("#adminPortal").click(function() {
        document.location.href = ("_ADMIN/AdminLogin.php");
    });
});