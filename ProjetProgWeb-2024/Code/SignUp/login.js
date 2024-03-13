$(document).ready(function() {
    // Charger le fichier JSON Login-data.json
    $.getJSON("/ProjetProgWeb-2024/Datas/Login-data.JSON", function(data) {
        // Manipuler les données ici
        var utilisateurs = data.utilisateurs;

        // Gérer la soumission du formulaire de connexion
        $("#login-frm").submit(function(event) {
            event.preventDefault();

            // Récupérer les valeurs des champs du formulaire
            var username = $("input[name='username']").val();
            var password = $("input[name='pswrd']").val();

            // Vérifier les informations d'identification de l'utilisateur
            var user = utilisateurs.find(function(u) {
                return u["Username "] === username && u.password === password;
            });

            // Si les informations sont correctes, rediriger vers une autre page
            if (user) {
                alert("Connexion réussie !");
                window.location.href = "pageChoix.html"; // Rediriger vers la page protégée
            } else {
                // Afficher un message d'erreur si les informations sont incorrectes
                alert("Nom d'utilisateur ou mot de passe incorrect !");
            }
        });
    });
});