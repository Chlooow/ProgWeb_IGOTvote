<?php
    session_start(); // Démarrer la session
    /**
     * File Name: logout.php
     * relies on: login.js
     * This code destroys the session and redirects the user to the login page.
     */
    // Détruire toutes les variables de session
    session_unset();
    // Détruire la session
    if(session_destroy()) {
        echo "Session détruite avec succès";
    } else {
        echo "Échec de la destruction de session";
    }
    // Rediriger vers la page de connexion ou une autre page de votre choix
    //header("Location: L.php"); // Remplacez "login.php" par l'URL de la page de connexion
    //exit(0);
?>