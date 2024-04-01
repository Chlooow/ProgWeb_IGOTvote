<?php session_start(); ?>
<!DOCTYPE html>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
  

    <style>
        body {
            background-color: lightgreen; /* Change la couleur de fond en vert */
        }
    </style>

<style type= "text/css">
        #voting-box
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
                <strong id="result"> Bonjour <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>, tu peux voter actuellement pour les scrutins suivants (<?php echo isset($_SESSION['count']) ? $_SESSION['count'] : ''; ?>), avec ... procurations.
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
                                        <?php echo "Numéro du scrutin : " . $scrutin['numScrutin']; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                        </div>
                        <button type="submit" class="btn btn-success mt-3" id="letsvote" onclick="handleSelectChange();">Voter</button>
                    <!--</form>-->
                </div>
            </div>
        </main>
    </div>
</div>

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

</script>

<!-- script pour afficher la boite de vote et faire disparaitre celle de choix de scrutin-->
<script type= "text/javascript">
                $(document).ready(function(){
                $("#letsvote").click(function(){
                $("#voting-box").show();
                $("#choosingS-box").hide();
                $("#alert").hide();
            });
            $("#backtoscrutin").click(function(){
            $("#voting-box").hide();
            $("#choosingS-box").show();
            $("#alert").show();
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
                        <button type="submit" class="btn btn-success" onclick=" vote()">Voter</button>
                    <!--</form>-->
                    
    </div>
</div>
<footer class="footer /* Couleur du texte */">© Chloe Makoundou Projet ProgWeb 2023-2024</footer>
</body>

</html>



