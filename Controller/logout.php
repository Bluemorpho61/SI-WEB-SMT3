<?php
session_start();
if (session_destroy()){
    ?><script>alert("Anda telah berhasil logout");</script><?php
    header("Location: ../View/Masuk.html");
}
