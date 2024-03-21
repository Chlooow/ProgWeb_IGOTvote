<?php
header('Content-Type: application/json');
// Vérifier si la requête est une requête AJAX
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // Récupérer les données du formulaire
    $numScrutin = $_POST['numScrutin'];
    $titre = $_POST['titre'];
    $question = $_POST['question'];
    $options = $_POST['options'];
    $participants = $_POST['participants'];
    $votants = $_POST['votants'];
    $dateDebut = $_POST['dateDebut'];
    $dateFin = $_POST['dateFin'];
    $alreadyVoted = $_POST['alreadyVoted'];

    // Créer un tableau avec les données du scrutin
    $scrutin = array(
        'numScrutin' => $numScrutin,
        'titre' => $titre,
        'question' => $question,
        'options' => $options,
        'participants' => $participants,
        'votants' => $votants,
        'dateDebut' => $dateDebut,
        'dateFin' => $dateFin,
        'alreadyVoted' => $alreadyVoted
    );

   // Lire le fichier JSON existant
   $json = file_get_contents('Scrutins/Scrutins.json');
   $scrutins = json_decode($json, true);

   // Ajouter le nouveau scrutin à la liste
   $scrutins[] = $scrutin;

   // Réécrire le fichier JSON
   $json = json_encode($scrutins, JSON_PRETTY_PRINT);
   file_put_contents('Scrutins/Scrutins.json', $json);

   // Envoyer le JSON en réponse
   echo $json;
}
?>