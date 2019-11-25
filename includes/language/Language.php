<?php
require_once "includes/functions.php";
if (!$_GET['lang']) {
    if (!$_SESSION['USER_LANGUAGE']) SetLanguage(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
}
else {
    $_SESSION['USER_LANGUAGE'] =  $_GET['lang'];
}
include "includes/language/$_SESSION[USER_LANGUAGE].php";
