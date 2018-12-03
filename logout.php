<?php
/**
 * Created by PhpStorm.
 * User: annieoh
 * Date: 11/23/18
 * Time: 9:45 PM
 */
session_start();
session_destroy();
header('Location: home.php');
