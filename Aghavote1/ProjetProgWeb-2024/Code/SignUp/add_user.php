<?php

/** File Name: add_user.php
 * relies on: Login-data.JSON and signup() in login.js
 * relié à l'appel AJAX dans login.js
 * Ce code ajoute un nouvel utilisateur au fichier JSON contenant les données de connexion qu'il fournit.
 */

// Récupérer les données du formulaire
$name = $_POST['fullName'];
$username = $_POST['Username'];
$email = $_POST['Email'];
$password = $_POST['password'];
// Charger le contenu du fichier JSON
$json_file = file_get_contents('../../Datas/Login-data.JSON');
//error_log(json_encode($data));
$data = json_decode($json_file, true);
//error_log(json_encode($data));

// Ajouter le nouvel utilisateur au tableau des utilisateurs
$new_user = array(
    "full Name" => $name,
    "Username" => $username,
    "Email" => $email,
    "password" => $password
);
array_push($data['utilisateurs'], $new_user);

// Écrire les données modifiées dans le fichier JSON
file_put_contents('../../Datas/Login-data.JSON', json_encode($data, JSON_PRETTY_PRINT));

// Rediriger l'utilisateur vers une page de confirmation

?>
