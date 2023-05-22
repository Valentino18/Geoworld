Enzo & Yacine

Projet Geoworld 

Lien du github :  https://github.com/EnzoPoint/GeoworldSIO12_Me
<br>
Lien du trello :
https://trello.com/c/0CA7849f

Aperçu Final :

![image](https://user-images.githubusercontent.com/38391212/116417094-42ab6e00-a83b-11eb-95c3-cdfc92efbb39.png)


1ère Etape : Installation de l'existant 

Vérifier si mon poste héberge un MySQL actif
Vérifier si mon poste dispose d'un Apache2 actif
Création de la base de données 
Importer le schéma de la base
Importer les données de la base
Tester / configurer le projet GEOWORLD en phase initiale

**![image](https://user-images.githubusercontent.com/38391212/116417141-4a6b1280-a83b-11eb-97ca-782538f8d6e7.png)
**

2ème Etape : Prise en main de l'existant

Par default il y avais déjà plusieur chose existant 

Apercu du site de base : 

![image](https://user-images.githubusercontent.com/38391212/116417180-51922080-a83b-11eb-9128-9957fdeae9cd.png)


Il fallait donc faire les functions de ce qui était déjà existant car il n’y avais rien comme function de base et après faire de la place au niveau du code pour le rendre plus clean.

3ème Etape : Valider vos modifications dans ./inc 

Test qualité du code.
==============
On utilise [phpcs] (https://github.com/squizlabs/PHP_CodeSniffer)
Exemple : en ligne de commande, **à partir de la racine du projet**, taper la commande `phpcs
-p ./inc/ ` ou ` phpcs -p .\inc\ ` sous windows (? à tester).

Nous avons corrigé les différents erreur detecté le plus souvent c’était l’absence de justificatif dans les functions :

![image](https://user-images.githubusercontent.com/38391212/116417254-61116980-a83b-11eb-8a02-464033deba08.png)

Une fois corrigé nous effections de nouveau le script et il affiche plus aucune erreur.

```
(racine world-intro-bt4)$ phpcs -p ./inc/
.. 2 / 2 (100%)
Time: 40ms; Memory: 4MB
```



4ème Etape : GO ! Conception des premiers User Stories 

Dans cette Etape l’une des plus complètes il fallait tous configuré pour que personne ne puisse accedé aux autre page sauf si il était connecté ou inscrit et y definir des permission :

Administrateur :

En tant que **Admin (Root)** : 

- Je souhaite avoir *access* a la consultation des informations pour pouvoir les consultées.

- Et pouvoir gérer (crée) des requêtes SQL et les mettres en place publiquement Mise en place (via Web / Function) qui m'affichera le resultat (erreur compris) comme les profeseurs.

- Et pouvoir gérer les rôles et utilisateurs (ajouté & supprimé & upgrade).

- Et mettre a jours les données de la table SQL



Professeur :

En tant que **Semi-Admin (Enseignant)** : 

- Je souhaite avoir *access* a la consultation des informations pour pouvoir les consultées.

- Et pouvoir gérer (crée) des requêtes SQL et les mettres en place publiquement Mise en place (via Web / Function) qui m'affichera le resultat (erreur compris).

- Et mettre a jours les données de la table SQL

Eleve :

En tant que **Simple utilisateur (élève)** : 

- Je souhaite avoir *access* a la consultation des informations pour pouvoir les consultées.

- Et pouvoir tester les requêtes SQL Mise en place par les professeurs (function) qui m'affichera le resultat.






Interface de connexion :

Inscription:


![image](https://user-images.githubusercontent.com/38391212/116417296-6a023b00-a83b-11eb-8623-c927d253524e.png)


Connexion :

![image](https://user-images.githubusercontent.com/38391212/116417334-725a7600-a83b-11eb-88a9-e79ae71ceb98.png)


Accueil (Connecté en tant que simple utilisateur) donc possibilité de visionner le contenu et d’utiliser des requêtes simples via la barre de recherche :

![image](https://user-images.githubusercontent.com/38391212/116417364-78e8ed80-a83b-11eb-9c46-9d90d2a07d3f.png)



Si nous faisons une recherche de paris :

![image](https://user-images.githubusercontent.com/38391212/116417375-7d150b00-a83b-11eb-8754-cc0d75393e48.png)


Si maintenant je me connecte en tant qu’Administrateur j’ai donc acces au panel Admin :

![image](https://user-images.githubusercontent.com/38391212/116417399-81d9bf00-a83b-11eb-84f6-c1f1bbce17de.png)


Je peux donc ajouté ou modifié un utilisateur ou le supprimé

la seul différence avec le grade professeur c’est que je peux pas modifié et mettre un rôle administrateur si je suis professeur je peux donc juste le mettre en tant que utilisateur ou prof.

Il manque certaine chose que je souhaitais faire Mon Profil pour un simple utilisateur / et peut etre plus de detaile sur certaine chose mais j’ai rencontré pas mal de problème et c’était mon premier projet quelque manque d’organisation dû au distanciel via le groupe.
