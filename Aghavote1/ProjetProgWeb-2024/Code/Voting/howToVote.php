<?php
session_start(); // Démarrer la session

// Récupérer le nom d'utilisateur de la session
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

// Lire le contenu du fichier JSON
$json = file_get_contents('../Voting/Scrutins/Scrutins.json');

// Convertir le JSON en un tableau PHP
$data = json_decode($json, true);

// Initialiser un tableau pour stocker les procurations de l'utilisateur
$userProcurations = [];

// Parcourir chaque scrutin
foreach ($data as $i=>$scrutin) {
    if(isset($scrutin['procuration']) && is_array($scrutin['procuration'])) {
        // Vérifier si l'utilisateur est dans la liste des participants
        if (in_array($username, $scrutin['procuration'])) {
            // Ajouter la procuration de l'utilisateur au tableau des procurations
            $userProcurations[$scrutin['numScrutin']] = $scrutin['procuration'][$username];
        }
    }
}
// Si l'utilisateur a des procurations, stocker les procurations dans la session
if (!empty($userProcurations)) {
    $_SESSION['userProcurations'] = $userProcurations;
} else {
    // Sinon, stocker un message d'erreur dans la session
    $_SESSION['userProcurations'] = array('error' => 'Aucune procuration trouvée pour cet utilisateur.');
}

// Retourner une réponse vide
echo "";
?>
