<?php
/**
 * Created by PhpStorm.
 * User: rAkesh
 * Date: 13-Sep-15
 * Time: 1:27 AM
 */
session_start();
unset($_SESSION['logged_in']);
session_destroy();
echo "<script> location='chk.php'</script>"
?>