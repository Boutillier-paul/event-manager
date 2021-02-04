<?php
require_once('models/event.model.php');

/**
 * Affiche la liste des evenements
 */
function listEvents(){
	$events = getEvents();
	$data[0] = $events;
	render('events.view.php', $data);
}

/**
 * Affiche un evenement selon un identifiant
 */
function event(){
	//Vérifie si un id est passé en parametre url
	if(isset($_GET['id']) && !empty($_GET['id']))
	{
		//Vérifie si l'evenement existe
		if(isEvent($_GET['id']))
		{
			$event = getEventById($_GET['id'])[0];
			$participations = getParticipantsFromEvent($_GET['id']);
			$participants = getAllParticipants();
			$data[0] = $event;
			$data[1] = $participations;
			$data[2] = $participants;
			render('event.view.php', $data);
		}
		else
		{
			redirectTo('/events');
		}
	}
	else
	{
		redirectTo('/events');
	}
}

/**
 * Affiche et gère l'ajout d'evenement
 */
function newEvent() : void
{
	if(isset($_POST['nom']) && isset($_POST['date']) && isset($_POST['lieu']))
	{
		addEvent($_POST['nom'], $_POST['date'], $_POST['lieu']);
		redirectTo('/events');
	}
	else
	{
		$data[0] = "Ajouter";
		render('form.event.view.php', $data);
	}
}

/**
 * Affiche et gère la modification d'evenement
 */
function editEvent(): void
{
	//Vérifie si un id est passé en parametre url
	if(isset($_GET['id']) && !empty($_GET['id']))
	{
		//Vérifie si l'evenement existe
		if(isEvent($_GET['id']))
		{
			//Vérifie si tout est bien envoyé
			if(isset($_POST['nom']) && isset($_POST['date']) && isset($_POST['lieu']))
			{
				updateEvent($_POST['nom'], $_POST['date'], $_POST['lieu'], $_GET['id']);
				redirectTo('/events/event?id='.$_GET['id']);
			}
			else
			{
				$data[0] = "Modifier";
				render('form.event.view.php', $data);
			}
		}
		else
		{
			redirectTo('/events');
		}
	}
	else
	{
		redirectTo('/events');
	}
}

/**
 * Supprime un evenement
 */
function removeEvent(): void
{
	//Vérifie si un id est passé en parametre url
	if(isset($_GET['id']) && !empty($_GET['id']))
	{
		//Vérifie si l'evenement existe
		if(isEvent($_GET['id']))
		{
			deleteAllparticipationsByEvent($_GET['id']);
			deleteEvent($_GET['id']);
			redirectTo('/events');
		}
		else
		{
			redirectTo('/events');
		}
	}
	else
	{
		redirectTo('/events');
	}
}