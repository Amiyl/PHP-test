<?php // hw4_login.php
  $host = 'localhost';    
  $data = 'bcs350fa24'; 
  $user = 'userfa24';         
  $pass = 'pwdfa24';        
  $chrs = 'utf8mb4';
  $attr = "mysql:host=$host;dbname=$data;charset=$chrs";
  $opts =
  [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
  ];
?>
