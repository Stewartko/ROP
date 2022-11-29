<?php
require 'config.php';
$_SESSION = [];
$_SESSION["login"] = [];
$_SESSION["id"] = [];
$login = false;
session_unset();
session_destroy();
header("Location: index.php");