<?php

/**
 * Contrôleur classique d'affichage d'un formulaire et de récupération des données
 */
// Définition d'une action par défaut
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'action_par_defaut';
}

// Affectation du $_REQUEST à une variable
$action = $_REQUEST['action'];


//éventuels includes de vues communes à tous les cases (typiquement barre de menu)
include_once("vues/uneVue.php");

// Switch en fonction de la variable action
switch ($action) {

    //si $action = 'cas1' les actions ci-dessous sont appliquées
    case 'cas1' : {

            //deuxième niveau de switch dans le switch initial
            //exemple avec traitement d'un formulaire
            //définition d'une seconde condition
            if (!isset($_REQUEST['etape'])) {
                $_REQUEST['etape'] = 'affichage';
            }
            $etape = $_REQUEST['etape'];
            switch ($etape) {
                //Première étape avec récupération des données et affichage de la vue du formulaire
                case 'affichage' : {
                        $variable1 = $instanceClasse->getQuelqueChose();
                        $variable2 = $instanceAutreClasse->getAutreChose();
                        include_once("vues/vue_du_formulaire.php");
                        break;
                    }

                //Seconde étape avec récupération et traitement des données après l'envoi
                //du formulaire par l'utilisateur
                case 'envoi_donnees' : {
                        $variable3 = $_POST['variable3'];
                        $instanceUneClasse->methodeUpdateBdd($variable3);
                        //affichage d'une autre page après envoi du formulaire
                        $_REQUEST['action'] = 'cas2';
                        include_once("controleurs/ce_controleur.php");
                        break;
                    }
                default : {
                        //actions de 'affichage'
                        break;
                    }
            }
            break;
        }

    //si $action = 'cas2' les actions ci-dessous sont appliquées
    case 'cas2' : {
            break;
        }

    //si $action = NULL ou autre chose que 'cas1' ou 'cas2' les actions ci-dessous sont appliquées,
    //en général définir les mêmes que pour l'action par défaut déjà définie grâce au if plus haut
    //bonne pratique de garder une section "default".
    default : {
            break;
        }
}
?>

