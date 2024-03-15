<?php
    // Récupérer les données POST
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lire le fichier JSON
    $json = file_get_contents('../../Datas/Login-data.JSON');

    // Convertir le JSON en un tableau PHP
    $data = json_decode($json, true);

    // Parcourir les utilisateurs pour vérifier les informations d'identification
    foreach ($data['utilisateurs'] as $utilisateur) {
        if ($utilisateur['Username '] === $username && $utilisateur['password'] === $password) {
            // Connexion réussie
            echo "success";
            exit;
        }
    }

    // Si nous arrivons ici, cela signifie que les informations d'identification étaient incorrectes
    echo "error";
?>