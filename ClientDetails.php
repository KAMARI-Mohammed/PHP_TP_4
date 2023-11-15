<?php

require_once 'Service\ClientService.php';

if (isset($_POST['clientID'])) {
    $clientID = $_POST['clientID'];

    $clientService = new ClientService();
    $client = $clientService->getClientByID($clientID);

    echo "<style>";
    echo ".client-details {";
    echo "    background-color: #f0f0f0;";
    echo "    padding: 10px;";
    echo "    border: 1px solid #ccc;";
    echo "    position: absolute;";
    echo "    top: 150px;"; 
    echo "    right: 10px;"; 
    echo "    width: 40%;";
    echo "}";
    echo "</style>";

    echo "<div class='client-details'>";
    echo "<h2>Détails du Client</h2>";
    echo "<p><strong>ID_Client:</strong> {$client->ID}</p>";
    echo "<p><strong>Nom:</strong> {$client->nom_client}</p>";
    echo "<p><strong>Prénom:</strong> {$client->prenom_client}</p>";
    echo "<p><strong>adresse client:</strong> {$client->adresse_client}</p>";
    echo "<p><strong>date de naissance:</strong> {$client->date_de_naissance}</p>";
    echo "<p><strong>situation familiale:</strong> {$client->situation_familiale}</p>";
    echo "<p><strong>profession:</strong> {$client->profession}</p>";
    echo "</div>";

} else {
    echo "Erreur : ID_Client non spécifié.";
}
?>
