<!DOCTYPE html>
<!-- Page de création d'un scrutin -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation d'un scrutin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="optionVote.js"></script>
</head>
<body style="background-image: url('https://altselection.com/wp-content/uploads/2022/06/220524-MPD-Twitter-Update-GOT7-NANANA-Relay-Dance-Behind-The-Scenes-documents-1.jpeg'); background-size: cover; background-repeat: repeat;">

<a href="../SignUp/pageChoix.php" class="btn btn-sucess btn-secondary mt-2 d-block mx-auto" style="position: absolute; top: 0; left: 10px;">Back</a>

<!-- Boutons sur le côté gauche -->
<div style="position: fixed; top: 90px; right: 0; transform: translate(0, -50%);">
    <button class="btn btn-success mb-4" id="createScrutin" onclick="console.log('scrutinnnnnnnnn'); createScrutin();">Créer le scrutin</button><br>
    <button class="btn btn-success mb-4" id="destroyscrutin" data-id="" onclick="console.log('scrutinnnnnnnnn');destroyScrutin();">Detruire le Scrutin</button><br>
</div>

<!-- ALERTE -->
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-4 offset-lg-4" id="alert">
            <div class="alert alert-success">
                <strong id="result"> Bonjour, pour créer un scrutin veuillez remplir tout les champs 
                    puis cliquer sur "Crée le scrutin" pour pouvoir le crée.
                </strong>
            </div>
        </div>
    </div>

    <!-- -------------------------------------- -->

<!-- Numéro de scrutin -->
    <?php
function generate_scrutin_number() {
    // Génère un numéro de scrutin en utilisant les derniers chiffres de l'heure actuelle
    $time = date('His');
    return $time;
}
?>


<!-- ID du scrutin -->
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-4 offset-lg-4" id="alert">
            <!-- Numéro de scrutin -->
            <label for="numScrutin" style="color: white;">Numéro de scrutin</label>
            <input type="text" name="numScrutin" id="numScrutin" class="form-control" readonly value="<?php echo generate_scrutin_number(); ?>">
        </div>
    </div>
</div>

<!-- Nom de l'organisateur -->
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-4 offset-lg-4" id="alert">
            <!-- Nom de l'organisateur -->
            <label for="organisateur" style="color: white;">Nom de l'organisateur</label>
            <input type="text" name="organisateur" id="organisateur" class="form-control" readonly value="<?php session_start(); echo $_SESSION['username']; ?>">
        </div>
    </div>
</div>

<!-- -------------------------------------- -->

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 bg-light rounded mt-4">
                <h2 class="text-center mt-2">Creation d'un scrutin</h2>
                <!--<form action="" method="post" role="form" class="p-2" id="Creation-scrutin-frm">-->
                    <div class="form-group">
                        <!-- Titre du scrutin -->
                        <label for="Titre">Titre du scrutin</label>
                        <input type="text" name="Titre" class="form-control mb-2" placeholder="Titre" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <!-- Question du vote -->
                        <label for="Question">Quel est la question du scrutin ?</label>
                        <input type="text" name="Question" class="form-control mb-2" placeholder="Question" required autocomplete="on">
                    </div>

                <!--</form>-->
                <div class="form-group">
                        <!-- Option de vote -->
                        <label for="nbOptions">Nombre d'options de vote</label>
                        <div class="input-group">
                            <input type="number" name="nbOptions" id="nbOptions" class="form-control" min="1" required>
                            <button class="btn btn-primary btn-success ms-2" onClick="generateOptions()" id="boutonOption">Submit</button>
                            
                        </div>
                </div>
                
            </div>
        </div>

        <!-- Container pour les options de vote -->
        <div class="row mt-4">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="optionsContainer">
                <!-- Vous pouvez ajouter ici les nouveaux formulaires d'options de vote -->
            </div>
        </div>
    </div>
</div>

<script>
    function generateOptions() {
        // Cacher la div optionsContainer
        $("#optionsContainer").hide();
        
        // Vérifier si le nombre d'options est valide
        var nbOptions = parseInt($("#nbOptions").val());
        
        if (nbOptions > 0) {
            // Effacer les options précédentes
            $("#optionsContainer").empty();
            console.log("Options: " + nbOptions);

            // Générer les champs de saisie pour les options
            for (let i = 1; i <= nbOptions; i++) {
                var optionTilte = '<h5 class="text-center mt-2">Options de vote</h5>';
                var optionInput = '<div class="form-group">';
                optionInput += '<label for="option' + i + '">Option de vote ' + i + '</label>';
                optionInput += '<input type="text" name="option' + i + '" class="form-control mb-2" placeholder="Option ' + i + '" required autocomplete="on">';
                optionInput += '</div>';
                $("#optionsContainer").append(optionTilte);
                $("#optionsContainer").append(optionInput);
            }
            $("#optionsContainer").append('<button class="btn btn-primary btn-success" id="startOptions">valider les options </button>');
            $("#optionsContainer").append('<button class="btn btn-primary btn-danger" id="startOptions" onclick="removeOption();">Retirer la dernière option </button>');

            // Afficher la div optionsContainer une fois que les options sont générées
            $("#optionsContainer").show();
        } else {
            alert("Veuillez entrer un nombre valide d'options de vote.");
        }
    }
