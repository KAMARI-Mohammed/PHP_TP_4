<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Clients</title>
    <style>
        /* Appliquer des styles au tableau */
        table {
            width: 40%;
            border-collapse: collapse;
            margin-top: 10px; /* Marge ajustée */
        }

        /* Style pour les en-têtes de tableau */
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        /* Alternance des couleurs de ligne pour une meilleure lisibilité */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Liste des Clients</h1>


    </thead>
    <tbody>
     

         <?php 
                  require_once 'Service/ClientService.php';

    
                  $clientService = new ClientService();
              
                 
                  $clients = $clientService->getListeClients();
         foreach ($clients as $client): ?>
            
            <div class="client-item" data-id="<?= $client->ID ?>">
                <table>
                    <thead>
                        <tr>
                            <th>ID_Client</th>
                            <th>Nom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $client->ID ?></td>
                            <td><?= $client->nom_client ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php endforeach; ?>

<div id="details-container"></div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
 
    $('.client-item').click(function() {
   
        var clientID = $(this).data('id');

       
        $.ajax({
            type: 'POST',
            url: 'ClientDetails.php',
            data: { clientID: clientID },
            success: function(response) {
             
                $('#details-container').html(response);
            }
        });
    });
});
</script>

</body>
</html>
