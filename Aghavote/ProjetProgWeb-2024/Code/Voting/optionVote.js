function generateOptions() {
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
});
