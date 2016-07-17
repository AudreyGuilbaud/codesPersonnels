
<script>
    /**
     * Partie en javascript
     * @returns {la donnée renvoyée par la partie en PHP}
     */
$(document).ready(function () {
    //au changement du champ groupe cette fonction s'applique
    $('#id_sur_lequel_action_se_declenche').change(function () {
        //récupération de la valeur du champ groupe
        var value = $(this).val();
        $.ajax({
            //envoi de la valeur du champ groupe à une page PHP qui va 
            //traiter la requête à partir de cette valeur
            url: "dossier/pageActionsEnPhp.php",
            type: "POST",
            data: {donnee1: value},
            //retour du résultat de la requête dans le champ société
            success: function (data)
            {
                $("#champ_a_remplir").val(data);
            }
        });

    });
});
</script>

<?php 

/**
 * Partie en PHP, traite la ou les données envoyées par le javascript et 
 * renvoie le résultat, ici en mode texte (json possible)
 */

//après connexion à la BDD
if (isset($_POST['donnee1'])) {
    $id = $_POST['donnee1'] ;
    
    //ici traitement en PHP avec requête, traitement et sortie d'un résultat
    
 return $leresultat ;
    
};

?>