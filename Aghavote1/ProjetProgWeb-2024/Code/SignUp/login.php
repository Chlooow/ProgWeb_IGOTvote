<?php

session_start(); // Démarrer la session

    // Récupérer les données POST
    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;

    // Lire le fichier JSON
    $json = file_get_contents('../../Datas/Login-data.JSON');

    // Convertir le JSON en un tableau PHP
    $data = json_decode($json, true);

    // Parcourir les utilisateurs pour vérifier les informations d'identification
    foreach ($data['utilisateurs'] as $utilisateur) {
        if ($utilisateur['Username '] === $username && $utilisateur['password'] === $password) {
            // Connexion réussie, enregistrer le nom d'utilisateur en session
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            echo "success";
            exit;
        }
    }

    // Si nous arrivons ici, cela signifie que les informations d'identification étaient incorrectes
    echo "error";
?>