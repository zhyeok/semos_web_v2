<?php

    header('Content-Type: text/html; charset=UTF-8');
    
    session_start();
    session_destroy();

    echo "<script>alert('로그아웃이 성공했습니다.'); location.replace('./index.php');</script>";


?>