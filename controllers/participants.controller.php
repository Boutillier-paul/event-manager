<?php
require_once('models/participant.model.php');

/**
 * Affiche la liste des participants
 */
function listParticipants(){
	$participants = getParticipants();
	$data[0] = $participants;
	render('participants.view.php', $data);
}

/**
 * Affiche un participant selon un identifiant
 */
function participant(){
	//Vérifie si un id est passé en parametre url
	if(isset($_GET['id']) && !empty($_GET['id']))
	{
		//Vérifie si le participant existe
		if(isParticipant($_GET['id']))
		{
			$participant = getParticipantById($_GET['id'])[0];
			$participations = getEventFromParticipant($_GET['id']);
			$events = getAllEvents();
			$data[0] = $participant;
			$data[1] = $participations;
			$data[2] = $events;
			render('participant.view.php', $data);
		}
		else
		{
			redirectTo('/participants');
		}
	}
	else
	{
		redirectTo('/participants');
	}
}

/**
 * Affiche et gère l'ajout d'un participant
 */
function newParticipant() : void
{
	if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['date']) && isset($_POST['email']))
	{
		addParticipant($_POST['nom'], $_POST['prenom'], $_POST['date'], $_POST['email']);
		redirectTo('/participants');
	}
	else
	{
		$data[0] = "Ajouter";
		render('form.participant.view.php', $data);
	}
}

/**
 * Affiche et gère la modification d'un participant
 */
function editParticipant(): void
{
	//Vérifie si un id est passé en parametre url
	if(isset($_GET['id']) && !empty($_GET['id']))
	{
		//Vérifie si le participant existe
		if(isParticipant($_GET['id']))
		{
			//Vérifie si tout est bien envoyé
			if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['date']) && isset($_POST['email']))
			{
				updateParticipant($_POST['nom'], $_POST['prenom'], $_POST['date'], $_POST['email'], $_GET['id']);
				redirectTo('/participants/participant?id='.$_GET['id']);
			}
			else
			{
				$data[0] = "Modifier";
				render('form.participant.view.php', $data);
			}
		}
		else
		{
			redirectTo('/participants');
		}
	}
	else
	{
		redirectTo('/participants');
	}
}

/**
 * Supprime un participant de la bdd
 */
function removeParticipant(): void
{
	//Vérifie si un id est passé en parametre url
	if(isset($_GET['id']) && !empty($_GET['id']))
	{
		//Vérifie si le participant existe
		if(isParticipant($_GET['id']))
		{
			deleteAllparticipationsByParticipant($_GET['id']);
			deleteParticipant($_GET['id']);
			redirectTo('/participants');
		}
		else
		{
			redirectTo('/participants');
		}
	}
	else
	{
		redirectTo('/participants');
	}
}