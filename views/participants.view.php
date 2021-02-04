<h1>Liste des participants :</h1>

<table>
    <tr>
        <th>Numéro de participant</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Date de naissance</th>
        <th>Adresse email</th>
        <th>Actions</th>
    </tr>

    <?php
    foreach($data[0] as $participant){
        echo "<tr>
                <td>".$participant['id']."</td>
                <td>".$participant['nom']."</td>
                <td>".$participant['prenom']."</td>
                <td>".$participant['date_naissance']."</td>
                <td>".$participant['email']."</td>
                <td>
                    <a class='btn btn-success' href=".getPath("/participants/participant?id=".$participant['id']).">Voir le participant</a>
                    <a class='btn btn-warning' href=".getPath("/participants/edit?id=".$participant['id']).">Modifier</a>
                    <a class='btn btn-danger' href=".getPath("/participants/delete?id=".$participant['id']).">Supprimer</a>
                </td>
            </tr>";
    }
    ?>

    <tr>
        <td><a href=<?php echo getPath('/participants/add') ?>>Ajouter un participant</a></td>
    </tr>
</table>

