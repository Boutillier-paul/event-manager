<?php
$pdo = Database::getPdo();

/**
 * Fonction permettant dez vérifier l'existance d'une participation en fonction de l'id
 */
function isParticipation($id) : bool
{
    global $pdo;

    $query = $pdo->prepare("SELECT * FROM participation WHERE id =".$id);
    $query->execute();

    if($query->rowCount() == 0)
    {
        return false;
    }

    return true;
}

/**
 * Fonction permettant de retourner un tableau contenant toutes les participations
 */
function getParticipations() : array
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM participation");
    $query->execute();

    $result = $query->fetchAll();

    return $result;
}

/**
 * Fonction permettant d'ajouter une participation
 */
function addParticipation($eventId, $participantId) : void
{
    global $pdo;

    $query = $pdo->prepare('INSERT INTO participation (id_evenement, id_participant) VALUES (:eventId, :participantId)');
    $query->execute(array(
        'eventId' => $eventId,
        'participantId' => $participantId
    ));
}

/**
 * Fonction permettant de supprimer une participation
 */
function deleteParticipation($id): void
{
    global $pdo;

    $query = $pdo->prepare('DELETE FROM participation WHERE id ='.$id);
    $query->execute();
}

/**
 * Fonction permettant de récupérer un evenement à partir de son identifiant
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
 * Fonction permettant de récupérer un participant à partir de son identifiant
 */
function getParticipantById($participantId)
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM participant WHERE id=".$participantId);
    $query->execute();

    $result = $query->fetchAll();

    return $result;
}