<?php session_start(); 
error_log("gg".$_SESSION['count']);
?>
<!DOCTYPE html>
<!--page pour gérer un scrutin-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerer un Scrutins</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="optionVote.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    

</head>
<body style="background-image: url('https://altselection.com/wp-content/uploads/2022/06/220524-MPD-Twitter-Update-GOT7-NANANA-Relay-Dance-Behind-The-Scenes-documents-1.jpeg'); background-size: cover; background-repeat: repeat;">

<a href="../SignUp/pageChoix.php" class="btn btn-sucess btn-secondary mt-2 d-block mx-auto" style="position: absolute; top: 0; left: 10px;">Back</a>

<!-- Boutons sur le côté droit -->
<div style="position: fixed; top: 90px; right: 0; transform: translate(0, -50%);">
    <button class="btn btn-success mb-4" id="closeScrutin" onclick="closeScrutin();">Fermer le scrutin</button><br>
    <button class="btn btn-success mb-4" id="viewResults" onclick="getResults()"> Voir les Resultats</button><br>
    <button class="btn btn-success mb-4" id="destroyscrutin" data-id="" onclick="console.log('scrutinnnnnnnnn');destroyScrutin();">Detruire le Scrutin</button><br>
</div>

<!-- ALERTE -->
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-4 offset-lg-4" id="alert">
            <div class="alert alert-success">
                <strong id="result"> Bonjour <?php echo $_SESSION['username'];?>, tu peux gérer <?php echo $_SESSION['count'];?> Scrutins actuellement.
                </strong>
            </div>
        </div>
    </div>

    <!-- TEST 
    <div class="container">
        <div class="row">
            TEST TEST
            <?php
       // echo $_SESSION['scrutins'][0]['numScrutin'];
       // echo $_SESSION['scrutins'][0]['organisateur'];

?>
        </div>
    </div>-->

    <div class="container">
        <div class="row">
            <main>
                <div class="py-5 text-center bg-light rounded" id="choose-the-scrutins-box" style="max-width: 400px; margin: 0 auto;">
                    <img class="d-block mx-auto mb-4" src="\ProjetProgWeb-2024\Assets\Ahgalogo.svg" alt="" width="72" height="57">
                    <h2> Vous pouvez gérer <?php echo isset($_SESSION['count']) ? $_SESSION['count'] : ''; ?> Scrutin(s) </h2>
                    <div class="d-grid gap col-6 mx-auto">
                        <div class="form-group">
                            <label for="choix">Voici les scrutin(s) que vous pouvez gérer</label>
                            <select class="form-select mt-3" id="choix-scrutin" name="choix">
                                <?php foreach ($_SESSION['scrutins'] as $scrutin): ?>
                                    <option value="<?php echo $scrutin['numScrutin']; ?>">
                                        <?php echo "Numéro du scrutin : " . $scrutin['numScrutin']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success mt-3" id="letsmanage" onclick="handleSelectChange();"> Gérer</button>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- -------------------------------------- -->


<!-- ID du scrutin -->
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-4 offset-lg-4" id="id-de-scrutin">
            <!-- Numéro de scrutin -->
            <label for="numScrutin" style="color: white;">Numéro de scrutin</label>
            <input type="text" name="numScrutin-a-gerer" id="numScrutin" class="form-control" readonly value="0">
        </div>
    </div>
</div>

<!-- Nom de l'organisateur -->
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-4 offset-lg-4" id="div-organisateur">
            <!-- Nom de l'organisateur -->
            <label for="organisateur" style="color: white;">Nom de l'organisateur</label>
            <input type="text" name="organisateur-scrutin-available" id="organisateur-scrutin-available" class="form-control" readonly value=" ">
        </div>
    </div>
</div>


