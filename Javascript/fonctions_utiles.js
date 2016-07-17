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