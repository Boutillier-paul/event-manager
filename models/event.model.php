<?php
$pdo = Database::getPdo();

/**
 * Fonction permettant de vérifier l'existance d'un evenement en fonction de l'id
 */
function isEvent($id) : bool
{
    global $pdo;

    $query = $pdo->prepare("SELECT * FROM evenement WHERE id =".$id);
    $query->execute();

    if($query->rowCount() == 0)
    {
        return false;
    }

    return true;
}

/**
 * Fonction permettant de retourner un tableau contenant tous les evenements
 */
function getEvents() : array
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM evenement");
    $query->execute();

    $result = $query->fetchAll();

    return $result;
}

/**
 * Fonction permettant de retourner un evenement en fonction de son id
 */
function getEventById($eventId)
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM evenement WHERE id=".$eventId);
    $query->execute();

    $result = $query->fetchAll();

    return $result;
}

/**
 * Fonction permettant d'ajouter un evenement
 */
function addEvent($nom, $date, $lieu) : void
{
    global $pdo;

    $query = $pdo->prepare('INSERT INTO evenement (nom,date,lieu) VALUES (:nom, :date, :lieu)');
    $query->execute(array(
        'nom' => $nom,
        'date' => $date,
        'lieu' => $lieu
    ));
}

/**
 * Fonction permettant de modifier un evenement
 */
function updateEvent($nom, $date, $lieu, $id) : void
{
    global $pdo;

    $query = $pdo->prepare('UPDATE evenement SET nom=:nom, date=:date, lieu=:lieu WHERE id=:id');
    $query->execute(array(
        'nom' => $nom,
        'date' => $date,
        'lieu' => $lieu,
        'id' => $id
    ));
}

/**
 * Fonction permettant de supprimer un evenement
 */
function deleteEvent($id): void
{
    global $pdo;

    $query = $pdo->prepare('DELETE FROM evenement WHERE id ='.$id);
    $query->execute();
}

/**
 * Fonction permettant d'obtenir la liste des participations d'un evenement
 */
function getParticipantsFromEvent($eventId) : array
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM participant INNER JOIN participation ON participant.id = participation.id_participant WHERE id_evenement =".$eventId);
    $query->execute();

    $result = $query->fetchAll();

    return $result;
}

/**
 * Fonction permettant de retourner un tableau contenant tous les participants
 */
function getAllParticipants() : array
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM participant");
    $query->execute();

    $result = $query->fetchAll();

    return $result;
}

/**
 * Fonction permettant de supprimer des participations en fonction de l'évenement (lorsqu'on supprime un evenement)
 */
function deleteAllparticipationsByEvent($evendId) : void
{
    global $pdo;

    $query = $pdo->prepare('DELETE FROM participation WHERE id_evenement ='.$evendId);
    $query->execute();
}