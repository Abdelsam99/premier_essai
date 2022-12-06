<?php
 function connecte(){
    $host='localhost';
    $dbname='LFPFBF';
    $root='root';
     $db = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $root, '');
     return $db;
 }
 
?>