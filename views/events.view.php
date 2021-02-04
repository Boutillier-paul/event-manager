<h1>Liste des évènements :</h1>

<table>
    <tr>
        <th>Numéro d'évènement</th>
        <th>Nom</th>
        <th>Date</th>
        <th>Lieu</th>
        <th>Actions</th>
    </tr>

    <?php
    foreach($data[0] as $event){
        echo "<tr>
                <td>".$event['id']."</td>
                <td>".$event['nom']."</td>
                <td>".$event['date']."</td>
                <td>".$event['lieu']."</td>
                <td>
                    <a class='btn btn-success' href=".getPath("/events/event?id=".$event['id']).">Voir l'évènement</a>
                    <a class='btn btn-warning' href=".getPath("/events/edit?id=".$event['id']).">Modifier</a>
                    <a class='btn btn-danger' href=".getPath("/events/delete?id=".$event['id']).">Supprimer</a>
                </td>
            </tr>";
    }
    ?>

    <tr>
        <td><a href=<?php echo getPath('/events/add') ?>>Ajouter un evenement</a></td>
    </tr>
</table>
