<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['status']);
$_SESSION['loggedin'] = FALSE;
$_SESSION['booked'] = FALSE;
session_destroy();
header("Location: index.php");
