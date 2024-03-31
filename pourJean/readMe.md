# PROBLEME DANS AHGAVOTE2

it's suppose to be this way, example :

Scrutin N° 12345
Organisateur : Toto
Question : Do you want to eat today ?
Options de vote : [it's a select menu and what is weird is that the options are well displayed]

here's my Json :

```json
//filename : Scrutins.json
[
    {
        "numScrutin": "012409",
        "organisateur": "BamBam1a",
        "titre": "Concert GOT7",
        "question": "Voulez-vous que GOT7 reviennent en france ?",
        "options": [
            "Oui",
            "Non"
        ],
        "participants": [
            "Kyum"
        ],
        "votants": null,
        "dateDebut": "2024-03-28",
        "dateFin": "2024-03-29",
        "alreadyVoted": null
    }
]
```

and here's my code that supposed to do the work "votingPage.php"

"participantsVote.php" contains the php to the ajax request

le code qui fait défaut en particulier :

```php
<h2> Scrutin N° <?php echo $selectedScrutin['numScrutin']; ?> </h2>
                <h3> <?php echo $selectedScrutin['titre']; ?> </h3>
                <p> Organisateur: <?php echo $selectedScrutin['organisateur']; ?></p> 
                <p> Question: <?php echo $selectedScrutin['question']; ?></p>
```
