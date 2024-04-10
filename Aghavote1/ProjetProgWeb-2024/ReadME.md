# IGOTVote site-web de vote en ligne - Projet ProgWeb 2024

## Introduction

IGOTVote est une plateforme de vote conçue spécifiquement pour les fans du groupe de garçons sud-coréen, GOT7. Elle sert d'extension à un site web plus large dédié exclusivement à GOT7 et à leur fanbase, connue sous le nom de IGOT7.

### À propos de GOT7

GOT7 est un groupe de garçons composé de sept membres formé par JYP Entertainment. Le groupe se compose des membres JayB, Mark, Jackson, Jinyoung, Youngjae, BamBam et Yugyeom. Ils sont connus pour leurs styles musicaux diversifiés, leurs performances énergiques et leur forte base de fans.

## Aperçu de la plateforme

### Structure principal

j'ai decidé de séparer mon projet en 5 Pages :

- Page de Bienvenue/Présentation (bonus) : welcomePage.html
- Page de Login/SignUp (mono-page) : index.php
- Page de choix (naviagation) : PageChoix.php
- Page de vote/résultats : votingPage.php
- Page de gestion de scrutin : createScrutin.php
- Page de création de scrutin : gererScrutin.php


### Structure des dossiers

- Assets : Contient les logos utilisés dans l'applis

- Code : 
    - Authentification : Contient le code brouillon pour l'authentification (non utilisé dans le projet principal).

    - SignUp : Contient le code lié à la gestion des utilisateurs, y compris les fonctionnalités de connexion, déconnexion et inscription. Comprend également des scripts PHP pour les requêtes AJAX.

    - Voting : Comprend le code pour la fonctionnalité de vote, y compris les scripts PHP, les fonctions JavaScript et les requêtes AJAX. Contient également le fichier JSON pour les scrutins et résultat.
        - Scrutins : les fichiers de scrutins
        - Welcome : page de bienvenue/présentation

- Data : Stocke les fichiers de données, en particulier les fichiers JSON.

- Styles : Contient la feuille de style CSS utilisée pour le style de l'interface de la plateforme.

-------

- Sign Up : 
    -  add_user.php : php de l'appel ajax signup()
    -  index.php : formulaire de connextion et de signUp
    -  login.js : fonction js regroupant des AJAX requests
    -  login.php : php de l'appel ajax login()
    -  logout.php : php de l'appel ajax logout()
    -  managerScrutin.php : php de l'appel ajax getScrutinToManage()
    -  pageChoix.php : code de navigation dans le siteweb
    -  participantsVote.php : php de l'appel ajax getScrutin()
- Voting :
    -  Scrutins :
        -  .htaccess : restriction apache du fichier JSON Scrutins.json
        - Scrutins.json : fichier regroupant les scrutins
    -  createScrutin.php : page de construction de la creation de scrutin
    -  gererScrutin.php : page de construction de gestion des scrutin
    -  howToVote.php : php de l'appel ajax getProcuration()
    -  optionVote.js : fonction js regroupant des AJAX resquests
    -  restrictionVote.php : php de l'appel ajax checkIfVoted()
    -  results.json : fichier regroupant les résultats de vote
    -  scrutinProcess : php de l'appel ajax createScrtin()
    -  voteProcess : php de l'appel ajax vote()
    -  votingPage : page de construction pour les votes
- Welcome :
    -  welcomePage.html : page de bienvenue et d'accueil pour la présentation de l'application IGOTVote

-------

## Cahier des charges

### cahier des charges du projet :

- [x] Les votants et l’organisateur ne seront pas anonymes (login-mot de passe requis)

- [x] Les votes sont anonymes (A la fin on ne sait pas qui a voté quoi)

- [x] La liste des personnes ayant votés est semi anonyme. Le système doit garder une liste de personnes ayant voté pour éviter de les laisser voter plus de fois que nécessaire mais la liste n’est pas affichée.

- [x] Les votants pourront porter 0, 1 ou 2 procurations. La personne donnant procuration 
pouvant donner des consignes de vote il conviendra de faire voter 1,2 ou trois fois le votant 
indépendamment. C’est l’organisateur du vote qui renseigne qui a donné procuration à qui.

- [x] L’organisateur du vote souhaite gérer des listes de votants afin d’enchainer les scrutins (ie, une liste L3 miage, une liste L3 info, une liste Enseignant-Prog-Web, etc...).

Un scrutin sera toujours composé au moins des trois éléments suivant que l’organisateur 
du scrutin renseignera quand il se sera identifié. 

- [x] Une question.

- [x] Des options (= des choix de réponses à la question).

- [x] Une liste de votants (chacun avec un nombre 0,1 ou 2 procurations) 

