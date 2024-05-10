<?php
session_start();
    // Proses logout
setcookie("adminid", "", time() - 3600, "/"); // Hapus cookie user_id
setcookie("adminpassword", "", time() - 3600, "/"); // Hapus cookie user_token
setcookie("rememberadmin", "", time() - 3600, "/"); // Hapus cookie user_id

session_destroy();
header("Location: loginpetugas.php");
exit();

?>