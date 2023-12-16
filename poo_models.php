<?php
require_once "poo_database.php";

class Model extends Database {
	
	
    // Table de la base de données
    protected string $table;

    // Instance de connexion
    protected $db;
	
	function getTable() {
		return $this->table;
	}
	
	//Constructeur de la classe
	function __construct(string $table) {
		$this->table = $table;
		$this->db = Database::getInstance();
	}
}

