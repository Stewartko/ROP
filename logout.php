<?php
require 'config.php';
$_SESSION = [];
$_SESSION["login"] = [];
$_SESSION["id"] = [];
session_unset();
session_destroy();
header("Location: login.php");