<?php
$pdo = Database::getPdo();

/**
 * Fonction permettant de vérifier l'existance d'un participant en fonction de l'id
 */
function isParticipant($id) : bool
{
    global $pdo;

    $query = $pdo->prepare("SELECT * FROM participant WHERE id =".$id);
    $query->execute();

    if($query->rowCount() == 0)
    {
        return false;
    }

    return true;
}

/**
 * Fonction permettant de retourner un tableau contenant tous les participants
 */
function getParticipants() : array
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM participant");
    $query->execute();

    $result = $query->fetchAll();

    return $result;
}

/**
 * Fonction permettant de retourner un participant en fonction de son id
 */
function getParticipantById($participantId)
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM participant WHERE id=".$participantId);
    $query->execute();

    $result = $query->fetchAll();

    return $result;
}

/**
 * Fonction permettant d'ajouter un participant
 */
function addParticipant($nom, $prenom, $date, $email) : void
{
    global $pdo;

    $query = $pdo->prepare('INSERT INTO participant (nom,prenom,date_naissance,email) VALUES (:nom, :prenom, :date, :email)');
    $query->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'date' => $date,
        'email' => $email
    ));
}

/**
 * Fonction permettant de modifier un participant
 */
function updateParticipant($nom, $prenom, $date, $email, $id) : void
{
    global $pdo;

    $query = $pdo->prepare('UPDATE participant SET nom=:nom, prenom=:prenom, date_naissance=:date, email=:email WHERE id=:id');
    $query->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'date' => $date,
        'email' => $email,
        'id' => $id
    ));
}

/**
 * Fonction permettant de supprimer un participant
 */
function deleteParticipant($id): void
{
    global $pdo;

    $query = $pdo->prepare('DELETE FROM participant WHERE id ='.$id);
    $query->execute();
}

/**
 * Fonction permettant d'obtenir la liste des evenements auxquel un particpant participe
 */
function getEventFromParticipant($participantId) : array
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM evenement INNER JOIN participation ON evenement.id = participation.id_evenement WHERE id_participant =".$participantId);
    $query->execute();

    $result = $query->fetchAll();

    return $result;
}

/**
 * Fonction permettant de retourner un tableau contenant tous les evenements
 */
function getAllEvents() : array
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM evenement");
    $query->execute();

    $result = $query->fetchAll();

    return $result;
}

/**
 * Fonction permettant de supprimer des participations en fonction du participant (lorsqu'on supprime un participant)
 */
function deleteAllparticipationsByParticipant($participantId) : void
{
    global $pdo;

    $query = $pdo->prepare('DELETE FROM participation WHERE id_participant ='.$participantId);
    $query->execute();
}