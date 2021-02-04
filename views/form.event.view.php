<h1>Ajouter un évènement :</h1>

<form method="POST" action="" class="form-add-entity">
    <input class="form-control" type="text" name="nom" placeholder="Nom de l'évènement"  required/>
    <input class="form-control" type="date" name="date" placeholder="Date" required/>
    <input class="form-control" type="text" name="lieu" placeholder="Lieu de l'évènement" required/>
    <input class="btn btn-success" type="submit" value="<?php echo $data[0] ?> un évènement"/>
</form>

