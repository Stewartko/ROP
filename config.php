<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "webpage");
    mysqli_set_charset($conn, 'utf8');

    // $patternInput = "[a-zA-Z]{,30}$";
    $patternEmail = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$";
    $patternPass = ".{6,}";
    $patternInput = "[a-zA-ZáÁéÉčČďĎíÍĺĹľĽňŇóÓŕŔšŠťŤúÚýÝžŽ]{,30}$";
    $patternPhone = "+[0-9]{3} [0-9]{3} [0-9]{3} [0-9]{3}";