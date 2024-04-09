<?php
session_start();

// Receive the scrutin number and selected option from the AJAX request
$scrutinNumber = $_POST['scrutinNumber'];
$selectedOption = $_POST['selectedOption'];
$userVoting = $_SESSION['username'];

// Validate and sanitize the input data (omitted for brevity)

// Load the existing results from results.json
$resultsJson = file_get_contents('results.json');
$results = json_decode($resultsJson, true);

//put the already voted users in an array
$scrutinJson = file_get_contents('./Scrutins/Scrutins.json');
$scrutins = json_decode($scrutinJson, true);

// Check if scrutinNumber exists in the results
if (array_key_exists($scrutinNumber, $results)) {
    // Add the new vote to the existing results
    $results[$scrutinNumber][] = array(
        'votername' => $userVoting,
        'option' => $selectedOption
    );
} else {
    // Create a new entry for the scrutinNumber if it doesn't exist
    $results[$scrutinNumber] = array(
        array(
            'votername' => $userVoting,
            'option' => $selectedOption
        )
    );
}

foreach($scrutins as &$scrutin){
    if ($scrutin['numScrutin'] === $scrutinNumber) {
        if (!isset($scrutin['alreadyVoted'])) {
            $scrutin['alreadyVoted'] = array();
        }
        $scrutin['alreadyVoted'][] = $userVoting;
    }
}
unset($scrutin);

// Encode the updated results array back to JSON format
$newResultsJson = json_encode($results, JSON_PRETTY_PRINT);
$scrutinJson = json_encode($scrutins, JSON_PRETTY_PRINT);
// Write the updated JSON data back to the file
file_put_contents('results.json', $newResultsJson);
file_put_contents('./Scrutins/Scrutins.json', $scrutinJson);

// Return a success response
echo json_encode(array('success' => true));
?>