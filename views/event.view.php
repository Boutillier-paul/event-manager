<?php
$event = $data[0];
$participations = $data[1];
$participants = $data[2];
?>

<h1>Évènement n°<?php echo $event['id'] ?></h1>

<div class="fiche">
      <h2><?php echo $event['nom']?></h2>
      <h3>Date de l'évènement : <?php echo $event['date'] ?></h3>
      <h3>Lieu : <?php echo $event['lieu'] ?></h3>
</div>

<h2 class="participationList">Liste des participations :</h2>

<table>
      <tr>
            <th>Numéro de participant</th>
            <th>Nom complet</th>
            <th>Date de naissance</th>
            <th>Adresse email</th>
            <th>Action</th>
      </tr>

      <?php
      foreach($participations as $participation){
            echo "<tr>
                        <td>".$participation['id_participant']."</td>
                        <td>".$participation['nom']." ".$participation['prenom']."</td>
                        <td>".$participation['date_naissance']."</td>
                        <td>".$participation['email']."</td>
                        <td>
                              <a class='btn btn-danger' href=".getPath("/participations/delete?id=".$participation['id']."&mode=event&idmode=".$event['id']).">Supprimer la participation</a>
                        </td>
                  </tr>";
      }
      ?>

      <tr>
            <td>
                  <form method='POST' action='<?php echo getPath("/participations/add") ?>'>
                  <input name='event' type='text' value="<?php echo $event['id'] ?>" hidden/>
                  <input name='mode' type='text' value="event" hidden/>
                  <select class='form-select' name='participant'>
                        <?php
                        foreach($participants as $participant)
                        {
                              echo "<option value='".$participant['id']."'>".$participant['nom']." ".$participant['prenom']."</option>";
                        }
                        ?>
                  </select>
                        <input class='btn btn-success addParticipation' type='submit' value='Ajouter une participation'/>
                  </form>
            </td>
      </tr>
</table>