<!-- -------------------------------------- -->

    <div class="container mt-4" id="div-creation-scrutin">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 bg-light rounded mt-4">
                <h2 class="text-center mt-2"> Gérer un scrutin</h2>
                <!--<form action="" method="post" role="form" class="p-2" id="Creation-scrutin-frm">-->
                <div class="form-group">
                    <!-- Titre du scrutin -->
                    <label for="Titre">Titre du scrutin</label>
                    <input type="text" name="Titre-scrutin" class="form-control mb-2" placeholder="Titre"  readonly value="">
                </div>

                <div class="form-group">
                    <!-- Question du vote -->
                    <label for="Question">Quel est la question du scrutin ?</label>
                    <input type="text" name="Question-scrutin" class="form-control mb-2" placeholder="Question" readonly value="">
                </div>

                <div class="form-group">
                    <!-- Option de vote available-->
                    <h5>Nombre d'options de vote actuelle</h5>
                    <label for="nbOptions" id="available-option"></label>
                </div>

                <p> Voulez-vous en rajouter ? </p>
                    

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
            <div class="row mt-4" id="div-alreadyvoteduser">
                <div class="col-lg-4 offset-lg-4 bg-light rounded" id="optionsContainerParticipant">
                    <h5>Les participants au vote actuelle :</h5>
                    <p> Voulez-vous en rajouter ? </p>
                    <label for="" id="participants-scrutin"></label>
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
                $(document).ready(function () {

                    // Chargement du fichier JSON
                    $.getJSON("../../Datas/Login-data.JSON", function (data) {
                        var users = data.utilisateurs;
                        var select = $("#userSelectParticipant");

                        // Ajout des options au menu déroulant
                        $.each(users, function (index, user) {
                            var option = $("<option></option>").attr("value", user["Username "]).text(user["Username "]);
                            select.append(option);
                        });
                    });
                });
            </script>

            <!-- ceux qu'on designe pour voter -->
            <div class="row mt-4" id="div-lesvotants">
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

            <!-- Les votants séléctionnés -->
            <script>
                $(document).ready(function () {
                    // Gestionnaire d'événements pour le bouton "Submit" de la liste des participants
                    $("#boutonParticipant").click(function () {
                        // Récupérer les options sélectionnées dans la liste des participants
                        var selectedOptions = $("#userSelectParticipant option:selected");

                        // Ajouter les options sélectionnées à la liste des votants
                        selectedOptions.each(function () {
                            $("#userSelectVotant").append($(this).clone());
                        });
                    });
                });
            </script>

            <!-- dates de debut et de fin du scrutin -->
            <div id="div-date">
                <div class="row mt-4">
                    <div class="col-lg-4 offset-lg-4 bg-light rounded" id="optionsContainerdate">
                        <h5>Date de debut et de fin du scrutin actuelle</h5>
                        <li>
                        <label for="date-debut-available" id= "date-debut-available">Date de debut</label>
                        </li>
                        <li>
                        <label for="date-fin-available" id="date-fin-available">Date de fin </label>
                        </li>

                        <h5>Date de debut et de fin du scrutin </h5>
                        <div>
                            <label for="">Date de debut</label>
                            <input type="date" name="dateDebut" class="form-control mb-2" required>
                            <label for="">Date de fin</label>
                            <input type="date" name="dateFin" class="form-control mb-2" required>
                            <button class="btn btn-primary btn-success ms-2" id="boutonDate">Submit</button>
                        </div>
                    </div>
                </div>

                <!-- Ceux qui ont déjà voté -->
                <div class="row mt-4">
                    <div class="col-lg-4 offset-lg-4 bg-light rounded" id="optionsContainervoted">
                    <h5>Personnes ayant déjà voté </h5>
                        <div>
                            
                            <select name="participants[]" multiple class="form-control" id="userSelectAlreadyVoted">
                            </select>
                        </div>
                    </div>
                </div>
            </div>


    <!-- -------------------------------------- -->

    <!-- Taux de participation -->

    <div class="row mt-4">
        <div class="col-lg-4 offset-lg-4 bg-light rounded" id="participationRate">
            <h5>Taux de participation</h5>
            <div id="participationRateContent">
                <!-- Content will be dynamically added here -->
                <button class="btn btn-primary btn-success ms-2" id="boutonParticipation" onclick="participationRate();">Voir</button>
            </div>
        </div>

    <!-- -------------------------------------- -->

    <script>
    // ----------- Taux de participation ----------------