- [x] Une liste de votes (liste de bulletins)

- [x] Une liste de qui a voté et combien de fois.

- [x] Un votant pourra consulter la liste des scrutins dans lesquels il peut voter, voter bien sûr, mais aussi consulter le taux de participation et le nom de l’organisateur. 

- [x] L’organisateur pourra aussi consulter le taux de participation et voter aux scrutins dans lesquels il s’inscrit lui-même comme votant.

- [x] Quand l’organisateur le décide il peut clore le scrutin

- [x] L’organisateur et tous les votants peuvent alors consulter le résultat (nombre absolue et pourcentage obtenus pour chaque option)

-------

- [ ] Date. Vous pourrez permettre de choisir les options dans un calendrier (dates, plages horaires). Comme le système doodle. Pour l’organisateur comme pour le votant, les plages horaires seront affichées dans un calendrier.

- [ ] Encryption des votes car les votes sont semi-anonyme

- [ ] Interface de procuration. Plutôt que de renseigner le nombre de procurations pour chaque votant, l’organisateur du scrutin peut simplement fixer une liste complète à l’avance et les votants peuvent venir à l’avance indiquer qui peut porter leur proc

-------

## Outils et ressources utilisés

- PHP
- HTML/CSS
- MAMP
- JAVASCRIPT
- JQUERY/AJAX
- JSON
- Copilot
- GitHub
- COURS/TP
- CodiMD
- Youtube
- Forum (W3SCHOOL, WayToLearn, OpenClassroom(J'ai appris HTML/CSS/Javascript en auto-didacte avant de prendre l'option ProgWeb.))
- Discord 
- Base de données : Membre officiel du groupe de pop Coréenne "GOT7"

-------

### Méthodes de travail
Environ 5 séances de projet encadrées :

-  Styles, un peu de fonctionnalité et construction du site à la maison.
-  Parties complexes et fonctionnelle en TD.(Essayer de faire le plus de partie fonctionnelle avant le cours du jeudi)

##### Séance 1 :
Poser la structure du code
Login, SignUp, WelcomePage

##### Séance 2 :
Page de navigation
début création de scrutin

##### Séance 3 :
Creation de scrutin
Page de navigation
debut page de vote

##### Séance 4 :
fin Creation de Scrutin
Page de vote
Page de gestion

##### Séance 5 :
Fin page de Gestion
continuer certaines fonctionnalités

### Problèmes rencontrés, bug

- Informations incorrectes d'une session  à une autre :
Il est arrivé que certain user se retrouve avec 0 Scrutins pour voter ou gérer lorsqu'il est organisateur et est bien présent dans le scrutin (Aide reçu : David Rei, Frederic Vernier). Le problème persiste plus ou moins à cette instant.

- Les appeles AJAX :
des problèmes récurrents d'URL à cause de la disposition de mes fichiers
des réponses parfois vides
un nombre important de pages implique de faire des erreurs facilement.

- Attention à respecter les conventions de nommage de variables/fichiers/id à l'avenir pour éviter les erreurs.
snake_case
camelCase
PascalCase
kebab-case

## Conclusion
Tout au long du développement de la plateforme de vote IGOTVote, j'ai découvert et affiné ma passion pour le web-design et le développement de sites web. Ce projet, entrepris dans le cadre de l'option "progweb", m'a donnés des connaissances sur l'utilisation du modèle serveur-client pour construire un site web efficace.

Avant cette option, j'avais commencé à explorer Node.js et React.js lors d'une formation avec mon oncle. En effet, j'ai pu mettre mes connaissances appris en auto-didacte de HTML/CSS, et JavaScript sur ce projet et j'ai également appris un nouveau langages PHP et l'existence de bibliothèques.

Il y a une demande : 
La création d'un site web pro pour GOT7. Car le groupe ne dispose actuellement pas d'une présence officielle et bien référencée en ligne.
En créant une plateforme dédiée à GOT7 et à leur fanbase, mon objectif est de fournir aux fans un hub centralisé pour accéder à des informations professionnelles et interagir avec le contenu du groupe. Cette initiative ouvre également des portes pour d'éventuelles collaborations avec des investisseurs, des marques et d'autres parties intéressées par un partenariat avec GOT7.

le projet est en cours de brainstorming...

Ainsi, IGOTVote ne serais qu'une petite extension de ce futur site-web !


##### Pourcentage final
> 80% de ce que j'aurais voulu vraiment faire
(Encryption des votes, Dates, Plateforme de procuration)
> 98,5% du projet en général

##### Historique 
> 20%=>33%=>50%=>80%

##### Self-Evaluation
> 14,5/20