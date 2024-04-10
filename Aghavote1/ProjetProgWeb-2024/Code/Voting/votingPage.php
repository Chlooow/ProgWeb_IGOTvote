<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter pour un scrutin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="optionVote.js"></script>
    <script src="../SignUp/login.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
  

    <style>
        body {
            background-color: lightgreen; /* Change la couleur de fond en vert */
        }
    </style>

<style type= "text/css">
        #voting-box, #votingResults
        { display: none; }
    </style>
</head>


</body>

<!-- bouton de retour -->

<a href="../SignUp/pageChoix.php" class="btn btn-sucess btn-secondary mt-2 d-block mx-auto" style="position: absolute; top: 0; left: 10px;">Back</a>

<!-- les scrutins possibles auquels User peu voter -->
<!-- ALERTE -->
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-4 offset-lg-4" id="alert">
            <div class="alert alert-success">
            <?php
                // Check if the username is set in the session
                if (isset($_SESSION['username'])) {
                    // Display the username in the alert message
                    echo '<strong>Bonjour ' . $_SESSION['username'] . ', tu peux voter actuellement pour les scrutins suivants (' . $_SESSION['count'] . ').';

                    // Check if the user has procurations
                    if (isset($_SESSION['userProcurations']) && !empty($_SESSION['userProcurations'])) {
                        echo ' Tu as des procurations pour les scrutins suivants : ';
                        foreach ($_SESSION['userProcurations'] as $numScrutin => $procurationCount) {
                            echo 'Numéro de scrutin : ' . $numScrutin . ' (Procuration : ' . $procurationCount . '), ';
                        }
                    }
                } else {
                    // If the username is not set in the session, display a default message
                    echo '<strong>Bonjour, tu peux voter actuellement pour les scrutins suivants (' . $_SESSION['count'] . ')';
                }
                ?>
                </strong>
            </div>
        </div>
    </div>

<div class="container">
        <div class="row">
        <main>
            <div class="py-5 text-center bg-light rounded" id="choosingS-box">
                <img class="d-block mx-auto mb-4" src="\ProjetProgWeb-2024\Assets\Ahgalogo.svg" alt="" width="72" height="57">
                <h2> Vous pouvez voter pour <?php echo isset($_SESSION['count']) ? $_SESSION['count'] : ''; ?> Scrutin(s) </h2>
                <div class="d-grid gap col-6 mx-auto">
                    <!--<form id="form" action="vote.php" method="POST">-->
                        <div class="form-group">
                            <label for="choix">Voici les scrutins pour Lequel(lesquels) vous pouvez voter</label>
                                <select class="form-select mt-3" id="choix-scrutin" name="choix">

                                    <?php foreach ($_SESSION['scrutins'] as $scrutin): ?>
                                        <option value="<?php echo $scrutin['numScrutin']; ?>">
                                        <?php echo "Numéro du scrutin : " . $scrutin['numScrutin'] . " statut " . $scrutin['statut']; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                        </div>
                        <button type="submit" class="btn btn-success mt-3" id="letsvote" onclick="handleSelectChange();">Voter</button>
                        <button type="submit" class="btn btn-success mt-3" id="resultsbtn" onclick="afficherResultats();">Résultats</button>
                    <!--</form>-->
                </div>
            </div>
        </main>
    </div>
</div>

<script>
getProcuration();

    //getScrutin();
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

    if(checkIfVoted(selectedScrutin.numScrutin) == true){
        //alert("Vous avez déjà voté pour ce scrutin");
        $("#letsvote").prop(disabled, true);
        return;
    }

    if(selectedScrutin.statut == false){
        alert("Le scrutin est clos, vous ne pouvez pas voter ! Mais vous pouvez consulter les résultats");
    } else {
        //if(checkIfVoted()){
           /// alert("Vous avez déjà voté pour ce scrutin");
            //return;
        //} else {
                // Display the voting box
            /*$("#letsvote").click(function(){
                    $("#voting-box").show();
                    $("#choosingS-box").hide();
                    $("#alert").hide();
                });*/
        //}
    // Display the scrutin information
    if (selectedScrutin && selectedScrutin.options) {
        console.log("Selected scrutin:", selectedScrutin);
        // Update the HTML elements to display scrutin information
        $("#voting-box").show();
        $("#choosingS-box").hide();
        $("#alert").hide();

        $("#selected-scrutin-num").text(selectedScrutin.numScrutin);
        $("#selected-scrutin-title").text(selectedScrutin.titre);
        $("#selected-scrutin-organisateur").text(selectedScrutin.organisateur);
        $("#selected-scrutin-question").text(selectedScrutin.question);

        // Update the options in the select element
        var optionsHtml = "";
        selectedScrutin.options.forEach(function(option, index) {
            optionsHtml += "<option value='" + index + "'>" + option + "</option>";
        });
        $("#choix").html(optionsHtml);

    } else {
        console.log("Selected scrutin not found or doesn't have options.");
    }
}
}

