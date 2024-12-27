<?php
session_start();
include("./hyst/hyst.php");
unset($_SESSION[$hystadmsesloginkey]);
unset($_SESSION[$hystadmsespasskey]); 
exit("<html><head><meta http-equiv='Refresh' content='0; URL=index.php'></head></html>");
?>