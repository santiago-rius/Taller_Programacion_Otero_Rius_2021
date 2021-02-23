<?php

ini_set('display_errors, 1');
require_once 'datos.php';
session_start();

session_destroy();
header('location:index.php');