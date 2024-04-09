<?php
    session_start(); // Démarrer la session

    function updateScrutinStatus($numScrutin, $newStatus) {
        // Lire le fichier JSON
        $json = file_get_contents('../Voting/Scrutins/Scrutins.json');
        $data= json_decode($json, true);

        // Parcourir les scrutins
        foreach ($data as &$scrutin) {
            // Vérifier si le scrutin a le bon numéro
            if ($scrutin['numScrutin'] == $numScrutin) {
                // Mettre à jour le statut du scrutin
                $scrutin['statut'] = $newStatus;
            }
        }

        // Réécrire le fichier JSON
        $json = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents('../Voting/Scrutins/Scrutins.json', $json);
    }

    if(isset($_POST['numScrutin']) && isset($_POST['statut'])) {
        updateScrutinStatus($_POST['numScrutin'], false);
        echo json_encode(['success' => true]);
        exit;
    }

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
            'dateDebut' => $scrutin['dateDebut'],
            'dateFin' => $scrutin['dateFin'],
            'alreadyVoted' => $scrutin['alreadyVoted'],
            'statut' => $scrutin['statut']
        ];
        }
    }

$_SESSION['organisateur'] = $isOrganisateur;
//$_SESSION['statut'] = $scrutins['statut'];

$_SESSION['count'] = $count;

// Envoyer le nombre de scrutins dans la réponse
$_SESSION['scrutins'] = $scrutins;
error_log("ff".$_SESSION['count']);
echo $count;

?>
