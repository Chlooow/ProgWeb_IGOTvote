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

/*function login(utilisateurs) {
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

        // Ajax

        // Si les informations sont correctes, rediriger vers une autre page
        if (user) {
            alert("Connexion réussie !");
            window.location.href = "pageChoix.html"; // Rediriger vers la page protégée
        } else {
            // Afficher un message d'erreur si les informations sont incorrectes
            alert("Nom d'utilisateur ou mot de passe incorrect !");
        }
    });
}*/

// Fonction de connexion

function login() {
    // Gérer la soumission du formulaire de connexion
    /*$("#login-frm").submit(function(event) {
        event.preventDefault();*/

        // Récupérer les valeurs des champs du formulaire
        var username = $("input[name='username']").val();
        var password = $("input[name='pswrd']").val();

        // Créer un objet à envoyer avec la requête AJAX
        var data = {
            username: username,
            password: password
        };

        // Envoyer la requête AJAX
        $.ajax({
            type: "POST",
            url: "login.php", // URL de votre script de connexion PHP
            data: data,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                /*Imagine you have a form on a website where users can enter their username and password to log in. Without a CSRF token, 
                someone could create a form on another website that automatically submits a login request to your site when someone visits it*/
             },
            success: function(response) {

                // Vérifier la réponse du serveur
                if (response === "success") {

                    // Rediriger vers une autre page en cas de succès
                    window.location.href = "pageChoix.php";
                } else {
                    // Afficher un message d'erreur si les informations sont incorrectes
                    alert("Nom d'utilisateur ou mot de passe incorrect !");
                }
            },
            error: function() {
                // Gérer les erreurs de la requête AJAX
                alert("Une erreur s'est produite lors de la connexion.");
            }
        });
}

// fonction de sign up

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


    // Fonction de déconnexion

    function logout() {
        // Gérer la soumission du formulaire de connexion
        /*$("#login-frm").submit(function(event) {
            event.preventDefault();*/
    console.log("logout");
            // Envoyer la requête AJAX
            $.ajax({
                type: "POST",
                url: "logout.php", // URL de votre script de connexion PHP
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                 },
                success: function(response) {
 
                    console.log(response);
                        // Rediriger vers une autre page en cas de succès
                         window.location.href = "index.php";
                        // Afficher un message d'erreur si les informations sont incorrectes
                },
                error: function() {
                    // Gérer les erreurs de la requête AJAX
                    alert("Une erreur s'est produite lors de la déconnexion.");
                }
            });
    }


    // fonction de récupération du statut votant de l'utilisateur

    /* On va chercher dans la base de données Scrutins.json et regarder dans le tableau 
       participants si l'utilisateur est un votant ou non et combien de fois il est présent
       si oui, alors on lui affiche les numéros des scrutins auxquels il peut voter
       il cliquera sur le numéro du scrutin pour voter où il y a aussi le titre du scrutin
       sinon, le bouton de vote est désactivé dans pageChoix.php
    */

       // Fonction de récupération du statut votant de l'utilisateur
    function getScrutin() {
        // Sélectionnez le bouton
        var button = $("button[name=btnvote]");
        // Faites l'appel AJAX
        $.ajax({
            url: 'participantsVote.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data)
                // Si l'utilisateur ne participe pas, désactivez le bouton
                if (data==0) {
                    console.log(data)
                    button.prop('disabled', true);
                } else {
                    button.prop('disabled', false);
                }
            },
            error: function(error) {
                console.error('Erreur:', error);
            }
        });
    }

    var utilisateurs;


$(document).ready(function() {
    // Charger le fichier JSON Login-data.json
    $.getJSON("/ProjetProgWeb-2024/Datas/Login-data.JSON", function(data) {
        // Manipuler les données ici
         utilisateurs = data.utilisateurs;

        // Appeler la fonction pour gérer la connexion
       // login(utilisateurs);
        //login();
       // signup(utilisateurs);
    });
});
