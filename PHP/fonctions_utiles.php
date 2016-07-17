<?php
/**
 * Transforme une date au format format anglais aaaa-mm-jj vers le format français jj/mm/aaaa 
 * @param $madate au format  aaaa-mm-jj
 * @return la date au format format français jj/mm/aaaa
 */
function dateAnglaisVersFrancais($maDate) {
    @list($annee, $mois, $jour) = explode('-', $maDate);
    $date = "$jour" . "/" . $mois . "/" . $annee;
    if (($jour == NULL) && ($mois == NULL) && ($annee == NULL)) {
        return NULL;
    }
    return $date;
}

/**
 * Transforme une date au format français jj/mm/aaaa vers le format anglais aaaa-mm-jj
 * @param $madate au format  jj/mm/aaaa
 * @return la date au format anglais aaaa-mm-jj
 */
function dateFrancaisVersAnglais($maDate) {
    @list($jour, $mois, $annee) = explode('/', $maDate);
    if (($jour == NULL) && ($mois == NULL) && ($annee == NULL)) {
        return NULL;
    }
    return date('Y-m-d', mktime(0, 0, 0, $mois, $jour, $annee));
}

/**
 * Elimine tous les caractères indésirables d'une chaine de caractères.
 * @param type $in
 * @return type
 */
function filtre($chaine) {
    $search = array('@[éèêëÊË]@i', '@[àâäÂÄ]@i', '@[îïÎÏ]@i', '@[ûùüÛÜ]@i', '@[ôöÔÖ]@i', '@[ç]@i', '@[ ]@i', '@[^a-zA-Z0-9_]@', '@[-]@i', '@[_]@i');
    $replace = array('e', 'a', 'i', 'u', 'o', 'c', '', '', '', '');
    return preg_replace($search, $replace, $chaine);
}

/**
 * Vérifie la validité d'un RIB
 * @param int $cbanque
 * @param int $cguichet
 * @param string $nocompte
 * @param int $clerib
 * @return boolean vrai si le RIB est juste, faux sinon
 */
function check_rib($cbanque, $cguichet, $nocompte, $clerib) {
    $tabcompte = "";
    $len = strlen($nocompte);
    if ($len != 11) {
        return false;
    }
    for ($i = 0; $i < $len; $i++) {
        $car = substr($nocompte, $i, 1);
        if (!is_numeric($car)) {
            $c = ord($car) - (ord('A') - 1);
            $b = (($c + pow(2, ($c - 10) / 9)) % 10) + (($c > 18 && $c < 25) ? 1 : 0);
            $tabcompte .= $b;
        } else {
            $tabcompte .= $car;
        }
    }
    $int = $cbanque . $cguichet . $tabcompte . $clerib;
    return (strlen($int) >= 21 && bcmod($int, 97) == 0);
}
