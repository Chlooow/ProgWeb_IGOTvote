# IGOTvote
Aghavote est une plateforme de vote en ligne permettant de gérer des scrutins de manière simple et efficace. Inspirée par les plateformes de vote telles que Belenios et Balotilo, Aghavote permet aux organisateurs de créer des votes en ligne sécurisés et anonymes, tout en facilitant la gestion des procurations et le suivi de la participation.

## Objectif
L’objectif de ce projet est de fournir une solution complète de gestion de scrutins, adaptée aux besoins de divers groupes, notamment les étudiants. Aghavote assure un environnement de vote structuré où :

Les votants et organisateurs sont authentifiés, mais les votes sont anonymes.
La gestion des procurations est intégrée, permettant de déléguer un vote avec des consignes spécifiques.
Les résultats sont présentés de manière claire et transparente pour tous les participants à la clôture des votes.

## Fonctionnalités Principales
Aghavote inclut les fonctionnalités suivantes :

- **Authentification des utilisateurs** : Les organisateurs et votants s’authentifient via un login et un mot de passe.
- **Création et gestion de scrutins** : L’organisateur peut créer des questions de vote avec plusieurs options de réponse, gérer la liste des votants, et assigner des procurations.
- **Vote anonyme** : Les votes sont anonymes et sécurisés ; la liste des personnes ayant voté est tenue secrète.
- **Gestion des procurations** : Les votants peuvent déléguer leur droit de vote, avec des consignes spécifiques si nécessaire.
Affichage des résultats : À la fin du scrutin, les résultats sont visibles pour tous les votants et organisateurs, avec un calcul des pourcentages et des votes absolus.
Technologies Utilisées
- **Langages** : PHP, JavaScript, HTML, CSS
- **Outils** : MAMP pour l’environnement de développement local, jQuery/AJAX pour les interactions dynamiques, JSON pour le stockage des données
- **Bibliothèques** : Bootstrap pour le design, JSEncrypt pour l'encryption (option bonus)

## Organisation du Code
Le projet est structuré de manière à assurer une modularité et une maintenance optimales :

**Pages principales** :
- **index.php** : Page de connexion/inscription
- **PageChoix.php** : Interface de navigation vers les différentes sections
- **votingPage.php** : Page de vote et affichage des résultats
- **createScrutin.php et gererScrutin.php**: Création et gestion des scrutins par l'organisateur

#### Répertoires :
- **assets/** : Logos et images de la plateforme
- **data/** : Fichiers de données (JSON)
- **styles/** : Feuilles de style CSS pour le design de l’interface

## Problèmes Rencontrés
- **Problèmes de session** : Certaines erreurs dans le passage des données d'une session à une autre ont été identifiées.
- **Gestion des appels AJAX** : Quelques difficultés liées aux URLs et à la gestion des réponses vides ont été rencontrées, nécessitant des ajustements de code.

## Extensions Futures
En tant que plateforme évolutive, Aghavote pourrait inclure les extensions suivantes :

- Vote préférentiel : Permettre aux votants de classer les options par ordre de préférence
- Calendrier de sélection : Affichage des options de vote sous forme de plages horaires, façon Doodle
- Encryption des votes : Utilisation de JSEncrypt pour sécuriser les votes et assurer la confidentialité


## Auteur
Chloé Makoundou

## Licence
Projet réalisé dans le cadre de l'option Programmation Web à l’Université Paris-Saclay, sous la supervision de Frédéric Vernier.
