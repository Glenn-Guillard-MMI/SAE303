<?php

class SQL {
    public static $db;

    public static function lancement() {
        try {
            self::$db = new PDO('mysql:host=localhost;dbname=sae_bdd;charset=utf8', 'root');
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die(print_r($e));
        }
    }

    public static function Select($arg) {
        $getScoresSql = 'SELECT * FROM camion WHERE email=:arg';
        $getScores = self::$db->prepare($getScoresSql);
        $getScores->bindParam(':arg', $arg);
        $getScores->execute() or die(print_r(self::$db->errorInfo()));
        $results = $getScores->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $row) {
            echo $row['num']; 
        }
    }
}