
// ----------- Valider les options de vote ----------------

function createScrutin() {
    // Récupérer les données du formulaire
    var numScrutin = $("#numScrutin").val();
    var organisation = $("input[name='Organisation']").val();
    var titre = $("input[name='Titre']").val();
    var question = $("input[name='Question']").val();
    var nbOptions = $("#nbOptions").val();
    var options = [];
    for (let i = 1; i <= nbOptions; i++) {
        options.push($("input[name='option" + i + "']").val());
    }
    var participants = $("#userSelectParticipant").val();
    var attorneyName = $("#attorneyName").val(); // Get attorney's name
    var attorneyVotes = $("#attorneyVotes").val();
    var dateDebut = $("input[name='dateDebut']").val();
    var dateFin = $("input[name='dateFin']").val();
    var alreadyVoted = $("#userSelectAlreadyVoted").val();
    var statut = true;

    // Envoyer une requête AJAX au fichier scrutinProcess.php
    $.ajax({
        url: 'scrutinProcess.php',
        method: 'POST',
        data: {
            numScrutin: numScrutin,
            organisation: organisation,
            titre: titre,
            question: question,
            options: options,
            participants: participants,
            procurationName: attorneyName, // Pass attorney's name
            procurationVotes: attorneyVotes,
            dateDebut: dateDebut,
            dateFin: dateFin,
            alreadyVoted: alreadyVoted,
            statut: statut
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

// ----------- détruire les scrutins ----------------

//marche pas

function destroyScrutin() {
    $.getJSON("Scrutins/Scrutins.json", function(data) {
        // Supprimer la dernière entrée du tableau
        data.pop();
        
        // Enregistrer les modifications dans le fichier JSON
        $.ajax({
            url: 'Scrutins.json',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(data),
            success: function(response) {
                console.log('Les données du scrutin ont été supprimées avec succès.');
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de la suppression des données du scrutin : ' + error);
            }
        });
    });
}

// ----------- fermer les scrutins ----------------

function closeScrutin() {

    // Récupérer le numéro de scrutin
    var numScrutin = $("#numScrutin").val();
    var statut = false; // Set statut to false

    // Envoyer une requête AJAX au fichier scrutinProcess.php pour mettre à jour le statut du scrutin
    $.ajax({
        url: 'scrutinProcess.php',
        method: 'POST',
        data: {
            numScrutin: numScrutin,
            statut: statut // Pass the statut parameter
        },
        success: function(response) {
            // Traiter la réponse du serveur
            console.log(response);
            alert("Le scrutin a été fermé avec succès.");
        },
        error: function(e) {
            alert("Erreur lors de la fermeture du scrutin AJAX : " + e.responseText);
        }
    });
}

// ----------- Vérifier si l'utilisateur a déjà voté ----------------


// ----------- Taux de participation ----------------

function participationRate() {
    // Récupérer le numéro de scrutin
    var numScrutin = $("#numScrutin").val();
    var participants = $("#userSelectParticipant").val();
    var alreadyVoted = $("#userSelectAlreadyVoted").val();

    // Calculer le taux de participation
    var participationRate = (alreadyVoted / participants) * 100;

    // Afficher le taux de participation
    alert("Le taux de participation est de " + participationRate + "%.");
}


// ----------- Voter ----------------

function vote() {
    // Récupérer les données du formulaire
    var scrutinNumber = $("#selected-scrutin-num").text();
    var vote = $("#choix").val();
    //var votant = $("#votant").val();

    // Prepare data to send via AJAX
    var formData = {
        scrutinNumber: scrutinNumber,
        selectedOption: vote
    };

    // Envoyer une requête AJAX au fichier voteProcess.php
    $.ajax({
        url: 'voteProcess.php',
        method: 'POST',
        data: formData,
        success: function(response) {
            // Traiter la réponse du serveur
            console.log(response);
            alert("Votre vote a été enregistré avec succès.");
        },
        error: function(e) {
            console.error(xhr.responseText);
            alert("Erreur lors de l'enregistrement de votre vote : " + e.responseText);
        }
    });
}

// Associer la fonction au clic du bouton "Detruire le Scrutin"
$(document).ready(function() {
    //$('#destroyscrutin').click(function() {
        //destroyScrutin();
    });
//});

