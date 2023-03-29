<?php
include("vues/v_sommaire.php");

$action = $_REQUEST['action'];

switch ($action) {
    case "selectionnerMois": {
            $visiteurs = $pdo->getAllVisiteurs();
            $mois = $pdo->getAllMoisIsset();

            include("vues/v_listeMoisValiderFrais.php");
            break;
        }
    case "validationFrais": {
            $visiteurs = $pdo->getAllVisiteurs();
            $mois = $pdo->getAllMoisIsset();
            $mois_visiteur = $_POST["mois"];

            $etat = $pdo->getEtatFicheUtilisateur($_POST["visiteur"], $mois_visiteur);

            if ($etat) {
                $date_fiche = dateAnglaisVersFrancais($etat["datefiche"]);

                $numAnnee_visiteur = substr($mois_visiteur, 0, 4);
                $numMois_visiteur = substr($mois_visiteur, 4, 2);

                $lesFraisForfait = $pdo->getLesFraisForfait($_POST["visiteur"], $mois_visiteur);

                $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($_POST["visiteur"], $mois_visiteur);

                $infos_visiteur = $pdo->getInfosUtilisateurByID($_POST["visiteur"]);
            }
            include("vues/v_listeMoisValiderFrais.php");
            include("vues/v_validerfrais.php");
            break;
        }
    case "supprimerHorsForfait": {
            $idFrais = $_GET["idFrais"];

            $refuser = $pdo->refuserFraisHorsForfait($idFrais);
            $visiteurs = $pdo->getAllVisiteurs();
            $mois = $pdo->getAllMoisIsset();
            $mois_visiteur = $_GET["mois"];

            $etat = $pdo->getEtatFicheUtilisateur($_GET["visiteur"], $mois_visiteur);

            if ($etat) {
                $date_fiche = dateAnglaisVersFrancais($etat["datefiche"]);

                $numAnnee_visiteur = substr($mois_visiteur, 0, 4);
                $numMois_visiteur = substr($mois_visiteur, 4, 2);

                $lesFraisForfait = $pdo->getLesFraisForfait($_GET["visiteur"], $mois_visiteur);

                $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($_GET["visiteur"], $mois_visiteur);

                $infos_visiteur = $pdo->getInfosUtilisateurByID($_GET["visiteur"]);
            }
            include("vues/v_listeMoisValiderFrais.php");
            include("vues/v_validerfrais.php");
            break;
        }
    case "reporterHorsForfait": {
            $idFrais = $_GET["idFrais"];

            $reporter = $pdo->reporterFrais($idFrais);

            $visiteurs = $pdo->getAllVisiteurs();
            $mois = $pdo->getAllMoisIsset();
            $mois_visiteur = $_GET["mois"];

            $etat = $pdo->getEtatFicheUtilisateur($_GET["visiteur"], $mois_visiteur);

            if ($etat) {
                $date_fiche = dateAnglaisVersFrancais($etat["datefiche"]);

                $numAnnee_visiteur = substr($mois_visiteur, 0, 4);
                $numMois_visiteur = substr($mois_visiteur, 4, 2);

                $lesFraisForfait = $pdo->getLesFraisForfait($_GET["visiteur"], $mois_visiteur);

                $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($_GET["visiteur"], $mois_visiteur);

                $infos_visiteur = $pdo->getInfosUtilisateurByID($_GET["visiteur"]);
            }
            include("vues/v_listeMoisValiderFrais.php");
            include("vues/v_validerfrais.php");
            break;
        }
    case "validerMajFraisForfait": {
            $visiteurs = $pdo->getAllVisiteurs();
            $mois = $pdo->getAllMoisIsset();
            $mois_visiteur = $_POST["mois_actuel"];
            $mois_actuel = getMois(date("d/m/Y"));
            $lesFrais = $_POST['lesFrais'];
            
            if (lesQteFraisValides($lesFrais)) {
                $pdo->majFraisForfait($_POST["visiteurID"], $mois_actuel, $lesFrais);
            } else {
                ajouterErreur("Les valeurs des frais doivent être numériques");
                include("vues/v_erreurs.php");
            }

            $etat = $pdo->getEtatFicheUtilisateur($_POST["visiteurID"], $mois_visiteur);

            if ($etat) {
                $date_fiche = dateAnglaisVersFrancais($etat["datefiche"]);

                $numAnnee_visiteur = substr($mois_visiteur, 0, 4);
                $numMois_visiteur = substr($mois_visiteur, 4, 2);

                $lesFraisForfait = $pdo->getLesFraisForfait($_POST["visiteurID"], $mois_visiteur);

                $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($_POST["visiteurID"], $mois_visiteur);

                $infos_visiteur = $pdo->getInfosUtilisateurByID($_POST["visiteurID"]);
            }
            include("vues/v_listeMoisValiderFrais.php");
            include("vues/v_validerfrais.php");
            break;
        }
        case "validerfiche": {
            $visiteurs = $pdo->getAllVisiteurs();
            $mois = $pdo->getAllMoisIsset();

            $idVisiteur = $_POST["visiteur"];
            $mois_visiteur = $_POST["mois"];
            $nb_justificatifs = $_POST["justificatifs"];

            $validerFiche = $pdo->validerFiche($idVisiteur, $mois_visiteur, $nb_justificatifs);

            $etat = $pdo->getEtatFicheUtilisateur($idVisiteur, $mois_visiteur);

            if ($etat) {
                $date_fiche = dateAnglaisVersFrancais($etat["datefiche"]);

                $numAnnee_visiteur = substr($mois_visiteur, 0, 4);
                $numMois_visiteur = substr($mois_visiteur, 4, 2);

                $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois_visiteur);

                $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois_visiteur);

                $infos_visiteur = $pdo->getInfosUtilisateurByID($idVisiteur);
            }
            include("vues/v_listeMoisValiderFrais.php");
            include("vues/v_validerfrais.php");
            break;
        }
}
