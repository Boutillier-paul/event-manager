<?php
$participant = $data[0];
$participations = $data[1];
$events = $data[2];
?>

<h1>Participant n°<?php echo $participant['id'] ?></h1>

<div class="fiche">
      <h2><?php echo $participant['nom']." ".$participant['prenom'] ?></h2>
      <h3>Date de naissance : <?php echo $participant['date_naissance'] ?></h3>
      <h3>Adresse email : <?php echo $participant['email'] ?></h3>
</div>

<h2 class="participationList">Liste de ses participations :</h2>

<table>
      <tr>
            <th>Numéro de l'évènement</th>
            <th>Nom</th>
            <th>Date</th>
            <th>Lieu</th>
            <th>Action</th>
      </tr>

      <?php
      foreach($participations as $participation){
            echo "<tr>
                        <td>".$participation['id_evenement']."</td>
                        <td>".$participation['nom']."</td>
                        <td>".$participation['date']."</td>
                        <td>".$participation['lieu']."</td>
                        <td>
                              <a class='btn btn-danger' href=".getPath("/participations/delete?id=".$participation['id']."&mode=participant&idmode=".$participant['id']).">Supprimer la participation</a>
                        </td>
                  </tr>";
      }
      ?>

      <tr>
            <td>
                  <form method='POST' action='<?php echo getPath("/participations/add") ?>'>
                        <input name='participant' type='text' value="<?php echo $participant['id'] ?>" hidden/>
                        <input name='mode' type='text' value="participant" hidden/>
                        <select class='form-select' name='event'>
                              <?php
                              foreach($events as $event)
                              {
                                    echo "<option value='".$event['id']."'>".$event['nom']." - ".$event['lieu']." - ".$event['date']."</option>";
                              }
                              ?>
                        </select>
                        <input class='btn btn-success addParticipation' type='submit' value='Ajouter une participation'/>
                  </form>
            </td>
      </tr>
</table>
