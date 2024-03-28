<?php

    /*session_start(); // Démarrer la session

    // Récupérer le nom d'utilisateur de la session
    $username = $_SESSION['username'];

    // Lire le fichier JSON
    $json = file_get_contents('Scrutins/Scrutins.json');

    // Convertir le JSON en un tableau PHP
    $data = json_decode($json, true);

    // Afficher le contenu de $data
    var_dump($data);

    // Initialiser le compteur
    $count = 0;

    // Parcourir les scrutins
    foreach ($data as $scrutin) {
        // Vérifier si l'utilisateur est un participant
        if (in_array($username, $scrutin['participants'])) {
            // L'utilisateur est un participant, incrémenter le compteur
            $count++;

            // L'utilisateur est un participant, faire quelque chose...
            echo "L'utilisateur est un participant du scrutin " . $scrutin['numScrutin'];
        }
    }

    // Stocker le compteur dans une variable de session
    $_SESSION['count'] = $count;
    var_dump($_SESSION['count']);*/

    session_start(); // Démarrer la session

    // Récupérer le nom d'utilisateur de la session
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

    // Lire le contenu du fichier JSON
    $json = file_get_contents('Scrutins/Scrutins.json');

    // Convertir le JSON en un tableau PHP
    $data = json_decode($json, true);

    // Initialiser le compteur
    $count = 0;

    // Initialiser une variable pour vérifier si l'utilisateur est présent dans au moins un scrutin
    $userParticipates = false;

    // Parcourir chaque scrutin
    foreach ($data as $scrutin) {
        // Vérifier si l'utilisateur est dans la liste des participants
        if (in_array($username, $scrutin['participants'])) {
            // L'utilisateur est présent dans ce scrutin
            $userParticipates = true;
            $count++;
            // Pas besoin de vérifier d'autres scrutins, donc sortir de la boucle
            break;
        }
    }

    // Stocker le compteur dans une variable de session
$_SESSION['count'] = $count;
var_dump($_SESSION['count']);
var_dump($userParticipates);

?>



<script>
    // Récupérer la valeur de $count de PHP
    var count = <?php echo $count; ?>;

    // Récupérer le nom d'utilisateur de PHP
    var username = "<?php echo $username; ?>";

    // Vérifier si l'utilisateur peut voter
    if (count > 0) {
        console.log(username + " peut voter.");
    } else {
        console.log(username + " ne peut pas voter.");
    }
</script>