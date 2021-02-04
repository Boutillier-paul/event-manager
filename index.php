<?php
//Ajout des bibliothèques
require_once('utils/Database.php');
require_once('utils/utils.functions.php');

$args = explode('/', $_GET['url']);

if(sizeof($args) == 1 && empty($args[0])){
	
	redirectTo("/events");
} 
 
else if ($args[0] == "events") {
	
	// Controlleur events
	require_once("controllers/events.controller.php");
	
	/**
	 * @Route = /events/event?id=INT
	 */
	if(sizeof($args) == 2 && $args[1] == "event"){
		
		// Action event
		event();
	}
	/**
	 * @Route = /events/add
	 */
	elseif(sizeof($args) == 2 && $args[1] == "add"){
		
		// Action newEvent
		newEvent();
	}
	/**
	 * @Route = /events/edit?id=INT
	 */
	elseif(sizeof($args) == 2 && $args[1] == "edit"){
		
		// Action editEvent
		editEvent();
	}
	/**
	 * @Route = /events/delete?id=INT
	 */
	elseif(sizeof($args) == 2 && $args[1] == "delete"){
		
		// Action removeEvent
		removeEvent();
	}
	/**
	 * @Route = /events
	 */
	else {

		// Action listEvents
		listEvents();
	}
}

else if ($args[0] == "participants") {
	
	// Controlleur participants
	require_once("controllers/participants.controller.php");
	
	/**
	 * @Route = /participants/participant?id=INT
	 */
	if(sizeof($args) == 2 && $args[1] == "participant"){
		
		// Action participant
		participant();
	}
	/**
	 * @Route = /participants/add
	 */
	elseif(sizeof($args) == 2 && $args[1] == "add"){
		
		// Action newParticipant
		newParticipant();
	}
	/**
	 * @Route = /participants/edit?id=INT
	 */
	elseif(sizeof($args) == 2 && $args[1] == "edit"){
		
		// Action editParticipant
		editParticipant();
	}
	/**
	 * @Route = /participants/delete?id=INT
	 */
	elseif(sizeof($args) == 2 && $args[1] == "delete"){
		
		// Action removeParticipant
		removeParticipant();
	}
	/**
	 * @Route = /participants
	 */
	else {

		// Action listParticipants
		listParticipants();
	}
}

else if ($args[0] == "participations") {
	
	// Controlleur participants
	require_once("controllers/participations.controller.php");
	
	/**
	 * @Route = /participations/add?event=INT&participant=INT
	 */
	if(sizeof($args) == 2 && $args[1] == "add"){
		
		// Action newParticipation
		newParticipation();
	}
	/**
	 * @Route = /participations/delete?id=INT
	 */
	elseif(sizeof($args) == 2 && $args[1] == "delete"){
		
		// Action removeParticipation
		removeParticipation();
	}
	/**
	 * @Route = /participations
	 */
	else {

		// Action listParticipations
		listParticipations();
	}
}

else{
	redirectTo("/events");
}

