<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Clients</title>
    <style>
       <style>
    body {
      font-family: 'Arial', sans-serif;
    }

    table {
      width: 30%;
      border-collapse: collapse;
      margin: 20px 0;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    th, td {
      padding: 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #3498db;
      color: #fff;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #f5f5f5;
    }

    td {
      max-width: 200px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }
    h1 {
      color: #333;
      background-color: #3498db;
      padding: 20px;
      text-align: center;
      margin-top: 50px;
    }

    @media screen and (max-width: 600px) {
      th, td {
        display: block;
        width: 100%;
        box-sizing: border-box;
      }
    }
    </style>
</head>
<body>

<h1>Liste des Clients : </h1>


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