</script>

<!-- Retire des options -->
<script>
function removeOption() {
    // Supprimer le dernier h5 et le dernier .form-group dans #optionsContainer
    $("#optionsContainer h5:last").remove();
    $("#optionsContainer .form-group:last").remove();
}
</script>

<!-- Les participants -->
<div class="row mt-4">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="optionsContainerParticipant">
                <h5>Liste des personnes participant au scrutin </h5>
                <div>
                    <label for="">Personnes ayant un compte sur Aghavote</label>
                    <select name="participants[]" multiple class="form-control" id="userSelectParticipant">
                        <!-- les inscrits à AghaVote -->
                    </select>
                    <button class="btn btn-primary btn-success ms-2" id="boutonParticipant">Submit</button>
                </div>
            </div>
        </div>

        <script>
    $(document).ready(function() {

        // Chargement du fichier JSON
        $.getJSON("../../Datas/Login-data.JSON", function(data) {
            var users = data.utilisateurs;
            var select = $("#userSelectParticipant");
            
            // Ajout des options au menu déroulant
            $.each(users, function(index, user) {
                var option = $("<option></option>").attr("value", user["Username "]).text(user["Username "]);
                select.append(option);
            });
        });
    });
</script>

<!-- ceux qu'on designe pour voter -->
<div class="row mt-4">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="optionsContainerVoting">
                <h5>Liste des votants </h5>
                <div>
                    <label for="">Personnes qui ont le droit de voter</label>
                    <select name="participants[]" multiple class="form-control" id="userSelectVotant">
                    </select>
                    <button class="btn btn-primary btn-danger ms-2" id="boutonVotant" onclick=" removeVotant();">Retirer</button>
                </div>
            </div>
        </div>

<script>
    // Fonction pour retirer un votant de la liste
    function removeVotant() {
    var select = document.getElementById("userSelectVotant");
    select.remove(select.selectedIndex);
}
</script>

<!-- procuration Section -->

<div class="row mt-4">
    <div class="col-lg-4 offset-lg-4 bg-light rounded" id="powerOfAttorneySection">
        <h5>Les Procurations</h5>
        <div id="procurationContainer">
            <!-- Container to hold dynamically added procuration inputs -->
        </div>
        <button class="btn btn-success" onclick="addProcuration()">Add</button>
    </div>
</div>

<script>
    var procurationCount = 0;

    function addProcuration() {
        // Increment procuration count
        procurationCount++;

        // Create a new div to hold the procuration inputs
        var newProcurationDiv = document.createElement('div');
        newProcurationDiv.classList.add('form-group');

        // Create input field for attorney name
        var attorneyNameInput = document.createElement('input');
        attorneyNameInput.type = 'text';
        attorneyNameInput.name = 'attorneyName' + procurationCount;
        attorneyNameInput.classList.add('form-control');
        attorneyNameInput.placeholder = 'Nom de la personne';
        newProcurationDiv.appendChild(attorneyNameInput);

        // Create input field for number of votes
        var attorneyVotesInput = document.createElement('input');
        attorneyVotesInput.type = 'number';
        attorneyVotesInput.name = 'attorneyVotes' + procurationCount;
        attorneyVotesInput.classList.add('form-control');
        attorneyVotesInput.min = 1;
        attorneyVotesInput.max = 2;
        attorneyVotesInput.placeholder = 'Un nombre entre 1 et 2 (inclus)';
        newProcurationDiv.appendChild(attorneyVotesInput);

        // Create a remove button
        var removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.classList.add('btn', 'btn-danger', 'ms-2');
        removeButton.textContent = 'Remove';
        removeButton.addEventListener('click', function() {
            newProcurationDiv.remove(); // Remove the div when remove button is clicked
        });
        newProcurationDiv.appendChild(removeButton);

        // Append the new div to the container
        document.getElementById('procurationContainer').appendChild(newProcurationDiv);
    }
</script>





<!-- Les votants séléctionnés -->
<script>

$(document).ready(function() {
    // Gestionnaire d'événements pour le bouton "Submit" de la liste des participants
    $("#boutonParticipant").click(function() {
        // Récupérer les options sélectionnées dans la liste des participants
        var selectedOptions = $("#userSelectParticipant option:selected");
        
        // Ajouter les options sélectionnées à la liste des votants
        selectedOptions.each(function() {
            $("#userSelectVotant").append($(this).clone());
        });
    });
});
</script>

<!-- dates de debut et de fin du scrutin -->
<div class="row mt-4">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="optionsContainerdate">
                <h5>Date de debut et de fin du scrutin </h5>
                <div>
                    <label for="">Date de debut</label>
                    <input type="date" name="dateDebut" class="form-control mb-2" required>
                    <label for="">Date de fin</label>
                    <input type="date" name="dateFin" class="form-control mb-2" required>
                    <button  class="btn btn-primary btn-success ms-2" id="boutonDate">Submit</button>
                </div>
            </div>
        </div>  

</body>
</html>
