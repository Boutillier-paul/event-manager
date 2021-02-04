<h1>Liste des participations :</h1>

<table>
    <tr>
        <th>Numéro de participation</th>
        <th>Nom de l'évènement</th>
        <th>Lieu</th>
        <th>Date</th>
        <th>Nom complet du participant</th>
        <th>Actions</th>
    </tr>

    <?php
    foreach($data[0] as $participation)
    {
        $event = getEventById($participation['id_evenement'])[0];
        $participant = getParticipantById($participation['id_participant'])[0];

        echo "<tr>
                <td>".$participation['id']."</td>
                <td>".$event['nom']."</td>
                <td>".$event['lieu']."</td>
                <td>".$event['date']."</td>
                <td>".$participant['nom']." ".$participant['prenom']."</td>
                <td>
                    <a class='btn btn-primary' href=".getPath("/events/event?id=".$event['id']).">Voir l'évènement</a>
                    <a class='btn btn-primary' href=".getPath("/participants/participant?id=".$participant['id']).">Voir le participant</a>
                </td>
            </tr>";
    }
    ?>
</table>

