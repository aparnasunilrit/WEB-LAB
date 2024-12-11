<?php
setcookie('user_id', '', time() - 3600, "/"); 
setcookie('email', '', time() - 3600, "/");
header("Location: c4-3login.php"); 
exit();
?>
