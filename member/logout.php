<?php
session_start();
    // Proses logout
setcookie("userid", "", time() - 3600, "/"); // Hapus cookie user_id
setcookie("password", "", time() - 3600, "/"); // Hapus cookie user_token
setcookie("remember", "", time() - 3600, "/"); // Hapus cookie user_id

session_destroy();
header("Location: login.php");
exit();

?>