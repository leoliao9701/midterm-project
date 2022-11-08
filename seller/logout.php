<?php
session_start();

unset($_SESSION["seller"]);

header("location: login.php");