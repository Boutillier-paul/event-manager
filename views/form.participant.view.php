<h1>Ajouter un participant :</h1>

<form method="POST" action="" class="form-add-entity">
    <input class="form-control" type="text" name="nom" placeholder="Nom" required/>
    <input class="form-control" type="text" name="prenom" placeholder="Prénom" required/>
    <input class="form-control" type="date" name="date" placeholder="Date de naissance" required/>
    <input class="form-control" type="text" name="email" placeholder="Adresse Email" required/>
    <input class="btn btn-success" type="submit" value="<?php echo $data[0] ?> un participant"/>
</form>
