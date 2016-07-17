function verifTel(chaine) {
    if (chaine.match(/^[0-9]{10}$/)) {
        return true;
    } else {
        return false;
    }
}

function verifCp(chaine) {
    if (chaine.match(/^[0-9]{5}$/)) {
        return true;
    } else {
        return false;
    }
}


function verifMail(chaine) {
    if (chaine.match(/^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$/)) {
        return true;
    } else {
        return false;
    }
}

function verifEntier(valeur) {
    if (valeur.match(/^-?[0-9]+$/)) {
        return true;
    } else {
        return false;
    }
}

function verifSiren(valeur){
    if (valeur.match(/^[0-9]{3}$/)){
        return true;
    }else{
        return false ;
    }
}

function verifSiret(valeur){
    if (valeur.match(/^[0-9]{5}$/)){
        return true;
    }else{
        return false ;
    }
}

function verifApe(valeur){
    if (valeur.match(/^[0-9]{4}[a-z]{1}|[0-9]{4}[A-Z]{1}$/)){
        return true ;
    }else{
        return false ;
    }
}

function verifNii(valeur){
    if (valeur.match(/^[f]{1}[r]{1}[0-9]{2}|[F]{1}[R]{1}[0-9]{2}|[f]{1}[R]{1}[0-9]{2}|[F]{1}[r]{1}[0-9]{2}$/)){
        return true ;
    }else{
        return false;
    }
}
