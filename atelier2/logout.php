<?php
session_start();
setcookie('authToken', '', time() - 3600, '/', '', false, true);
header('Location: index.php');
exit();
