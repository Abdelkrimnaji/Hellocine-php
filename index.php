<?php 

require_once 'vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('vues');
$twig = new Twig_Environment($loader, array(
    'cache' => false,
));

$requete = explode("/", trim($_SERVER['REQUEST_URI'], "/"));
$controller = (count($requete) === 0) ? "films" : $requete[0];
$action = (count($requete) < 2)? "list" : $requete[1];
$id = (count($requete) < 3) ? 0 : (int)$requete[2]; 
$tri = (count($requete) < 4) ? 0 : intval($requete[3]); 

switch ($controller) {
    case 'films':
        require_once('controleurs/film_controleur.php');
    break;
    
    case 'dates':
        require_once('controleurs/date_controleur.php');
    break;
    
    case 'genres':
        require_once('controleurs/genre_controleur.php');
    break;
    
    case 'realisateurs':
        require_once('controleurs/realisateur_controleur.php');
    break;
    
    case 'acteurs':
        require_once('controleurs/acteur_controleur.php');
    break;

    default:
        require_once('controleurs/film_controleur.php');
    break;
}