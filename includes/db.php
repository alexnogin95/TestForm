<?php

require "libs/rb-mysql.php";

R::setup( 'mysql:host=localhost;dbname=test',
    'root', '' );
session_start();