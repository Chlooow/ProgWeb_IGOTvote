<?php
    session_start(); // Démarrer la session

    // Récupérer le nom d'utilisateur de la session
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

    // Lire le contenu du fichier JSON
    $json = file_get_contents('../Voting/Scrutins/Scrutins.json');

    // Convertir le JSON en un tableau PHP
    $data = json_decode($json, true);

    // Initialiser le compteur
    $count = 0;
    $dd="";
    $scrutins=array();


    // Parcourir chaque scrutin
    foreach ($data as $i=>$scrutin) {
        $dd .= $json;
        if(isset($scrutin['participants']) && is_array($scrutin['participants'])) {

        // Vérifier si l'utilisateur est dans la liste des participants
        if (in_array($username, $scrutin['participants'])) {
            // L'utilisateur est présent dans ce scrutin
            $count++;
            
            // récupérer le scrutin, le titre et l'organisateur
        $scrutins[] = [
            'numScrutin' => $scrutin['numScrutin'],
            'titre' => $scrutin['titre'],
            'organisateur' => $scrutin['organisateur'],
            'question' => $scrutin['question'],
            'options' => $scrutin['options'],
            'statut' => $scrutin['statut']
        ];
        }
    }
    }

// Stocker le compteur dans une variable de session
$_SESSION['count'] = $count;

// Envoyer le nombre de scrutins dans la réponse
$_SESSION['scrutins'] = $scrutins;

echo $count;

?>
