<?php
session_start();
if(session_destroy()) {
    header("Location: http://localhost/SI-WEB-SMT3/WarungKuy/masuk.php");
}
?>