<?php
require_once('models/participation.model.php');

/**
 * Affiche la liste des participations
 */
function listParticipations(){
	$participations = getParticipations();
	$data[0] = $participations;
	render('participations.view.php', $data);
}

/**
 * Affiche et gère l'ajout d'une participation
 */
function newParticipation() : void
{
	if(isset($_POST['event']) && isset($_POST['participant']) && isset($_POST['mode']))
	{
		addParticipation($_POST['event'], $_POST['participant']);

		if($_POST['mode'] == "event"){
			redirectTo('/events/event?id='.$_POST['event']);
		}
		else{
			redirectTo('/participants/participant?id='.$_POST['participant']);
		}
		
	}
	else
	{
		redirectTo('/'.$_POST['mode'].'s');
	}
}

/**
 * Supprime une participation de la bdd
 */
function removeParticipation(): void
{
	//Vérifie si un id est passé en parametre url
	if(isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['mode']) && !empty($_GET['mode']) && isset($_GET['idmode']) && !empty($_GET['idmode']))
	{
		//Vérifie si le participant existe
		if(isParticipation($_GET['id']))
		{
			deleteParticipation($_GET['id']);
			redirectTo('/'.$_GET['mode'].'s/'.$_GET['mode'].'?id='.$_GET['idmode']);
		}
		else
		{
			redirectTo('/'.$_GET['mode'].'s/'.$_GET['mode'].'?id='.$_GET['idmode']);
		}
	}
	else
	{
		redirectTo('/participations');
	}
}