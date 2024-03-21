/*function generateOptions() {
    // Vérifier si le nombre d'options est valide
    var nbOptions = parseInt($("#nbOptions").val());
    
    if (nbOptions > 0) {
        // Effacer les options précédentes
        $("#optionsContainer").empty();
        console.log("Options: " + nbOptions);

        // Générer les champs de saisie pour les options
        for (let i = 1; i <= nbOptions; i++) {
            var optionInput = '<div class="form-group">';
            optionInput += '<label for="option' + i + '">Option de vote ' + i + '</label>';
            optionInput += '<input type="text" name="option' + i + '" class="form-control mb-2" placeholder="Option ' + i + '" required autocomplete="on">';
            optionInput += '</div>';
            $("#optionsContainer").append(optionInput);
        }
    } else {
        alert("Veuillez entrer un nombre valide d'options de vote.");
    }
}

$(document).ready(function() {
    $("#Creation-scrutin-frm").submit(function(event) {


        console.log("Options: " + nbOptions);
        generateOptions(nbOptions);
    });
});*/


// ----------- Valider les options de vote ----------------

function createScrutin() {
    // Récupérer les données du formulaire
    var numScrutin = $("#numScrutin").val();
    var titre = $("input[name='Titre']").val();
    var question = $("input[name='Question']").val();
    var nbOptions = $("#nbOptions").val();
    var options = [];
    for (let i = 1; i <= nbOptions; i++) {
        options.push($("input[name='option" + i + "']").val());
    }
    var participants = $("#userSelectParticipant").val();
    var votants = $("#userSelectVotant").val();
    var dateDebut = $("input[name='dateDebut']").val();
    var dateFin = $("input[name='dateFin']").val();
    var alreadyVoted = $("#userSelectAlreadyVoted").val();

    // Envoyer une requête AJAX au fichier scrutinProcess.php
    $.ajax({
        url: 'scrutinProcess.php',
        method: 'POST',
        data: {
            numScrutin: numScrutin,
            titre: titre,
            question: question,
            options: options,
            participants: participants,
            votants: votants,
            dateDebut: dateDebut,
            dateFin: dateFin,
            alreadyVoted: alreadyVoted
        },
        success: function(response) {
            // Traiter la réponse du serveur
            console.log(response);
                alert("Le scrutin a été créé avec succès.");
                // Rediriger l'utilisateur vers la page d'accueil
                //window.location.href = "index.php";
            
        },
        error: function(e) {
            alert("Erreur lors de la création du scrutin AJax." + e.responseText);
        }
    });
}

$(document).ready(function() {
    //$("#createScrutin").click(function(e) {
        //e.preventDefault();
       //createScrutin();
    });
//});
