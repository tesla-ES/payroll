// Put this code in first line of web page. 
<? 
session_start();
session_unset();
session_destroy();
header("location:main_login.php");
?>