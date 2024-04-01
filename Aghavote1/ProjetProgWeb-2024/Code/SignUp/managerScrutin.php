<?php
    session_start(); // Démarrer la session

    // Récupérer le nom d'utilisateur de la session
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

    // Lire le contenu du fichier JSON
    $json = file_get_contents('../Voting/Scrutins/Scrutins.json');

    // Convertir le JSON en un tableau PHP
    $data = json_decode($json, true);

    $isOrganisateur = false;
    $dd="";

    // Parcourir chaque scrutin
    foreach ($data as $i=>$scrutin) {
        $dd .= $json;
        // Vérifier si l'utilisateur est organisateur
        if (in_array($username, $scrutin['organisateur'])) {
            // L'utilisateur est présent dans ce scrutin
            $isOrganisateur = true;
            
            // récupérer le scrutin, le titre et l'organisateur
        $scrutins[] = [
            'numScrutin' => $scrutin['numScrutin'],
            'titre' => $scrutin['titre'],
            'organisateur' => $scrutin['organisateur'],
            'question' => $scrutin['question'],
            'options' => $scrutin['options'],
            'participants' => $scrutin['participants'],
            'votants' => $scrutin['votants'],
            'dateDebut' => $scrutin['dateDebut'],
            'dateFin' => $scrutin['dateFin'],
            'alreadyVoted' => $scrutin['alreadyVoted']
        ];
        }
    }

// Stocker le compteur dans une variable de session
$_SESSION['organisateur'] = $isOrganisateur;

// Envoyer le nombre de scrutins dans la réponse
$_SESSION['scrutins'] = $scrutins;

echo $count;

?>
