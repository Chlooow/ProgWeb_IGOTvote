# ProgWeb_Ahgavote
Projet Programmation web - 2023 / 2024 - système de vote
https://codimd.math.cnrs.fr/__PaSu03RrucOY4oneaw0Q?edit

# Projet ProgWeb 2024 - AHGAVOTE

## Pourcentage

> [60%]

### Page d'accueil

- [x] Présentation
- [x] Lien vers login

### Login
- [x] Username
- [x] Password
- [ ] pas de compte sign up
- [x] bouton login
- [ ] le compte n'existe pas

### Sign Up
- [x] Username
- [x] Password
- [x] Confirm password
- [x] deja un compte ? login
- [x] bouton sign up
- [x] e-mail
- [x] le compte crée existe deja
- [x] json des inscrits

### Que voulez-vous faire
- [x] Crée un scrutin
- [ ] Gérer un scrutin existant
- [x] voter
- [x] deconnexion

### Crée un scrutin
- [x] Numéro du scrutin
- [x] L'organisateur
- [x] titre
- [x] question
- [x] options
- [x] intitulé des options
- [x] liste des users
- [x] ceux qui peuvent voter
- [x] ceux qui ont deja voté
- [ ] procurations (0, 1 ou 2 fois)
- [x] btn crée un scrutin
- [ ] fermer un scrutin
- [ ] résultats
- [ ] détruire le scrutin
- [x] btn back
- [ ] le taux de participation
- [ ] json des scrutins


- [ ] gérer un scrutin existant

### page de voting
- [ ] Voter
- [ ] transmettre les résultats
- [ ] Encrypter les votes
- [x] retourner en arrière

### Bonus page de procuration
- [ ] liste des personnes ayant un compte
- [ ] la personne qui donne procuration
- [ ] je donne la procuration à...
________

### A FAIRE 28/03
- [ ] Détruire un scrutin -> marche pas
- [ ] fermer un scrutin
- [ ] procuration
- [ ] Gerer un scrutin existant
- [x] bouton voter en fonction des users -> ne marche pas
- [x] donner le nom de l'organisateur dans le JSON
________

### Cahier des charges du prof

- [ ] Les votants et l’organisateur ne seront pas anonymes (login-mot de passe requis)
- [ ] Les votes sont anonymes (A la fin on ne sait pas qui a voté quoi)
- [ ] La liste des personnes ayant votés est semi anonyme. Le système doit garder une liste de personnes ayant voté pour éviter de les laisser voter plus de fois que nécessaire mais la liste n’est pas affichée.
- [ ] Les votants pourront porter 0, 1 ou 2 procurations. La personne donnant procuration 
pouvant donner des consignes de vote il conviendra de faire voter 1,2 ou trois fois le votant 
indépendamment. C’est l’organisateur du vote qui renseigne qui a donné procuration à qui.

- [ ] L’organisateur du vote souhaite gérer des listes de votants afin d’enchainer les scrutins (ie, une liste L3 miage, une liste L3 info, une liste Enseignant-Prog-Web, etc.). C’est dans ces listes de votants qu’il renseigne combien de procuration porte chaque votant (0, 1 ou 2).

Un scrutin sera toujours composé au moins des trois éléments suivant que l’organisateur 
du scrutin renseignera quand il se sera identifié. 

- [x] Une question
- [x] Des options (= des choix de réponses à la question)
- [x] Une liste de votants (chacun avec un nombre 0,1 ou 2 procurations) 
- [ ] Une liste de votes (liste de bulletins)
- [ ] Une liste de qui a voté et combien de fois.
- [ ] Un votant pourra consulter la liste des scrutins dans lesquels il peut voter, voter bien sûr, mais aussi consulter le taux de participation et le nom de l’organisateur. 
- [ ] L’organisateur pourra aussi consulter le taux de participation et voter aux scrutins dans lesquels il s’inscrit lui-même comme votant.
- [ ] Quand l’organisateur le décide il peut clore le scrutin
- [ ] L’organisateur et tous les votants peuvent alors consulter le résultat (nombre absolue et pourcentage obtenus pour chaque option)
- [ ] Date. Vous pourrez permettre de choisir les options dans un calendrier (dates, plages horaires). Comme le système doodle. Pour l’organisateur comme pour le votant, les plages horaires seront affichées dans un calendrier.
- [ ] Interface de procuration. Plutôt que de renseigner le nombre de procurations pour chaque votant, l’organisateur du scrutin peut simplement fixer une liste complète à l’avance et les votants peuvent venir à l’avance indiquer qui peut porter leur procuration. Le système prendra la première personne présente dans la liste pour porter la procuration.
