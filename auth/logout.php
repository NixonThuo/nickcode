<?php

require '../database/database.php';
//logout
$user->logout(); 
header('Location: ../header/welcome_layout.php');
?>