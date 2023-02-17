<?php
session_start();
echo "Logging you out, Please wait...";


session_destroy();
// header("Location:/eForum");
header("Location: /eForum/index.php?logoutsuccess=true");

?>