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
    $count = 0;
    $scrutins=array();


    // Parcourir chaque scrutin
    foreach ($data as $i=>$scrutin) {
        $dd .= $json;

        //echo "Username: " . $username . ", Organisateur: " . $scrutin['organisateur'] . "<br>";

        //echo "Scrutin Number: " . $scrutin['numScrutin'] . "<br>";
        // Vérifier si l'utilisateur est organisateur
        if ($username == $scrutin['organisateur']) {
            // L'utilisateur est organisateur
            $isOrganisateur = true;
            $count++;

            /*echo "Scrutin Number: " . $scrutin['numScrutin'] . "<br>";
            echo "isOrganisateur: " . $isOrganisateur . "<br>";
            echo "Username: " . $username . ", Organisateur: " . $scrutin['organisateur'] . "<br>";*/
            
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

$_SESSION['organisateur'] = $isOrganisateur;

$_SESSION['count'] = $count;

// Envoyer le nombre de scrutins dans la réponse
$_SESSION['scrutins'] = $scrutins;
error_log("ff".$_SESSION['count']);
echo $count;

?>
