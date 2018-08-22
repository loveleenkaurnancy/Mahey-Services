<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 7/23/2017
 * Time: 4:48 PM
 */
session_start();
session_destroy();
header("location:index.php");
?>