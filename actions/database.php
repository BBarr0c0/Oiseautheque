<?php
    try {
        session_start();
        $bdd = new PDO('mysql:host=localhost;dbname=bdd_oiseautheque;charset=utf8', 'root', '');
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }