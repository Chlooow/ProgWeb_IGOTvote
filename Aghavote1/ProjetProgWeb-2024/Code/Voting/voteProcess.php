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

// Add the new vote to the results array
$results[$scrutinNumber] = array( 
    array(
    'votername' => $userVoting, // Replace 'User Name' with the actual voter's name
    'option' => $selectedOption
    )
);

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
