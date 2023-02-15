<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "webpage");
    mysqli_set_charset($conn, 'utf8');
