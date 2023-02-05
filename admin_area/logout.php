<?php
session_start();
session_destroy();

echo "<script>window.open('login.php?logout=You Successfully Logged out,Come Back Soon!','_self')</script>";


?>