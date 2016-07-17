/**
 * Empêcher un formulaire d'être envoyé grâce à la touche Entrée
 */
function refuserToucheEntree(event)
{
    // Compatibilité IE / Firefox
    if (!event && window.event) {
        event = window.event;
    }
    // IE
    if (event.keyCode === 13) {
        event.returnValue = false;
        event.cancelBubble = true;
    }
    // DOM
    if (event.which === 13) {
        event.preventDefault();
        event.stopPropagation();
    }
}

/**
 * Changer de page
 */
function changePage(adresse) {
    window.location.href = adresse;
}


//disabled et enabled pour les formulaires
function modifiable() {
    $('.pourdisabled').prop('disabled', false);
    $('.modif').prop('hidden', false);
    $('.nonmodif').attr('hidden', true);
}

function nonModifiable() {
    $('.pourdisabled').attr('disabled', true);
    $('.modif').attr('hidden', true);
    $('.nonmodif').prop('hidden', false);
}


//hidden et non hidden, possible aussi sur un document.ready, on click ou on change
function afficherCacher()
{
    document.getElementById("id1").style.display = "block";
    document.getElementById("id2").style.display = "none";
}

/**
 * Simuler le clic sur un bouton en cliquant sur un autre
 */

$(document).ready(function () {
    $('#bouton1').click(function () {
        $("#bouton2").get(0).click();
    });
});


//coche ou décoche toutes les cases du tableau
$(document).ready(function () {
    $('#checkallActiv').checkAll('#adherentActiv input:checkbox');  
});
// si les checkboxs sont cochées, coche la checkbox "tout" cocher et vice versa
$(document).ready(function () {
    $(".caseActiv").click(function () {
        if ($(".caseActiv").length === $(".caseActiv:checked").length) {
            $("#checkallActiv").prop("checked", true);
        } else {
            $("#checkallActiv").removeAttr("checked");
        }
    });
});

//diverses façons d'influer sur le html ou sur le php
function diversControles() {
    
    //Changer la valeur d'un input
    $('#id').val('Le matricule est obligatoire.');
    
    //Changer le css d'un champ
    $('#id').css("border", "1px solid #ce352c");
    
    //Donner le focus à un input
    $('#id').focus();
    
    //Ajouter une classe à un champ
    $('#id').addClass("classe");
    
    //Retirer une classe à un champ
    $('#id').removeClass("classe");
    
    //Simuler un click sur un lien
    $('#idlien').get(0).click()
    
    //Envoyer un formulaire
    $('#idformulaire').submit();
}
