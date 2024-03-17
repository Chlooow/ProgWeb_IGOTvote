<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation d'un scrutin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <!--<script src="optionVote.js"></script>-->
</head>
<body style="background-image: url('https://altselection.com/wp-content/uploads/2022/06/220524-MPD-Twitter-Update-GOT7-NANANA-Relay-Dance-Behind-The-Scenes-documents-1.jpeg'); background-size: cover; background-repeat: repeat;">

<a href="../SignUp/pageChoix.php" class="btn btn-sucess btn-secondary mt-2 d-block mx-auto" style="position: absolute; top: 0; left: 10px;">Back</a>

<!-- Boutons sur le côté droit -->
<div class="position-fixed top-100 end-0 translate-middle-y">
    <button class="btn btn-success mb-4" id="createScrutin" disabled>Créer le scrutin</button><br>
    <button class="btn btn-success mb-4" id="closeScrutin" disabled>Fermer le scrutin</button><br>
    <button class="btn btn-success mb-4" id="viewResults" disabled>Voir les Résultats</button><br>
</div>

<!-- ALERTE -->
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-4 offset-lg-4" id="alert">
            <div class="alert alert-success">
                <strong id="result">Bonjour, pour créer un scrutin veuillez remplir tout les champs 
                    puis cliquer sur start pour commencer le vote. Merci
                </strong>
            </div>
        </div>
    </div>

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

            // Afficher la div optionsContainer une fois que les options sont générées
            $("#optionsContainer").show();
        } else {
            alert("Veuillez entrer un nombre valide d'options de vote.");
        }
    }
</script>

<!-- Les participants -->
<div class="row mt-4">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="optionsContainer">
                <h5>Liste des personnes participant au scrutin </h5>
                <div>
                    <label for="">Personnes ayant un compte sur Aghavote</label>
                    <select name="participants[]" multiple class="form-control" id="userSelect">
                        <!-- les inscrits à AghaVote -->
                    </select>
                </div>
            </div>
        </div>

        <script>
    $(document).ready(function() {

        // Chargement du fichier JSON
        $.getJSON("../../Datas/Login-data.JSON", function(data) {
            var users = data.utilisateurs;
            var select = $("#userSelect");
            
            // Ajout des options au menu déroulant
            $.each(users, function(index, user) {
                var option = $("<option></option>").attr("value", user["Username "]).text(user["Username "]);
                select.append(option);
            });
        });
    });
</script>



</body>
</html>