function participationRate() {
    var selectedScrutinId = $("#choix-scrutin").val();
    console.log("Selected value:", selectedScrutinId);

    // Assuming your scrutins data is stored in a PHP array called $scrutinsData
    var scrutinsData = <?php echo json_encode($_SESSION['scrutins']); ?>;
    console.log("Scrutins data:", scrutinsData);

    // Find the scrutin object with the selected ID from the session data
    var selectedScrutin = scrutinsData.find(function(scrutin) {
        return scrutin.numScrutin === selectedScrutinId;
    });
    console.log("Selected scrutin:", selectedScrutin);

    console.log(selectedScrutin.participants.length);
    if(selectedScrutin.alreadyVoted == null){
        selectedScrutin.alreadyVoted = [];
        selectedScrutin.alreadyVoted.length = 0;
        console.log(selectedScrutin.alreadyVoted.length);
    } else {
        console.log(selectedScrutin.alreadyVoted.length);
    }
    
    // Display the scrutin information
    if (selectedScrutin && selectedScrutin.participants && selectedScrutin.alreadyVoted) {

    // Récupérer le numéro de scrutin
    var numScrutin = $("#numScrutin").val();
    var participants = selectedScrutin.participants.length;
    var alreadyVoted = selectedScrutin.alreadyVoted.length;

   
    // Calculer le taux de participation
    var participationRate = (alreadyVoted / participants) * 100;
    // Afficher le taux de participation
    alert("Le taux de participation est de " + participationRate + "%.");
    }
    
    //console.log(participants);
    //console.log(alreadyVoted);
    
}
</script>

    <!-- -------------------------------------- -->

    <!-- Résultat du vote -->
    <div class="row mt-4">
        <div class="col-lg-4 offset-lg-4 bg-light rounded" id="votingResults">
            <h5>Résultats du vote</h5>
            <div id="votingResultsContent">
                <!-- Content will be dynamically added here -->
            </div>
        </div>
    </div>






    <!-- Fonction qui permet de choisir un scrutin dans le select -->

    <script>

    function handleSelectChange() {
    var selectedScrutinId = $("#choix-scrutin").val();
    console.log("Selected value:", selectedScrutinId);

    // Assuming your scrutins data is stored in a PHP array called $scrutinsData
    var scrutinsData = <?php echo json_encode($_SESSION['scrutins']); ?>;
    console.log("Scrutins data:", scrutinsData);

    // Find the scrutin object with the selected ID from the session data
    var selectedScrutin = scrutinsData.find(function(scrutin) {
        return scrutin.numScrutin === selectedScrutinId;
    });
    console.log("Selected scrutin:", selectedScrutin);

    // Display the scrutin information
    if (selectedScrutin && selectedScrutin.options) {
        console.log("Selected scrutin:", selectedScrutin);
        // Update the HTML elements to display scrutin information

        // Set the value of the Question input field
        $("input[name='Question-scrutin']").attr('value', selectedScrutin.question);
        $("input[name='Titre-scrutin']").attr('value', selectedScrutin.titre);
        $("input[name='numScrutin-a-gerer']").attr('value', selectedScrutin.numScrutin);
        $("input[name='organisateur-scrutin-available']").attr('value', selectedScrutin.organisateur);

        // Update the options in the select element
        var optionsHtml = "<ul>";
        selectedScrutin.options.forEach(function(option, index) {
            optionsHtml += "<li>" + option + "</li>";
        });
        optionsHtml += "</ul>";
        $("#available-option").html(optionsHtml);

        // Generate the participants list
        var participantsHtml = "<ul>";
        if (selectedScrutin.participants && selectedScrutin.participants.length > 0) {
            selectedScrutin.participants.forEach(function(participant) {
                participantsHtml += "<li>" + participant + "</li>";
            });
        } else {
            participantsHtml += "<li>No participants</li>";
        }
        participantsHtml += "</ul>";

        // Update the HTML content with the participants list
        $("#participants-scrutin").html(participantsHtml);

        // Display the date information
        var dateDebut = selectedScrutin.dateDebut;
        var dateFin = selectedScrutin.dateFin;

        // Update the HTML elements with the date information
        $("#date-debut-available").text(dateDebut);
        $("#date-fin-available").text(dateFin);

        // Display the already voted users
        if (selectedScrutin.alreadyVoted) {
            let stringy = "Personnes ayant déjà voté : ";
            var alreadyVotedHtml = "<select name='participants[]' multiple class='form-control'>";
            alreadyVotedHtml += "<label >"+ stringy + "</label>";
            selectedScrutin.alreadyVoted.forEach(function(voter) {
                alreadyVotedHtml += "<option value='" + voter + "'>" + voter + "</option>";
            });
            alreadyVotedHtml += "</select>";
            //alreadyVotedHtml += "<button class='btn btn-primary btn-success ms-2' id='boutonalreadyvoted'>Submit</button>";
            $("#optionsContainervoted").html(alreadyVotedHtml);
        } else {
            $("#optionsContainervoted").html("None");
        }

    } else {
        console.log("Selected scrutin not found or doesn't have options.");
    }
}

                $("#viewResults").hide();
                $("#votingResults").hide();
                
                // Fonction pour fermer le scrutin
                $("#closeScrutin").click(function () {
                    $("#viewResults").show();
                });

                // fonction pour afficher les resultats
                $("#viewResults").click(function () {
                    $("#votingResults").show();
                });
</script>






<!-- -------------------------------------- -->


            </body>
            </html>
