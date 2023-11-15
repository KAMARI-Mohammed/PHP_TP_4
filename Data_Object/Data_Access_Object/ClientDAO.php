<?php

require_once 'Database\database.php';
require_once 'Data_Object\Data_Transfer_Object\ClientDTO.php';

class ClientDAO {
    private $conn;

    public function __construct() {
        global $servername, $username, $password, $dbname;
        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }

    public function getClientByID($clientID) {
        $stmt = $this->conn->prepare("SELECT * FROM Client WHERE id = :clientID");
        $stmt->bindParam(':clientID', $clientID);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $clientDTO = new ClientDTO();
        $clientDTO->ID = $result['id'];
        $clientDTO->nom_client = $result['nom_client'];
        $clientDTO->prenom_client = $result['prenom_client'];
        $clientDTO->adresse_client = $result['adresse_client'];
        $clientDTO->date_de_naissance = $result['date_de_naissance'];
        $clientDTO->situation_familiale = $result['situation_familiale'];
        $clientDTO->profession = $result['profession'];

        return $clientDTO;
    }

    public function getListeClients() {
        $stmt = $this->conn->query("SELECT * FROM Client");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $clients = array();
        foreach ($results as $result) {
            $clientDTO = new ClientDTO();
        $clientDTO->ID = $result['id'];
        $clientDTO->nom_client = $result['nom_client'];
        $clientDTO->prenom_client = $result['prenom_client'];
        $clientDTO->adresse_client = $result['adresse_client'];
        $clientDTO->date_de_naissance = $result['date_de_naissance'];
        $clientDTO->situation_familiale = $result['situation_familiale'];
        $clientDTO->profession = $result['profession'];
        $clients[] = $clientDTO;
        }
    
        return $clients;
    }
   
}
?>
