<?php

/**
 * Fonction permettant d'afficher une vue en fonction de son nom de fichier
 */
function render($view, $data=[]): void
{
    require_once('views/base.view.php');
}

/**
 * Fonction permettant de rediriger l'utilisateur sur une autre url
 */
function redirectTo($url): void 
{
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("Location: http://$host$uri$url");
    exit;
}

function getPath($url): string
{
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    return "http://$host$uri$url";
}