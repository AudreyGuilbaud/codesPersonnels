<?php

/**
 * Retourne le nouvel ID d'une table pour celles possédant une clé primaire composée.
 * @param string $nom_champ
 * @param string $nom_table
 * @param int $id_principal
 * @return int le nouvel ID de la table.
 */
function getNewIdComp($nom_champ, $nom_table, $id_principal) {
    $req = "SELECT MAX($nom_champ)as newId FROM $nom_table WHERE adherent_id='$id_principal'";
    $res = SqlRequetes::$basesql->query($req);
    if ($res) {
        $la_ligne = SqlRequetes::$basesql->fetchrow($res);
    }
    if (empty($la_ligne)) {
        $newId = 1;
    } else {
        $newId = $la_ligne['newId'] + 1;
    }
    SqlRequetes::$basesql->free_result($res);
    return $newId;
}

/**
 * Retourne le nouvel ID d'une table pour celles possédant une clé primaire simple.
 * @param string $nom_champ
 * @param string $nom_table
 * @return int le nouvel ID de la table.
 */
function getNewId($nom_champ, $nom_table) {
    $req = "SELECT MAX($nom_champ) as newId FROM $nom_table";
    $res = SqlRequetes::$basesql->query($req);
    if ($res) {
        $la_ligne = SqlRequetes::$basesql->fetchrow($res);
    }
    if (empty($la_ligne)) {
        $newId = 1;
    } else {
        $newId = $la_ligne['newId'] + 1;
    }
    SqlRequetes::$basesql->free_result($res);
    return $newId;
}