function afficherResultats() {
    var selectedScrutinId = $("#choix-scrutin").val();
    console.log("Selected value:", selectedScrutinId);

    // Assuming your scrutins data is stored in a PHP array called $scrutinsData
    var scrutinsData = <?php echo json_encode($_SESSION['scrutins']); ?>;
    console.log("Scrutins data:", scrutinsData);

    // Find the scrutin object with the selected ID from the session data
    var selectedScrutin = scrutinsData.find(function(scrutin) {
        return scrutin.numScrutin === selectedScrutinId;
    });

    if(selectedScrutin.statut == true){
        alert("Le scrutin est en cours, vous ne pouvez pas voir les résultats");
        return;
    }

    if(checkIfVoted(scrutinNumber) == true){
        //alert("Vous avez déjà voté pour ce scrutin");
        $("#vote").prop(disabled, true);
        return;
    }

    // Display the scrutin information
    if (selectedScrutin && selectedScrutin.options) {
        console.log("Selected scrutin:", selectedScrutin);
        // Update the HTML elements to display scrutin information
        $("#voting-box").hide();
        $("#votingResults").show();
        $("#choosingS-box").hide();
        $("#alert").hide();

        // Get and display results
        getResults(selectedScrutin.numScrutin);

        var contentHtml = "<p>Numéro de scrutin: " + selectedScrutin.numScrutin + "</p>" +
                "<p>Titre: " + selectedScrutin.titre + "</p>" +
                "<p>Organisateur: " + selectedScrutin.organisateur + "</p>" +
                "<p>Question: " + selectedScrutin.question + "</p>";

        // Update the options in the select element
        var optionsHtml = "";
        selectedScrutin.options.forEach(function (option) {
            optionsHtml += "<p>" + option + "</p>"; // Separate options with line breaks
        });
        // Append options to contentHtml
        contentHtml += optionsHtml;

        // Set the content to votingResultsContent
        $("#votingResultsContent").html(contentHtml);


    } else {
        console.log("Selected scrutin not found or doesn't have options.");
    }
}

</script>

<!-- script pour afficher la boite de vote et faire disparaitre celle de choix de scrutin-->
<script type= "text/javascript">
                $(document).ready(function(){
                
            $("#backtoscrutin").click(function(){
            $("#voting-box").hide();
            $("#choosingS-box").show();
            $("#alert").show();
    });
    $("#backtoscrutin2").click(function(){
            $("#voting-box").hide();
            $("#choosingS-box").show();
            $("#alert").show();
            $("#votingResults").hide();
    });
});
</script>

<!-- -------------------------------------------------- -->


<div class="container">
    <div class="row">
        <main>
            <div class="py-5 text-center bg-light rounded" id="voting-box">
            <button type="submit" class="btn btn-success mb-4" id="backtoscrutin">Back</button>
                <img class="d-block mx-auto mb-4" src="\ProjetProgWeb-2024\Assets\Ahgalogo.svg" alt="" width="72" height="57">

                <h2> Scrutin N° <label for="selected-scrutin-num" id="selected-scrutin-num"></label> </h2>
                <h4> <label for="selected-scrutin-title" id="selected-scrutin-title"></label> </h4>
                <h4> Organisateur: <label for="selected-scrutin-organisateur" id="selected-scrutin-organisateur"></label></h4> 
                <h4> Question: <label for="selected-scrutin-question" id="selected-scrutin-question"></label></h4>

                <div class="d-grid gap col-6 mx-auto">
                    <!--<form id="form" action="vote.php" method="POST">-->
                    <h4><label for="choix" class=""> Options de vote : </label></h4>
                        <div class="form-group row">
                            <div class="mb-4">
                                <select class="form-select mt-3" id="choix" name="choix">
                                </select>
                            </div>
                        </div>
                        <button type="submit" id ="vote" class="btn btn-success" onclick=" vote()">Voter</button>
                    <!--</form>-->
                    
    </div>
</div>

<!-- Section to display results -->
<div class="container mt-4">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="votingResults">
            <button type="submit" class="btn btn-success mb-4" id="backtoscrutin2">Back</button>
                <h5>Résultats du scrutin</h5>
                <div id="votingResultsContent">
                </div>
                <p> _________________</p>
                <div id="votingResultsContent2">
                    <!-- Results will be dynamically added here -->
                </div>
            </div>
        </div>
    </div>

<footer class="footer /* Couleur du texte */">© Chloe Makoundou Projet ProgWeb 2023-2024</footer>
</body>

</html>



