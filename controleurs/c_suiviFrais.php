<?php
include("vues/v_sommaire.php");

$action = $_REQUEST['action'];

switch ($action) {
    case "selectionnerMois": {
            $visiteursetmois = $pdo->getVisiteursAndMoisVA();


            include("vues/v_listeMoisSuivi.php");
            break;
        }
    case "validationFrais": {
            $value_POST = explode("-", $_POST["visiteur"]);
            $idVisiteur = $value_POST[0];
            $moisVisiteur = $value_POST[1];

            $visiteursetmois = $pdo->getVisiteursAndMoisVA();

            $infos_visiteur = $pdo->getInfosUtilisateurByID($idVisiteur);

            $etat = $pdo->getEtatFicheUtilisateur($idVisiteur, $moisVisiteur);

            $date_fiche = dateAnglaisVersFrancais($etat["datefiche"]);

            $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $moisVisiteur);

            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $moisVisiteur);

            include("vues/v_listeMoisSuivi.php");
            include("vues/v_suivifrais.php");
            break;
        }
    case "rembourserFiche": {
            $idVisiteur = $_POST["visiteurID"];
            $moisVisiteur = $_POST["moisvisiteur"];
            $rembourser = $pdo->rembourserFiche($idVisiteur, $moisVisiteur);

            if ($rembourser) {
                include("vues/v_succes.php");
            }
        }
}