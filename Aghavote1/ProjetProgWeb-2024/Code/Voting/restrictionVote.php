<?php
session_start();

// Retrieve scrutin number and session username
$numScrutin = $_GET['numScrutin'];
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

// Load JSON data from file
$json = file_get_contents('../Voting/Scrutins/Scrutins.json');
$data = json_decode($json, true);

// Initialize variable to track if user has already voted
$alreadyVoted = false;

// Iterate through scrutins to find the specified one
foreach ($data as $scrutin) {
    if ($scrutin['numScrutin'] == $numScrutin && $scrutin['statut'] && isset($scrutin['alreadyVoted'])) {
        // Check if the session username is in the alreadyVoted array
        if (in_array($username, $scrutin['alreadyVoted'])) {
            $alreadyVoted = true;
            //break;
        }
        if($scrutin['procuration'] && isset($scrutin['procuration'][$username]) && $scrutin['procuration'][$username] > 0){
            $alreadyVoted = false;
        }
    }
}

// Check if the user is in "procuration"
/*if (isset($scrutin['procuration']) && isset($scrutin['procuration'][$username])) {
    // Allow the user to vote again based on the value in "procuration"
    $alreadyVoted = $scrutin['procuration'][$username] > 0;
}*/

// Send JSON response
header('Content-Type: application/json');
echo json_encode(array('alreadyVoted' => $alreadyVoted));
?>
