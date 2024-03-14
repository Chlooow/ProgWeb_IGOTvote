/*$(document).ready(function() {
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
});*/

function login(utilisateurs) {
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
}

function signup() {
        // Gérer la soumission du formulaire de sign up

            // Récupérer les valeurs des champs du formulaire
            let name = $("input[name='name']").val();
            let username = $("input[name='usrname']").val();
            let email = $("input[name='email']").val();
            let password = $("input[name='pswrd']").val();

            // Créer un nouvel objet utilisateur
            let newUser = {
                "fullName": name,
                "Username": username,
                "Email": email,
                "password": password
            };

            // ajax 

            $.ajax({
                type : "POST",
                url : "add_user.php",
                data : newUser,

                success : function() {
                    alert("Utilisateur ajouté avec succès!");
                    $("#register-frm")[0].reset();
                },
                error : function() {
                    alert("Erreur lors de l'ajout de l'utilisateur");
                }


            })

            // Ajouter le nouvel utilisateur au tableau d'utilisateurs
            utilisateurs.push(newUser);

            // Afficher une alerte de confirmation

            // Réinitialiser le formulaire
            $("#register-frm")[0].reset();
    }
    var utilisateurs;
$(document).ready(function() {
    // Charger le fichier JSON Login-data.json
    $.getJSON("/ProjetProgWeb-2024/Datas/Login-data.JSON", function(data) {
        // Manipuler les données ici
         utilisateurs = data.utilisateurs;

        // Appeler la fonction pour gérer la connexion
        login(utilisateurs);
       // signup(utilisateurs);
    });
});
