<?php session_start();?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> IGOTVote </title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="login.js"></script> <!-- Lien vers votre fichier JavaScript -->

    <script src="../Voting/gererScrutin.php"></script>
  

    <style>
        body {
            background-color: lightgreen; /* Change la couleur de fond en vert */
        }
    </style>
</head>

<!-- BACKGROUND -->
<body class="bg-lightgreen">
    <div class="container">
        <div class="row">
        <main>
            <div class="py-5 text-center bg-light rounded">
                <img class="d-block mx-auto mb-4" src="\ProjetProgWeb-2024\Assets\Ahgalogo.svg" alt="" width="72" height="57">
                <h2> Bienvenue sur IGOTVote </h2>
                <h2> Qu'est-ce que vous voulez faire 
                    <?php
                        echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?> ? </h2>
                <div class="d-grid gap-2 col-6 mx-auto">
                    
                        <a href="/ProjetProgWeb-2024/Code/Voting/createScrutin.php" class="btn btn-success" type="button">Créer un scrutin</a>

                        <!-- Vérifier si l'utilisateur peut gérer un scrutin -->
                        <button class="btn btn-success" type="button" name="button-manage" onclick="redirectToManage();">Gerer un scrutin deja existant</button>

                        <script>
                              console.log("Redirecting to managing page...");

                            function redirectToManage() {
                                window.location.href = "/ProjetProgWeb-2024/Code/Voting/gererScrutin.php";
                            }   
                        </script>

                        
                        <!-- Vérifier si l'utilisateur peut voter -->
                        <button class="btn btn-success" name="btnvote" onclick="redirectToVotingPage();" type="button" > Voter </button>

                        <script>
                            function redirectToVotingPage() {
                                window.location.href = "/ProjetProgWeb-2024/Code/Voting/votingPage.php";
                            }   
                        </script>

                        <script>
                            
                                getScrutinToManage() ;
                                getScrutin();
                                </script>
                        
                        <!-- deconnexion -->
                    <a onclick="logout()" class="btn btn-success" type="button">Deconnexion</a>
                </div>

            </div>
        </div>
        <footer class="footer /* Couleur du texte */">© Chloe Makoundou Projet ProgWeb 2023-2024</footer>
    </body>
    
    </html>