<?php 
    session_start();
    session_unset();
    session_destroy();
    if (isset($_SESSION['userConnection'])) unset($_SESSION['userConnection']);
    header("Location: ../index.php");
    /* ACABAR COSAS BD */
?>